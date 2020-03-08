<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Trường Đại học Thủ Dầu Một...</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="/configassets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">

</head>

<body id="page-top">

    <nav class="navbar navbar-dark navbar-expand-lg  bg-dark " id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top">Thu Dau Mot University</a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="https://eportfolio.tdmu.edu.vn/user/view.php?id=688">Portfolio</a></li>
                
                    @if (Auth::check())
                    <li class="nav-item" role="presentation">
                        <a class="nav-link js-scroll-trigger">Xin chào {{Auth::user()->name}}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        
                        <a class="nav-link js-scroll-trigger" href="{{route('user.logout')}}">Đăng xuất</a>
                    </li>
                    @else
                    <li class="nav-item" role="presentation">
                        <a class="nav-link js-scroll-trigger" href="{{route('user.login')}}">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link js-scroll-trigger" href="{{route('user.register')}}">Register</a>
                    </li>
                    @endif
                    
                
                
                </ul>
            </div>
        </div>
    </nav>
    
    @yield('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="/assets/img/clients/img4 (1).jpg" style="height: 280px;"></a></div>
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="/assets/img/clients/img4 (2).jpg" style="height: 280px;"></a></div>
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="/assets/img/clients/img4 (3).jpg" style="height: 280px;"></a></div>
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto" src="/assets/img/clients/img4 (4).jpg" style="height: 280px;"></a></div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="copyright">Trường Đại học Thủ Dầu Một</h5>
                    <div><span>Địa chỉ: Số 6, Trần Văn Ơn, Phường Phú Hòa, Tp. Thủ Dầu Một, Tỉnh Bình Dương</span></div>
                    <div><span>Website: <a href="https://tdmu.edu.vn/" style="color: black;">https://tdmu.edu.vn/</a></span></div>
                </div>
                <div class="col-md-4">
                    <div><h5>Developer</h5></div>
                    <div><span>Nguyễn Văn Quốc</span></div>
                    <div><span>Số điện thoại : 0931966262</span></div>
                    <div><span></span></div>

                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.facebook.com/4Sunny1995"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/4sunny1995/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4 h-auto text-center m-auto">
                    <h6>KHÁT VỌNG - TRÁCH NHIỆM - SÁNG TẠO</h6>
                </div>
            </div>
        </div>
    </footer>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="/assets/js/script.min.js"></script>
    <script src="/js/myjs.js"></script>
    <script src="/assets/js/javascript.min.js"></script>
    <script src="/js/myjs.js"></script>
    <script src="/js/myjs.js"></script>
        <script src="/js/search.js"></script>
        <script src="/js/Excel.js"></script>
        <script src="/assets/js/script.min.js"></script>
        {{-- <script src="/js/myjs.js"></script> --}}
        <script src="/assets/js/javascript.min.js"></script>