<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePrivilegioRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PrivilegioRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class PrivilegioController extends AppBaseController
{

	/** @var  PrivilegioRepository */
	private $privilegioRepository;

	function __construct(PrivilegioRepository $privilegioRepo)
	{
		$this->middleware('auth');
		$this->privilegioRepository = $privilegioRepo;
	}

	/**
	 * Display a listing of the Privilegio.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->privilegioRepository->search($input);

		$privilegios = $result[0];

		$attributes = $result[1];

		return view('privilegios.index')
		    ->with('privilegios', $privilegios)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Privilegio.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('privilegios.create');
	}

	/**
	 * Store a newly created Privilegio in storage.
	 *
	 * @param CreatePrivilegioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePrivilegioRequest $request)
	{
        $input = $request->all();

		$privilegio = $this->privilegioRepository->store($input);

		Flash::message('Privilegio saved successfully.');

		return redirect(route('privilegios.index'));
	}

	/**
	 * Display the specified Privilegio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$privilegio = $this->privilegioRepository->findPrivilegioById($id);

		if(empty($privilegio))
		{
			Flash::error('Privilegio not found');
			return redirect(route('privilegios.index'));
		}

		return view('privilegios.show')->with('privilegio', $privilegio);
	}

	/**
	 * Show the form for editing the specified Privilegio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$privilegio = $this->privilegioRepository->findPrivilegioById($id);

		if(empty($privilegio))
		{
			Flash::error('Privilegio not found');
			return redirect(route('privilegios.index'));
		}

		return view('privilegios.edit')->with('privilegio', $privilegio);
	}

	/**
	 * Update the specified Privilegio in storage.
	 *
	 * @param  int    $id
	 * @param CreatePrivilegioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePrivilegioRequest $request)
	{
		$privilegio = $this->privilegioRepository->findPrivilegioById($id);

		if(empty($privilegio))
		{
			Flash::error('Privilegio not found');
			return redirect(route('privilegios.index'));
		}

		$privilegio = $this->privilegioRepository->update($privilegio, $request->all());

		Flash::message('Privilegio updated successfully.');

		return redirect(route('privilegios.index'));
	}

	/**
	 * Remove the specified Privilegio from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$privilegio = $this->privilegioRepository->findPrivilegioById($id);

		if(empty($privilegio))
		{
			Flash::error('Privilegio not found');
			return redirect(route('privilegios.index'));
		}

		$privilegio->delete();

		Flash::message('Privilegio deleted successfully.');

		return redirect(route('privilegios.index'));
	}

}
