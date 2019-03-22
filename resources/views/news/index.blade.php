@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Quản lý tin tức</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('new.create') }}"> Thêm mới tin tức</a>
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
            <th>Nội dung</th>
            <th>Ảnh</th>
            <th>Danh mục</th>

            <th width="280px">Hành động</th>
        </tr>
        @foreach ($news as $new)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $new->title }}</td>
            <td>{{ $new->description }}</td>
            <td>{{ $new->content}}</td>
            <td><img style="display:block;margin:0 auto" src="{{URL::to('/')}}/{{$new->images}}" width="80px" height="80px"></td>
            <td>
                <?php
                        $category = \App\Category::find($new->idcategory);
                ?>
                {{ $category->name }}
            </td>
            <td>
                <form method="post" action="{{ route('new.destroy',$new->id) }}">

                    <a class="btn btn-info" href="{{ route('new.show',$new->id) }}">Xem</a>
                    <a class="btn btn-primary" href="{{ route('new.edit',$new->id) }}">Sửa</a>

                    @csrf
                    <input name="" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $news->links() !!}

@endsection

