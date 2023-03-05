<header class="header dark-bg">
			<div class="toggle-nav">
					<div class="icon-reorder tooltips" data-original-title="Toggle Navigation"
					data-placement="bottom"><i class="icon_menu"></i></div>
			</div>

			<!--logo start-->
			<a href="{{url('/admin')}}" class="logo">Авто<span class="lite">Ренда</span></a>
			<!--logo end-->

			<div class="nav search-row" id="top_menu">

			</div>

			<div class="top-nav notification-row">
					<!-- notificatoin dropdown start-->
					<ul class="nav pull-right top-menu">

						<?php /*	<!-- task notificatoin start -->

							*/?>
							<!-- user login dropdown start-->
							<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#">
											<span class="profile-ava">
													<img alt="" src="{{asset('admin_theme/img/avatar-mini4.jpg')}}">
											</span>
											<span class="username">Админ</span>
											<b class="caret"></b>
									</a>
									<ul class="dropdown-menu extended logout">
											<div class="log-arrow-up"></div>
											<li class="eborder-top">
													<a href="{{url('/admin')}}"><i class="icon_profile"></i> Мой профиль</a>
											</li>

											<li>
													<a href="{{url('/logout')}}"><i class="icon_profile"></i> Выйти</a>
											</li>

									</ul>
							</li>
							<!-- user login dropdown end -->
					</ul>
					<!-- notificatoin dropdown end-->
			</div>
</header>
<!--header end-->
