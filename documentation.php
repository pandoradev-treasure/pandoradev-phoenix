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
					<li class="nav-item"><a class="nav-link scrollto" href="#item-1-3">Menu Sidebar</a></li>
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

						<div class="callout-block callout-block-info">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-bullhorn"></i>
									</span>
									<!--//icon-holder-->
									Fitur Baru
								</h4>
								<p>
									Sekarang anda bisa mebuat <a href="" class="theme-link">controller helper</a> anda sendiri.
								</p>
							</div>
							<!--//content-->
						</div>
						<p>
							Sebagai contoh controller untuk insert data :
						</p>
						<h5>Lokasi penyimpanan :</h5> <code>Controller/Nama_controller.php</code>
						<div class="docs-code-block">
							<pre class="shadow-lg rounded"><code class=""><span style="color:#3498db">&lt;?php </span>

   <span style="color:#3498db">include </span><span style="color:#2ecc71">'Controller.php'</span><span style="color:#3498db">; </span>

   <span style="color:#9b59b6">function </span><span style="color:#3498db">namaFungsiAnda</span><span style="color:#f1c40f">(</span>$data<span style="color:#f1c40f">)</span>
   <span style="color:#f1c40f">{</span>

      $variable  = $data<span style="color:#9b59b6">[</span>'<span style="color:#2ecc71">input_name</span>'<span style="color:#9b59b6">]</span><span style="color:#3498db">;</span>
      $variable2 = $data<span style="color:#9b59b6">[</span>'<span style="color:#2ecc71">input_name_2</span>'<span style="color:#9b59b6">]</span><span style="color:#3498db">;</span>
      $insert    = <span style="color:#3498db">insertData</span><span style="color:#9b59b6">(</span>"<span style="color:#2ecc71">nama_tabel</span>","<span style="color: white;"> '$variable', '$variable2' </span>"<span style="color:#9b59b6">)</span><span style="color:#3498db">;</span>

      <span>return </span><span style="color:#3498db">notif</span><span style="color:#9b59b6">(</span>$insert,"nama_tabel","Pesan jika perintah berhasil"<span style="color:#9b59b6">)</span>;

   <span style="color:#f1c40f">}</span>
							</code></pre>
						</div>
						<!--//docs-code-block-->

						<h5>Untuk penulisan di form :</h5> <code>&lt;?= myController('NamaController','NamaFungsiAnda') ?></code>
						<div class="docs-code-block">
							<pre class="shadow-lg rounded"><code class="">
  <span style="color:#3498db">&lt;</span><span style="color:#ff7979">form</span> <span style="color:#e056fd">action</span>=<span style="color:#3498db">"&lt;?= myController('NamaController','NamaFungsiAnda') ?>" </span><span style="color:#e056fd">method="POST"</span><span style="color:#3498db">></span>
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
							
   <span>$AUTH</span> <span style="color:#3498db">     =</span> <span style="color:#7ed6df">false</span>; 

   <span>$REDIRECT</span> <span style="color:#3498db"> =</span> <span style="color:#7ed6df">''</span>;

   <span>$CHECKDB</span> <span style="color:#3498db">  =</span> <span style="color:#7ed6df">false</span>;

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
									<th>$AUTH</th>
									<td><code>Jika diubah menjadi true, maka fitur login & register akan aktif.</code></td>
								</tr>
								<tr>
									<th>$REDIRECT</th>
									<td><code>Waktu awal akses, akan dipindah sesuai direktori yang anda isi, misalnya demo/data.php.</code></td>
								</tr>
								<tr>
									<th>$CHECKDB</th>
									<td><code>Jika diubah menjadi true, maka sistem akan cek database anda, apakah sudah benar.</code></td>
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
									<th>Create / Insert</th>
									<td><code>insert("nama_tabel"," '$value1','$value2' ")</code></td>
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
									insertData("nama_tabel"," '$value1','$value2' ")
								</h4>
								<p> Digunakan untuk Insert data kedalam tabel, menerima 2 (dua) parameter
									, dimana parameter <code>( "nama_tabel" )</code> di isi dengan nama tabel yang akan digunakan untuk menyimpan data, dan <code>( " '$value1','$value2' " )</code> di isi dengan data yang ingin di simpan
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
									updateData("nama_tabel"," nama_kolom = '$value', nama_kolom_2 = '$value2' ", "$id")
								</h4>
								<p>Digunakan untuk Update data, menerima 3 (tiga) parameter
									, dimana parameter pertama <code>( "nama_tabel" )</code> di isi dengan nama tabel yang data di dalamnya akan di update, parameter kedua <code>( " nama_kolom = '$value', nama_kolom_2 = '$value2' " )</code> di isi dengan nama kolom <b>sesuai dengan nama kolom pada tabel</b>, beserta value (isi data) <b>baru</b>, dan parameter ketiga <code>( "$id" )</code> di isi <b>id</b> yang akan di gunakan untuk seleksi data yang akan di update.

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
									deleteData("nama_tabel", "$id")
								</h4>
								<p>Digunakan untuk Menghapus data, menerima 2 (dua) parameter
									, dimana parameter pertama <code>( "nama_tabel" )</code> di isi dengan nama tabel yang data di dalamnya akan di hapus, parameter kedua <code>( "$id" )</code> di isi <b>id</b> yang akan di gunakan untuk seleksi data yang akan di hapus.

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
									ambilTabel("nama_tabel")
								</h4>
								<p> Digunakan untuk mengambil tabel di database, menerima 1 (satu) parameter <code>("nama_tabel") </code> di isi dengan nama tabel yang ingin di ambil.

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
									ambilData("$variableTable")
								</h4>
								<p>Digunakan untuk mengambil/mendapatkan data dalam tabel di database, menerima 1 (satu) parameter <code>("$variableTable") </code> di isi dengan <b> variabel yang berisi function</b> <code>ambilData("$variableTable")</code>.

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
									relation("table","relation_table","select_column")
								</h4>
								<p>Digunakan untuk membuat relasi antar tabel, menerima 3 (tiga) parameter, dimana parameter pertama <code>( "tabel" )</code> di isi dengan nama <b>tabel</b> yang akan digunakan sebagai <b>tabel Primary</b>, parameter kedua <code>( "relation_tabel" )</code> di isi dengan nama <b>tabel</b> yang akan digunakan sebagai <b>tabel Foreign</b>, dan parameter ketiga <code>( "select_column" )</code> parameter ini bersifat <b>NULL</b>,boleh di isi apabila terdapat nama kolom yang <b>sama</b> di tabel Primary dan tabel Foreign, yang digunakan untuk membedakan kolom yang sama tersebut contoh : <code>tabel.kolom AS kolom_alias</code>.

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
									asset('nama_folder')
								</h4>
								<p>Digunakan untuk menuju folder asset di dalam folder <b>public</b> , menerima 1 (satu) parameter, <code>( 'nama_folder' )</code> di isi dengan nama folder yang di tuju di dalam folder assset.

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
									check($variable)
								</h4>
								<p>Digunakan untuk menampilkan nilai, ini sama dengan <b>var_dump</b> namun dengan tampilan yang lebih menarik , menerima 1 (satu) parameter, <code>( $variabel )</code> di isi dengan variabel yang ingin di tampilkan nilainya.

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
									rupiah($variable)
								</h4>
								<p>Digunakan untuk merubah nilai dengan tipe <b>(Numeric)</b> menjadi nilai yang berformat Rupiah , menerima 1 (satu) parameter, <code>( $variabel )</code> di isi dengan variabel yang ingin dirubah nilainya ke dalam format Rupiah.

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
									rawQuery("query anda")
								</h4>
								<p>Digunakan untuk membuat query anda sendiri , menerima 1 (satu) parameter, <code>( "query anda" )</code> di isi query yang ingin anda gunakan.

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
									checkSama($list, $loopingData)
								</h4>
								<p>Digunakan untuk mendapatkan nilai dari <b>tabel Foreign</b>. Fungsi ini akan sangat berguna saat edit data, karena fungsi ini otomatis akan menampilkan option yang berkaitan dengan data yang akan kita edit, menerima 2 (dua) parameter
									, dimana parameter pertama <code>( $list )</code> di isi dengan nama kolom yang berelasi di kolom Foreign ,misal : <code>'kelas_id'</code>, parameter kedua <code>( $loopingData )</code> di isi dengan nama kolom yang berisi data yang berkaintan dengan tabel <b>Primary</b>.

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
									notif($query, $table, $msg)
								</h4>
								<p>Digunakan untuk membuat notifikasi yang hanya akan berjalan ketika <b>berhasil</b>, menerima 3 (tiga) parameter
									, dimana parameter pertama <code>( $query )</code> di isi dengan query anda, parameter kedua <code>( $table )</code> di isi dengan nama tabel yang di gunakan, dan parameter ketiga <code>( "$msg" )</code> di isi dengan <b>pesan</b> yang di tampilkan ketika berhasil.

								</p>
							</div>
							<!--//content-->
						</div>
						<!--//callout-block-->

					</section>
					<!--//section-->

					<section class="docs-section" id="item-1-3">
						<h2 class="section-heading">Menu Sidebar</h2>
						<p>Berikut jika anda ingin mengatur konfigurasi sidebar</p>
						<h5>Lokasi file :</h5>
						<code>views/layouts/template-menu.php</code>
						<div class="docs-code-block">
							<pre class="shadow-lg rounded"><code class=""><span style="color:#3498db">&lt;?php </span>
							
   <span>$automaticCreateMenu</span> <span style="color:#3498db">     =</span> <span style="color:#7ed6df">true</span>;
   <span>include 'automaticMenu.php';</span>

<span style="color:#3498db">?&gt; </span>
							</code></pre>
						</div>
						<h5>Penjelasan : </h5>
						<ul>
							<li><strong class="me-1">$automaticCreateMenu</strong> <code>Jika diubah menjadi true, maka fitur pembuatan menu otomatis akan aktif.</code></li>
							<li><strong class="me-1">include 'automaticMenu.php'</strong> <code>Pemanggilan sistem perulangan (looping) menu otomatis.</code></li>
						</ul><br>
						<h2 class="section-heading">Kreasi menu sendiri</h2>
						<p>
							Jika anda mempunyai ide untuk membuat menu sendiri<br>
							anda bisa merubah <strong>$automaticCreateMenu</strong> menjadi <strong>false</strong>
						</p>
						<h5>Lokasi file :</h5>
						<code>views/layouts/template-menu.php</code>
						<div class="docs-code-block">
							<pre class="shadow-lg rounded"><code class=""><span style="color:#3498db">&lt;?php </span>
							
   <span>$automaticCreateMenu</span> <span style="color:#3498db">     =</span> <span style="color:#7ed6df">false</span>;
   <span>include 'automaticMenu.php';</span>

<span style="color:#3498db">?&gt; </span>
							</code></pre>
						</div>
						<p>Kemudian tambahkan kode seperti ini dibawah syntax <strong>?&gt;</strong></p>
						<div class="docs-code-block">
							<pre class="shadow-lg rounded"><code class="">
<span>&lt;</span><span style="color:#d0666f">a</span> <span>href='../nama_folder/data.php' class='nav-link &lt;?= $url[3] == 'nama_folder' ? 'active' : ''; ?&gt; '&gt;</span>
	<span>&lt;i class='far fa-circle nav-icon'>&lt;/i></span>
	<span>&lt;p></span>Nama Menu<span>&lt;/p></span>
<span>&lt;/a></span>
							</code></pre>
						</div>
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