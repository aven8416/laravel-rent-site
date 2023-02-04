@extends('admin.master')

@section('content')
{{--<script src="https://code.jquery.com/jquery.min.js"></script>--}}
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){

        var date = $("#start_date").val();
        console.log('kfsgs');
        $("#end_date").val(date);

    });

</script>
<section id="container" class="">
    @include('admin.sidebar')
    <section id="main-content">
        <section class="wrapper">
            <div class="content-box-large">
                <h1>Детали заказа</h1>
                <a href="{{url('/')}}/admin/orders">Все Заказы</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ФИО клиента</th>
                        <th>Город</th>
                        <th>Адрес</th>
                        <th>Телефон</th>
                        <th>Дата Рождения</th>
                        <th>Номер паспорта</th>
                        <th>Идентификационный номер</th>
                    </tr>
                    </thead>

                    <?php $count =0;?>
                    @foreach($ProductsDetails as $product)
                       @if($count==0)
                        <tbody>
                        <tr>
                            <td style="color:#0d6948">{{ucwords($product->fullname)}}</td>
                            <td>{{ucwords($product->city)}}</td>
                            <td>{{ucwords($product->address)}}</td>
                            <td>{{ucwords($product->phone)}}</td>
                            <td>{{$product->birth}}</td>
                            <td>{{$product->passport_n}}</td>
                            <td>{{$product->identification_n}}</td>
                        </tbody>
                        @endif
                            <?php $count++;?>
                    @endforeach

                </table>

<hr>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Изображение</th>
                        <th>Название товара</th>
                        <th>ID товара</th>
                        <th>Код</th>
                        <th>Статус</th>
                        <th>Период аренды</th>
                        <th>Цена</th>
                        <th>Количество дней</th>
                        <th>Начало</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <?php $count =1;?>
                    @foreach($ProductsDetails as $product)
                    <tbody>
                    <tr>
                        <td> <img src="/upload/images/<?php echo $product->pro_img; ?>" alt=""
                                  width="50px" height="50px"/></td>
                        <td>{{ucwords($product->pro_name)}}</td>
                        <td>{{$product->product_id}}</td>
                        <td>{{$product->pro_code}}</td>
                        @if($product->stock)
                        <td ><p style="background-color: #26da1b ; color: #FFFFFF;padding-left: 15px">В наличии</p></td>
                        @else
                            <td><p style="background-color: #fb6965 ; color: #FFFFFF;padding-left: 15px">Забранировано</p></td>
                            @endif
                        @if($product->start_date == null && $product->end_date == null)
                            <td>Не арендуется</td>
                            @else
                        <td>{{date('F j, Y', strtotime($product->start_date))}}<br>{{  date('F j, Y', strtotime($product->end_date))}}</td>
                        @endif
                        <td>{{$product->pro_price}}</td>
                        <td>{{$product->qty}}</td>

                        {!! Form::open(['url' => 'admin/orders/product_date/'.$product->product_id,  'method' => 'post']) !!}
                        <td>
                            <input  type="date" placeholder="Start date" size="5"   onchange="" name="start_date" id="start_date"  class="form-control ">
                        </td>
                        <td>
                            <input type="submit" class="btn btn-info btn-small" value="Подтвердить" />
                            {!! Form::close() !!}

                        <a href="{{url('/')}}/admin/orders/product_returned/{{$product->product_id}}/"
                           class="btn btn-danger btn-small">Возвратить</a>

                        </td>
                    </tbody>
                    <?php $count++;?>
                    @endforeach
                </table>
            </div>
        </section>
    </section>
</section>

@endsection

