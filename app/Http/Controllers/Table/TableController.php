<?php

namespace App\Http\Controllers\Table;
use App\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = Table::paginate(15);
        return view('Mesa.indexMesas', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Mesa.formMesa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'number' => 'required|unique:tables',
            'price' => 'required|numeric|between:100,1000.00',
            'size' => 'required|min:1',
        ];

        $this->validate($request, $reglas);

        $data = $request->all();
        $data['status'] = Table::MESA_DISPONIBLE;

        $mesa = Table::create($data);

        return redirect()->route('tables.show', $mesa);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        $mesa = Table::findorfail($table->id);
        return view('Mesa.showMesa', compact('mesa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        $mesa = Table::findorfail($table->id);
        return view('Mesa.formMesa', compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        $reglas = [
            'price' => 'numeric|between:100,1000.00',
            'size' => 'min:1',
        ];

        $this->validate($request,$reglas);

        $mesa = Table::findorfail($table->id);

        if($mesa->status != Table::MESA_DISPONIBLE){
            $mesa->status = Table::MESA_DISPONIBLE;
        }

        if($request->has('price'))
        {
            $mesa->price = $request->price;
        }
        
        if($request->has('size')){
            $mesa->size = $request->size;
        }
        $mesa->save();
        return redirect()->route('tables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $mesa = Table::findorfail($table->id);
        $mesa->delete();
        return redirect()->route('tables.index');
    }
}
