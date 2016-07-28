@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($categoria, ['route' => ['categorias.update', $categoria->id], 'method' => 'patch']) !!}

        @include('categorias.fields')

    {!! Form::close() !!}
</div>
@endsection
