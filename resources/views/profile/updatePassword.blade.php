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
                <li class="active">Обновить пароль</li>
            </ol>
        </div><!--/breadcrums-->



        <div class="row">
            @include('profile.menu')
            <div class="col-md-8">

                @if(session('msg'))
                <div class="alert alert-info">  {{session('msg')}}</div>
                @endif

                <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Обновление пароля</h3>

                {!! Form::open(['url' => 'updatePassword',  'method' => 'post']) !!}


                <div class="container" >


                    <div class="form-group row">

                        <div class="form-group col-md-5">
                            <label for="example-text-input">Текущий пароль</label>
                            <input class="form-control" type="password"  name="oldPassword">
                            <span style="color:red">{{ $errors->first('old_password') }}</span>

                            <br>

                            <label for="example-text-input" >Новый пароль</label>
                            <input class="form-control" type="password"  name="newPassword">
                            <span style="color:red">{{ $errors->first('newPassword') }}</span>

                            <br>
                            <div align="right"> <input type="submit" value="Обновить" class="btn btn-primary"></div>
                        </div>




                    </div>

                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection
