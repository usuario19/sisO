$(".btn_cerrar").on("click",function(event){ 
    /* $(".btn_cerrar").parent('.modal').css('background','red'); */
    /* console.log('btn_cerrar');
    console.log($(this).parents('form')); */
    $(this).parents('form').trigger("reset");

    $.each($(this).parents('form').find(':input'),function(){
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    });
     
});