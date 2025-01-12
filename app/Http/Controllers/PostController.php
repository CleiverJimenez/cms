<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Constructor para asegurar que solo usuarios autenticados puedan acceder
    public function __construct()
    {
        $this->middleware('auth');  // Este middleware asegura que solo los usuarios logueados puedan acceder
    }

    // Método para mostrar todas las publicaciones del usuario logueado
    public function index()
    {
        // Obtener todas las publicaciones del usuario logueado
        $posts = Post::where('user_id', Auth::id())->get();

        // Pasar las publicaciones a la vista
        return view('post.postview', compact('posts')); // Asegúrate de que la vista sea postview
    }

    // Mostrar la vista con los detalles de una publicación
    public function show($id)
    {
        $post = Post::findOrFail($id); // Obtener la publicación por su ID
        // Verificar que el usuario tiene permiso para ver la publicación
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('publicaciones.index')->with('error', 'No tienes permiso para ver esta publicación');
        }
        return view('post.show', compact('post')); // Pasar la variable $post a la vista
    }

    // Método para mostrar el formulario de creación de una publicación
    public function create()
    {
        return view('post.postview'); // Vista para la creación de una publicación
    }

    // Método para almacenar la nueva publicación
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejo de la imagen (si existe)
        $imagePath = null;
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('images', 'public');
        }

        // Crear la publicación
        Post::create([
            'title' => $request->input('titulo'),
            'content' => $request->input('contenido'),
            'image_path' => $imagePath,
            'user_id' => Auth::id(),  // Asociar la publicación al usuario logueado
        ]);

        return redirect()->route('publicaciones.index')->with('success', 'Publicación creada con éxito');
    }

    // Método para mostrar el formulario de edición de una publicación
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        // Verificamos que el usuario logueado sea el dueño de la publicación antes de permitir la edición
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('publicaciones.index')->with('error', 'No tienes permiso para editar esta publicación');
        }

        return view('post.edit', compact('post'));
    }

    // Método para actualizar una publicación
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Buscar la publicación
        $post = Post::findOrFail($id);

        // Verificamos que el usuario logueado sea el dueño de la publicación antes de permitir la actualización
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('publicaciones.index')->with('error', 'No tienes permiso para editar esta publicación');
        }

        // Manejo de la imagen si es proporcionada
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($post->image_path) {
                Storage::delete('public/' . $post->image_path);
            }

            // Almacenar la nueva imagen
            $post->image_path = $request->file('imagen')->store('images', 'public');
        }

        // Actualizar los datos de la publicación
        $post->update([
            'title' => $request->input('titulo'),
            'content' => $request->input('contenido'),
        ]);

        return redirect()->route('publicaciones.index')->with('success', 'Publicación actualizada con éxito');
    }

    // Método para borrar una publicación (borrado lógico)
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        // Verificamos que el usuario logueado sea el dueño de la publicación antes de permitir el borrado
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('publicaciones.index')->with('error', 'No tienes permiso para eliminar esta publicación');
        }

        // Borrado lógico de la publicación
        $post->delete();

        return redirect()->route('publicaciones.index')->with('success', 'Publicación eliminada con éxito');
    }
}
