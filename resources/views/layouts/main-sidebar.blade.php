<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="home"><img src="{{URL::asset('assets/img/V_Logomark_Red.png')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="home"><img src="{{URL::asset('assets/img/V_Logomark_Red.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="home"><img src="{{URL::asset('assets/img/V_Logomark_Red.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="home"><img src="{{URL::asset('assets/img/V_Logomark_Red.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/MV5BMzc1YTA1ZjItMWRhMy00ZTBlLTkzNTgtNTc4ZDE3YTM3ZDk2XkEyXkFqcGdeQXVyNDUzOTQ5MjY@._V1_.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name}}</h4>
							<span class="mb-0 text-muted">{{Auth::user()->email}}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">

                    <li class="slide">
                        <a class="side-menu__item" href="{{url('/store')}}"><span class=""><i class="typcn typcn-shopping-cart side-menu__icon"></i></span><span class="side-menu__label">Store</span></a>
                    </li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/' . $page='icons') }}"><span class=""><i class="far fa-file-alt side-menu__icon"></i></span><span class="side-menu__label">About US</span></a>
					</li>
                    <li class="slide">
                        <a class="side-menu__item" href="#"><span class=""><i class="mdi mdi-account-card-details side-menu__icon"></i></span><span class="side-menu__label">Teams</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" href="#"><span class=""><i class="mdi mdi-account-network side-menu__icon"></i></span><span class="side-menu__label">Staff</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" href="#"><span class=""><i class="far fa-calendar side-menu__icon"></i></span><span class="side-menu__label">Schedule</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" href="#"><span class=""><i class="icon ion-md-paper side-menu__icon"></i></span><span class="side-menu__label">News</span></a>
                    </li>



				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
