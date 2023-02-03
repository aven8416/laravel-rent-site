<?php /*
<div class="col-md-2">
           <div class="sidebar content-box" style="display: block;">
               <ul class="nav">
                   <!-- Main menu -->

                   <li class="submenu">
                       <a href="#">
                           <i class="glyphicon glyphicon-list"></i> Products
                           <span class="caret pull-right"></span>
                       </a>
                       <!-- Sub menu -->
                       <ul>
                           <li><a href="{{url('/admin/addProduct')}}">Add Products</a></li>
                           <li><a href="{{url('/admin/products')}}">View Products</a></li>
                       </ul>
                   </li>

                     <li class="submenu">
                       <a href="#">
                           <i class="glyphicon glyphicon-list"></i> Categories
                           <span class="caret pull-right"></span>
                       </a>
                       <!-- Sub menu -->
                       <ul>
                           <li><a href="{{url('/admin/addCat')}}">Add Category</a></li>
                           <li><a href="{{url('/admin/categories')}}">View Categories</a></li>
                       </ul>
                   </li>
               </ul>
           </div>
       </div>
       */?>
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a class="" href="{{url('/admin')}}">
                            <i class="icon_house_alt"></i>
                            <span>Главная</span>
                        </a>
                    </li>
            <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_document_alt"></i>
                            <span>Товары</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{url('/admin/addProduct')}}">Добавить товар</a></li>
                            <li><a href="{{url('/admin/products')}}">Все товары</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_desktop"></i>
                            <span>Категории</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                          <li><a class="" href="{{url('/admin/addCat')}}">Добавить категорию</a></li>

                            <li><a class="" href="{{url('/admin/categories')}}">Все категории</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="fa fa-th-large"></i>
                            <span>Бренды</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="{{url('/admin/addBrand')}}">Добавить бренд</a></li>

                            <li><a class="" href="{{url('/admin/brands')}}">Все бренды</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="fa fa-calendar"></i>
                            <span>Заказы</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="{{url('/admin/orders')}}">Все заказы</a></li>
                            <li><a class="" href="{{url('/admin/orders/confirmed')}}">Подтвержденные</a></li>
                            <li><a class="" href="{{url('/admin/orders/canceled')}}">Отмененные</a></li>
                            <li><a class="" href="{{url('/admin/orders/pending')}}">Неподтвержденные</a></li>
                        </ul>
                    </li>


                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
