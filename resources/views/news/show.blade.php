@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Chi tiết tin tức</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('category.index') }}">Trở về</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tiêu đề:</strong>
                {{ $new->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mô tả:</strong>
                {{ $new->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nội dung:</strong>
                {{ $new->content }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Danh mục</strong>
               <?php 
                        $category = \App\Category::find($new->idcategory);
                ?>
                {{ $category->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Ảnh</strong>
            </div>
            <div>
                <img src="{{URL::to('/')}}/{{$new->images}}" width="150px" height="150px">
            </div>
        </div>
    </div>
@endsection
