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
            <h2 class="heading">Шаг 1</h2>
        </div>






        <form action="{{url('/')}}/formvalidate" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="shopper-info">
                            <p>Информация об арендаторе</p>

                            @if(count($address_data)==0)
                                <label>Ваше ФИО</label>
                                <input type="text" name="fullname"  placeholder="ФИО" class="form-control"  >

                                <span style="color:red">{{ $errors->first('fullname') }}</span>
                                <hr>

                                <label>Ваш Город</label>
                                <select name="city" class="form-control" >
                                <option value="" selected="selected">Выберите город</option>
                                <option value="Minsk">Минск</option>
                                <option value="Baranovichi">Барановичи</option>
                                <option value="Gomel">Гомель</option>
                                <option value="Vitebsk">Витебск</option>
                                <option value="Brest">Брест</option>
                                <option value="Mogilev">Могилев</option>
                                <option value="Grodno">Гродно</option>
                                </select>

                                <span style="color:red">{{ $errors->first('city') }}</span>
                                <hr>

                                <label>Ваша улица</label>
                                <input type="text" name="address"  placeholder="Ваша улица" class="form-control" >

                                <span style="color:red">{{ $errors->first('address') }}</span>
                                <hr>

                                <label>Номер телефона</label>
                                <input type="tel" name="phone"  placeholder="Номер телефона" class="form-control" >

                                <span style="color:red">{{ $errors->first('phone') }}</span>
                                <hr>
                                <label>Дата Рождения</label>
                                <input type="date" name="birth"  placeholder="Дата Рождения" class="form-control"  >
                                <span style="color:red">{{ $errors->first('birth') }}</span>
                                <hr>

                                {{--    <!-- Drop-off date/time start -->
                                     <div class="datetime drop-off">
                                         <div class="date pull-left">
                                             <div class="input-group">
                                                 <span class="input-group-addon pixelfix"><span class="glyphicon glyphicon-calendar"></span> Date of Birth</span>
                                                 <input type="text" name="birth" id="birth" value="{{ Carbon\Carbon::parse($value->birth)->format('d-m-Y i') }}" class="form-control datepicker" placeholder="dd/mm/yyyy">
                                                 <span style="color:red">{{ $errors->first('birth') }}</span>
                                             </div>
                                         </div>
                                         <div class="clearfix"></div>
                                     </div>
                                     <!-- Drop-off date/time end -->
                                     <hr>--}}
                                <label>Номер паспорта</label>
                              <input type="text" placeholder="Номер паспорта" name="passport_n" class="form-control" >

                                <span style="color:red">{{ $errors->first('passport_n') }}</span>

                                <hr>
                                <label>Идентификационный номер</label>
                                <input type="text" placeholder="Идентификационный номер" name="identification_n" class="form-control" >

                                <span style="color:red">{{ $errors->first('identification_n') }}</span>

                            @else
                                @foreach($address_data as $value)
                                    <label>Ваше ФИО</label>
                                    <input type="text" name="fullname"  placeholder="Your Name" class="form-control"  value="{{ $value->fullname}}">

                                    <span style="color:red">{{ $errors->first('fullname') }}</span>
                                    <hr>
                                    <label>Ваш Город</label>
                                    <select name="city" class="form-control" >
                                        <option value="{{$value->city}}" selected="selected">{{$value->city}}</option>
                                        <option value="Minsk">Минск</option>
                                        <option value="Baranovichi">Барановичи</option>
                                        <option value="Gomel">Гомель</option>
                                        <option value="Vitebsk">Витебск</option>
                                        <option value="Brest">Брест</option>
                                        <option value="Mogilev">Могилев</option>
                                        <option value="Grodno">Гродно</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('city') }}</span>

                                    <hr>
                                    <label>Ваша улица</label>
                                    <input type="text" name="address"  placeholder="Your address" class="form-control"  value="{{ $value->address }}">

                                    <span style="color:red">{{ $errors->first('address') }}</span>
                                    <hr>
                                    <label>Ваш номер телефона</label>
                                    <input type="text" name="phone"  placeholder="Your phone" class="form-control"  value="{{ $value->phone }}">

                                    <span style="color:red">{{ $errors->first('phone') }}</span>
                                    <hr>
                                        <label>Дата Рождения</label>
                                    <input type="date" name="birth"  placeholder="Birth of Date" class="form-control"  value="{{$value->birth}}">

                                    <span style="color:red">{{ $errors->first('birth') }}</span>
                                    <hr>

                                    {{--    <!-- Drop-off date/time start -->
                                         <div class="datetime drop-off">
                                             <div class="date pull-left">
                                                 <div class="input-group">
                                                     <span class="input-group-addon pixelfix"><span class="glyphicon glyphicon-calendar"></span> Date of Birth</span>
                                                     <input type="text" name="birth" id="birth" value="{{ Carbon\Carbon::parse($value->birth)->format('d-m-Y i') }}" class="form-control datepicker" placeholder="dd/mm/yyyy">
                                                     <span style="color:red">{{ $errors->first('birth') }}</span>
                                                 </div>
                                             </div>
                                             <div class="clearfix"></div>
                                         </div>
                                         <!-- Drop-off date/time end -->
                                         <hr>--}}
                                            <label>Номер пасорта</label>
                                    <input type="text" placeholder="Номер паспорта" name="passport_n" class="form-control" value="{{ $value->passport_n }}">

                                    <span style="color:red">{{ $errors->first('passport_n') }}</span>

                                    <hr>
                                                <label>Идентификационный номер</label>
                                    <input type="text" placeholder="Идентификационный номер" name="identification_n" class="form-control" value="{{ $value->identification_n}}">

                                    <span style="color:red">{{ $errors->first('identification_n') }}</span>

                                    <hr>

                                @endforeach
                            @endif


                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Примечания к вашему заказу</p>
                            <textarea name="message"  placeholder="Примечания к вашему заказу" rows="16"></textarea>
                        </div>
                    </div>
                </div>
            </div>


        <div class="review-payment">
            <h2>Проверьте заказ</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Товар</td>
                        <td class="description">Описание</td>
                        <td class="price">Цена</td>
                        <td class="quantity">Количесвто дней</td>
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
        <span>
            <input type="submit" value="Оформить" class="btn btn-primary" id="cashbtn">
            </span>
    </div>
    </div>

      </form>




</section> <!--/#cart_items-->


@endsection
