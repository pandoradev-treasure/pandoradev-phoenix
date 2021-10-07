<?php

    function store($request)
    {

        query()->insert('buku', [
            $request->judul,
            $request->deskripsi_singkat,
            $request->deskripsi,
            $request->penulis,
            $request->kategori_id
        ])->view('buku/data',"Berhasil Menambahkan Buku Dengan Judul $request->judul");

    }

    function destroy($request)
    {
        query()->delete('buku', $request->id)->view('buku/data',"Berhasil Dihapus");
    }

    function edit($request, $id)
    {
        
        $kategori  = query()->table('kategori')->get();

        $dataBuku  = query()->table('buku')->where('id', $id)->single();

        view('buku/form-edit', compact('dataBuku','kategori'));
        
    }

    function update($request, $id)
    {
        query()->update('buku',[

            'judul'             => $request->judul,
            'deskripsi'         => $request->deskripsi,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'penulis'           => $request->penulis,
            'kategori_id'       => $request->kategori_id,
            
        ],$id)->view('buku/data',"Berhasil Update !");
    }

    function create()
    {
        $kategori = query()->table('kategori')->get();

        view('buku/form', compact('kategori'));
    }                                                                                                                                                                                                                            