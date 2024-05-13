@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Blog
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-8 col-lg-4 ">

                <div class="card card-default">
                    <div class="card-header bg-success-subtle fw-semibold ">
                        <span class="card-title">{{ __('Crear') }} Blog</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('blogs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('blog.form')



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
