@if(!$categorias->isEmpty())
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('color', 'Color:') !!}
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('idCategoria', 'Categoria:') !!}
        <select class="form-control" name="idCategoria">
            @foreach($categorias as $categoria)
                <option value="{!! $categoria->id !!}">{!! $categoria->nombre !!}</option>
            @endforeach
        </select>
</div>


<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombreImagen', 'Seleccionar Imagen:') !!}
    <div class="input-group">
        <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input type="file" name="nombreImagen" style="display: none;" multiple>
                    </span>
        </label>
        <input type="text" class="form-control" readonly>
    </div>

</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
@else
    <div class="well text-center">No hay categorias disponibles.</div>
@endif

