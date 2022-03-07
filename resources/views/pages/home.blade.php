@extends('layout')
@section('content')
    <div class="col-md-12">
        <h3 class="mt-3">Truyện Hot </h3>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($comics as $comic)
                        <div class="col-md-2">
                            <div class="card mb-4 box-shadow">
                                <img height="100" src="{{$comic->image}}" alt="{{$comic->name}}">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a type="button" href="{{url('/xem-truyen/'.$comic->slug)}}" class="btn btn-sm btn-outline-secondary">Xem</a>
                                            <span class="p-1">{{$comic->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <h3 class="mt-3">Truyện Mới Cập Nhật</h3>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($comics as $comic)
                        <div class="col-md-2">
                            <div class="card mb-4 box-shadow">
                                <img height="100" src="{{$comic->image}}" alt="{{$comic->name}}">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a type="button" href="{{url('/xem-truyen/'.$comic->slug)}}" class="btn btn-sm btn-outline-secondary">Xem</a>
                                            <span class="p-1">{{$comic->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <h3 class="mt-3">Truyện Đã Hoàn Thành </h3>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($comics as $comic)
                        <div class="col-md-2">
                            <div class="card mb-4 box-shadow">
                                <img height="100" src="{{$comic->image}}" alt="{{$comic->name}}">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a type="button" href="{{url('/xem-truyen/'.$comic->slug)}}" class="btn btn-sm btn-outline-secondary">Xem</a>
                                            <span class="p-1">{{$comic->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
