@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt Kê Danh Mục</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tên thể loại</th>
                                <th>Slug</th>
                                <th>Kích hoạt</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($genres as $genre)
                                <tr>
                                    <td>{{$genre->name}}</td>
                                    <td>{{$genre->slug}}</td>
                                    <td>
                                        @if($genre->active == 0)
                                            <span class="text text-success">Kích Hoạt</span>
                                        @else
                                            <span class="text text-danger">Không Kích Hoạt</span>
                                        @endif
                                    </td>
                                    <td class="d-flex flex-row p-1">
                                        <div>
                                            <a href="{{route('genre.edit',$genre->id)}}" class="btn btn-primary" >
                                                Sửa
                                            </a>
                                        </div>
                                        <div >
                                            <form method="post" action="{{route('genre.destroy',$genre->id)}}">
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

