@extends('front.master')

@section('content')

<script>
$(document).ready(function(){
<?php for($i=1;$i<20;$i++){?>
  $('#upCart<?php echo $i;?>').on('change keyup', function(){

  var newqty = $('#upCart<?php echo $i;?>').val();
  var rowId = $('#rowId<?php echo $i;?>').val();
  var proId = $('#proId<?php echo $i;?>').val();

   if(newqty <=0){ alert('введите верное кол-во дней') }
  else {

    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/cart/update');?>/'+proId,
        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
        success: function (response) {
            console.log(response);
            $('#updateDiv').html(response);
        }
    });
  }

  });
  <?php } ?>


});



</script>
<?php if ($cartItems->isEmpty()) { ?>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Главная</a></li>
                    <li class="active">Ваша корзина</li>
                </ol>
            </div>
            <div align="center">  <img src="{{asset('images/cart/empty-cart.png')}}"/></div>

        </div>
    </section> <!--/#cart_items-->
<?php } else { ?>

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Главная</a></li>
                    <li class="active">Корзина</li>
                </ol>
            </div>

<div id="updateDiv">
                            @if(session('status'))
                                    <div class="alert alert-success">

                                        {{session('status')}}
                                    </div>
                                    @endif

                                      @if(session('error'))
                                    <div class="alert alert-danger">

                                        {{session('error')}}
                                    </div>
                                    @endif


            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Товар</td>
                            <td class="description">Описание</td>
                            <td class="price">Цена</td>
                            <td class="quantity">Кол-во дней</td>
                            <td class="total">Сумма</td>
                            <td></td>
                        </tr>
                    </thead>
                    <?php $count =1;?>
                    @foreach($cartItems as $cartItem)


                    <tbody>

                        <tr>
                            <td class="cart_product">
                                <a href="{{url('/product_details')}}/{{$cartItem->id}}"><img src="/upload/images/{{$cartItem->options->img}}" alt="" width="100px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{url('/product_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                                <p>ID товара: {{$cartItem->id}}</p>
                                 <p>Всего {{$cartItem->options->stock}} в наличии</p>
                            </td>
                            <td class="cart_price">
                                <p>{{$cartItem->price}} BYN</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                  <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                                    <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>

                                    <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                           autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="90">


                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$cartItem->subtotal}} BYN</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" style="background-color:red"
                                   href="{{url('/cart/remove')}}/{{$cartItem->rowId}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

<?php $count++;?>
                    </tbody>  @endforeach
                </table>
            </div>

</div>


        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Вы готовы сделать заказ?</h3>
                <p>Нажмите оформить для подтверждения</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Сумма <span>{{Cart::subtotal()}} BYN</span></li>
                           {{-- <li>Eco Tax <span>${{Cart::tax()}}</span></li>--}}
                            <li>Стоимость доставки <span>Бесплатно</span></li>
                            <li>Итого <span>{{Cart::subtotal()}} BYN</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Обновить</a>
                        <a class="btn btn-default check_out" href="{{url('/')}}/checkout">Оформить</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->


<?php } ?>
@endsection
