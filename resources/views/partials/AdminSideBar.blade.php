	
    <!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="{{ route('Admin.dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('Admin.categorie') }}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Catégories</span>
				</a>
			</li>
			<li>
				<a href="{{ route('Admin.produit') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Produits</span>
				</a>
			</li>
			<li>
				<a href="{{ route('Admin.theme') }}">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Thèmes</span>
				</a>
			</li>
			<li>
				<a href="{{ route('tripApproved') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Voyages</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
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
			
			<a href="#" class="profile">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfvHO_syH98KMSt6TBf28IV37Mv21b2fJ68PHaVsDpiA&s">
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