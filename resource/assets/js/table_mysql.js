$(document).ready(function() {
    $(function () {
        $('*[title]').tooltip()
    });

    
    $('table > tbody > tr').each(function(key, val){
        var number = $(this).children('.number_table').html();
        last_number = key+1;
    });
    $(".total-table").val(last_number);

    $('.add-column').click(function(){
        $(".total-table").val(parseInt($(".total-table").val()) + 1);
    })

    $('body').on('click','.delete-column',function(){
        $(this).parents('tr').hide();
        
        var x = $(this).parents('tr').find('input.deleted').val("true");
        var x = $(this).parents('tr').find('td > .input-table').removeAttr("required");

        $(".total-table").val(parseInt($(".total-table").val()) - 1);
    });

    $("input[name='primary_key']").change(function(){
        $("input[name='primary_key']").val($(this).parents('tr').find("input.name_column").val());
    });
    
    $("input[name='auto_increment']").change(function(){
        $("input[name='auto_increment']").val($(this).parents('tr').find("input.name_column").val());
    });
});

