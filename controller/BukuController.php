<?php

			function store($yusup){
					query()->insert('buku',[
							$yusup->judul,
							$yusup->deskripisi
					])->view("backend/buku/data","Berhasil Ditambahkan Cuy");
			}
			
			function delete($request, $id){
					
				global $host;
					
				$perintah = "DELETE FROM buku WHERE id = $id";
				$query = mysqli_query($host, $perintah);
					
				if(!$query){
						alert('Gagal cuk!','aasasas','error');
						view('backend/buku/data');
				}else{
					  alert('Berhasil','berhasil kok :) ','success');
						view('backend/buku/data');
				}
				
			}