<?php
            
    function TambahDatas($request)
    {

        query()->insert('kelas',[
							$request->nama
				])->view('backend/kelas/data','Berhasil Menambahkan Data!');

    }

    function EditData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk persiapan edit data
        */

    }

    function UpdateData($request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk update data
        */

    }

    function HapusData($request, $id)
    {
		
		query()->delete('kelas', $id)->view('backend/kelas/data',"Berhasil Menghapus Data!");

    }                                                                                                                                                                                                                                                                                