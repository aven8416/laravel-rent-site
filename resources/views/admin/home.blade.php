@extends('admin.master')

@section('content')


  <section id="container" class="">
       @include('admin.sidebar')
       <section id="main-content">
           <section class="wrapper">

            <div class="row">
                <div class="col-md-6">
                    <div class="content-box-large">
                        {!! Form::open(['url' => 'admin/add_product',  'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        <div class="panel-heading">
                            <div class="panel-title">Добавить новый товар
                                <input type="submit" value="Добавить" class="btn btn-sm btn-info pull-right" style="margin:-5px">
                            </div>





                        </div>
                        <div class="panel-body">
                            Категория:
                            <Select class="form-control" name="cat_id">
                            @foreach($cat_data as $cat)
                             <option value="{{ $cat->id }}">{{ ucwords($cat->name) }}</option>
                            @endforeach
                            </select>
                            <br>
                            Бренд:
                            <Select class="form-control" name="brand_id">
                                @foreach($brand_data as $brand)<option value="{{ $brand->id }}">{{ ucwords($brand->name) }}</option>
                                @endforeach
                            </select>
                            <br>

                            Название:    <input type="text" name="pro_name" class="form-control">
                            <br/>
                            Цена аренды в день    <input type="text" name="pro_price" class="form-control">
                            <br/>

                            Код:    <input type="text" name="pro_code" class="form-control">
                            <br/>
                            Изображение     <input type="file" name="pro_img" class="form-control">
                            <br/>


                            Детали:    <textarea name="pro_info" class="form-control" rows="5"></textarea>
                            <br/>
                            Цена скидки     <input type="text" name="sale_price" class="form-control">
                            <br/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            {!! Form::close() !!}
                        </div>



                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-box-header">
                                <div class="panel-title" style="padding: 10px 15px">Добавить характеристики
                                    <div class="pull-right" style="margin:-5px">
                                        <a href="{{url('admin/addPropertyAll')}}" class="btn btn-sm btn-info">Добавить характеристику</a>
                                    </div>
                                <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



      <section>
</section>

@endsection
