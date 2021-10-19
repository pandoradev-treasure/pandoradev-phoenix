<?php

    function TambahData($request)
    {

        query()->insert('nama_table',[

            $request->name_inputan1, /*isikan sebagai isi atribut name elemen input/select dll...*/
            $request->name_inputan2 /*isikan sebagai isi atribut name elemen input/select dll...*/

        ])->view('backend/folder/file','pesan jika berhasil');

    }

    function EditData($request)
    {

        $variable = query()->table('nama_table')->where('id',$request->id)->single();

        view('backend/folder/file', compact('variable'));

    }

    function UpdateData($request)
    {

        query()->update('nama_table',[

            'column' => $request->name_input,
            'column2' => $request->name_input2,

            /*
            *column adalah nama kolom table anda
            *kemudian name_input adalah atribut name dari elemen input/select dll...
            */

        ], $request->id)->view('backend/folder/file','pesan jika berhasil');

    }

    function HapusData($request)
    {

        query()->delete('nama_table', $request->id)->view('backend/folder/file','pesan jika berhasil');

    }

    /*[PandoraCode - Phoenix - Controller]*/
    