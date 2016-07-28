@extends('app')

@section('content')
    <div class="content">
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Ubicacions</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('ubicacions.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($ubicacions->isEmpty())
                <div class="well text-center">No Ubicacions found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Direccion</th>
			<th>Latitud</th>
			<th>Longitud</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($ubicacions as $ubicacion)
                        <tr>
                            <td>{!! $ubicacion->direccion !!}</td>
					<td>{!! $ubicacion->latitud !!}</td>
					<td>{!! $ubicacion->longitud !!}</td>
                            <td>
                                <a href="{!! route('ubicacions.edit', [$ubicacion->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('ubicacions.delete', [$ubicacion->id]) !!}" onclick="return confirm('Are you sure wants to delete this Ubicacion?')"><i class="glyphicon glyphicon-remove"></i></a>
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