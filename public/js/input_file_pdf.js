$('.file_reg').on('change',function(event){
   
  var fileName = $('#'+event.target.id).val();
  var cleanFileName = fileName.replace('C:\\fakepath\\', "");
  $(this).siblings('label.custom-file-label').text(cleanFileName);
  //...........................................................................................
  /* if(this.files[0])
      {
        //VALIDACION
        console.log('entro1');
        var tipo = this.files[0].type;
        var ext = fileName.split('.').pop();
        var fileSize = this.files[0].size;
        
        if(ext == "xlsx"|| ext =="xls")
        {
          if(fileSize < 10000000){
              $('input[name=file_excel]').removeClass('is-invalid');
              $('input[name=file_excel]').addClass('is-valid');
              $('input[name=file_excel]').next().addClass('invalid-feedback').text(" ");
              $('#buttonSubmit').removeAttr("disabled");
          }else{
              $('input[name=file_excel]').addClass('is-invalid').next().addClass('invalid-feedback').text("El archivo no debe superar los 10MB.");
              $('#buttonSubmit').attr("disabled","disabled"); 
          }
        }else {
          console.log('entro2');
          $('input[name=file_excel]').addClass('is-invalid').next().addClass('invalid-feedback').text("El archivo debe ser excel.");
          $('#buttonSubmit').attr("disabled","disabled");
        }
      }else{
          $('input[name=file_excel]').addClass('is-invalid').next().addClass('invalid-feedback').text("Este campo es obligatorio");
          $('#buttonSubmit').attr("disabled","disabled");
      }

 */
});
$(".btn_cerrar_modal_import").on("click",function(event){ 
/* $(".btn_cerrar").parent('.modal').css('background','red'); */
$(this).parents('form').trigger("reset");
$(this).parents('form').find('label.custom-file-label').text("Seleccionar Archivo")
$.each($(this).parents('form').find(':input'),function(){
    $(this).removeClass('is-invalid');
    $(this).removeClass('is-valid');
});
 
});