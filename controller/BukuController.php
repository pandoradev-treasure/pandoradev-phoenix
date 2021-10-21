<?php

    function TambahData($request)
    {				
				
				$namafile = files('cover'); /* "cover" adalah name inputan */
						
				move('cover', asset('uploads/'.$namafile));
				
			  query()->insert('buku',[

						$request->judul,
						$request->deskripsi,
						$namafile

				])->view('backend/buku/data','Berhasil ditambahkan!');
				
    }

    function EditData($request)
    {

        $variable = query()->table('buku')->where('id',$request->id)->single();

        view('backend/folder/file', compact('variable'));

    }

    function UpdateData($request)
    {

        query()->update('buku',[

            'column' => $request->name_input,
            'column2' => $request->name_input2,

            /*
            *column adalah nama kolom table anda
            *kemudian name_input adalah atribut name dari elemen input/select dll...
            */

        ], $request->id)->view('backend/buku/data','Berhasil!');

    }

    function HapusData($request)
    {
				$dataBuku = query()->table('buku')->where('id', $request->id)->single();
				
				hapus('uploads/'.$dataBuku->cover);
					
        query()->delete('buku', $request->id)->view('backend/buku/data','Berhasil!');

    }

    /*[PandoraCode - Phoenix - Controller]*/
    