$('.tambah-detail').click(function(){
    var data  = "<tr>";
	      data += "<td><input name='penerbit[]' class='form-control'><td>";
	      data += "</tr>";
		
		$('tbody').append(data);
});