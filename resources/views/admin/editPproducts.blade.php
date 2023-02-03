@extends('admin.master')

@section('content')

  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">

             <div class="col-md-7">
                <div class="content-box-large ">
                  {!! Form::open(['url' => 'admin/editProduct',  'method' => 'post']) !!}
                     <div class="panel-heading col-md-8">
                      <div class="panel-title"> Редактировать товар
                        <input type="submit" class="btn btn-success pull-right" value="Обновить" style="margin:-4px"/>
                      </div>
                      </div>

                    <?php $cats = DB::table('product_categories')->get(); ?>
                    @foreach($Products as $product)
                    <div class="panel-body">

                        <div class="col-md-8">
                          <br>  Категория:  <select name="cat_id" class="form-control">
                                @foreach($cats as $cat)
                                <option value="{{$cat->id}}" <?php if ($product->cat_id == $cat->id) { ?> selected="selected"<?php } ?>>{{ucwords($cat->name)}}</option>
                                @endforeach
                            </select>
                            <br/>
                            <input type="hidden" name="id" class="form-control" value="{{$product->id}}">
                            Название:    <input type="text" name="pro_name" class="form-control" value="{{$product->pro_name}}">
                            <br/>
                            Цена     <input type="text" name="pro_price" class="form-control" value="{{$product->pro_price}}">
                            <br/>
                            Код:    <input type="text" name="pro_code" class="form-control" value="{{$product->pro_code}}">
                            <br/>
                            Цена на скидке: <input type="text" name="sale_price" class="form-control"
                             value="{{$product->sale_price}}">
                            <br/>
                            Детали:  <textarea name="pro_info" class="form-control" rows="2">{{$product->pro_info}}</textarea>
                            <br/>
                            Новое: <p class="pull-right"><input type="checkbox" checked="checked" name="new_arrival" value="{{$product->new_arrival}}">


                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>



                    </div>

                    @endforeach
                    {!! Form::close() !!}
                </div>
              </div>


              <div class="col-md-4">
                <?php $pId = $Products[0]->id;
                $prots = DB::table('product_properties')
                ->where('pro_id', $pId)->get();
                if(count($prots)==0) { } else {?>
                  <div class="panel-heading">
                   <div class="panel-title">
                     Обновить Характеристики
                     <a href="" class="btn btn-info pull-right"
                     style="margin:-6px; color:#fff">Добавить больше</a>
                   </div>
                   </div>

                   <div class="content-box-large">

                      <table class="table table-responsive">
                      <tr>
                        <td>Размер</td>
                        <td>Цвет</td>
                        <td>Цена</td>
                        <td>Обновить</td>
                      </tr>
                      @foreach($prots as $prot)
                        {!! Form::open(['url' => 'admin/editProperty',  'method' => 'post']) !!}
                      <tr>
                          <input type="hidden" name="pro_id" value="{{$prot->pro_id}}" size="6"/> <!-- products_properties pro_id -->
                          <input type="hidden" name="id" value="{{$prot->id}}" size="6"/> <!--// products_properties id -->
                        <td><input type="text" name="size" value="{{$prot->size}}" size="6"/></td>
                        <td><input type="text" name="color" value="{{$prot->color}}" size="15"/></td>
                        <td><input type="text" name="p_price" value="{{$prot->p_price}}" size="6"/></td>
                        <td colspan="3" align="right"><input type="submit" class="btn btn-success"
                          value="Save" style="margin:-6px; color:#fff"></td>
                      </tr>
                            {!! Form::close() !!}
                      @endforeach

                      </table>
                       <div>
                 <?php }?>

                       <hr>

                       <div class="content-box-large " align="center">
                         <div class="panel-heading">
                          <div class="panel-title">
                            Обновить изображение товара
                          </div>
                        </div>
                           <hr>

                               <img src="/upload/images/<?php echo $product->pro_img; ?>"
                               alt="" class="img-rounded" width="150px" height="150px"/>
                                   <br> <br>
                                <p><a href="{{url('/admin/EditImage')}}/{{$product->id}}"
                                   class="btn btn-info">Обновить</a>
                                </p>
                        </div>
                     <hr>

                     <div class="content-box-large " align="center">
                         <div class="panel-heading">
                             <div class="panel-title">
                                 Установить дату начала аренды
                             </div>
                         </div>
                         <hr>

                         {!! Form::open(['url' => 'admin/orders/product_date/'.$product->id,  'method' => 'post']) !!}

                             <input  type="date" placeholder="Start date" size="5"   onchange="" name="start_date" id="start_date"  class="form-control ">

                                <hr>

                             <input  type="text" placeholder="qty" size="2"  onchange="" name="qty_days" id="qty_days"  class="form-control">

                         <br> <br>
                             <input type="submit" class="btn btn-info btn-small" value="Set date" />
                         {!! Form::close() !!}
                     </div>

            </section>
        </section>
</section>

@endsection
