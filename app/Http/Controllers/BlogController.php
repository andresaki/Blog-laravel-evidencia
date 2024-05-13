<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BlogController extends Controller
{

    public function index(Request $request): View
    {
        $blogs = Blog::paginate();

        return view('blog.index', compact('blogs'))
            ->with('i', ($request->input('page', 1) - 1) * $blogs->perPage());
    }


    public function blogsPorCategoria( $id)
{


    $blogs = Categoria::find($id)->blogs;
    $categoria = Categoria::find($id);
    return view('blog.categoria', compact('blogs','categoria'));
}


    public function create(): View
    {
        $blog = new Blog();
        $categorias= Categoria::pluck('nombre', 'id');
        return view('blog.create', compact('blog','categorias'));
    }


    public function store(BlogRequest $request) //: RedirectResponse
    {

        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // ajusta las validaciones según tus necesidades
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $path = $image->store('fotos', 'public'); // Almacena la imagen en storage/app/fotos


            // Guarda la ruta de la imagen en tu base de datos
            // Por ejemplo, si tienes un modelo Blog:
            $blog = new Blog();
            $blog->fill($request->validated()); // Llena los otros campos del modelo
            $blog->foto = basename($path);
            $blog->save();
        }


        return Redirect::route('blogs.index')
            ->with('success', 'Blog creado con exito.');


    }


    public function show($id): View
    {
        $blog = Blog::find($id);

        return view('blog.show', compact('blog'));
    }


    public function edit($id): View
    {
        $blog = Blog::find($id);
        $categorias= Categoria::pluck('nombre', 'id');
        return view('blog.edit', compact('blog','categorias'));
    }


    public function update(BlogRequest $request, Blog $blog): RedirectResponse
    {
        $blog->update($request->validated());

        return Redirect::route('blogs.index')
            ->with('success', 'Blog Actualizada con exito');
    }

    public function destroy($id): RedirectResponse
    {
        Blog::find($id)->delete();

        return Redirect::route('blogs.index')
            ->with('success', 'Blog Eliminada con exito');
    }


    public function verBlog($id): view
    {
        $blog = Blog::find($id);
        return view('blog.verBlog', compact('blog'));
    }
}
