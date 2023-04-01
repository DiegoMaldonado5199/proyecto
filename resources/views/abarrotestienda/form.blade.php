<h1>{{ $modo }} datos</h1>

@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="producto">Producto</label>
    <input type="text" class="form-control" name="producto" value="{{ isset($abarrote->producto) ? $abarrote->producto : old('producto') }}" id="producto">
</div>

<div class="form-group">
    <label for="descripcion">Descripción</label>
    <input type="text" class="form-control" name="descripcion" value="{{ isset($abarrote->descripcion) ? $abarrote->descripcion : old('descripcion') }}" id="descripcion">
</div>

<div class="form-group">
    <label for="precio">Precio</label>
    <input type="text" class="form-control" name="precio" value="{{ isset($abarrote->precio) ? $abarrote->precio : old('precio') }}" id="precio">
</div>


<input class="btn btn-success" type="submit" value="{{$modo}} datos">
<a class="btn btn-primary" href="{{ url ('/abarrotestienda/') }}">Regresar</a>