$('.habilitar').on('click', function(){
	var id = $(this).attr('id');
	console.log(id);
if($(this).prop('checked')== true)
{
	$('div.'+id).show();
}else{
	$('div.'+id).hide();
}
});