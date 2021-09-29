<?php

    function store($request)
    {
        Query::insert('kategori',[
            $request->nama_kategori
        ])->view('kategori/data');
    }