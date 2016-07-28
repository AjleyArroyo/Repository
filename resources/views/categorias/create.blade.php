@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'categorias.store']) !!}

        @include('categorias.fields')

    {!! Form::close() !!}
</div>
@endsection
