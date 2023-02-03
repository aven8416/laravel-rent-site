@extends('admin.master')

@section('content')


  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">

                <div class="content-box-large">
                    <h1>Добавить изображение</h1>

                    <div class="col-md-5">
                        {!! Form::open(['url' => 'admin/editProImage',  'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

                    @foreach($Products as $product)
                    <input type="hidden" name="id" class="form-control" value="{{$product->id}}">

                    <input type="text" class="form-control" value="{{$product->pro_name}}" readonly="readonly">
                    <br/>
                    <img src="/upload/images/<?php echo $product->pro_img; ?>" alt="" width="150px" height="150px"/>

                    <br/>
                    Select Image:
                    <input type="file" name="new_image" class="form-control" >

                    @endforeach
                    <br/>
                    <input type="submit" value="Обновить" class="btn btn-success pull-right">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {!! Form::close() !!}
                  </div>
                </div>


        </section>
</section>

@endsection
