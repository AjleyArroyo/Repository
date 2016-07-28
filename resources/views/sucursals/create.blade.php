@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'sucursals.store']) !!}

        @include('sucursals.fields')

    {!! Form::close() !!}
</div>
@endsection
