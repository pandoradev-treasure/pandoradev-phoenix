<?php
            
    function TambahData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk tambah data, berikut contoh kode insert :
        */
        query()->insert('kategori',[

            $request->nama

        ])->view('backend/kategori/data','Berhasil Ditambahkan!');

    }

    function EditData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk persiapan edit data
        */
				$data = query()->table('kategori',$request->id)->single();
				view('backend/kategori/form-edit',compact('data'));

    }

    function UpdateData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk update data
        */
				query()->update('kategori',[
						'nama' => $request->nama
				],$request->id)->view('backend/kategori/data','Berhasil DiUpdate!');

    }

    function HapusData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk delete data
        */
				query()->delete('kategori',$request->id)->view('backend/kategori/data','Berhasil Dihapus');
    }