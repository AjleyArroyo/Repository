@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'ubicacions.store']) !!}

        @include('ubicacions.fields')

    {!! Form::close() !!}
</div>
@endsection
