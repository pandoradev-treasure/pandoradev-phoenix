$(document).ready(function() {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    
    $('table > tbody > tr').each(function(key, val){
        var number = $(this).children('.number_table').html();
        last_number = key+1;
    });
    $(".total-table").val(last_number);

    $('.add-column').click(function(){
        var last_number;
        $('table > tbody > tr').each(function(key, val){
            var number = $(this).children('.number_table').html();
            last_number = key+1;
        });
        $(".total-table").val(last_number);
    })
});

