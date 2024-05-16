<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(Request $request): View
    {
        $categorias = Categoria::paginate();

        return view('categoria.index', compact('categorias'))
            ->with('i', ($request->input('page', 1) - 1) * $categorias->perPage());
    }

    public function verAllCategoria(): view
    {
        $categorias = Categoria::all();
        return view('categoria.allCategorias' , compact('categorias'));
    }



    public function create(): View
    {
        $categoria = new Categoria();
        $modo = 'crear';
        return view('categoria.create', compact('categoria','modo'));
    }


    public function store(CategoriaRequest $request): RedirectResponse
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // ajusta las validaciones según tus necesidades
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $path = $image->store('fotosCategoria', 'public'); // Almacena la imagen en storage/app/fotos


            // Guarda la ruta de la imagen en tu base de datos
            // Por ejemplo, si tienes un modelo Blog:
            $blog = new Categoria();
            $blog->fill($request->validated()); // Llena los otros campos del modelo
            $blog->foto = basename($path);
            $blog->save();
        }


        return Redirect::route('categorias.index')
            ->with('success', 'Categoria creada con exito.');
    }


    public function show($id): View
    {
        $categoria = Categoria::find($id);

        return view('categoria.show', compact('categoria'));
    }


    public function edit($id): View
    {
        $categoria = Categoria::find($id);
        $modo = 'editar';
        return view('categoria.edit', compact('categoria' ,'modo'));
    }

    public function update(CategoriaRequest $request, Categoria $categoria): RedirectResponse
    {
        $data = $request->validated();

        // verificar si se cargo una nueva imagen
        if ($request->hasFile('foto')) {

            // Procesar la nueva foto y actualizar el campo correspondiente
            $path = $request->file('foto')->store('fotosCategoria', 'public');;
            $data['foto'] = basename($path);
        }

        $categoria->update($data);

        return Redirect::route('categorias.index')
            ->with('success', 'Categoria actualizada con exito');
    }

    public function destroy($id): RedirectResponse
    {
        Categoria::find($id)->delete();

        return Redirect::route('categorias.index')
            ->with('success', 'Categoria eliminada con exito');
    }
}
