@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Thêm mới danh mục
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
      <form method="post" action="{{ route('category.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Tên danh mục: <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="price"> Mô tả danh mục:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <button type="submit" class="btn btn-primary">Thêm mới</button>
          <a class="btn btn-primary" href="{{ route('category.index') }}">Trở về</a>
      </form>
  </div>
</div>
@endsection
s