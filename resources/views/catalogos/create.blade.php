@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'catalogos.store']) !!}

        @include('catalogos.fields')

    {!! Form::close() !!}
</div>
@endsection
