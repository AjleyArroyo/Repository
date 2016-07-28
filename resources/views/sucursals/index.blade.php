@extends('app')

@section('content')
    <div class="content">
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Sucursal</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('sucursals.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($sucursals->isEmpty())
                <div class="well text-center">No Sucursal found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Telefono</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($sucursals as $sucursal)
                        <tr>
                            <td>{!! $sucursal->nombre !!}</td>
					<td>{!! $sucursal->telefono !!}</td>
                            <td>
                                <a href="{!! route('sucursals.edit', [$sucursal->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('sucursals.delete', [$sucursal->id]) !!}" onclick="return confirm('Are you sure wants to delete this Sucursal?')"><i class="glyphicon glyphicon-remove"></i></a>
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