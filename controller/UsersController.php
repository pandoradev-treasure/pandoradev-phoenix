<?php
            
    function TambahData($request)
    {
        query()->insert('users',[

            $request->nama,
            $request->email,
            $request->password

        ])->view('backend/users/data','Berhasil Ditambahkan!');

    }

    function EditData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk persiapan edit data
        */
				$data = query()->table('users')->where('id',$request->id)->single();
				view('backend/users/form-edit',compact('data'));

    }

    function UpdateData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk update data
        */
				query()->update('users',[
						'nama' => $request->nama,
						'email' => $request->email,
						'password' => $request->password
				],$request->id)->view('backend/users/data','Berhasil DiUpdate');

    }

    function HapusData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk delete data
        */
				query()->delete('users',$request->id)->view('backend/users/data','Berhasil DiUpdate');


    }