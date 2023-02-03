@extends('admin.master')

@section('content')

  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">

                <div class="content-box-large">
                    <h1>Все категории</h1>


                    <table class="table table-striped">
                        <thead>  <tr>
                                <th>ID категории</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Обновить</th>
                                <th>Удалить</th>
                            </tr>
                        </thead>
                        @foreach($cats as $cat)
                        <tbody>
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td>@if($cat->status=='0')
                                    Добавлена
                                    @else
                                    Убрана

                                    @endif</td>
                                <td><a href="{{url('/')}}/admin/CatEditForm/{{$cat->id}}" class="btn btn-info btn-small">Редактировать</a></td>
                                <td><a href="{{url('/admin/deleteCat')}}/{{$cat->id}}" class="btn btn-danger">Удалить</a></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>



        </section>
      </section>
  </section>

@endsection
