@extends('layout')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3">
            <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-decoration-none">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{url('/xem-truyen/'.$chapter->comic->slug)}}" class="text-decoration-none">{{$chapter->comic->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$chapter->name}}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md 12">
            <div class="col-md-6">
                <h4>Tên Truyện : {{$chapter->comic->name}}</h4>
                <p>Chương Hiện Tại : {{$chapter->name}}</p>
                <div class="form-group">
                    <label>Chọn Chương : </label>
                    <div>
                        <select id="select_chapter" name="select_chapter" class="custom-select custom-select-lg mb-3">
                            @foreach($chapters as $c)
                            <option value="{{url('/xem-chapter/'.$c->slug)}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="content">
                <p>
                    {{ $chapter->content }}
                </p>
            </div>
        </div>
    </div>

@stop


