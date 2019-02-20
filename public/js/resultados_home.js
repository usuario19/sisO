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

$('#fecha').on('change',function(event){
    var fecha_formato = $('#fecha').val();
    formato_fecha(fecha_formato);
});

$('#tomorrow').click(function(event){

    
    var cadena = $('#fecha').val();
    var res = cadena.split("-");
    var fecha_input = res[1]+'/'+res[2]+'/'+res[0];

    console.log(fecha_input);
    var fecha = new Date(fecha_input);
    var dias = 1;
    fecha.setDate(fecha.getDate() + dias);
    console.info(fecha);
    var fecha_formato = fecha.getFullYear() + '-' + ("0" + (fecha.getMonth() + 1)).slice(-2) + '-' + ("0" + fecha.getDate()).slice(-2);
    formato_fecha(fecha_formato);
    $("#fecha").val(fecha_formato);
});

$('#yesterday').click(function(event){

    
    var cadena = $('#fecha').val();
    var res = cadena.split("-");
    var fecha_input = res[1]+'/'+res[2]+'/'+res[0];

    console.log(fecha_input);
    var fecha = new Date(fecha_input);
    var dias = 1;
    fecha.setDate(fecha.getDate() - dias);
    console.info(fecha);
    var fecha_formato = fecha.getFullYear() + '-' + ("0" + (fecha.getMonth() + 1)).slice(-2) + '-' + ("0" + fecha.getDate()).slice(-2);
    formato_fecha(fecha_formato);

    $("#fecha").val(fecha_formato);
});


function formato_fecha(fecha){

    
    let dias = ["Domingo","Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
    let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    
    
    var res = fecha.split("-");
    var fecha_input = res[1]+'/'+res[2]+'/'+res[0];
    var fecha = new Date(fecha_input);
    var fechaNum = fecha.getDate();
    var mes_name = fecha.getMonth();

    var fecha_tittle = dias[fecha.getDay()] + ", " + fechaNum + " " + meses[mes_name] + " " + fecha.getFullYear();

    $('#fecha_title').text(fecha_tittle);
}
