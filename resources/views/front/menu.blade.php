<div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">


                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{url('/')}}" class="active">Главная</a></li>
                        <li class="dropdown"><a href="{{url('/products')}}">Автомобили<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <div class="row">
                                <div class="col-md-4"><li><h2 style="color: #FFFFFF">Категория</h2></li>
                                    <?php  $cats = DB::table('product_categories')->get(); ?>
                                    @foreach($cats as $cat)
                                        <li><a href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a></li>
                                    @endforeach
                                    </div>
                                <div class="col-md-4"><li><h2 style="color: #FFFFFF">Бренд</h2></li>
                                    <?php  $brands = DB::table('product_brands')->get(); ?>
                                    @foreach($brands as $brand)
                                        <li><a href="{{url('/')}}/products/brand/{{$brand->name}}">{{ucwords($brand->name)}}</a></li>
                                    @endforeach
                                </div>
                                    </div>


                                </ul>

                        </li>

                        <?php /* <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                          <ul role="menu" class="sub-menu">
                          <li><a href="blog.html">Blog List</a></li>
                          <li><a href="blog-single.html">Blog Single</a></li>
                          </ul>
                          </li>
                          <li><a href="404.html">404</a></li>
                         *
                         */ ?>
                        <li><a href="{{url('/contact')}}">Связаться</a></li>
                        <li><a href="{{url('/newArrival')}}">Новое поступление</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="search_box pull-right">


                    <form action='{{url('/search')}}' method="post">
                        <input type="text" placeholder="Поиск" name="search_data" id="proList"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->
