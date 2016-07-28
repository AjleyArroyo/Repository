@extends('app')

@section('content')
    <div class="content">
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Privilegios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('privilegios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($privilegios->isEmpty())
                <div class="well text-center">No Privilegios found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($privilegios as $privilegio)
                        <tr>
                            <td>{!! $privilegio->nombre !!}</td>
                            <td>
                                <a href="{!! route('privilegios.edit', [$privilegio->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('privilegios.delete', [$privilegio->id]) !!}" onclick="return confirm('Are you sure wants to delete this Privilegio?')"><i class="glyphicon glyphicon-remove"></i></a>
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