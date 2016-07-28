<!--- Nombre Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!--- Anio Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('anio', 'Anio:') !!}
    {!! Form::text('anio', null, ['class' => 'form-control']) !!}
</div>

<!--- Descripcion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('muebles', 'Seleccionar muebles a pertenecer en el catalogo:') !!}
    <select multiple class="form-control" name="mueble[]">
        @foreach($muebles as $mueble)
            <option value="{!! $mueble->id !!}">{!! $mueble->nombre !!}</option>
        @endforeach

    </select>
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
