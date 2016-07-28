@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($catalogo, ['route' => ['catalogos.update', $catalogo->id], 'method' => 'patch']) !!}

        @include('catalogos.fields')

    {!! Form::close() !!}
</div>
@endsection
