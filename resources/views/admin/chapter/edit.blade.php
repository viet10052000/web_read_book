@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa Chapter</div>
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
                        <form method="post" action="{{route('chapter.update',$chapter->id)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Chapter</label>
                                <input type="text" value="{{$chapter->name}}" name="name" class="form-control" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp" placeholder="Tên Chapter">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug Chapter</label>
                                <input type="text" value="{{$chapter->slug}}" name="slug"  class="form-control" id="convert_slug"  aria-describedby="emailHelp" placeholder="Slug Chapter">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm Tắt Chapter</label>
                                <input type="text" value="{{$chapter->description}}" name="slug"  class="form-control" id="convert_slug"  aria-describedby="emailHelp" placeholder="Tóm tắt Chapter">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội Dung Chapter</label>
                                <textarea type="text" name="content" rows="5" style="resize: none" class="form-control" aria-describedby="emailHelp" placeholder="Nội Dung Chapter">{{$chapter->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thuộc Truyện</label>
                                <select name="category_id" class="custom-select">
                                    @foreach($comics as $comic)
                                        <option {{$comic->id==$chapter->comic_id ? 'selected' : ''}} value="{{$comic->id}}">{{$comic->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích Hoạt</label>
                                <select name="active"  class="custom-select">
                                    @if($chapter->active == 0)
                                        <option selected value="0">Kích Hoạt</option>
                                        <option value="1">Không Kích Hoạt</option>
                                    @else
                                        <option value="0">Kích Hoạt</option>
                                        <option selected value="1">Không Kích Hoạt</option>
                                    @endif
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
