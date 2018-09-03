
    // RESALTAR LAS FILAS AL PASAR EL MOUSE
    function ResaltarFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = '#C0C0C0';
    }
     
    // RESTABLECER EL FONDO DE LAS FILAS AL QUITAR EL FOCO
    function RestablecerFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = '#FFFFFF';
    }
     
    // CONVERTIR LAS FILAS EN LINKS
    function CrearEnlace(url) {
        location.href=url;
    }
