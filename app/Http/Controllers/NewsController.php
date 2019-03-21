<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\News;
use App\Category;
use Illuminate\Support\Facades\Storage;
use File;
use Carbon\Carbon;


class NewsController extends BaseController
{
    public function index(){

        $news = News::latest()->paginate(8);
        
        return view('news.index',compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * 8);

    }

    public function create(){
        $categorys = Category:: all();
        return view('news.create',compact('categorys'));
    }

    public function store(Request $request){

        $request->validate([
            'title'=>'required|string|max:255',

          ]);

         $new = new \App\News;
         $new->title = $request->get('title');
         $new->description = $request->get('description');
         $new->content = $request->get('content');

        if ($request->hasFile('reward-image')) {
            // get the file object
            $file = $request->file('reward-image');
            // set the upload path (starting form the public path)
            $rewardsUploadPath = '/uploads/rewards/images/';
            // create a unique name for this file
            $fileName = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString())
                    . '-' . str_random(5) . '.' . $file->getClientOriginalExtension();
            // move the uploaded file to its destination
            $file->move(public_path() . $rewardsUploadPath, $fileName);
            // save the file path and name
            $filePathAndName = $rewardsUploadPath . $fileName;
            $new->images = $filePathAndName;
          }
          
          $new->idcategory = $request->get('category');
          $new->save();
          return redirect('news')->with('success', 'Thêm mới tin tức thành công.');

    }

    public function show($id){

          $new = News::find($id);
          return view('news.show',compact('new'));
    }

    public function edit($id){

          $new = News::find($id);
          $categorys = Category::all();
          return view('news.edit',compact('new','categorys'));
    }

    public function update(Request $request,$id){


          $request ->validate([
             'title'=> 'required|string|max:255',
          ]);

           $new = News::find($id);
           $new->title = $request->get('title');
           $new->description = $request->get('description');
           $new->content = $request->get('content');

          if ($request->hasFile('reward-image')) {
            // get the file object
            $file = $request->file('reward-image');
            // set the upload path (starting form the public path)
            $rewardsUploadPath = '/uploads/rewards/images/';
            // create a unique name for this file
            $fileName = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString())
                    . '-' . str_random(5) . '.' . $file->getClientOriginalExtension();
            // move the uploaded file to its destination
            $file->move(public_path() . $rewardsUploadPath, $fileName);
            // save the file path and name
            $filePathAndName = $rewardsUploadPath . $fileName;
            $new->images = $filePathAndName;

          }
          
           $new->idcategory = $request->get('category');
           $new->update();

           return redirect('news')->with('success','Sửa tin tức thành công.');

    }

    public function destroy($id){

          $new = News::find($id);
          $new->delete();
          return redirect('news')->with('success', 'Xóa tin tức thành công.');
    }

}



