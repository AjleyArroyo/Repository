@extends('app')

@section('content')
    <div class="content">
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Categorias</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('categorias.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($categorias->isEmpty())
                <div class="well text-center">No Categorias found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Codigo</th>
			<th>Nombre</th>
			<th>Descripcion</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{!! $categoria->id !!}</td>
					<td>{!! $categoria->nombre !!}</td>
					<td>{!! $categoria->descripcion !!}</td>
                            <td>
                                <a href="{!! route('categorias.edit', [$categoria->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('categorias.delete', [$categoria->id]) !!}" onclick="return confirm('Esta seguro de Eliminar la Categoria?')"><i class="glyphicon glyphicon-remove"></i></a>
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