@extends('front.master')

@section('content')

<h1 align="center">{{Auth::user()->name}}, спасибо!</h1>

<p class="panel-body" style="text-align: center; padding: 100px">
    Ваш заказ был успешно размещен. Ожидайте звонка. В ближайшее время с вами свяжется наш специалист.</p>

@endsection
