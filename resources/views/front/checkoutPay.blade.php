@extends('front.master')

@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Главная</a></li>
                <li class="active">Оформление заказа</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Шаг 2</h2>
        </div>





        <?php // form start here?>
        <form action="{{url('/')}}/payment" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <?php // form end here?>

            <div class="review-payment">
                <h2>Оплата</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Товар</td>
                        <td class="description">Описание</td>
                        <td class="price">Цена</td>
                        <td class="quantity">Кол-во дней</td>
                        <td class="total">Всего</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $cartItem)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="/upload/images/{{$cartItem->options->img}}" alt="" width="100px"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$cartItem->name}}</a></h4>
                            <p>ID товара: {{$cartItem->id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{$cartItem->price}} BYN</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">

                                <input class="cart_quantity_input" type="text"  value="{{$cartItem->qty}}" readonly="readonly" size="2">

                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$cartItem->subtotal}} BYN</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{url('/cart/remove')}}/{{$cartItem->rowId}}"><i class="fa fa-times"></i></a>

                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Сумма</td>
                                    <td>{{Cart::subtotal()}} BYN</td>
                                </tr>
                                {{-- <tr>
                                    <td> Tax</td>
                                    <td>${{Cart::tax()}}</td>
                                </tr>--}}
                                <tr class="shipping-cost">
                                    <td>Стоимость доставки</td>
                                    <td>Бесплатно</td>
                                </tr>
                                <tr>
                                    <td>Итого</td>
                                    <td><span>{{Cart::subtotal()}} BYN</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="payment-options">
            <span style="margin-right: 3px">
                <input type="radio" name="pay" value="COD" checked="checked" id="cash"> Наличными

            </span>
                <span>
                <input type="radio" name="pay" value="card" id="paypal"> Картой
            </span>

                <span>
            <input type="submit" value="Оформить" class="btn btn-primary" id="cashbtn">
            </span>
            </div>
    </div>

    </form>

    <script>

        $('#paypalbtn').hide();
        //  $('#cashbtn').hide();

        $(':radio[id=cash]').change(function(){
            $('#paypalbtn').hide();
            $('#cashbtn').show();

        });
    </script>




</section> <!--/#cart_items-->


@endsection
