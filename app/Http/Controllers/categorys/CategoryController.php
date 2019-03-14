<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends BaseController
{
    public function index(){

        $categorys = Category::latest()->paginate(10);

        return view('categorys.index',compact('categorys'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function create(){

        return view('categorys.create');
    }
    public function store(Request $request){

        $request->validate([
            'name'=>'required|string|max:255',
            'description'=> 'required|string|max:255',

          ]);

          $category = new \App\Category;
          $category->name = $request->get('name');
          $category->description = $request->get('description');
          $category->save();

          return redirect('categorys/index')->with('success', 'Thêm mới danh mục thành công.');

    }
    public function show($id){

          $category = Category::find($id);
          return view('categorys.show',compact('category'));
    }
    public function edit($id){

    }
    public function update(Request $request,$id){

    }

}
