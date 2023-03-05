@extends('front.master')

@section('content')
    <style>
        table td { padding:10px
        }</style>



    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/profile')}}">Профиль</a></li>
                    <li class="active">Мои заказы</li>
                </ol>
            </div><!--/breadcrums-->



            <div class="row">
                @include('profile.menu')
                <div class="col-md-8">
                    <h3 ><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>,  Ваши Заказы</h3>
                        <a href="{{url('/orders')}}">Просмотреть заказы</a>
                    <hr>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>Изображение</th>
                            <th>Название товара</th>
                            <th>Код</th>
                            <th>Цена</th>
                            <th>Количество дней</th>
                        </tr>
                        </thead>

                        <?php $count =1;?>

                        @foreach($ProductsDetails as $product)
                            <tbody>
                            <tr>
                                <td> <img src="/upload/images/<?php echo $product->pro_img; ?>" alt=""
                                          width="50px" height="50px"/></td>
                                <td>{{ucwords($product->pro_name)}}</td>
                                <td>{{$product->pro_code}}</td>
                                <td>
                                    @if($product->sale_price==0)
                                        {{$product->pro_price}}
                                    @else
                                        {{$product->sale_price}}
                                    @endif
                                </td>
                                <td>{{$product->qty}}</td>
                            </tbody>
                            <?php $count++;?>
                        @endforeach
                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </section>
@endsection
