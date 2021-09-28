<?php
   
   function store($request)
   {
      
      Query::insert('kota',[

            $request->nama

      ])->view('kota/data');

   }

   function destroy($request, $id)
   {
      Query::delete('kota',$id)->view('kota/data');
   }