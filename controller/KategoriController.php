<?php

    function store($request)
    {
        query()->insert('kategori',[
            $request->nama_kategori
        ])->view('kategori/data');
    }