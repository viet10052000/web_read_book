@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Liệt Kê Truyện</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th >Tên Truyện</th>
                                <th>Tác Giả</th>
                                <th>Hình Ảnh</th>
                                <th>Tóm Tắt</th>
                                <th>Danh Mục</th>
                                <th>Thể loại</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày Cập Nhật</th>
                                <th>Kích hoạt</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comics as $comic)
                                <tr>
                                    <td>{{$comic->name}}</td>
                                    <td>{{$comic->author}}</td>
                                    <td>
                                        @if ($comic->image)
                                            <img class="img-thumbnail" width="100" src="{{ asset($comic->image) }}" />
                                        @endif
                                    </td>
                                    <td>{{$comic->description}}</td>
                                    <td>{{$comic->category->name}}</td>
                                    <td class="text-wrap">
                                        @foreach($comic->genres as $item)
                                            <div class="badge badge-danger">{{$item->name}}</div>
                                        @endforeach
                                    </td>
                                    <td>{{$comic->created_at}}<br>{{$comic->created_at->diffForHumans()}}</td>
                                    <td>{{$comic->updated_at}}<br>{{$comic->updated_at->diffForHumans()}}</td>

                                    <td>
                                        @if($comic->active == 0)
                                            <span class="text text-success">Kích Hoạt</span>
                                        @else
                                            <span class="text text-danger">Không Kích Hoạt</span>
                                        @endif
                                    </td>
                                    <td class="d-flex flex-row p-1">
                                        <div>
                                            <a href="{{route('comic.edit',$comic->id)}}" class="btn btn-primary" >
                                                Sửa
                                            </a>
                                        </div>
                                        <div >
                                            <form method="post" action="{{route('comic.destroy',$comic->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Bạn có muốn xóa ?');" class="btn btn-danger">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

