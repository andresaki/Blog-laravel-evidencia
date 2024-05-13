@extends('layouts.app')

@section('template_title')
    {{ $categoria->name ?? __('Ver') . " " . __('Categoria') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-8 col-lg-4">
                <div class="card">
                    <div class="card-header bg-success-subtle fw-semibold " style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('') }} Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success  btn-sm" href="{{ route('categorias.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $categoria->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $categoria->descripcion }}
                                </div>



                                {{-- cambiar ruta de imagen --}}

                                <div class="form-group mb-2 mb20">
                                    <strong>Foto:</strong>
                                    <div class="m-3">
                                        <img src="/categoria-imagenes/{{ $categoria->foto }}" style="width: 30%" alt="">
                                    </div>

                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
