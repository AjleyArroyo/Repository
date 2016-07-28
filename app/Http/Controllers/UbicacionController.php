<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUbicacionRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\UbicacionRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class UbicacionController extends AppBaseController
{

	/** @var  UbicacionRepository */
	private $ubicacionRepository;

	function __construct(UbicacionRepository $ubicacionRepo)
	{
		$this->middleware('auth');
		$this->ubicacionRepository = $ubicacionRepo;
	}

	/**
	 * Display a listing of the Ubicacion.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->ubicacionRepository->search($input);

		$ubicacions = $result[0];

		$attributes = $result[1];

		return view('ubicacions.index')
		    ->with('ubicacions', $ubicacions)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Ubicacion.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ubicacions.create');
	}

	/**
	 * Store a newly created Ubicacion in storage.
	 *
	 * @param CreateUbicacionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUbicacionRequest $request)
	{
        $input = $request->all();

		$ubicacion = $this->ubicacionRepository->store($input);

		Flash::message('Ubicacion saved successfully.');

		return redirect(route('ubicacions.index'));
	}

	/**
	 * Display the specified Ubicacion.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$ubicacion = $this->ubicacionRepository->findUbicacionById($id);

		if(empty($ubicacion))
		{
			Flash::error('Ubicacion not found');
			return redirect(route('ubicacions.index'));
		}

		return view('ubicacions.show')->with('ubicacion', $ubicacion);
	}

	/**
	 * Show the form for editing the specified Ubicacion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ubicacion = $this->ubicacionRepository->findUbicacionById($id);

		if(empty($ubicacion))
		{
			Flash::error('Ubicacion not found');
			return redirect(route('ubicacions.index'));
		}

		return view('ubicacions.edit')->with('ubicacion', $ubicacion);
	}

	/**
	 * Update the specified Ubicacion in storage.
	 *
	 * @param  int    $id
	 * @param CreateUbicacionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateUbicacionRequest $request)
	{
		$ubicacion = $this->ubicacionRepository->findUbicacionById($id);

		if(empty($ubicacion))
		{
			Flash::error('Ubicacion not found');
			return redirect(route('ubicacions.index'));
		}

		$ubicacion = $this->ubicacionRepository->update($ubicacion, $request->all());

		Flash::message('Ubicacion updated successfully.');

		return redirect(route('ubicacions.index'));
	}

	/**
	 * Remove the specified Ubicacion from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$ubicacion = $this->ubicacionRepository->findUbicacionById($id);

		if(empty($ubicacion))
		{
			Flash::error('Ubicacion not found');
			return redirect(route('ubicacions.index'));
		}

		$ubicacion->delete();

		Flash::message('Ubicacion deleted successfully.');

		return redirect(route('ubicacions.index'));
	}

}
