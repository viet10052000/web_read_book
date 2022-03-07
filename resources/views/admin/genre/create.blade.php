@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm thể loại</div>
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
                        <form method="post" action="{{route('genre.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thể loại</label>
                                <input type="text" name="name" class="form-control" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp" placeholder="Tên thể loại">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug thể loại</label>
                                <input type="text" name="slug"  class="form-control" id="convert_slug"  aria-describedby="emailHelp" placeholder="Slug thể loại">
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

