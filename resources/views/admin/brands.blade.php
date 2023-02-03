@extends('admin.master')

@section('content')

  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">

                <div class="content-box-large">
                    <h1>Все бренды</h1>


                    <table class="table table-striped">
                        <thead>  <tr>
                                <th>ID бренда</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Обновить</th>
                                <th>Удалить</th>
                            </tr>
                        </thead>
                        @foreach($brands as $brand)
                        <tbody>
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                <td>@if($brand->status=='0')
                                    Добавлена
                                    @else
                                    Убрана

                                    @endif</td>
                                <td><a href="{{url('/')}}/admin/BrandEditForm/{{$brand->id}}" class="btn btn-info btn-small">Редактировать</a></td>
                                <td><a href="{{url('/admin/deleteBrand')}}/{{$brand->id}}" class="btn btn-danger">Удалить</a></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>



        </section>
      </section>
  </section>

@endsection
