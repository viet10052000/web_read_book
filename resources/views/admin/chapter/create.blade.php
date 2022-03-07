@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Chapter</div>
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
                        <form method="post" action="{{route('chapter.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Chapter</label>
                                <input type="text" name="name" class="form-control" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp" placeholder="Tên chapter">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug Chapter</label>
                                <input type="text" name="slug"  class="form-control" id="convert_slug"  aria-describedby="emailHelp" placeholder="Slug chapter">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt chapter</label>
                                <input type="text" name="description" class="form-control" aria-describedby="emailHelp" placeholder="Mô tả chapter">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội Dung</label>
                                <textarea type="text" name="content" rows="5" onresize="none" class="form-control" aria-describedby="emailHelp" placeholder="Tóm Tắt Truyện"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thuộc Truyện</label>
                                <select name="comic_id" class="custom-select">
                                    @foreach($comics as $comic)
                                        <option selected value="{{$comic->id}}">{{$comic->name}}</option>
                                    @endforeach
                                </select>
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

