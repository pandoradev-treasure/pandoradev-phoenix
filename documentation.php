<!DOCTYPE html>
<html lang="en">

<head>
	<title>PandoraDocs - Dokumentasi PandoraCode</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Bootstrap 4 Template For Software Startups">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

	<!-- FontAwesome JS-->
	<script defer src="resource/assets/documentation/fontawesome/js/all.min.js"></script>

	<!-- Plugins CSS -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.2/styles/atom-one-dark.min.css">
	<link rel="stylesheet" href="resource/assets/documentation/plugins/simplelightbox/simple-lightbox.min.css">

	<!-- Theme CSS -->
	<link id="theme-style" rel="stylesheet" href="resource/assets/documentation/css/theme.css">

</head>

<body class="docs-page">
	<header class="header fixed-top">
		<div class="branding docs-branding">
			<div class="container-fluid position-relative py-2">
				<div class="docs-logo-wrapper">
					<button id="docs-sidebar-toggler" class="docs-sidebar-toggler docs-sidebar-visible me-2 d-xl-none" type="button">
						<span></span>
						<span></span>
						<span></span>
					</button>

					<div class="site-logo">
						<a class="navbar-brand" href="docs-page">
							<span class="logo-text">Pandora<span class="text-alt">Docs</span></span>
						</a>
					</div>
				</div>
				<div class="docs-top-utilities d-flex justify-content-end align-items-center">
					<a href="views/demo/data.php" class="btn btn-primary d-none d-lg-flex">Mulai</a>
				</div>
				<!--//docs-top-utilities-->
			</div>
			<!--//container-->
		</div>
		<!--//branding-->
	</header>
	<!--//header-->


	<div class="docs-wrapper">
		<div id="docs-sidebar" class="docs-sidebar">
			<div class="top-search-box d-lg-none p-3">
				<form class="search-form">
					<input type="text" placeholder="Search the docs..." name="search" class="form-control search-input">
					<button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
				</form>
			</div>
			<nav id="docs-nav" class="docs-nav navbar">
				<ul class="section-items list-unstyled nav flex-column pb-3">
					<li class="nav-item section-title"><a class="nav-link scrollto active" href="#section-1"><span class="theme-icon-holder me-2"><i class="fas fa-map-signs"></i></span>Pengenalan</a>
					</li>
					<li class="nav-item"><a class="nav-link scrollto" href="#item-1-1">Konfigurasi</a></li>
					<li class="nav-item"><a class="nav-link scrollto" href="#item-1-2">Function Helper</a></li>
					<!-- <li class="nav-item"><a class="nav-link scrollto" href="#item-1-4">Section Item 1.4</a></li>
					<li class="nav-item"><a class="nav-link scrollto" href="#item-1-5">Section Item 1.5</a></li>
					<li class="nav-item"><a class="nav-link scrollto" href="#item-1-6">Section Item 1.6</a></li>
					<li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#section-2"><span class="theme-icon-holder me-2"><i class="fas fa-arrow-down"></i></span>Versi</a>
					</li>
					<li class="nav-item"><a class="nav-link scrollto" href="#item-2-1">Section Item 2.1</a></li>
					<li class="nav-item"><a class="nav-link scrollto" href="#item-2-2">Section Item 2.2</a></li>
					<li class="nav-item"><a class="nav-link scrollto" href="#item-2-3">Section Item 2.3</a></li> -->
				</ul>

			</nav>
			<!--//docs-nav-->
		</div>
		<!--//docs-sidebar-->
		<div class="docs-content">
			<div class="container">
				<article class="docs-article" id="section-1">
					<header class="docs-header">
						<h1 class="docs-heading">Pengenalan <span class="docs-time">Last updated: 21-07-2021 | V 0.05</span>
						</h1>
						<section class="docs-intro">
							<strong>Pandoracode</strong> diciptakan untuk mempermudah urusan anda dalam membuat sebuah program web, <br>
							kami sudah menyiapkan banyak helper di dalamnya, yang dimana helper ini akan terus berusaha kami kembangkan untuk anda
						</section><br>
						<!--//docs-intro-->
						<p>
							Sebagai contoh <b>helper</b> untuk insert data :
						</p>
						<code>Versi full native</code>
						<div class="row">
							<div class="col-md-12">
								<div class="docs-code-block">
									<pre class="shadow-lg rounded"><code class="">
<span>$koneksi = mysqli_connect('localhost','root','','nama_database');<br>
<span>mysqli_query($koneksi,"INSERT INTO nama_tabel VALUES('value1','value2','value3','value4')");</span><br>
<span>header('location:index.php');</span>
</span>
							</code></pre>
								</div>
								<!--//docs-code-block-->
							</div>
						</div>
						<!-- row -->
						<code>Versi helper</code>
						<div class="row">
								<div class="col-md-12">
									<div class="docs-code-block">
										<pre class="shadow-lg rounded"><code class=""><span style="color:#9b59b6">
<span style="color:#3498db">query<span style="color:#f1c40f">()</span>->insert<span style="color:#f1c40f">(</span><span style="color:#9b59b6"></span>'<span style="color:#2ecc71">name_tabel</span>'<span style="color:#9b59b6"><span style="color:#f1c40f">,</span>[</span>'<span style="color:#2ecc71">value</span>'<span style="color:#f1c40f;">,</span>'<span style="color:#2ecc71">value</span>'<span style="color:#9b59b6">]</span><span style="color:#f1c40f">)</span>->view('index')</span></span>;
								</code></pre>
								</div>
								<!--//docs-code-block-->
							</div>
						</div>

						<h5>Untuk penulisan atribut action di form :</h5> <code>&lt;?php controller('NamaController@fungsi') ?></code>
						<div class="docs-code-block">
							<pre class="shadow-lg rounded"><code class="">
<span style="color:#3498db">&lt;</span><span style="color:#ff7979">form</span> <span style="color:#e056fd">action</span>=<span style="color:#3498db">"&lt;?php controller('NamaController@fungsi') ?>" </span><span style="color:#e056fd">method="POST"</span><span style="color:#3498db">></span>
							</code></pre>
						</div>


					</header>
					<section class="docs-section" id="item-1-1">
						<h2 class="section-heading">Konfigurasi</h2>
						<p>
							Pertama yang harus anda setting adalah di bagian <a href="">configuration.php</a> <br>
							kami memfokuskan file ini untuk pengenalan database dan aktifasi auth (login & register)
						</p>
						<code>configuration.php</code>

						<div class="docs-code-block">
							<pre class="shadow-lg rounded"><code class=""><span style="color:#3498db">&lt;?php </span>

   <span>$REDIRECT</span> <span style="color:#3498db"> =</span> <span style="color:#7ed6df">''</span>;

   <span>$HOST</span> <span style="color:#3498db">     =</span> <span style="color:#7ed6df">''</span>;

   <span>$USER</span> <span style="color:#3498db">     =</span> <span style="color:#7ed6df">''</span>;

   <span>$PASSWORD</span> <span style="color:#3498db"> =</span> <span style="color:#7ed6df">''</span>;

   <span>$DATABASE</span> <span style="color:#3498db"> =</span> <span style="color:#7ed6df">''</span>;
							</code></pre>
						</div>
						<h5>Penjelasan : </h5>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>$REDIRECT</th>
									<td><code>Waktu awal akses, akan dipindah sesuai direktori yang anda isi, misalnya demo/data.</code></td>
								</tr>
								<tr>
									<th>$HOST</th>
									<td><code>Isikan dengan nama host anda.</code></td>
								</tr>
								<tr>
									<th>$USER</th>
									<td><code>Isikan dengan nama user anda.</code></td>
								</tr>
								<tr>
									<th>$PASSWORD</th>
									<td><code>Isikan dengan password anda.</code></td>
								</tr>
								<tr>
									<th>$DATABASE</th>
									<td><code>Isikan dengan database anda.</code></td>
								</tr>
							</thead>
						</table>


						<!--//gallery-->
					</section>
					<!--//section-->

					<section class="docs-section" id="item-1-2">
						<h2 class="section-heading">Function Helper</h2>
						<p>
							Kami sudah menyediakan helper untuk anda
						</p>

						<h5>Berikut helper yang dapat anda gunakan:</h5>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Query</th>
									<td><code>query();</code></td>
								</tr>
								<tr>
									<th>Raw</th>
									<td><code>raw(" custom your query ");</code></td>
								</tr>
								<tr>
									<th>Where</th>
									<td><code>where("kolom","operator","data");</code></td>
								</tr>
								<tr>
									<th>Table</th>
									<td><code>table("nama_table");</code></td>
								</tr>
								<tr>
									<th>Select</th>
									<td><code>select("nama_kolom");</code></td>
								</tr>
								<tr>
									<th>Get</th>
									<td><code>get();</code></td>
								</tr>
								<tr>
									<th>Single</th>
									<td><code>single();</code></td>
								</tr>
								<tr>
									<th>OrderBy</th>
									<td><code>orderBy("nama_kolom","type_order");</code></td>
								</tr>
								<tr>
									<th>Limit</th>
									<td><code>limit(max_limit);</code></td>
								</tr>
								<tr>
									<th>Join</th>
									<td><code>join("nama_table","nama_kolom");</code></td>
								</tr>
								<tr>
									<th>Create / Insert</th>
									<td><code>insert("nama_tabel",[ value1, value2, value3 ]);</code></td>
								</tr>
								<tr>
									<th>Update</th>
									<td><code>update("nama_tabel",[ '$value1' => '$value1', '$value2' => '$value2' ], id );</code></td>
								</tr>
								<tr>
									<th>Delete</th>
									<td><code>delete("nama_tabel", id );</code></td>
								</tr>
								<tr>
									<th>View</th>
									<td><code>view("target_url",parsing_data);</code></td>
								</tr>
								<tr>
									<th>Connected View</th>
									<td><code>example()->view("target_url","pesan");</code></td>
								</tr>
								<tr>
									<th>Check</th>
									<td><code>check(eksekusi_data);</code></td>
								</tr>
								<tr>
									<th>Alert</th>
									<td><code>alert("judul_pesan","pesan","type_alert");</code></td>
								</tr>
								<tr>
									<th>Hitung</th>
									<td><code>hitung(data);</code></td>
								</tr>
								<tr>
									<th>Asset</th>
									<td><code>asset("target_url");</code></td>
								</tr>
								<tr>
									<th>Controller</th>
									<td><code>controller("namaController@method", params);</code></td>
								</tr>
								<tr>
									<th>URL</th>
									<td><code>url("target_url");</code></td>
								</tr>
								<tr>
									<th>TombolHapus</th>
									<td><code>tombolHapus("target","value","attribut");</code></td>
								</tr>
								<tr>
									<th>tombolEdit</th>
									<td><code>tombolEdit("target","value","attribut");</code></td>
								</tr>
								<tr>
									<th>TombolForm</th>
									<td><code>tombolForm();</code></td>
								</tr>
							</thead>
						</table>
						<h5>Penjelasan Helper : </h5>

						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									query();
								</h4>
								<p> Digunakan untuk mengawali sebuah Query, function ini tidak menerima parameter contoh : <code>query()->function()</code></p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									raw("custom your query");
								</h4>
								<p> Digunakan untuk membuat query anda sendiri jika tidak ingin menggunakan query bawaan,
									, menerima parameter yang berisi query. Contoh : <code>raw("SELECT * FROM table")</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									where("kolom","operator","data");
								</h4>
								<p> Digunakan untuk memebri kondisi pada query
									, menerima 3 parameter. Contoh : <code>where("username","=","irfan");</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									table("nama_table");
								</h4>
								<p> Digunakan untuk mengambil tabel pada database
									, menerima 1 parameter. Contoh : <code>table("users");;</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									select("nama_kolom");
								</h4>
								<p> Digunakan untuk memilih kolom pada database
									, menerima 1 parameter. Contoh : <code>select("id");</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									get();
								</h4>
								<p> Digunakan untuk mengembalikan hasil query dengan jumlah banyak
									, tidak menerima parameter. Contoh : <code>query()->example()->get()</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									single();
								</h4>
								<p> Digunakan untuk mengembalikan hasil query dengan jumlah 1 (satu)
									, tidak menerima parameter. Contoh : <code>query()->example()->single();</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									orderBy("nama_kolom","type_order");
								</h4>
								<p> Digunakan untuk mengurutkan pengembalian hasil query berdasarkan data terbaru atau data terlama
									, menerima 2 parameter. Contoh : <code>orderBy("username","DESC");</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									limit(max_limit);
								</h4>
								<p> Digunakan untuk membatasi data yang tampil
									, menerima 1 parameter. Contoh : <code>limit(10);</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									join("nama_table","nama_kolom");
								</h4>
								<p> Digunakan untuk membuat relasi <b>INNER JOIN</b> pada tabel database
									, menerima 2 parameter. Contoh : <code>join("categori","nama");</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									insert("nama_tabel",[ value1, value2, value3 ]);
								</h4>
								<p> Digunakan untuk insert/create data ke database
									, menerima 2 parameter dimana parameter ke 1 berisi nama tabel, dan parameter ke 2 bersifat <b>(array)</b> yang berisi data yang nantinya akan di masukkan dalam tabel di database, <b>dengan urutan kolom yang sama persis pada tabel di database</b>. Contoh :cx <code>insert("users", [ 'irfan','pandora@code.dev','phoenix' ]);</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									update("nama_tabel",[ '$value1' => '$value1', '$value2' => '$value2' ], id );
								</h4>
								<p> Digunakan untuk update data ke database
									, menerima 3 parameter dimana parameter ke 1 berisi nama tabel, parameter ke 2 bersifat <b>(array)</b> yang berisi data yang nantinya akan di masukkan dalam tabel di database, dan parameter ke 3 adalah <b>ID</b>. Contoh : <code>insert("users", [ 'username' => 'yuzron', 'email' => 'yuz@yuz.yuz' ], id );</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									delete("nama_tabel", id );
								</h4>
								<p> Digunakan untuk menghapus data di database
									, menerima 2 parameter dimana parameter ke 1 berisi nama tabel, dan parameter ke 2 adalah <b>ID</b>. Contoh : <code>delete("users", id );</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									view("target_url",parsing_data);
								</h4>
								<p> Digunakan untuk meredirect kehalaman yang di inginkan dengan membawa data
									, menerima 2 parameter dimana parameter ke 1 berisi target_url, dan parameter ke 2 adalah data parsingnya. Contoh : <code>view("home/index",compact('data'));</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									example()->view("target_url","pesan");
								</h4>
								<p> Digunakan untuk meredirect kehalaman yang di inginkan dengan membawa pessan <b>alert</b> yang dibuat secara otomatis
									, menerima 2 parameter dimana parameter ke 1 berisi target_url, dan parameter ke 2 adalah pesan yang ingin anda sampaikan. Contoh : <code>query()->tabel('users')->view("home/index","sukses!");</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									check(eksekusi_data);
								</h4>
								<p> Digunakan untuk mengeksekusi kode dengan tampilan interaktif hasil karya para DEVELOPER PANDORACODE
									, menerima 1 parameter. Contoh : <code>check('qwertyuiop');</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									alert("judul_pesan","pesan","type_alert");
								</h4>
								<p> Digunakan untuk menampilkan alert
									, menerima 3 parameter. Contoh : <code>alert("Update","Berhasil Update Data","success");</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									hitung(data);
								</h4>
								<p> Digunakan untuk menghitung jumlah data
									, menerima 1 parameter. Contoh : <code>hitung($data);</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									asset("target_url");
								</h4>
								<p> Digunakan untuk mengarah ke directori yang ada di dalam folder asset
									, menerima 1 parameter. Contoh : <code>asset("/img/pandoracode.jpg");</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									controller("namaController@method", params);
								</h4>
								<p> Digunakan untuk mengarah ke controller
									, menerima 2 parameter. Contoh : <code>controller("UsersContoller@index", $data);</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									url("target_url");
								</h4>
								<p> Digunakan untuk mengarah ke directori folder view
									, menerima 2 parameter. Contoh : <code>url("about/index");</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									tombolHapus("target","value","attribt");
								</h4>
								<p> Digunakan untuk membuat tombol hapus otomatis
									, menerima 3 parameter dimana parameter ke 1 berisi target_url saat di klik <b><code>href=""</code></b>,parameter ke 2 berisi value dan parameter ke 3 berisi attribut. Contoh : <code>tombolHapus(controller(UsersController@Hapus),"Hapus","attribut");</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									tombolEdit("target","value","attribt");
								</h4>
								<p> Digunakan untuk membuat tombol Edit otomatis
									, menerima 3 parameter dimana parameter ke 1 berisi target_url saat di klik <b><code>href=""</code></b>,parameter ke 2 berisi value dan parameter ke 3 berisi attribut. Contoh : <code>tombolHapus(controller(UsersController@Edit),"Edit","attribut");</code>
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->
						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-info-circle"></i>
									</span>
									<!--//icon-holder-->
									tombolForm();
								</h4>
								<p> Digunakan untuk membuat tombol khusus di form yang sudah di handle oleh programer PANDORACODE
									,tidak menerima parameter . Contoh : <code>tombolForm();</code> hasilnya : menampilkan 3 tombol, yaitu submit,reset,kembali
								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->


					</section>
					<!--//section-->

					<!-- <section class="docs-section" id="item-1-4">
						<h2 class="section-heading">Section Item 1.4</h2>
						<p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris, vitae facilisis
							leo. Aliquam sagittis purus nisi, at commodo augue convallis id. Sed interdum turpis quis
							felis bibendum imperdiet. Mauris pellentesque urna eu leo gravida iaculis. In fringilla odio
							in felis ultricies porttitor. Donec at purus libero. Vestibulum libero orci, commodo nec
							arcu sit amet, commodo sollicitudin est. Vestibulum ultricies malesuada tempor.</p>


						<h5>Pagination Example:</h5>
						<nav aria-label="Page navigation example">
							<ul class="pagination pl-0">
								<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">Next</a></li>
							</ul>
						</nav>

						<p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris, vitae facilisis
							leo. Aliquam sagittis purus nisi, at commodo augue convallis id. Sed interdum turpis quis
							felis bibendum imperdiet. Mauris pellentesque urna eu leo gravida iaculis. In fringilla odio
							in felis ultricies porttitor. Donec at purus libero. Vestibulum libero orci, commodo nec
							arcu sit amet, commodo sollicitudin est. Vestibulum ultricies malesuada tempor.</p>

					</section> -->
					<!--//section-->
					<!-- <section class="docs-section" id="item-1-5">
						<h2 class="section-heading">Section Item 1.5</h2>
						<p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris, vitae facilisis
							leo. Aliquam sagittis purus nisi, at commodo augue convallis id. Sed interdum turpis quis
							felis bibendum imperdiet. Mauris pellentesque urna eu leo gravida iaculis. In fringilla odio
							in felis ultricies porttitor. Donec at purus libero. Vestibulum libero orci, commodo nec
							arcu sit amet, commodo sollicitudin est. Vestibulum ultricies malesuada tempor.</p>
					</section> -->
					<!--//section-->
					<!-- <section class="docs-section" id="item-1-6">
						<h2 class="section-heading">Section Item 1.6</h2>
						<p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris, vitae facilisis
							leo. Aliquam sagittis purus nisi, at commodo augue convallis id. Sed interdum turpis quis
							felis bibendum imperdiet. Mauris pellentesque urna eu leo gravida iaculis. In fringilla odio
							in felis ultricies porttitor. Donec at purus libero. Vestibulum libero orci, commodo nec
							arcu sit amet, commodo sollicitudin est. Vestibulum ultricies malesuada tempor.</p>
					</section> -->
					<!--//section-->

				</article>

				<!-- <article class="docs-article" id="section-2">
					<header class="docs-header">
						<h1 class="docs-heading">Versi</h1>
						<section class="docs-intro">
							<p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
								finibus condimentum nisl id vulputate. Praesent aliquet varius eros interdum suscipit.
								Donec eu purus sed nibh convallis bibendum quis vitae turpis. Duis vestibulum diam
								lorem, vitae dapibus nibh facilisis a. Fusce in malesuada odio.</p>
						</section>
					</header>
					<section class="docs-section" id="item-2-1">
						<h2 class="section-heading">Section Item 2.1</h2>
						<p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris, vitae facilisis
							leo. Aliquam sagittis purus nisi, at commodo augue convallis id. Sed interdum turpis quis
							felis bibendum imperdiet. Mauris pellentesque urna eu leo gravida iaculis. In fringilla odio
							in felis ultricies porttitor. Donec at purus libero. Vestibulum libero orci, commodo nec
							arcu sit amet, commodo sollicitudin est. Vestibulum ultricies malesuada tempor.</p>
					</section>

					<section class="docs-section" id="item-2-2">
						<h2 class="section-heading">Section Item 2.2</h2>
						<p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris, vitae facilisis
							leo. Aliquam sagittis purus nisi, at commodo augue convallis id. Sed interdum turpis quis
							felis bibendum imperdiet. Mauris pellentesque urna eu leo gravida iaculis. In fringilla odio
							in felis ultricies porttitor. Donec at purus libero. Vestibulum libero orci, commodo nec
							arcu sit amet, commodo sollicitudin est. Vestibulum ultricies malesuada tempor.</p>
					</section>

					<section class="docs-section" id="item-2-3">
						<h2 class="section-heading">Section Item 2.3</h2>
						<p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris, vitae facilisis
							leo. Aliquam sagittis purus nisi, at commodo augue convallis id. Sed interdum turpis quis
							felis bibendum imperdiet. Mauris pellentesque urna eu leo gravida iaculis. In fringilla odio
							in felis ultricies porttitor. Donec at purus libero. Vestibulum libero orci, commodo nec
							arcu sit amet, commodo sollicitudin est. Vestibulum ultricies malesuada tempor.</p>
					</section>
				</article> -->
				<!--//docs-article-->
			</div>
		</div>
	</div>
	<!--//docs-wrapper-->


	<!-- Javascript -->
	<script src="resource/assets/documentation/plugins/popper.min.js"></script>
	<script src="resource/assets/documentation/plugins/bootstrap/js/bootstrap.min.js"></script>


	<!-- Page Specific JS -->
	<script src="resource/assets/documentation/plugins/smoothscroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
	<script src="resource/assets/documentation/js/highlight-custom.js"></script>
	<script src="resource/assets/documentation/plugins/simplelightbox/simple-lightbox.min.js"></script>
	<script src="resource/assets/documentation/plugins/gumshoe/gumshoe.polyfills.min.js"></script>
	<script src="resource/assets/documentation/js/docs.js"></script>

</body>

</html>