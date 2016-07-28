@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'muebles.store','files' => true]) !!}

        @include('muebles.fields')

    {!! Form::close() !!}
</div>
@endsection
