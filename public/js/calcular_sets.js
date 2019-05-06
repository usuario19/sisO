$("#set_jugados").change(function(){
	var set_jugados = $(':input[name=set_jugados]').val();
	var set_ganados1=0;
	var set_ganados2=0;
	//console.log(set_jugados);
	for (let i = 1; i <= set_jugados; i++) {
		var club1= parseInt($("#set"+i+"1").val());
		var club2= parseInt($("#set"+i+"2").val());
		if (club1 !== null  && club2 !== null) {
			console.log("Club1"+club1);
			console.log("Club2"+club2);
			console.log(club1+club2);
			if (club1 > club2) {
				set_ganados1+=1;
				$("#set"+i+"1").css('background','#D4EDDA');
				$("#set"+i+"2").css('background','#FFFFFF');
				//console.log(set_ganados1);
			}else
			{	
				if(club2 > club1) 
				{
					set_ganados2+=1;
					$("#set"+i+"1").css('background','#FFFFFF');
					$("#set"+i+"2").css('background','#D4EDDA');
				}

			}
		}
		
	}
	$('#set_ganados1').val(set_ganados1);
	$('#set_ganados2').val(set_ganados2);
});
$("#set11").change(function(){
	var set_jugados = $(':input[name=set_jugados]').val();
	var set_ganados1=0;
	var set_ganados2=0;
	//console.log(set_jugados);
	for (let i = 1; i <= set_jugados; i++) {
		var club1= parseInt($("#set"+i+"1").val());
		var club2= parseInt($("#set"+i+"2").val());
		if (club1 !== null  && club2 !== null) {
			/* console.log("Club1"+club1);
			console.log("Club2"+club2);
			console.log(club1+club2); */
			if (club1 > club2) {
				set_ganados1+=1;
				$("#set"+i+"1").css('background','#D4EDDA');
				$("#set"+i+"2").css('background','#FFFFFF');
				//console.log(set_ganados1);
			}else
			{	
				if(club2 > club1) 
				{
					set_ganados2+=1;
					$("#set"+i+"1").css('background','#FFFFFF');
					$("#set"+i+"2").css('background','#D4EDDA');
				}

			}
		}
		
	}
	$('#set_ganados1').val(set_ganados1);
	$('#set_ganados2').val(set_ganados2);
});
$("#set21").change(function(){
	var set_jugados = $(':input[name=set_jugados]').val();
	var set_ganados1=0;
	var set_ganados2=0;
	//console.log(set_jugados);
	for (let i = 1; i <= set_jugados; i++) {
		var club1= parseInt($("#set"+i+"1").val());
		var club2= parseInt($("#set"+i+"2").val());
		if (club1 !== null  && club2 !== null) {
			/* console.log("Club1"+club1);
			console.log("Club2"+club2);
			console.log(club1+club2); */
			if (club1 > club2) {
				set_ganados1+=1;
				$("#set"+i+"1").css('background','#D4EDDA');
				$("#set"+i+"2").css('background','#FFFFFF');
				//console.log(set_ganados1);
			}else
			{	
				if(club2 > club1) 
				{
					set_ganados2+=1;
					$("#set"+i+"1").css('background','#FFFFFF');
					$("#set"+i+"2").css('background','#D4EDDA');
				}

			}
		}
		
	}
	$('#set_ganados1').val(set_ganados1);
	$('#set_ganados2').val(set_ganados2);
});
$("#set31").change(function(){
	var set_jugados = $(':input[name=set_jugados]').val();
	var set_ganados1=0;
	var set_ganados2=0;
	//console.log(set_jugados);
	for (let i = 1; i <= set_jugados; i++) {
		var club1= parseInt($("#set"+i+"1").val());
		var club2= parseInt($("#set"+i+"2").val());
		if (club1 !== null  && club2 !== null) {
			/* console.log("Club1"+club1);
			console.log("Club2"+club2);
			console.log(club1+club2); */
			if (club1 > club2) {
				set_ganados1+=1;
				$("#set"+i+"1").css('background','#D4EDDA');
				$("#set"+i+"2").css('background','#FFFFFF');
				//console.log(set_ganados1);
			}else
			{	
				if(club2 > club1) 
				{
					set_ganados2+=1;
					$("#set"+i+"1").css('background','#FFFFFF');
					$("#set"+i+"2").css('background','#D4EDDA');
				}

			}
		}
		
	}
	$('#set_ganados1').val(set_ganados1);
	$('#set_ganados2').val(set_ganados2);
});
$("#set41").change(function(){
	var set_jugados = $(':input[name=set_jugados]').val();
	var set_ganados1=0;
	var set_ganados2=0;
	//console.log(set_jugados);
	for (let i = 1; i <= set_jugados; i++) {
		var club1= parseInt($("#set"+i+"1").val());
		var club2= parseInt($("#set"+i+"2").val());
		if (club1 !== null  && club2 !== null) {
			/* console.log("Club1"+club1);
			console.log("Club2"+club2);
			console.log(club1+club2); */
			if (club1 > club2) {
				set_ganados1+=1;
				$("#set"+i+"1").css('background','#D4EDDA');
				$("#set"+i+"2").css('background','#FFFFFF');
				//console.log(set_ganados1);
			}else
			{	
				if(club2 > club1) 
				{
					set_ganados2+=1;
					$("#set"+i+"1").css('background','#FFFFFF');
					$("#set"+i+"2").css('background','#D4EDDA');
				}

			}
		}
		
	}
	$('#set_ganados1').val(set_ganados1);
	$('#set_ganados2').val(set_ganados2);
});
$("#set51").change(function(){
	var set_jugados = $(':input[name=set_jugados]').val();
	var set_ganados1=0;
	var set_ganados2=0;
	//console.log(set_jugados);
	for (let i = 1; i <= set_jugados; i++) {
		var club1= parseInt($("#set"+i+"1").val());
		var club2= parseInt($("#set"+i+"2").val());
		if (club1 !== null  && club2 !== null) {
			/* console.log("Club1"+club1);
			console.log("Club2"+club2);
			console.log(club1+club2); */
			if (club1 > club2) {
				set_ganados1+=1;
				$("#set"+i+"1").css('background','#D4EDDA');
				$("#set"+i+"2").css('background','#FFFFFF');
				//console.log(set_ganados1);
			}else
			{	
				if(club2 > club1) 
				{
					set_ganados2+=1;
					$("#set"+i+"1").css('background','#FFFFFF');
					$("#set"+i+"2").css('background','#D4EDDA');
				}

			}
		}
		
	}
	$('#set_ganados1').val(set_ganados1);
	$('#set_ganados2').val(set_ganados2);
});
$("#set12").change(function(){
	var set_jugados = $(':input[name=set_jugados]').val();
	var set_ganados1=0;
	var set_ganados2=0;
	//console.log(set_jugados);
	for (let i = 1; i <= set_jugados; i++) {
		var club1= parseInt($("#set"+i+"1").val());
		var club2= parseInt($("#set"+i+"2").val());
		if (club1 !== null  && club2 !== null) {
			/* console.log("Club1"+club1);
			console.log("Club2"+club2);
			console.log(club1+club2); */
			if (club1 > club2) {
				set_ganados1+=1;
				$("#set"+i+"1").css('background','#D4EDDA');
				$("#set"+i+"2").css('background','#FFFFFF');
				//console.log(set_ganados1);
			}else
			{	
				if(club2 > club1) 
				{
					set_ganados2+=1;
					$("#set"+i+"1").css('background','#FFFFFF');
					$("#set"+i+"2").css('background','#D4EDDA');
				}

			}
		}
		
	}
	$('#set_ganados1').val(set_ganados1);
	$('#set_ganados2').val(set_ganados2);
});
$("#set22").change(function(){
	var set_jugados = $(':input[name=set_jugados]').val();
	var set_ganados1=0;
	var set_ganados2=0;
	//console.log(set_jugados);
	for (let i = 1; i <= set_jugados; i++) {
		var club1= parseInt($("#set"+i+"1").val());
		var club2= parseInt($("#set"+i+"2").val());
		if (club1 !== null  && club2 !== null) {
			/* console.log("Club1"+club1);
			console.log("Club2"+club2);
			console.log(club1+club2); */
			if (club1 > club2) {
				set_ganados1+=1;
				$("#set"+i+"1").css('background','#D4EDDA');
				$("#set"+i+"2").css('background','#FFFFFF');
				//console.log(set_ganados1);
			}else
			{	
				if(club2 > club1) 
				{
					set_ganados2+=1;
					$("#set"+i+"1").css('background','#FFFFFF');
					$("#set"+i+"2").css('background','#D4EDDA');
				}

			}
		}
		
	}
	$('#set_ganados1').val(set_ganados1);
	$('#set_ganados2').val(set_ganados2);
});
$("#set32").change(function(){
	var set_jugados = $(':input[name=set_jugados]').val();
	var set_ganados1=0;
	var set_ganados2=0;
	//console.log(set_jugados);
	for (let i = 1; i <= set_jugados; i++) {
		var club1= parseInt($("#set"+i+"1").val());
		var club2= parseInt($("#set"+i+"2").val());
		if (club1 !== null  && club2 !== null) {
			/* console.log("Club1"+club1);
			console.log("Club2"+club2);
			console.log(club1+club2); */
			if (club1 > club2) {
				set_ganados1+=1;
				$("#set"+i+"1").css('background','#D4EDDA');
				$("#set"+i+"2").css('background','#FFFFFF');
				//console.log(set_ganados1);
			}else
			{	
				if(club2 > club1) 
				{
					set_ganados2+=1;
					$("#set"+i+"1").css('background','#FFFFFF');
					$("#set"+i+"2").css('background','#D4EDDA');
				}

			}
		}
		
	}
	$('#set_ganados1').val(set_ganados1);
	$('#set_ganados2').val(set_ganados2);
});
$("#set42").change(function(){
	var set_jugados = $(':input[name=set_jugados]').val();
	var set_ganados1=0;
	var set_ganados2=0;
	//console.log(set_jugados);
	for (let i = 1; i <= set_jugados; i++) {
		var club1= parseInt($("#set"+i+"1").val());
		var club2= parseInt($("#set"+i+"2").val());
		if (club1 !== null  && club2 !== null) {
			/* console.log("Club1"+club1);
			console.log("Club2"+club2);
			console.log(club1+club2); */
			if (club1 > club2) {
				set_ganados1+=1;
				$("#set"+i+"1").css('background','#D4EDDA');
				$("#set"+i+"2").css('background','#FFFFFF');
				//console.log(set_ganados1);
			}else
			{	
				if(club2 > club1){
					set_ganados2+=1;
					$("#set"+i+"1").css('background','#FFFFFF');
					$("#set"+i+"2").css('background','#D4EDDA');
				}

			}
		}
		
	}
	$('#set_ganados1').val(set_ganados1);
	$('#set_ganados2').val(set_ganados2);
});
$("#set52").change(function(){
	var set_jugados = $(':input[name=set_jugados]').val();
	var set_ganados1=0;
	var set_ganados2=0;
	//console.log(set_jugados);
	for (let i = 1; i <= set_jugados; i++) {
		var club1= parseInt($("#set"+i+"1").val());
		var club2= parseInt($("#set"+i+"2").val());
		if (club1 !== null  && club2 !== null) {
			/* console.log("Club1"+club1);
			console.log("Club2"+club2);
			console.log(club1+club2); */
			if (club1 > club2) {
				set_ganados1+=1;
				$("#set"+i+"1").css('background','#D4EDDA');
				$("#set"+i+"2").css('background','#FFFFFF');
				//console.log(set_ganados1);
			}else
			{	
				if(club2 > club1) 
				{
					set_ganados2+=1;
					$("#set"+i+"1").css('background','#FFFFFF');
					$("#set"+i+"2").css('background','#D4EDDA');
				}

			}
		}
		
	}
	$('#set_ganados1').val(set_ganados1);
	$('#set_ganados2').val(set_ganados2);
});
$('#reg_set:input').find(':input').change(function(){
	if((this).val() ==25)
	{
		this.css('background','green');
	}else{
		this.css('background','#FFFFFF');
	}
})