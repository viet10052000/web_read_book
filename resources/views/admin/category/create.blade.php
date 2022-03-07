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
                            <form method="post" action="{{route('category.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh Mục</label>
                                    <input type="text" name="name" class="form-control" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp" placeholder="Tên danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <input type="text" name="description" class="form-control" aria-describedby="emailHelp" placeholder="Mô tả danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug Danh Mục</label>
                                    <input type="text" name="slug"  class="form-control" id="convert_slug"  aria-describedby="emailHelp" placeholder="Slug danh Mục">
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
