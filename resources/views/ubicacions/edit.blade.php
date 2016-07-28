@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($ubicacion, ['route' => ['ubicacions.update', $ubicacion->id], 'method' => 'patch']) !!}

        @include('ubicacions.fields')

    {!! Form::close() !!}
</div>
@endsection
