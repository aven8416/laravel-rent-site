@extends('admin.master')

@section('content')


  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">


                <div class="content-box-large">
                    <h1>Добавить Категорию</h1>

                    {!! Form::open(['url' => 'admin/catForm',  'method' => 'post']) !!}
                    <table class="table-borderless" style="height:200px">

                        <tr>
                            <td> Название категории:</td>
                            <td>    <input type="text" name="cat_name" class="form-control"></td>
                        </tr>

                         <tr>
                             <td colspan="2">
                        <input type="submit" value="Добавить" class="btn btn-success pull-right">
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
