@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                                    <th scope="col-2">Tên Danh Mục</th>
                                    <th scope="col-5">Mô Tả</th>
                                    <th class="col-2">Slug</th>
                                    <th scope="col-1">Kích hoạt</th>
                                    <th scope="col-2"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            @if($category->active == 0)
                                                <span class="text text-success">Kích Hoạt</span>
                                            @else
                                                <span class="text text-danger">Không Kích Hoạt</span>
                                            @endif
                                        </td>
                                        <td class="d-flex flex-row p-1">
                                            <div>
                                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary" >
                                                    Sửa
                                                </a>
                                            </div>
                                            <div >
                                                <form method="post" action="{{route('category.destroy',$category->id)}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button onclick="return confirm('Bạn có muốn xóa danh mục?');" class="btn btn-danger">Xóa</button>
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

