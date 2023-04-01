<?php

namespace App\Http\Controllers;

use App\Models\abarrotes;
use Illuminate\Http\Request;

class AbarrotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['abarrotes']=abarrotes::paginate(5);
        return view ('abarrotestienda.index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('abarrotestienda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            'producto'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100',
            'precio'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>' El campo :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);
        //$datosabarrotes = request()->all();
        $datosabarrotes = request()->except('_token');
        abarrotes::insert($datosabarrotes);
        //return response()->json($datosabarrotes);
 
        return redirect('abarrotestienda')->with('mensaje','Se registro con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(abarrotes $abarrotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $abarrote=abarrotes::findOrfail($id);
        return view ('abarrotestienda.edit',compact('abarrote'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'producto'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100',
            'precio'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>' El campo :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);
        $abarrotestienda = request()->except(['_token','_method']);
        abarrotes::where('id','=',$id)->update($abarrotestienda);

        $abarrote=abarrotes::findOrfail($id);
        //return view('abarrotestienda.edit', compact('abarrote'));

        return redirect ('abarrotestienda')->with('mensaje','Producto editado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        abarrotes::destroy($id);
        return redirect ('abarrotestienda')->with('mensaje','Producto borrado');
    }
}
