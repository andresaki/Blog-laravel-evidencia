<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-4 mb20">
            <label for="categoria_id" class="form-label">{{ __('Categoria') }}</label>
            <select name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror" id="categoria_id">
              <option value="">{{ __('Seleccionar Categoría') }}</option>  @foreach ($categorias as $id => $nombre)
                <option value="{{ $id }}"
                    @if (old('categoria_id') == $id || (isset($blog) && $blog->categoria_id == $id))
                        selected
                    @endif
                >{{ $nombre }}</option>
              @endforeach
            </select>
            {!! $errors->first('categoria_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-4 mb20">
            <label for="titulo" class="form-label">{{ __('Titulo') }}</label>
            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $blog?->titulo) }}" id="titulo" placeholder="Titulo">
            {!! $errors->first('titulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="form-group mb-4 mb20">
            <label for="foto" class="form-label">{{ __('Foto') }}</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" accept="image/*">
            {!! $errors->first('foto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>




        <div class="form-group mb-4 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $blog?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt-5  mb-3">
        <button type="submit" class="btn btn-success ">{{ __('Guardar') }}</button>
    </div>
</div>
