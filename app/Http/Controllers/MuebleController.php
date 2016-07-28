<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMuebleRequest;
use App\Libraries\Repositories\CategoriaRepository;
use Illuminate\Http\Request;
use App\Libraries\Repositories\MuebleRepository;
use Illuminate\Support\Facades\Storage;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;



class MuebleController extends AppBaseController
{

	/** @var  MuebleRepository */
	private $muebleRepository;
	private $categoriaRepository;

	function __construct(MuebleRepository $muebleRepo, CategoriaRepository $categoriaRepo)
	{
		$this->middleware('auth');
		$this->muebleRepository = $muebleRepo;
		$this->categoriaRepository=$categoriaRepo;
	}

	/**
	 * Display a listing of the Mueble.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->muebleRepository->search($input);

		$muebles = $result[0];

		$attributes = $result[1];

		return view('muebles.index')
		    ->with('muebles', $muebles)
		    ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Mueble.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias=$this->categoriaRepository->all();
		return view('muebles.create')
			->with('categorias',$categorias);

		
	}

	/**
	 * Store a newly created Mueble in storage.
	 *
	 * @param CreateMuebleRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateMuebleRequest $request)
	{
        $input = $request->all();
		$file=$request->file('nombreImagen');
		$nombre=$file->getClientOriginalName();
		$input['nombreImagen']=$nombre;
		$mueble = $this->muebleRepository->store($input);
		//$ruta="/home/root/public/". $input['nombreImagen']['name'];


		\Storage::disk('local')->put($nombre,\File::get($file));

		Flash::message('Mueble saved successfully.');

		return redirect(route('muebles.index'));
	}

	/**
	 * Display the specified Mueble.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mueble = $this->muebleRepository->findMuebleById($id);

		if(empty($mueble))
		{
			Flash::error('Mueble not found');
			return redirect(route('muebles.index'));
		}

		return view('muebles.show')->with('mueble', $mueble);
	}

	/**
	 * Show the form for editing the specified Mueble.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mueble = $this->muebleRepository->findMuebleById($id);

		if(empty($mueble))
		{
			Flash::error('Mueble not found');
			return redirect(route('muebles.index'));
		}

		return view('muebles.edit')->with('mueble', $mueble);
	}

	/**
	 * Update the specified Mueble in storage.
	 *
	 * @param  int    $id
	 * @param CreateMuebleRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateMuebleRequest $request)
	{
		$mueble = $this->muebleRepository->findMuebleById($id);

		if(empty($mueble))
		{
			Flash::error('Mueble not found');
			return redirect(route('muebles.index'));
		}

		$mueble = $this->muebleRepository->update($mueble, $request->all());

		Flash::message('Mueble updated successfully.');

		return redirect(route('muebles.index'));
	}

	/**
	 * Remove the specified Mueble from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$mueble = $this->muebleRepository->findMuebleById($id);

		if(empty($mueble))
		{
			Flash::error('Mueble not found');
			return redirect(route('muebles.index'));
		}
		Storage::delete($mueble->nombreImagen);
		$mueble->delete();

		Flash::message('Mueble deleted successfully.');

		return redirect(route('muebles.index'));
	}

}
