@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Truyện</div>
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
                        <form method="post" action="{{route('comic.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Truyện</label>
                                <input type="text" name="name" class="form-control" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp" placeholder="Tên Truyện">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tác Giả</label>
                                <input type="text" name="author" class="form-control" aria-describedby="emailHelp" placeholder="Tên tác giả">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug Truyện</label>
                                <input type="text" name="slug"  class="form-control" id="convert_slug"  aria-describedby="emailHelp" placeholder="Slug Truyện">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt Truyện</label>
                                <textarea type="text" name="description" rows="5" onresize="none" class="form-control" aria-describedby="emailHelp" placeholder="Tóm Tắt Truyện"></textarea>
                            </div>
                            <div class="form-group flex-wrap">
                                <label>Thể loại truyện</label>
                                @foreach($genres as $genre)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="genres[]" value="{{$genre->id}}" id="{{$genre->name}}">
                                    <label for="{{$genre->name}}">{{$genre->name}}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục Truyện</label>
                                <select name="category_id" class="custom-select">
                                    @foreach($categories as $category)
                                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh Truyện</label>
                                <input type="file" name="image"  class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích Hoạt</label>
                                <select name="active" class="custom-select">
                                    <option selected value="0">Kích Hoạt</option>
                                    <option value="1">Không Kích Hoạt</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
