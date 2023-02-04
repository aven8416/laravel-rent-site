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
               <h3 ><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>,  Ваши заказы</h3>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Сумма заказа</th>
                            <th>Статус</th>

                            <th>Детали</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->total}}</td>
                            @if($order->status=='confirmed')
                                <td ><p style="background-color: #4cd964 ; color: #FFFFFF;padding-left: 15px">Подтверждено</p></td>
                            @elseif($order->status=='canceled')
                                <td><p style="background-color: #ff2d55; color: #FFFFFF;padding-left: 15px">Отклонено</p></td>
                            @elseif($order->status=='pending')
                                <td><p style="background-color: #34aadc ; color: #FFFFFF;padding-left: 15px">В обработке</p></td>
                            @endif
                            <td><a href="{{url('/')}}/orders/orderDetails/{{$order->id}}">Просмотреть</a></td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>
@endsection
