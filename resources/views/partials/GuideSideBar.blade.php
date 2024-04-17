	
    <!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Guide</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="{{ route('Guide.dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('Guide.voyages') }}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Voyages</span>
				</a>
			</li>
			<li>
				<a href="{{ route('Guide.reservation') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Reservation</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="{{ route('logout') }}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>	
			
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/guide-3190193-2658615.png?f=webp&w=512">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
            @yield('main')
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
</body>
</html>