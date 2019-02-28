$('#excel_file').on('change',function(){
   
    var fileName = $('#excel_file').val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', "");
    $('.custom-file-label').text(cleanFileName);
    //...........................................................................................
    if(this.files[0])
        {
          //VALIDACION
          var tipo = this.files[0].type;
          var ext = fileName.split('.').pop();
          var fileSize = this.files[0].size;
          
          console.log(fileSize);
          if(ext == "xlsx"|| ext =="xls")
          {
            if(fileSize < 10000000){
                $('input[name=file_excel]').removeClass('is-invalid');
				$('input[name=file_excel]').addClass('is-valid');
                $('input[name=file_excel]').next().addClass('invalid-feedback').text(" ");
                $('#buttonSubmit').removeAttr("disabled");
                
               
            }else{
                $('input[name=file_excel]').addClass('is-invalid').next().addClass('invalid-feedback').text("El archivo no debe superar los 10MB.");;
                $('#buttonSubmit').attr("disabled","disabled"); 
            }
          }else {
            $('input[name=file_excel]').addClass('is-invalid').next().addClass('invalid-feedback').text("El archivo debe ser excel.");;
            $('#buttonSubmit').attr("disabled","disabled");
          }
        
          
        }else{
            $('input[name=file_excel]').addClass('is-invalid').next().addClass('invalid-feedback').text("Este campo es obligatorio");;
            $('#buttonSubmit').attr("disabled","disabled");
         
        }


});
