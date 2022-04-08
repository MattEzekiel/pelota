let boton = $('form').find(':submit');
// let input = document.getElementsByTagName('input');
if(boton[0] !== undefined){
    boton[0].addEventListener('submit',function (){
        let elemento = '<div class="d-flex justify-content-center">\n' +
            '  <div class="spinner-border text-primary" role="status">\n' +
            '    <span class="sr-only">Cargando...</span>\n' +
            '  </div>\n' +
            '</div>';
        $('form').append(elemento);
    })
}
