@extends('layouts.app')

@section('template_title')
    Categorias
@endsection

@section('content')

    <div class="container-fluid col-lg-7  justify-content-center d-flex flex-wrap  ">


        @foreach ($categorias as $categoria)
        <div class="card m-4 " style="width: 14rem;">
            <img src="/categoria-imagenes/{{ $categoria->foto }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $categoria->nombre }}</h5>
              <p class="card-text">{{ $categoria->descripcion }}</p>
              <a href="{{route('blog.categoria' , $categoria->id)}}" class="btn btn-warning ">Mirar los post</a>
            </div>
        </div>
        @endforeach




    </div>

@endsection
