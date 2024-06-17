<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriaFormRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('admin.categoria.index');
    }

    public function create()
    {
        return view('admin.categoria.create');
    }

    public function store(CategoriaFormRequest $request)
    {
        $data = $request->validated();

        $categoiria = new Categoria;
        $categoiria->name = $data['name'];
        $categoiria->slog = $data['slog'];
        $categoiria->descripcion = $data['descripcion'];

        if($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->name('uploads/categoria', $filename);
            $categoiria->image = $filename;
        }
        $categoiria->meta_title = $data['meta_title'];
        $categoiria->meta_descripcion = $data['meta_descripcion'];
        $categoiria->meta_keyword = $data['descripcion'];

        $categoiria->navbar_status = $request->navbar_status == true ? '1' : '0';
        $categoiria->status =  $request->status == true ? '1' : '0';

        $categoiria->save();

        return redirect('admin/categoria')->with('message', 'Categoria Agregado exitosamente');
    }
}
