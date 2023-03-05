<div class="features_items"> <!--features_items-->
      <b> Всего</b>:  {{$Products->total()}}
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
                                        <a href="{{url('/product_details')}}/<?php echo $product->id; ?>">
                                            <img src="/upload/images/<?php echo $product->pro_img; ?>" alt="" />
                                        </a>
                                        <h2 id="price">
                                            @if($product->sale_price==0)
                                                {{$product->pro_price}} BYN
                                            @else
                                                <span style="text-decoration:line-through; color:#ddd">
                                           {{$product->pro_price}} BYN</span>
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
                                </div>
                            </div>
                        </div>

                        @endforeach
                    <?php } ?>


                </div>
                <ul class="pagination">
                    {{ $Products->links()}}
                </ul>
