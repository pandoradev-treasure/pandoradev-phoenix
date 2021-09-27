<?php
   
   function store($request)
   {

      Query::insert('kota',[$request->lorem])->view('siswa/form');

   }