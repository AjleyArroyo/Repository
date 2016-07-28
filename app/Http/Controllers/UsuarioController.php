<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUsuarioRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\UsuarioRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class UsuarioController extends AppBaseController
{

	/** @var  UsuarioRepository */
	private $usuarioRepository;

	function __construct(UsuarioRepository $usuarioRepo)
	{
		$this->middleware('auth');
		$this->usuarioRepository = $usuarioRepo;
	}

	/**
	 * Display a listing of the Usuario.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->usuarioRepository->search($input);

		$usuarios = $result[0];

		$attributes = $result[1];

		return view('usuarios.index')
		    ->with('usuarios', $usuarios)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Usuario.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('usuarios.create');
	}

	/**
	 * Store a newly created Usuario in storage.
	 *
	 * @param CreateUsuarioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUsuarioRequest $request)
	{
        $input = $request->all();

		$usuario = $this->usuarioRepository->store($input);

		Flash::message('Usuario saved successfully.');

		return redirect(route('usuarios.index'));
	}

	/**
	 * Display the specified Usuario.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = $this->usuarioRepository->findUsuarioById($id);

		if(empty($usuario))
		{
			Flash::error('Usuario not found');
			return redirect(route('usuarios.index'));
		}

		return view('usuarios.show')->with('usuario', $usuario);
	}

	/**
	 * Show the form for editing the specified Usuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = $this->usuarioRepository->findUsuarioById($id);

		if(empty($usuario))
		{
			Flash::error('Usuario not found');
			return redirect(route('usuarios.index'));
		}

		return view('usuarios.edit')->with('usuario', $usuario);
	}

	/**
	 * Update the specified Usuario in storage.
	 *
	 * @param  int    $id
	 * @param CreateUsuarioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateUsuarioRequest $request)
	{
		$usuario = $this->usuarioRepository->findUsuarioById($id);

		if(empty($usuario))
		{
			Flash::error('Usuario not found');
			return redirect(route('usuarios.index'));
		}

		$usuario = $this->usuarioRepository->update($usuario, $request->all());

		Flash::message('Usuario updated successfully.');

		return redirect(route('usuarios.index'));
	}

	/**
	 * Remove the specified Usuario from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario = $this->usuarioRepository->findUsuarioById($id);

		if(empty($usuario))
		{
			Flash::error('Usuario not found');
			return redirect(route('usuarios.index'));
		}

		$usuario->delete();

		Flash::message('Usuario deleted successfully.');

		return redirect(route('usuarios.index'));
	}

}
