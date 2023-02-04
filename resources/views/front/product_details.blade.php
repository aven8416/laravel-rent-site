@extends('front.master')

@section('content')
<script>
$(document).ready(function(){
$('#addToCart').hide();
$('#addToCart_default').show();
 $('#size').change(function(){
   var size = $('#size').val();
var proDum = $('#proDum').val();


      $.ajax({
          type: 'get',
          dataType: 'html',
          url: '<?php echo url('/selectSize');?>',
          data: "size=" + size + "& proDum=" + proDum,
          success: function (response) {
              console.log(response);
              $('#price').html(response);
              $('#addToCart').hide();
              $('#addToCart_default').show();

              <?php for($i=1;$i<10;$i++){?>
                var colorValue<?php echo $i;?> = $('#colorValue<?php echo $i;?>').val();
              $('#colorClicked<?php echo $i;?>').click(function(){

              // pass color values to color function in Controller
              $.ajax({
                  type: 'get',
                  dataType: 'html',
                  url: '<?php echo url('/selectColor');?>',
                  data: "size=" + size + "& proDum=" + proDum + "& color=" + colorValue<?php echo $i;?>,
                  success: function (response) {
                      console.log(response);
                        $('#price').html(response);
                      $('#addToCart').show();
                      $('#addToCart_default').hide();


                  }
              });

                });
               <?php }?>
          }
      });


 });

});
</script>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">


                    <div class="brands_products"><!--cat_products-->
                        <h2>Категории</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php $cats = DB::table('product_categories')->orderby('name', 'ASC')->get();?>

                                @foreach($cats as $cat)
                                    <li><a href="{{url('/')}}/products/{{$cat->name}}"> <span class="pull-right">({{\App\Models\Product::where('cat_id',$cat->id)->count()}})</span> {{ucwords($cat->name)}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/cat_products-->

                    <div class="brands_products" style="margin-bottom: 100px"><!--brands_products-->
                        <h2>Бренды</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php $brands = DB::table('product_brands')->orderby('name', 'ASC')->get();?>

                                @foreach($brands as $brand)
                                        <li><a href="{{url('/')}}/products/brand/{{$brand->name}}"> <span class="pull-right">({{\App\Models\Product::where('brand_id',$brand->id)->count()}})</span> {{ucwords($brand->name)}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                </div>
            </div>
            @foreach($Products as $value)
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="/upload/images/<?php echo $value->pro_img; ?>" alt="" />
                        </div>

                    </div>
                    <div class="col-sm-7">

                        <div class="product-information"><!--/product-information-->

                          @if($value->new_arrival==1)
                            <img src="/images/product-details/new.jpg"
                              class="newarrival" alt="" />
                            @endif
                            <h2><?php echo ucwords($value->pro_name); ?></h2>
                            <p>Бренд: <?php echo ucwords($value->name); ?></p>
                            <p>Код: <?php echo $value->pro_code; ?></p>
                              <form action="{{url('/cart/addItem')}}/<?php echo $value->id; ?>">
                              <span>
                                  <span id="price">
                                    @if($value->sale_price ==0)
                                    {{$value->pro_price}} BYN
                                     <input type="hidden" value="{{$value->pro_price}}"
                                      name="newPrice"/>
                                      @else
                                    <b style="text-decoration:line-through; color:#ddd">
                                      {{$value->pro_price}} BYN </b>
                                       {{$value->sale_price}} BYN
                                       <input type="hidden" value="{{$value->sale_price}}"
                                        name="newPrice"/>
                                      @endif

                                  </span>
                                  <label>Кол-во дней:</label>
                                    <input type="number" size="2" value="1" id="qty"  autocomplete="off"
                                     style="text-align:center; max-width:50px;" MIN="1" MAX="90">


                                  @if($value->stock ==1)
                                     <button class="btn btn-fefault cart" id="addToCart_default">
                                         <i class="fa fa-shopping-cart"></i>
                                         В корзину
                                     </button>
                                      <button class="btn btn-fefault cart" id="addToCart">
                                          <i class="fa fa-shopping-cart"></i>
                                           В корзину
                                      </button>
                                    <input type="hidden" value="<?php echo $value->id; ?>" id="proDum"/>
                                      @endif
                              </span>
                           @if($value->stock ==1)
                                  <p><b>Доступность:</b> Свободен</p>
                                @else
                                      <p><b>Доступность:</b> Забронировано</p>
                               @endif



                            <?php $sizes = DB::table('product_properties')
                            ->select('size')
                            ->groupBy('size')
                            ->where('pro_id',$value->id)->groupBy('size')->get();?>
                            @if(count($sizes)!=0)
                            <select name="size" id="size">
                              <option value="">Выберете чтобы посмотреть размер</option>
                              @foreach ($sizes as $size)
                              <option>{{$size->size}}</option>
                              @endforeach
                            </select>
                            @endif
                          </form>



                        </div><!--/product-information-->

                        <?php  $altImgs = DB::table('alt_images')->where('product_id', $value->id)->get();   ?>
                        @if(count($altImgs)!=0)
                              <div class="col-md-12">

                                <h2 align="Center">Другие изображения</h2>
                                @foreach($altImgs as $altImg)
                                <div class="col-md-2" style="margin:5px">
                                  <img src="/img/alt_images/{{$altImg->alt_img}}"
                                  style="width:80px; height:80px;"/>
                                </div>
                                @endforeach

                              </div>
                              @endif
                    </div>
                </div><!--/product-details-->
   {{-- <?php $reviews = DB::table('reviews')->get();
    $count_reviews = count($reviews);?>
            <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                            <li ><a href="#reviews" data-toggle="tab">Reviews ({{$count_reviews}})</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details" >
                          <p>{{ $value->pro_info}}</p>
                        </div>


                        <div class="tab-pane fade " id="reviews" >
                            <div class="col-sm-12">

                              @foreach($reviews as $review)
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>{{$review->person_name}}</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>
                                      {{date('H: i', strtotime($review->created_at))}}</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>
                                        {{date('F j, Y', strtotime($review->created_at))}}</a></li>
                                </ul>
                                <p>{{$review->review_content}}</p>
                                @endforeach
                                <p><b>Write Your Review</b></p>

                                <form action="{{url('/addReview')}}" method="post">
                                  {{ csrf_field() }}
                                    <span>
                                        <input type="text" name="person_name" placeholder="Your Name"/>
                                        <input type="email", name="person_email" placeholder="Email Address"/>
                                    </span>
                                    <textarea name="review_content" ></textarea>

                                    <button type="submit" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->--}}

                     <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">Рекомендуемые автомобили</h2>
                            @include('front.recommends')
                        </div><!--/recommended_items-->

            </div>

            @endforeach
        </div>
    </div>
</section>


@endsection
