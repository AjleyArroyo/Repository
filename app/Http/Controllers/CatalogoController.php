<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCatalogoRequest;
use App\Libraries\Repositories\MuebleRepository;
use Illuminate\Http\Request;
use App\Libraries\Repositories\CatalogoRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class CatalogoController extends AppBaseController
{

	/** @var  CatalogoRepository */
	private $catalogoRepository;
	private $muebleRepository;

	function __construct(CatalogoRepository $catalogoRepo,MuebleRepository $muebleRepo)
	{
		$this->middleware('auth');
		$this->catalogoRepository = $catalogoRepo;
		$this->muebleRepository=$muebleRepo;
	}

	/**
	 * Display a listing of the Catalogo.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->catalogoRepository->search($input);

		$catalogos = $result[0];

		$attributes = $result[1];

		return view('catalogos.index')
		    ->with('catalogos', $catalogos)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Catalogo.
	 *
	 * @return Response
	 */
	public function create()
	{
		$muebles= $this->muebleRepository->all();
		return view('catalogos.create')
			->with('muebles',$muebles);
	}

	/**
	 * Store a newly created Catalogo in storage.
	 *
	 * @param CreateCatalogoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCatalogoRequest $request)
	{
        $input = $request->all();

		$catalogo = $this->catalogoRepository->store($input);
		$variable=$input['mueble'];
		for ($i=0;$i<count($variable);$i++){
			$mue=$this->muebleRepository->findMuebleById($variable[$i]);
			$catalogo->muebles()->save($mue);
		}

		Flash::message('Catalogo saved successfully.');

		return redirect(route('catalogos.index'));
	}

	/**
	 * Display the specified Catalogo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$catalogo = $this->catalogoRepository->findCatalogoById($id);

		if(empty($catalogo))
		{
			Flash::error('Catalogo not found');
			return redirect(route('catalogos.index'));
		}

		return view('catalogos.show')->with('catalogo', $catalogo);
	}

	/**
	 * Show the form for editing the specified Catalogo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$catalogo = $this->catalogoRepository->findCatalogoById($id);

		if(empty($catalogo))
		{
			Flash::error('Catalogo not found');
			return redirect(route('catalogos.index'));
		}

		return view('catalogos.edit')->with('catalogo', $catalogo);
	}

	/**
	 * Update the specified Catalogo in storage.
	 *
	 * @param  int    $id
	 * @param CreateCatalogoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCatalogoRequest $request)
	{
		$catalogo = $this->catalogoRepository->findCatalogoById($id);

		if(empty($catalogo))
		{
			Flash::error('Catalogo not found');
			return redirect(route('catalogos.index'));
		}

		$catalogo = $this->catalogoRepository->update($catalogo, $request->all());

		Flash::message('Catalogo updated successfully.');

		return redirect(route('catalogos.index'));
	}

	/**
	 * Remove the specified Catalogo from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$catalogo = $this->catalogoRepository->findCatalogoById($id);

		if(empty($catalogo))
		{
			Flash::error('Catalogo not found');
			return redirect(route('catalogos.index'));
		}

		$catalogo->delete();

		Flash::message('Catalogo deleted successfully.');

		return redirect(route('catalogos.index'));
	}

}
