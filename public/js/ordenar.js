$("#ordenar_ciudad").click(function (event) {
    $("#ciudad").show();
    $("#nombre").hide();
});
$("#ordenar_nombre").click(function (event) {
    $("#ciudad").hide();
    $("#nombre").show();
});