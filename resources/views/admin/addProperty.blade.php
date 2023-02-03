@extends('admin.master')

@section('content')

<?php
if(isset($id)){
 $Products = DB::table('products')->where('id',$id)->get();
}else {

  $Products = DB::table('products')->get();
}
 ?>
  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">

                <div class="content-box-large">
  {!! Form::open(['url' => 'admin/sumbitProperty',  'method' => 'post']) !!}
                  <div class="panel-heading col-md-8">
                   <div class="panel-title">Добавить характеристики
                     <input type="submit" class="btn btn-success pull-right" value="Submit Property" style="margin:-4px"/>
                   </div>
                   </div>


                    <div class="col-md-5">

                          <b>Название товара:</b>
                        <select class="form-control" name="pro_id">
                              @foreach($Products as $product)
                          <option  value="{{$product->id}}">{{$product->pro_name}}</<option>
                              @endforeach
                          </select><br>

                         Размер:  <select class="form-control" name="size">
                                  <option  value="L">минивен</option>
                                  <option  value="XL">Фура</option>
                                  <option  value="XXL">габоритный/<option>
                            </select><br>


                            Цвет:  <select class="form-control" name="color">
                                     <option  value="blue">Голубой</<option>
                                     <option  value="green">Зеленый</<option>
                                     <option  value="black">Черный</<option>
                               </select><br>

                    Пробег:  <input type="text" name="p_price" class="form-control">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                  </div>

                    {!! Form::close() !!}
                </div>


        </section>
</section>

@endsection
