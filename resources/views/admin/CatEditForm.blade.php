@extends('admin.master')

@section('content')


  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">

                <div class="content-box-large">
                    <h1>Редактировать категорию</h1>

                    {!! Form::open(['url' => 'admin/editCat',  'method' => 'post']) !!}
                    <table class="table-borderless" style="height:200px; width: 400px">
                        @foreach($cats as $cat)
                        <input type="hidden" name="id" class="form-control" value="{{$cat->id}}">
                        <tr>
                            <td> Имя категории:</td>
                            <td> <input type="text" name="cat_name" class="form-control" value="{{$cat->name}}"></td>
                        </tr>

                        <tr>
                            <td> Статус категории:</td>
                            <td>
                                <select name="status" class="form-control">
                                    <option value="0"  <?php if($cat->status=='0'){?>  selected="selected" <?php }?>>Добавлена</option>
                                    <option value="1" <?php if($cat->status=='1'){?> selected="selected" <?php }?>>Убрана</option>

                                </select>
                            </td>
                        </tr>


                        @endforeach
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Обновить" class="btn btn-success pull-right">
                            </td>
                        </tr>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {!! Form::close() !!}
                    </table>
                </div>


          </section>
        </section>
</section>
@endsection
