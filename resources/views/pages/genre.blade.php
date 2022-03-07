@extends('layout')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3">
            <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-decoration-none">Trang Chủ</a></li>
            <li class="breadcrumb-item active">{{$genre->name}}</li>
        </ol>
    </nav>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                    @foreach($comics as $comic)
                        <div class="col-md-3">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" height="200" src="{{$comic->image}}" alt="{{$comic->name}}">
                                <div class="card-body">
                                    <h5>{{$comic->name}}</h5>
                                    <p class="card-text">{{$comic->description}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a type="button" href="{{url('/xem-truyen/'.$comic->slug)}}" class="btn btn-sm btn-outline-secondary">Xem</a>
                                            <a type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"> 6000</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
@stop


