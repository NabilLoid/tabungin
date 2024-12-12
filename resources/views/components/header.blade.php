	<header>
	  <div class="continer-left-header">
	  	<a href="/form">
		<i class="ph ph-list"></i></a>
		
		<div class="wrapper-judul">
			<h3>{{auth('web')->user()->item }}<span>{{ number_format($percentage, 2) }}%</span></h3>
			<span>{{ number_format(auth('web')->user()->target, 0, ',', '.') }}
 			{{auth('web')->user()->currency }}</span>
<!--  			<span>{{ number_format($totalAmount, 0, ',', '.') }}</span>
 -->
		</div>
	  </div>
	  <div class="container-icon-right">
	  	<div class="move-table">
			<!-- <i class="ph-light ph-table"></i> -->
			<!-- <i class="ph-bold ph-caret-up-down"></i> -->
		</div>
		<form class="logout" action="{{ route('logout') }}" method="POST">
			@csrf
		<div class="notification">
			<button type="submit"><i class="ph-duotone ph-sign-out"></i></button>
		</div>
		</form>
		<div class="add-table">
			<img class="avatar-google" src="{{ auth()->user()->avatar }}" alt="">
		</div>
	  </div>
	</header>