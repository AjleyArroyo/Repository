@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tipoUsuario, ['route' => ['tipoUsuarios.update', $tipoUsuario->id], 'method' => 'patch']) !!}

        @include('tipoUsuarios.fields')

    {!! Form::close() !!}
</div>
@endsection
