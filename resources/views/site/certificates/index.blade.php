@extends('layouts.site')

@section('content')
    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        @include('layouts.site.header')

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Company</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Company</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <div class="container-xxl py-3 mb-4">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                <h2 class="mb-5">Certificates</h2>

            </div>


            <div class="row g-4 justify-content-center lightgallery" id="lightgallery">


                @foreach ($data as $img)



                <a href="{{ asset('images/').'/'.$img->file }}" data-download-url="{{ asset('images/').'/'.$img->file }}" class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">


                    <img alt="img1" height="350px" width="400px" src="{{ asset('images/').'/'.$img->file }}" />


                </a>


                @endforeach



            </div>
        </div>
    </div>
@endsection
