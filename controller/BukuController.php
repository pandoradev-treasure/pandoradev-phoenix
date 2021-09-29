<?php

    function store($request)
    {
        
        Query::insert('buku', [
            $request->judul,
            $request->deskripsi, 
            $request->deskripsi_singkat, 
            $request->penulis, 
            $request->kategori_id
        ])->view('buku/data');

    }

    function destroy($request, $id)
    {
        Query::delete('buku', $id)->view('buku/data');
    }

    function edit($request, $id)
    {
        $kategori  = Query::select('kategori');

        $dataBuku  = Query::single("buku", $id);

        view('buku/form-edit', compact('dataBuku','kategori'));
        
    }

    function update($request, $id)
    {
        Query::update('buku',[

            'judul'             => $request->judul,
            'deskripsi'         => $request->deskripsi,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'penulis'           => $request->penulis,
            'kategori_id'       => $request->kategori_id,
            
        ],$id)->view('buku/data');
    }

    function create()
    {
        $kategori = Query::select('kategori');

        view('buku/form', compact('kategori'));
    }