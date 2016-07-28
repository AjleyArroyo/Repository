@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($privilegio, ['route' => ['privilegios.update', $privilegio->id], 'method' => 'patch']) !!}

        @include('privilegios.fields')

    {!! Form::close() !!}
</div>
@endsection
