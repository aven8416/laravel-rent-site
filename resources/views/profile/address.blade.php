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
                    <li class="active">Мой адрес</li>
                </ol>
            </div><!--/breadcrums-->




            <div class="row">

                @include('profile.menu')
                <div class="col-md-8">

                    @if(session('msg'))
                        <div class="alert alert-info">
                            <a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                            {{session('msg')}}

                        </div>
                    @endif

                    <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Ваш Адрес</h3>

                    {!! Form::open(['url' => 'updateAddress',  'method' => 'post']) !!}

                    @foreach($address_data as $value)
                        <div class="container" >
                            <div class="form-group row">

                                <div class="form-group col-md-6">
                                    <label for="example-text-input" >ФИО</label>
                                    <input class="form-control" type="text"  name="fullname" value="{{$value->fullname}}">
                                    <span style="color:red">{{ $errors->first('fullname') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="form-group col-md-6">
                                    <label for="example-text-input" >Город</label>
                                    <select name="city" class="form-control">
                                        <option value="{{$value->city}}" selected="selected">{{$value->city}}</option>
                                        <option value="Minsk">Минск</option>
                                        <option value="Baranovichi">Барановичи</option>
                                        <option value="Gomel">Гомель</option>
                                        <option value="Vitebsk">Витебск</option>
                                        <option value="Brest">Брест</option>
                                        <option value="Mogilev">Могилев</option>
                                        <option value="Grodno">Гродно</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('address') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="form-group col-md-6">
                                    <label for="example-text-input" >Адрес</label>
                                    <input class="form-control" type="text"  name="address" value="{{$value->address}}">
                                    <span style="color:red">{{ $errors->first('address') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="form-group col-md-6">
                                    <label for="example-text-input" >Телефон</label>
                                    <input class="form-control" type="text"  name="phone" value="{{$value->phone}}">
                                    <span style="color:red">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="form-group row">

                                <div class="form-group col-md-6">
                                    <label for="example-text-input">Дата Рождения</label>
                                    <input class="form-control" type="date"  name="birth" value="{{$value->birth}}">
                                    <span style="color:red">{{ $errors->first('birth') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="form-group col-md-6">
                                    <label for="example-text-input" >Номер паспорта</label>
                                    <input class="form-control" type="text"  name="passport_n" value="{{$value->passport_n}}">
                                    <span style="color:red">{{ $errors->first('passport_n') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="form-group col-md-6">
                                    <label for="example-text-input" >Идентификационный номер</label>
                                    <input class="form-control" type="text"  name="identification_n" value="{{$value->identification_n }}">
                                    <span style="color:red">{{ $errors->first('identification_n') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="form-group col-md-6" align="right">
                                    <input class="btn btn-primary" type="submit"  value="Обновить">
                                </div>
                            </div>

                        </div>
                    @endforeach
                    {!! Form::close() !!}
                </div>
            </div>


        </div>
    </section>
@endsection
