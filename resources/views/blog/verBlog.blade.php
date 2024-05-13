@extends('layouts.app')

@section('template_title')
    {{ $blog->name ?? __('Ver') . " " . __('Blog') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-10 col-lg-5   ">
                <div class="card">

                    <div class="card-body bg-white">

                        <h1 class="text-center fw-medium mt-4">{{ $blog->titulo }}</h1>




                                    <div class=" mt-5 text-center ">
                                        <img src="/img-blog/{{ $blog->foto }}" class="mt-2 col-10  col-md-8  col-lg-7 " alt="">
                                    </div>

                                </div>
                                <div class="form-group px-5 mb-4  mt-5 mb20">
                                    {{ $blog->descripcion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
