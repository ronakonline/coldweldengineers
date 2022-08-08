@extends('layouts.site')

@section('content')
    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        @include('layouts.site.header')

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Products</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Products</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

     <!-- Blog Start -->
     <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-12">
                    <div class="row g-5">
                        @foreach ($data as $product )


                        <div class="col-md-4 wow slideInUp" data-wow-delay="0.1s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src={{"images/". $product->images()->first()->img}} alt="">
                                    {{-- <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a> --}}
                                </div>
                                <div class="p-4">
                                    {{-- <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small>
                                        <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                                    </div> --}}
                                    <h4 class="mb-3">{{$product->title}}</h4>
                                    {{-- <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p> --}}
                                    <a class="text-uppercase" href="/products/{{$product->id}}">Read More <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
                <!-- Blog list End -->


            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection
