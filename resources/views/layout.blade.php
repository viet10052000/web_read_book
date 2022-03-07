<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TruyenHay</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <!-- Scripts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            a#navbarDropdown:hover {
                background: black;
            }
            .switch-color{
                background-color: #181818;
                color: #fff;
            }
            .switch-color-light{
                --bs-bg-opacity:0;
            }
            .content-color{
                color: #000;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}"><i class="fa-solid fa-book"></i> TruyenHay.com</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto p-1" >
                        <li class="nav-item dropdown mx-4">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-bars"></i> Danh Mục
                            </a>
                            <div class="dropdown-menu" style="background-color: #2E3740" aria-labelledby="navbarDropdown">
                                @forelse($categories as $category)
                                    <a class="dropdown-item" style="color: #b1b1b1" href="{{url('/danh-muc/'.$category->slug)}}">{{$category->name}}</a>
                                @empty
                                    <a class="dropdown-item" style="color: #b1b1b1" href="">chưa có danh mục</a>
                                @endforelse
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-bars"></i> Thể Loại
                            </a>
                            <div class="dropdown-menu" style="background-color: #2E3740;" aria-labelledby="navbarDropdown">
                                @forelse($genres as $genre)
                                    <a class="dropdown-item" style="color: #b1b1b1" href="{{url('/the-loai/'.$genre->slug)}}">{{$genre->name}}</a>
                                @empty
                                    <a class="dropdown-item" style="color: #b1b1b1" href="">chưa có danh mục</a>
                                @endforelse
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/tat-ca/')}}">
                                <i class="fa-solid fa-bars"></i> Tất Cả Truyện
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i> Tùy Chỉnh Nền
                            </a>
                            <div class="dropdown-menu dropdown-menu-right settings" style="background-color: #2E3740;">
                                <form class="form-horizontal">
                                    <div class="form-group form-group-sm d-flex">
                                        <label class="col-sm-2 col-md-5" for="truyen-background" style="color: #b1b1b1">Màu</label>
                                        <div class="col-sm-2 col-md-8 ">
                                            <select class="form-control" style="color: #b1b1b1" id="switch-color">
                                                <option value="trang">Trắng</option>
                                                <option value="toi">Tối</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                    </ul>
                    <form autocomplete="off" id="keywords" class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="GET">
                        @csrf
                        <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Tìm kiếm Truyện ,Tác Giả ....." aria-label="Search">
                        <div id="search_ajax"></div>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="p-1" style="background-color: #2E3740;color: #b1b1b1">
            <div class="container">
                Đọc truyện online, đọc truyện chữ, truyện full, truyện hay. Tổng hợp đầy đủ và cập nhật liên tục.
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>
        <footer class="text-muted pb-5 mt-3">
            <div class="container">
                <p class="float-right">
                    <a href="" class="btn btn-success">Quay lại</a>
                </p>
            </div>
        </footer>
        <script>
            $('.carousel').carousel()
            $('#select_chapter').on('change',function (){
                var url = $(this).val();
                if(url) {
                    window.location = url;
                }
                return false;
            });
            $(document).ready(function () {
                // if (localStorage.getItem('switch_color') != null){
                //     const data = localStorage.getItem('switch_color');
                //     const data_obj = JSON.parse(data);
                //
                //     $(document.body).addClass(data_obj.class_1);
                //     $('.album').addClass(data_obj.class_2);
                //     $('.card').addClass(data_obj.class_1);
                //     $('.breadcrumb').addClass(data_obj.class_1);
                //     $('footer.text-muted.pb-5.mt-3').addClass(data_obj.class_1);
                // };
                $('#switch-color').change(function (){
                    $(document.body).toggleClass('switch-color');
                    $('.album').toggleClass('switch-color-light');
                    $('.card').toggleClass('switch-color');
                    $('.breadcrumb').toggleClass('switch-color');
                    $('footer.text-muted.pb-5.mt-3').toggleClass('switch-color');
                    // if ($(this).val() == 'toi'){
                    //     var item = {
                    //         'class_1' : 'switch_color',
                    //         'class_2' : 'switch_color_light'
                    //     }
                    //     localStorage.setItem('switch_color',JSON.stringify(item));
                    // }else if($(this).val() == 'trang'){
                    //     localStorage.removeItem('switch_color');
                    // }
                });

            });

        </script>
    </body>
</html>
