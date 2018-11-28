<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Category::paginate(15);
        return view('Categoria.indexCategorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categoria.formCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
          'name' => 'required',
          'icon' => 'image|mimes:jpg,jpeg,bmp,png,gif,svg|max:1524',
        );
        
        //dd($request);

        $this->validate($request, $rules);
        $data = $request->all();
        
        if($request->hasFile('icon')){
            $data['icon'] = $request->icon->store('','images');
        }

        $categoria = Category::create($data);

        return redirect()->route('categories.show', $categoria);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categoria = Category::findorfail($category->id);
        $platillos = $categoria->dishes()->paginate(5);
        $galerias = $categoria->galleries()->paginate(5);
        return view('Categoria.showCategoria', compact('categoria','platillos','galerias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categoria = Category::findorfail($category->id);
        return view('Categoria.formCategoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::findorfail($category->id);

        $rules = array(
          'nombre' => 'min:3',
          'icon' => 'image|mimes:jpg,jpeg,bmp,png,gif,svg|max:1524',
        );
        
        $this->validate($request, $rules);

        if($request->has('name'))
        {
            $category->name = $request->name;
        }

        if($request->hasFile('icon')){
            $icon = public_path() . '/img/'. $category->icon;
            File::delete($icon);

            $category->icon = $request->icon->store('','images');
        }
        
        if(!$category->isDirty())
        {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $category->save();
      
        return redirect()->route('categories.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
