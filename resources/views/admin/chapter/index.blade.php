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
                                <th >Tên Chapter</th>
                                <th>Tóm Tắt</th>
                                <th>Nội Dung</th>
                                <th>Slug</th>
                                <th>Tên Truyện</th>
                                <th>Kích hoạt</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($chapters as $chapter)
                                <tr>
                                    <td>{{$chapter->name}}</td>
                                    <td>{{$chapter->description}}</td>
                                    <td>{{$chapter->content}}</td>
                                    <td>{{$chapter->slug}}</td>
                                    <td>{{$chapter->comic->name}}</td>
                                    <td>
                                        @if($chapter->active == 0)
                                            <span class="text text-success">Kích Hoạt</span>
                                        @else
                                            <span class="text text-danger">Không Kích Hoạt</span>
                                        @endif
                                    </td>
                                    <td class="d-flex flex-row p-1">
                                        <div>
                                            <a href="{{route('chapter.edit',$chapter->id)}}" class="btn btn-primary" >
                                                Sửa
                                            </a>
                                        </div>
                                        <div >
                                            <form method="post" action="{{route('chapter.destroy',$chapter->id)}}">
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


