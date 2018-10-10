function grupos() {
    var cantidad = document.getElementById('cant_grupos');
    //for (var i = 0; i < 20; i++) {
    var formulario1 = document.getElementById('formGrupo1');
    var formulario2 = document.getElementById('formGrupo2');
    var formulario3 = document.getElementById('formGrupo3');
    var formulario4 = document.getElementById('formGrupo4');
    var formulario5 = document.getElementById('formGrupo5');
    var formulario10 = document.getElementById('formGrupo10');
    var formulario15 = document.getElementById('formGrupo15');

    switch (cantidad.selectedIndex) {
        case 1:
            formulario1.style.display = 'block';
            formulario2.style.display = 'none';
            formulario3.style.display = 'none';
            formulario4.style.display = 'none';
            formulario5.style.display = 'none';
            formulario10.style.display = 'none';
            break;

        case 2:
            formulario2.style.display = 'block';
            formulario1.style.display = 'none';
            formulario3.style.display = 'none';
            formulario4.style.display = 'none';
            formulario5.style.display = 'none';
            formulario10.style.display = 'none';
            break;
        case 3:
            formulario3.style.display = 'block';
            formulario1.style.display = 'none';
            formulario2.style.display = 'none';
            formulario4.style.display = 'none';
            formulario5.style.display = 'none';
            formulario10.style.display = 'none';
            break;
        case 4:
            formulario4.style.display = 'block';
            formulario1.style.display = 'none';
            formulario2.style.display = 'none';
            formulario3.style.display = 'none';
            formulario5.style.display = 'none';
            formulario10.style.display = 'none';
            break;
        case 5:
            formulario5.style.display = 'block';
            formulario1.style.display = 'none';
            formulario2.style.display = 'none';
            formulario3.style.display = 'none';
            formulario4.style.display = 'none';
            formulario10.style.display = 'none';
            break;
        case 6:
            formulario10.style.display = 'block';
            formulario1.style.display = 'none';
            formulario2.style.display = 'none';
            formulario3.style.display = 'none';
            formulario4.style.display = 'none';
            formulario5.style.display = 'none';
            break;
    }
}