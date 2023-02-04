@extends('front.master')

@section('content')

<section id="advertisement">
    <div class="container">
      <h3 align="center">Автомобили в аренду</h3>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">

                   {{-- <div class="price-range"><!--price-range-->

                                <div class="well">
                                   <h2>Price Range</h2>
                                    <div id="slider-range"></div>
                                    <br>
                                    <b class="pull-left">$
                                        <input size="2" type="text" id="amount_start" name="start_price"
                                               value="15" style="border:0px; font-weight: bold; color:green" readonly="readonly" /></b>

                                    <b class="pull-right">$
                                        <input size="2" type="text" id="amount_end" name="end_price" value="65"
                                               style="border:0px; font-weight: bold; color:green" readonly="readonly"/></b>
                                   </div>

                            </div><!--/price-range-->
--}}
                    <div class="brands_products"><!--brands_products-->
                        <div class="brands-name">
                              <h2>Категория</h2>
                                <ul class="nav nav-pills nav-stacked">

                                    <?php $cats = DB::table('product_categories')->orderby('name', 'ASC')->get();?>

                                    @foreach($cats as $cat)
                                    <li class="brandLi"><input type="checkbox" id="brandId" value="{{$cat->id}}" class="tryCat"/>
                                 <span class="pull-right">({{\App\Models\Product::where('cat_id',$cat->id)->count()}})</span>
                                  <b>  {{ucwords($cat->name)}}</b></li>
                                   @endforeach
                                 <?php /*   <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                    <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                    <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                    <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                    <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                    <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                                  * */?>

                               </ul>
                        </div>
                    </div><!--/brands_products-->


                    <div class="brands_products"><!--brands_products-->
                        <div class="brands-name">
                            <h2>Бренд</h2>
                            <ul class="nav nav-pills nav-stacked">

                                <?php $brands = DB::table('product_brands')->orderby('name', 'ASC')->get();?>

                                @foreach($brands as $brand)
                                    <li class="brandLi"><input type="checkbox" id="brandId" value="{{$brand->id}}" class="try"/>
                                        <span class="pull-right">({{\App\Models\Product::where('brand_id',$brand->id)->count()}})</span>
                                        <b>  {{ucwords($brand->name)}}</b></li>
                                @endforeach
                                <?php /*   <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                    <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                    <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                    <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                    <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                    <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                                  * */?>

                            </ul>
                        </div>
                    </div><!--/brands_products-->


                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{url('../')}}/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right"  id="updateDiv" >

                 <div class="features_items"> <!--features_items-->
                      <b> Количесвто</b>:  {{$Products->total()}}
                    <h2 class="title text-center">
                       <?php
                        if (isset($msg)) {
                            echo $msg;
                        } else {
                            ?> Список автомобилей <?php } ?> </h2>

                    <?php if ($Products->isEmpty()) { ?>
                        извините, автомобили не найдены
                    <?php } else { ?>
                        @foreach($Products as $product)
                        <div class="col-sm-4" >
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{url('/product_details')}}">
                                            <img src="/upload/images/<?php echo $product->pro_img; ?>" alt="" />
                                        </a>

                                        <h2 id="price">
                                          @if($product->sale_price==0)
                                          {{$product->pro_price}} BYN
                                          @else
                                        <span style="text-decoration:line-through; color:#ddd">
                                           {{$product->pro_price}} BYN </span>
                                           {{$product->sale_price}} BYN
                                          @endif<p style="font-size: 14px; color:#696763">в день</p>

                                        </h2>
                                        <?php $brand = DB::table('product_brands')->where('id',$product->brand_id)->get()->first();?>
                                        <p><a href="{{url('/product_details')}}"><?php echo ucwords($brand->name)?>  <?php echo  $product->pro_name; ?></a></p>
                                        @if($product->stock == 1)
                                            <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        @else
                                            <h2 style="color:red">Забронировано</h2>
                                        @endif
                                    </div>
                                    <a href="{{url('/product_details')}}/<?php echo $product->id; ?>">
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>
                                                  @if($product->sale_price==0)
                                                   {{$product->pro_price}} BYN
                                                  @else
                                                <img src="images/shop/on-sale.png" style="width:60px"/>
                                                <span style="text-decoration:line-through; color:#ddd">
                                                    {{$product->pro_price}} BYN</span>
                                                    {{$product->sale_price}} BYN
                                                  @endif
                                                      <p style="font-size: 14px; color:#fff">в день</p>
                                                </h2>
                                                <?php $brand = DB::table('product_brands')->where('id',$product->brand_id)->get()->first();?>
                                                <p><?php echo ucwords($brand->name)?> <?php echo $product->pro_name; ?></p>
                                                @if($product->stock == 1)
                                                <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                   @else
                                                <h2 style="color:red">Забронировано</h2>
                                                    @endif
                                            </div>
                                        </div></a>
                                </div>
                               {{-- <div class="choose">
                                    <?php
                                    $wishData = DB::table('wishlist')->leftJoin('products', 'wishlist.pro_id', '=', 'products.id')->where('wishlist.pro_id', '=', $product->id)->get();
                                    $count = App\wishList::where(['pro_id' => $product->id])->count();
                                    ?>

                                    <?php if ($count == "0") { ?>
                                        <form action="{{url('/addToWishList')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$product->id}}" name="pro_id"/>
                                            <p align="center">
                                                <input type="submit" value="Add to WishList" class="btn btn-primary"/>
                                            </p>
                                        </form>
                                    <?php } else { ?>
                                        <h5 style="color:green"> Added to <a href="{{url('/WishList')}}">wishList</a></h5>
                                    <?php } ?>

                                </div>--}}
                            </div>
                        </div>

                        @endforeach
                    <?php } ?>


                </div>
                <ul class="pagination">
                    {{ $Products->links()}}
                </ul>
            </div><!--features_items-->

        </div>
    </div>
</div>
</section>
@endsection
