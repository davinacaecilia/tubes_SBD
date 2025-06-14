<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/css/chart.css') }}" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

	<title>Dashboard</title>
</head>
<body>

	@include('partial.sidebar')

	<section id="content">
		@include('partial.navbar')

		<!-- MAIN -->
		<main>
						<div class="dashboard-container">
        <header class="dashboard-header">
            <h1>Admin Dashboard - Google Arts & Culture</h1>
            <p>Arts Collection Statistic</p>
							</header>
							<ul class="box-info">
								<li>
									<i class='bx bx-palette'></i>
									<span class="text">
										<h3>{{ $artCount  }}</h3>
										<p>Arts</p>
									</span>
								</li>
									<li>
									<i class='bx bxs-building-house' ></i>
									<span class="text">
										<h3>{{ $museumCount }}</h3>
										<p>Museums</p>
									</span>
								</li>
								<li>
									<i class='bx bxs-file-image' ></i>
									<span class="text">
										<h3>{{ $mediumCount }}</h3>
										<p>Medium</p>
									</span>
								</li>
								<li>
									<i class='bx bxs-group' ></i>
									<span class="text">
										<h3>{{ $userCount }}</h3>
										<p>Users</p>
									</span>
								</li>
							</ul>

							<div class="charts-container">
								<div class="chart-card">
										<div class="chart-header">
												<h2>Museums with Most Artwork</h2>
												<p>Number of artwork collections in each museum</p>
										</div>
										<div class="chart-wrapper">
												<canvas id="museumChart"></canvas>
										</div>
								</div>

								<div class="chart-card">
										<div class="chart-header">
												<h2>Arts by Medium</h2>
												<p>Distribution of artworks by medium type</p>
										</div>
										<div class="chart-wrapper">
												<canvas id="mediumChart"></canvas>
										</div>
								</div>
						</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	


<!-- Pagination di paling bawah -->
	<div id="pagination" class="pagination-container"></div>

	<script src="{{ asset('admin/script/script.js') }}"></script>
	<script src="{{ asset('admin/script/pagination.js') }}"></script>
	<script src="{{ asset('admin/script/chart.js') }}"></script>
	<script src="{{ asset('admin/script/sidebar.js') }}"></script>
</body>
</html>