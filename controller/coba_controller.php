<?php
            
    function TambahData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk tambah data, berikut contoh kode insert :
        */
        query()->insert('coba',[

            $request->nama /*isikan sebagai name inputan*/

        ])->view('backend/coba/data','Berhasil Ditambahkan!');

    }

    function EditData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk persiapan edit data
        */

        $variable = query()->table('coba')->where('id',$request->id)->single();

        view('backend/coba/edit', compact('variable'));

    }

    function UpdateData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk update data
        */

        query()->update('table',[

            'column' => $request->name_input,
            'column2' => $request->name_input2,

        ], $request->id)->view('folder/file','pesan jika berhasil');

    }

    function HapusData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk delete data
        */

        query()->delete('table', $request->id)->view('folder/file','pesan jika berhasil');

    }