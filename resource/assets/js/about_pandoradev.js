$(".text-wa").on('input', function(){
    let text_wa = "https://wa.me/6289691159186/?text="+$(this).val();
    $(".button-wa").attr("href", text_wa);
});