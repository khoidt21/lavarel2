@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Sửa tin tức
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('new.update',$new->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="title">Tiêu đề tin tức: <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="title" value="{{ $new->title }}" />
          </div>
          <div class="form-group">
              <label for="description"> Mô tả tin tức: </label>
              <input type="text" class="form-control" name="description" value="{{ $new->description }}" />
          </div>
          <div class="form-group">
              <label for="content">Nội dung tin tức <span style="color:red">*</span></label>
          </div>
          <div class="form-group">
              <textarea style="max-width:100%;" name="content" rows="8" cols="145">{{ $new->content }}</textarea>
          </div>
          <div class="form-group">
              <label for="category">Danh mục tin tức</label>
              <select name="category">
                    @foreach($categorys as $category)
                    <option value="{{$category->id}}" 

                    <?php if ($category->id == $new->idcategory) {echo ("selected");} ?>>{{ $category->name }}</option>
                    @endforeach
              </select>
          </div>
          <div class="form-group">
          <div class="col-xs-12">
                <div class="form-material form-material-primary floating input-group">
                    <input class="form-control btn-file" type="file" id="reward-image" name="reward-image">
                    <span class="input-group-addon"><i class="fa fa-file-excel-o"></i></span>
                </div>
          </div>
          <div class="form-group">

          </div>
          </div>
          <button type="submit" class="btn btn-primary">Sửa</button>
          <a class="btn btn-primary" href="{{ route('new.index') }}">Trở về</a>
      </form>
  </div>
</div>
@endsection
