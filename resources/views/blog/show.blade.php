@extends('layouts.app')

@section('template_title')
    {{ $blog->name ?? __('Ver') . " " . __('Blog') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-8 col-lg-4 ">
                <div class="card">
                    <div class="card-header bg-success-subtle fw-semibold " style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('') }} Blog</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success  btn-sm" href="{{ route('blogs.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Categoria Id:</strong>
                                    {{ $blog->categoria_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Titulo:</strong>
                                    {{ $blog->titulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Foto:</strong>
                                    <div class="m-3">
                                        <img src="/img-blog/{{ $blog->foto }}" style="width: 30%" alt="">
                                    </div>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $blog->descripcion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
