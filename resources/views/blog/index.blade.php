@extends('layouts.app')

@section('template_title')
    Blogs
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center ">
            <div class="col-sm-12 mt-5 col-lg-10 ">
                <div class="card">
                    <div class="card-header bg-success-subtle">
                        <div style="display: flex; justify-content: space-between; align-items: center;" >

                            <span id="card_title" class="fw-semibold text-success ">
                                {{ __('Blogs') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('blogs.create') }}" class="btn btn-success  btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo post') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4 position-fixed bottom-0  ">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table   table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

									<th >Categoria Id</th>
									<th >Titulo</th>
									<th >Descripcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $blog->categoria->nombre }}</td>
										<td >{{ $blog->titulo }}</td>

										<td >{{ $blog->descripcion }}</td>

                                            <td style="width: 200px">
                                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success   " href="{{ route('blogs.show', $blog->id) }}"> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-secondary     " href="{{ route('blogs.edit', $blog->id) }}">{{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-warning   btn-sm" onclick="event.preventDefault(); confirm('Seguro que quieres eliminarlo?') ? this.closest('form').submit() : false;">{{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $blogs->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
