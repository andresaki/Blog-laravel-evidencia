<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-4 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $categoria?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-4 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $categoria?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        @if($modo === 'editar')
            <div class="form-group mb-4 mb20 card  px-2 py-3  bg-primary-subtle  ">
                <label for="foto" class="form-label d-block fw-semibold  ">{{ __('Foto actual') }}</label>
                <img src="/categoria-imagenes/{{ $categoria->foto }}" style="width: 30%" alt="">
            </div>
        @endif

        <div class="form-group mb-4 mb20">
            <label for="foto" class="form-label">{{ __('Foto') }}</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" accept="image/*">
            {!! $errors->first('foto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt-5  mb-3">
        <button type="submit" class="btn btn-success ">{{ __('Guardar') }}</button>
    </div>
</div>
