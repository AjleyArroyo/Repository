<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTipoUsuarioRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\TipoUsuarioRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class TipoUsuarioController extends AppBaseController
{

	/** @var  TipoUsuarioRepository */
	private $tipoUsuarioRepository;

	function __construct(TipoUsuarioRepository $tipoUsuarioRepo)
	{
		$this->middleware('auth');
		$this->tipoUsuarioRepository = $tipoUsuarioRepo;
	}

	/**
	 * Display a listing of the TipoUsuario.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->tipoUsuarioRepository->search($input);

		$tipoUsuarios = $result[0];

		$attributes = $result[1];

		return view('tipoUsuarios.index')
		    ->with('tipoUsuarios', $tipoUsuarios)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new TipoUsuario.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipoUsuarios.create');
	}

	/**
	 * Store a newly created TipoUsuario in storage.
	 *
	 * @param CreateTipoUsuarioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTipoUsuarioRequest $request)
	{
        $input = $request->all();

		$tipoUsuario = $this->tipoUsuarioRepository->store($input);

		Flash::message('TipoUsuario saved successfully.');

		return redirect(route('tipoUsuarios.index'));
	}

	/**
	 * Display the specified TipoUsuario.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tipoUsuario = $this->tipoUsuarioRepository->findTipoUsuarioById($id);

		if(empty($tipoUsuario))
		{
			Flash::error('TipoUsuario not found');
			return redirect(route('tipoUsuarios.index'));
		}

		return view('tipoUsuarios.show')->with('tipoUsuario', $tipoUsuario);
	}

	/**
	 * Show the form for editing the specified TipoUsuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tipoUsuario = $this->tipoUsuarioRepository->findTipoUsuarioById($id);

		if(empty($tipoUsuario))
		{
			Flash::error('TipoUsuario not found');
			return redirect(route('tipoUsuarios.index'));
		}

		return view('tipoUsuarios.edit')->with('tipoUsuario', $tipoUsuario);
	}

	/**
	 * Update the specified TipoUsuario in storage.
	 *
	 * @param  int    $id
	 * @param CreateTipoUsuarioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateTipoUsuarioRequest $request)
	{
		$tipoUsuario = $this->tipoUsuarioRepository->findTipoUsuarioById($id);

		if(empty($tipoUsuario))
		{
			Flash::error('TipoUsuario not found');
			return redirect(route('tipoUsuarios.index'));
		}

		$tipoUsuario = $this->tipoUsuarioRepository->update($tipoUsuario, $request->all());

		Flash::message('TipoUsuario updated successfully.');

		return redirect(route('tipoUsuarios.index'));
	}

	/**
	 * Remove the specified TipoUsuario from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$tipoUsuario = $this->tipoUsuarioRepository->findTipoUsuarioById($id);

		if(empty($tipoUsuario))
		{
			Flash::error('TipoUsuario not found');
			return redirect(route('tipoUsuarios.index'));
		}

		$tipoUsuario->delete();

		Flash::message('TipoUsuario deleted successfully.');

		return redirect(route('tipoUsuarios.index'));
	}

}
