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

        $categorys = Category::latest()->paginate(8);
        return view('categorys.index',compact('categorys'))
            ->with('i', (request()->input('page', 1) - 1) * 8);

    }

    public function create(){

        return view('categorys.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required|string|max:255',

          ]);

          $category = new \App\Category;
          $category->name = $request->get('name');
          $category->description = $request->get('description');
          $category->save();

          return redirect('categorys')->with('success', 'Thêm mới danh mục thành công.');

    }

    public function show($id){

          $category = Category::find($id);
          return view('categorys.show',compact('category'));
    }

    public function edit($id){
          $category = Category::find($id);
          return view('categorys.edit',compact('category'));
    }

    public function update(Request $request,$id){

          $request ->validate([
             'name'=> 'required|string|max:255',
          ]);
          $category = Category::find($id);
          $category->name = $request->get('name');
          $category->description = $request->get('description');
          $category->update();

          return redirect('categorys')->with('success','Sửa danh mục thành công.');

    }
    public function destroy($id){

          $category = Category::find($id);
          $category->delete();

          return redirect('categorys')->with('success', 'Xóa danh mục thành công.');
    }

}
