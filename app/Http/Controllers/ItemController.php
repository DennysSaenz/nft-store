<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\item;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all();
        $collections = Collection::all();


        $items = item::all();
        return view('items.index', compact('items', 'users', 'collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        if (!auth()->check()) {
//            return redirect()->route('login');
//        }

        $collections = Collection::all();


//        dd($collections);


        return view('items.create', compact('collections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        // Validar los datos del formulario
        $validatedData = $request->validate([
            'upload_file' => 'required|file|image|max:200000', // Validar la imagen subida
            'select_method' => 'required', // Validar el método seleccionado
            'price' => 'required|numeric', // Validar el precio
            'title' => 'required|string', // Validar el título
            'description' => 'required|string', // Validar la descripción
            'royalties' => 'required|string', // Validar las regalías
            'size' => 'required|string', // Validar el tamaño
            'collection' => 'required', // Validar la colección
            'categories' => 'required|string', // Validar las categorías
        ]);


//        dd($validatedData);


        // Crear una nueva instancia del modelo Item
        $item = new Item();

        // Asignar los valores a las propiedades del modelo
        $item->user_id = auth()->id(); // Obtener el ID del usuario autenticado

        $collection = Collection::find($request->input('collection'));


//        $collection = Collection::where('name', $request->input('collection'))->first();

        $itemPicture = $request->file('upload_file');
//        $itemPicturePath = $itemPicture->store('public/images');
        $itemPicturePath = $itemPicture->storePubliclyAs('public/images' ,$itemPicture->getClientOriginalName());

        $item->img = $itemPicture->getClientOriginalName();

        $item->select_method = $request->input('select_method');
        $item->price = $request->input('price');
        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->royalties = $request->input('royalties');
        $item->size = $request->input('size');
        $item->collection()->associate($collection);
        $item->categories = $request->input('categories');

//        dd($item);

        // Guardar el modelo en la base de datos
        $item->save();

        // Redireccionar a la página de éxito o mostrar un mensaje de éxito
        return redirect()->route('items.index', compact('item'))->with('success', 'Item created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(item $item)
    {
        //
    }
}
