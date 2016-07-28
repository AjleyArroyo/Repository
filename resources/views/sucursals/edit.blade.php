@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($sucursal, ['route' => ['sucursals.update', $sucursal->id], 'method' => 'patch']) !!}

        @include('sucursals.fields')

    {!! Form::close() !!}
</div>
@endsection
