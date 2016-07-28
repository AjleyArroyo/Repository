<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSucursalRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\SucursalRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class SucursalController extends AppBaseController
{

	/** @var  SucursalRepository */
	private $sucursalRepository;

	function __construct(SucursalRepository $sucursalRepo)
	{
		$this->middleware('auth');
		$this->sucursalRepository = $sucursalRepo;
	}

	/**
	 * Display a listing of the Sucursal.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->sucursalRepository->search($input);

		$sucursals = $result[0];

		$attributes = $result[1];

		return view('sucursals.index')
		    ->with('sucursals', $sucursals)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Sucursal.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('sucursals.create');
	}

	/**
	 * Store a newly created Sucursal in storage.
	 *
	 * @param CreateSucursalRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSucursalRequest $request)
	{
        $input = $request->all();

		$sucursal = $this->sucursalRepository->store($input);

		Flash::message('Sucursal saved successfully.');

		return redirect(route('sucursals.index'));
	}

	/**
	 * Display the specified Sucursal.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$sucursal = $this->sucursalRepository->findSucursalById($id);

		if(empty($sucursal))
		{
			Flash::error('Sucursal not found');
			return redirect(route('sucursals.index'));
		}

		return view('sucursals.show')->with('sucursal', $sucursal);
	}

	/**
	 * Show the form for editing the specified Sucursal.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sucursal = $this->sucursalRepository->findSucursalById($id);

		if(empty($sucursal))
		{
			Flash::error('Sucursal not found');
			return redirect(route('sucursals.index'));
		}

		return view('sucursals.edit')->with('sucursal', $sucursal);
	}

	/**
	 * Update the specified Sucursal in storage.
	 *
	 * @param  int    $id
	 * @param CreateSucursalRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateSucursalRequest $request)
	{
		$sucursal = $this->sucursalRepository->findSucursalById($id);

		if(empty($sucursal))
		{
			Flash::error('Sucursal not found');
			return redirect(route('sucursals.index'));
		}

		$sucursal = $this->sucursalRepository->update($sucursal, $request->all());

		Flash::message('Sucursal updated successfully.');

		return redirect(route('sucursals.index'));
	}

	/**
	 * Remove the specified Sucursal from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$sucursal = $this->sucursalRepository->findSucursalById($id);

		if(empty($sucursal))
		{
			Flash::error('Sucursal not found');
			return redirect(route('sucursals.index'));
		}

		$sucursal->delete();

		Flash::message('Sucursal deleted successfully.');

		return redirect(route('sucursals.index'));
	}

}
