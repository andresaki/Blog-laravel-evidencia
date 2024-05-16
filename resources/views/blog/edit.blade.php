@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Blog
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-8 col-lg-4">

                <div class="card card-default">
                    <div class="card-header bg-success-subtle fw-semibold ">
                        <span class="card-title">{{ __('Editar') }} Blog</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('blogs.update', $blog->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('blog.form' ,['modo' => $modo])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
