@extends('admin.master')

@section('content')
<script src="https://code.jquery.com/jquery.min.js"></script>
<script>
$(document).ready(function(){
<?php for($i=1;$i<60;$i++){?>
  // start loop
      $('#amountDiv<?php echo $i;?>').hide();
      $('#checkSale<?php echo $i;?>').show();
        $('#onSale<?php echo $i;?>').click(function(){  // run when admin need to add amount for sale
          $('#amountDiv<?php echo $i;?>').show();
          $('#checkSale<?php echo $i;?>').hide();
            $('#saveAmount<?php echo $i;?>').click(function(){
              var salePrice<?php echo $i;?> = $('#sale_price<?php echo $i;?>').val();
              var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();
                $.ajax({
                  type: 'get',
                  dataType: 'html',
                  url: '<?php echo url('/admin/addSale');?>',
                  data: "salePrice=" + salePrice<?php echo $i;?> + "& pro_id=" + pro_id<?php echo $i;?>,
                  success: function (response) {
                      console.log(response);
                  }
              });
            });
        });
        $('#noSale<?php echo $i;?>').click(function(){ // this when admin dnt need sale
          $('#amountDiv<?php echo $i;?>').hide();
          $('#checkSale<?php echo $i;?>').show();

        });
        //end loop
        <?php }?>
});

</script>
  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">
                <div class="content-box-large">
                    <h1>Товары</h1>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                                <th>Изображение</th>
                                <th>Категория</th>
                                <th>ID товара</th>
                                <th>Статус</th>
                                <th>Время аренды</th>
                                <th>Название</th>
                                <th>Код</th>
                                <th>Цена</th>
                                <th>Другое изобраажение</th>
                                <th>На скидке</th>
                                <th>Обновить</th>
                              <th>Удалить</th>
                              <th>Возвратить</th>
                            </tr>
                        </thead>
                        <?php $count =1;?>
                        @foreach($Products as $product)

                        <tbody>
                            <tr>
                                <td> <img src="/upload/images/<?php echo $product->pro_img; ?>" alt=""
                                   width="50px" height="50px"/></td>
                                <td>{{ucwords($product->name)}}</td>
                                <td>{{$product->id}}</td>
                                @if($product->stock)
                                    <td ><p style="background-color: #26da1b ; color: #FFFFFF;padding-left: 5px">В наличии</p></td>
                                @else
                                    <td><p style="background-color: #fb6965 ; color: #FFFFFF;padding-left: 5px">Забронировано</p></td>
                                @endif
                                @if($product->start_date == null && $product->end_date == null)
                                    <td>не арендуется</td>
                                @else
                                    <td>{{date('d.m.Y', strtotime($product->start_date))}}<br>{{  date('d.m.Y', strtotime($product->end_date))}}</td>
                                @endif
                                <td>{{$product->pro_name}}</td>
                                <td>{{$product->pro_code}}</td>
                                <td>
                                    @if($product->sale_price==0)
                                        {{$product->pro_price}}
                                    @else
                                        {{$product->sale_price}}
                                    @endif
                                </td>
                                <td>
                                  <?php
                                  $Aimgs = DB::table('alt_images')->where('product_id', $product->id)
                                  ->get();

                                   ?>
                                  <p> {{count($Aimgs)}} картинок найдено</p>
                                  <a href="{{url('/')}}/admin/addAlt/{{$product->id}}"
                                   class="btn btn-info" style="border-radius:20px;">
                                   <i class="fa fa-plus"></i> Добавить</a></td>

                                  <td>
                                    <div id="checkSale<?php echo $count;?>">
                                    <input type="checkbox" id="onSale<?php echo $count;?>"> Да
                                  </div>

                                  <div id="amountDiv<?php echo $count;?>">
                                    <input type="hidden" id="pro_id<?php echo $count;?>"
                                     value="{{$product->id}}"/>
                                    <input type="checkbox" id="noSale<?php echo $count;?>"> Нет<br>
                                    <input type="text" id="sale_price<?php echo $count;?>"
                                    placeholder="Цена" size="12" value="{{$product->sale_price}}"><br>
                                    <button id="saveAmount<?php echo $count;?>" class="btn btn-success">
                                    Сохранить</button>
                                  </div>
                                  </td>

                                <td><a href="{{url('/')}}/admin/ProductEditForm/{{$product->id}}"
                                   class="btn btn-success btn-small">Редактировать</a></td>

                                <td><a href="{{url('/')}}/admin/deleteProduct/{{$product->id}}"
                                       class="btn btn-danger btn-small">Удалить</a></td>
                                <td>
                                    <a href="{{url('/')}}/admin/orders/product_returned/{{$product->id}}/"
                                       class="btn btn-info btn-small">Возвратить</a>

                                </td>
                            </tr>
                        </tbody>
                        <?php $count++;?>
                        @endforeach
                    </table>
                </div>
</section>
</section>
</section>

@endsection
