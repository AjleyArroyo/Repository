@extends('app')

@section('content')
<div class="content">
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Catalogos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('catalogos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($catalogos->isEmpty())
                <div class="well text-center">No Catalogos found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Anio</th>
			<th>Descripcion</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($catalogos as $catalogo)
                        <tr>
                            <td>{!! $catalogo->nombre !!}</td>
					<td>{!! $catalogo->anio !!}</td>
					<td>{!! $catalogo->descripcion !!}</td>
                            <td>
                                <a href="{!! route('catalogos.edit', [$catalogo->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('catalogos.delete', [$catalogo->id]) !!}" onclick="return confirm('Are you sure wants to delete this Catalogo?')"><i class="glyphicon glyphicon-remove"></i></a>
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