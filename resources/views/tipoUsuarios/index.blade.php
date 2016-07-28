@extends('app')

@section('content')
    <div class="content">
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">TipoUsuarios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tipoUsuarios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($tipoUsuarios->isEmpty())
                <div class="well text-center">No TipoUsuarios found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Descripcion</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($tipoUsuarios as $tipoUsuario)
                        <tr>
                            <td>{!! $tipoUsuario->nombre !!}</td>
					<td>{!! $tipoUsuario->descripcion !!}</td>
                            <td>
                                <a href="{!! route('tipoUsuarios.edit', [$tipoUsuario->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('tipoUsuarios.delete', [$tipoUsuario->id]) !!}" onclick="return confirm('Are you sure wants to delete this TipoUsuario?')"><i class="glyphicon glyphicon-remove"></i></a>
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