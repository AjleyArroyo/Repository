@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'privilegios.store']) !!}

        @include('privilegios.fields')

    {!! Form::close() !!}
</div>
@endsection
