@extends('front.master')

@section('content')

    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="images/home/truck.jpg"  class="girl img-responsive" alt="" />
                            </div>
                            <div class="item">
                                <img src="images/home/lamba.jpg"  class="girl img-responsive" alt="" />
                            </div>

                            <div class="item">
                                {{--   <div class="col-sm-6">
                                       <h1><span>Music</span> RENT</h1>
                                       <h2>Rental Products</h2>
                                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                       <button type="button" class="btn btn-default get">Get it now</button>
                                   </div>--}}

                                <img src="images/home/kabri.jpg"  class="girl img-responsive" alt="" />

                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">Рекомендуемые автомобили</h2>
                        @include('front.recommends')
                    </div><!--/recommended_items-->
                </div>

            </div>
        </div>
    </section>




@endsection
