@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Quản lý danh mục</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Thêm mới danh mục</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered" style="margin-top:20px;">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th width="280px">Hành động</th>
        </tr>
        @foreach ($categorys as $category)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <form method="post" action="{{ route('category.destroy',$category->id) }}">

                    <a class="btn btn-info" href="{{ route('category.show',$category->id) }}">Xem</a>

                    <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Sửa</a>

                    @csrf
                    <input name="" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $categorys->links() !!}

@endsection
