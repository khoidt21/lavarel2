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

        return view('categorys.index');
    }
    public function create(){

        return view('categorys.create');
    }
    public function store(Request $request){

        $request->validate([
            'name'=>'required|string|max:255',
            'description'=> 'required|string|max:255',

          ]);
          $category = new Category(
              [
                'name' => $request->get('name'),
                'description'=> $request->get('description'),
                'status' => 1,
              ]);

          $category->save();
          return redirect('/category')->with('Thành công', 'Danh mục đã được thêm mới.');

    }
    public function show($id){

    }
    public function edit($id){

    }
    public function update(Request $request,$id){

    }

}
