@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($mueble, ['route' => ['muebles.update', $mueble->id], 'method' => 'patch']) !!}

        @include('muebles.fields')

    {!! Form::close() !!}
</div>
@endsection
