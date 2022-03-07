@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Danh Mục</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{route('genre.update',$genre->id)}}">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thể loại</label>
                                <input type="text" value="{{$genre->name}}" name="name" onkeyup="ChangeToSlug()" id="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên Thể loại">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug Thể loại</label>
                                <input type="text" value="{{$genre->slug}}" name="slug" id="convert_slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Slug Thể loại">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích Hoạt</label>
                                <select name="active" class="custom-select">
                                    @if($genre->active == 0)
                                        <option selected value="0">Kích Hoạt</option>
                                        <option value="1">Không Kích Hoạt</option>
                                    @else
                                        <option value="0">Kích Hoạt</option>
                                        <option selected value="1">Không Kích Hoạt</option>
                                    @endif
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

