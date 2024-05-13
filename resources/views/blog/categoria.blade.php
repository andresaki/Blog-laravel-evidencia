@extends('layouts.app')

@section('template_title')
    Categorias
@endsection

@section('content')

    <h1 class="text-center ">{{$categoria -> nombre}}</h1>
    <div class="container-fluid col-lg-7  justify-content-center d-flex flex-wrap  ">


        @foreach ($blogs as $blog)
            <div class="card m-4 " style="width: 14rem;">
                <img src="/img-blog/{{ $blog->foto }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->titulo }}</h5>
                    <p class="card-text">{{ $blog->descripcion }}</p>
                    <a href="{{ route('blog.verBlog', $blog->id) }}" class="btn btn-primary  ">leer</a>
                </div>
            </div>

        @endforeach





    </div>

@endsection
