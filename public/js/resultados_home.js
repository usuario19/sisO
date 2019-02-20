$("#fecha").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: false,
    changeYear: false,
    yearRange: "c-150:c+30",
    showButtonPanel:true,
    beforeShow: function( input ) {
        setTimeout(function () {
            $(input).datepicker("widget").find(".ui-datepicker-close").hide();
            /* var clearButton = $(input ).datepicker( "widget" ).find( ".ui-datepicker-close" );
            clearButton.unbind("click").bind("click",function(){$.datepicker._clearDate( input );}); */
        }, 10 );
    }
});



$(".icon_fecha").click(function (event) {
    $("#fecha").focus();
});