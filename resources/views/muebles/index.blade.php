@extends('app')

@section('content')
    <div class="content">
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Muebles</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('muebles.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($muebles->isEmpty())
                <div class="well text-center">No Muebles found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Descripcion</th>
			<th>Color</th>
			<th>Nombre de Imagen</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($muebles as $mueble)
                        <tr>
                            <td>{!! $mueble->nombre !!}</td>
					<td>{!! $mueble->descripcion !!}</td>
					<td>{!! $mueble->color !!}</td>
					<td>{!! $mueble->nombreImagen !!}</td>
                            <td>
                                <a href="{!! route('muebles.edit', [$mueble->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('muebles.delete', [$mueble->id]) !!}" onclick="return confirm('Are you sure wants to delete this Mueble?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    </div>
@endsection