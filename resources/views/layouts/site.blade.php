<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Startup - Startup Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('site') }}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('site') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('site') }}/lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('site') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('site') }}/css/style.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/css/lightgallery-bundle.min.css"
        integrity="sha512-lgRFGedXdci5Ykc5Wbgd8QCzt3lBmnkWcMRAS8myln2eMCDwQBrHmjqvUj9rBcKOyWMC+EYJnvEppggw1v+m8Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .demo-gallery>ul>li {
            float: left;
            margin-bottom: 15px;
            width: 220px;
            height: 200px;
        }

        .demo-gallery>ul>li a {
            border: 3px solid #FFF;
            border-radius: 3px;
            display: block;
            overflow: hidden;
            position: relative;
            float: left;
        }

        .demo-gallery>ul>li a>img {
            -webkit-transition: -webkit-transform 0.15s ease 0s;
            -moz-transition: -moz-transform 0.15s ease 0s;
            -o-transition: -o-transform 0.15s ease 0s;
            transition: transform 0.15s ease 0s;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            height: 100%;
            width: 100%;
        }

        .demo-gallery>ul>li a:hover>img {
            -webkit-transform: scale3d(1.1, 1.1, 1.1);
            transform: scale3d(1.1, 1.1, 1.1);
        }

        .demo-gallery>ul>li a:hover .demo-gallery-poster>img {
            opacity: 1;
        }

        .demo-gallery>ul>li a .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.1);
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            -webkit-transition: background-color 0.15s ease 0s;
            -o-transition: background-color 0.15s ease 0s;
            transition: background-color 0.15s ease 0s;
        }

        .demo-gallery>ul>li a .demo-gallery-poster>img {
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            opacity: 0;
            position: absolute;
            top: 50%;
            -webkit-transition: opacity 0.3s ease 0s;
            -o-transition: opacity 0.3s ease 0s;
            transition: opacity 0.3s ease 0s;
        }

        .demo-gallery>ul>li a:hover .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .demo-gallery .justified-gallery>a>img {
            -webkit-transition: -webkit-transform 0.15s ease 0s;
            -moz-transition: -moz-transform 0.15s ease 0s;
            -o-transition: -o-transform 0.15s ease 0s;
            transition: transform 0.15s ease 0s;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            height: 100%;
            width: 100%;
        }

        .demo-gallery .justified-gallery>a:hover>img {
            -webkit-transform: scale3d(1.1, 1.1, 1.1);
            transform: scale3d(1.1, 1.1, 1.1);
        }

        .demo-gallery .justified-gallery>a:hover .demo-gallery-poster>img {
            opacity: 1;
        }

        .demo-gallery .justified-gallery>a .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.1);
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            -webkit-transition: background-color 0.15s ease 0s;
            -o-transition: background-color 0.15s ease 0s;
            transition: background-color 0.15s ease 0s;
        }

        .demo-gallery .justified-gallery>a .demo-gallery-poster>img {
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            opacity: 0;
            position: absolute;
            top: 50%;
            -webkit-transition: opacity 0.3s ease 0s;
            -o-transition: opacity 0.3s ease 0s;
            transition: opacity 0.3s ease 0s;
        }

        .demo-gallery .justified-gallery>a:hover .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .demo-gallery .video .demo-gallery-poster img {
            height: 48px;
            margin-left: -24px;
            margin-top: -24px;
            opacity: 0.8;
            width: 48px;
        }

        .demo-gallery.dark>ul>li a {
            border: 3px solid #04070a;
        }

        .home .demo-gallery {
            padding-bottom: 80px;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    @include('layouts.site.header')



    @yield('content')


    @include('layouts.site.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('site') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('site') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('site') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('site') }}/lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('site') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('site') }}/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.5.0/lightgallery.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/lightgallery.min.js"
        integrity="sha512-FDbnUqS6P7md6VfBoH57otIQB3rwZKvvs/kQ080nmpK876/q4rycGB0KZ/yzlNIDuNc+ybpu0HV3ePdUYfT5cA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/plugins/fullscreen/lg-fullscreen.min.js"
        integrity="sha512-705ImNrRILAxWjuet0gwUMqQ249szpivFOpZilZeIMacaS/BcSQaGNE5UkfHKFNBzJaN2b4G4uzvjeoaNQFOKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/plugins/autoplay/lg-autoplay.min.js"
        integrity="sha512-4SHz3kWC669ys+fIc9+bO9wkOTkg599KEwF5HN0tnanOqGVeqdcLQWDkCPUUSMoxb+4Wy88yd4ozNsSL9nhYdg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/plugins/hash/lg-hash.min.js"
        integrity="sha512-VboI13y+zwFtpuJYWQ5PRlQ+9T9lFOaFucE+ibB+TrQPsSHICv8uXDJ/PxyP6dtlZCDfl1SFNmj0I1FSAkWyBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/plugins/zoom/lg-zoom.min.js"
        integrity="sha512-5kOfZonUGdOM0k5LCWttgUTvxceTa3DCwYtH3alvvE+oULFgoIN11oMIoubI1HcOXOmGDuuMvi00Px0HwHZsaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery'), {
            plugins: [lgZoom, lgAutoplay, lgHash, lgFullscreen],
            speed: 500,
            // ... other settings
        });
    </script>
</body>

</html>
