<?php

namespace App\Http\Controllers;

use App\Http\Requests\Form\StoreFormRequest;
use App\Http\Requests\Form\UpdateFormRequest;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = Form::all();
        return response()->json($forms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormRequest $request)
    {
        //Creamosm el formulario
        $form = Form::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'form' => $form
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormRequest $request, $id)
    {
        $form = Form::findOrFail($id);

        // Actualizar los campos del formulario
        $form->code = $request->code;
        $form->name = $request->name;
        $form->description = $request->description;

        // Guardar los cambios
        $form->save();

        return response()->json([
            'message' => 'El formulario fue actualizado con éxito'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
