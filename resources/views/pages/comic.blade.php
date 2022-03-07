@extends('layout')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3">
            <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-decoration-none">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$comic->category->slug)}}" class="text-decoration-none">{{$comic->category->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$comic->name}}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-9">
            <div class="d-flex">
                <div class="col-md-3">
                    <img width="200" src="{{asset($comic->image)}}" alt="{{$comic->name}}">
                </div>
                <div class="col-md-9">
                    <ul style="list-style: none" class="mt-3">
                        <li>Truyện : {{$comic->name}}</li>
                        <li>Tác Giả : {{$comic->author}}</li>
                        <li >Danh Mục : <a style="text-decoration: none" class="badge badge-success"  href="{{url('danh-muc/'.$comic->category->slug)}}" class="text-decoration-none">{{$comic->category->name}}</a></li>
                        <li>Thể Loại :
                        @foreach($comic->genres as $item)
                        <a style="text-decoration: none" class="badge badge-danger" href="{{url('the-loai/'.$item->slug)}}" class="text-decoration-none">{{$item->name}}</a>
                        @endforeach
                        </li>
                        <li>Số Chapter : 2000</li>
                        <li>Số Lượt Xem : 2000</li>
                        @if($chapter_first)
                        <li class="mt-3"><a href="{{url('/xem-chapter/'.$chapter_first->slug)}}" class="btn btn-primary">Đọc Online</a></li>
                        @else
                            <li class="mt-3">Đang Cập Nhật ...</li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <h4 class="mt-3">
                    Tóm Tắt Truyện
                </h4>
                <p>
                    {{$comic->description}}
                </p>
                <h4 class="mt-3">
                    Từ Khóa Tìm Kiếm
                </h4>
                <ul class=" d-flex flex-wrap" style="list-style: none">
                    <li class="p-1 col-2"><a href="{{url('/xem-truyen/'.$comic->slug)}}">{{$comic->name}}</a></li>
                    <li class="p-1 col-2"><a href="{{url('/danh-muc/'.$comic->category->slug)}}">{{$comic->category->name}}</a></li>
{{--                    <li class="p-1 col-2"><a href="{{url('/the-loai/'.$comic->genre->slug)}}">{{$comic->genre->name}}</a></li>--}}
                </ul>
                <h4 class="mt-3">
                    Mục Lục
                </h4>
                    <ul class="mucluc d-flex flex-wrap" style="list-style: none">
                        @if(count($chapters) == 0)
                            <li>Mục lục đang cập nhật</li>
                        @else
                        @foreach($chapters as $chapter)
                            <li class="p-3 col-6"><a href="{{url('/xem-chapter/'.$chapter->slug)}}">{{$chapter->name}}</a></li>
                        @endforeach
                        @endif
                    </ul>

            </div>
        </div>
        <div class="col-md-3">
            <h3>Sách hay xem nhiều</h3>
            <div class="d-flex p-1">
                <img width="100" src="https://camo.githubusercontent.com/8938032207ed09ce71e38a8e6b06b8f08c9dcf63b8ab132d824998d100f466f4/687474703a2f2f696d736b792e6769746875622e696f2f686f6c6465722f696d616765732f686f6c6465725f76696e652e706e67" alt="Card image cap">
                <div class="card-body">
                    <div class=" justify-content-between align-items-center">
                        <h5>Nghìn Lẻ Một Đêm</h5>
                        <p>2000 <i class="fa-solid fa-eye"></i></p>
                    </div>
                </div>
            </div>
            <div class="d-flex p-1">
                <img width="100" src="https://camo.githubusercontent.com/8938032207ed09ce71e38a8e6b06b8f08c9dcf63b8ab132d824998d100f466f4/687474703a2f2f696d736b792e6769746875622e696f2f686f6c6465722f696d616765732f686f6c6465725f76696e652e706e67" alt="Card image cap">
                <div class="card-body">
                    <div class=" justify-content-between align-items-center">
                        <h5>Nghìn Lẻ Một Đêm</h5>
                        <p>2000 <i class="fa-solid fa-eye"></i></p>
                    </div>
                </div>
            </div>
            <div class="d-flex p-1">
                <img width="100" src="https://camo.githubusercontent.com/8938032207ed09ce71e38a8e6b06b8f08c9dcf63b8ab132d824998d100f466f4/687474703a2f2f696d736b792e6769746875622e696f2f686f6c6465722f696d616765732f686f6c6465725f76696e652e706e67" alt="Card image cap">
                <div class="card-body">
                    <div class=" justify-content-between align-items-center">
                        <h5>Nghìn Lẻ Một Đêm</h5>
                        <p>2000 <i class="fa-solid fa-eye"></i></p>
                    </div>
                </div>
            </div>
            <div class="d-flex p-1">
                <img width="100" src="https://camo.githubusercontent.com/8938032207ed09ce71e38a8e6b06b8f08c9dcf63b8ab132d824998d100f466f4/687474703a2f2f696d736b792e6769746875622e696f2f686f6c6465722f696d616765732f686f6c6465725f76696e652e706e67" alt="Card image cap">
                <div class="card-body">
                    <div class=" justify-content-between align-items-center">
                        <h5>Nghìn Lẻ Một Đêm</h5>
                        <p>2000 <i class="fa-solid fa-eye"></i></p>
                    </div>
                </div>
            </div>
            <div class="d-flex p-1">
                <img width="100" src="https://camo.githubusercontent.com/8938032207ed09ce71e38a8e6b06b8f08c9dcf63b8ab132d824998d100f466f4/687474703a2f2f696d736b792e6769746875622e696f2f686f6c6465722f696d616765732f686f6c6465725f76696e652e706e67" alt="Card image cap">
                <div class="card-body">
                    <div class=" justify-content-between align-items-center">
                        <h5>Nghìn Lẻ Một Đêm</h5>
                        <p>2000 <i class="fa-solid fa-eye"></i></p>
                    </div>
                </div>
            </div>
            <div class="d-flex p-1">
                <img width="100" src="https://camo.githubusercontent.com/8938032207ed09ce71e38a8e6b06b8f08c9dcf63b8ab132d824998d100f466f4/687474703a2f2f696d736b792e6769746875622e696f2f686f6c6465722f696d616765732f686f6c6465725f76696e652e706e67" alt="Card image cap">
                <div class="card-body">
                    <div class=" justify-content-between align-items-center">
                        <h5>Nghìn Lẻ Một Đêm</h5>
                        <p>2000 <i class="fa-solid fa-eye"></i></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-12">
        <div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="10"></div>
    </div>
    <div class="col-md-12">
            <h4>Sách Cùng Danh Mục</h4>
            <div class="row">
                @forelse($sameCategory as $c)
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{asset($c->image)}}" alt="{{$c->name}}">
                        <div class="card-body">
                            <h5>{{$c->name}}</h5>
                            <p class="card-text">{{$c->description}}</p>
                        </div>
                    </div>
                </div>
                @empty
                    <p>Đang cập Nhật</p>
                @endforelse
            </div>
        </div>
    </div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="KZGEMj2V"></script>
@stop


