/**
 * @author Paulo Victor
 */

$(document).ready(function(){
	$("#data").mask("99/99/9999");
	
	jQuery.validator.addMethod("dateBR", function(value) {
	    
		    if(value.length!=10) return false;
		    // verificando data
		    var data        = value;
		    var dia         = data.substr(0,2);
		    var barra1      = data.substr(2,1);
		    var mes         = data.substr(3,2);
		    var barra2      = data.substr(5,1);
		    var ano         = data.substr(6,4);
		    if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)
		    	return false;
		    if((mes==4||mes==6||mes==9||mes==11) && dia==31)
		    	return false;
		    if(mes==2 && (dia>29||(dia==29 && ano%4!=0)))
		    	return false;
		    if(ano < 1900 || ano >2013)
		    	return false;
	    return true;
});	

	$('#id_ajax').validate({
	
		rules: {  
                nome: { 
                	required: true,
                	minlength: 2 
                	},
	              email:{
	              	required:true,
	              	email:true
	              },
	              senha:{
	              	required:true,
	              	minlength:8
	              },
	              data:{
	              	required: true,
	              	dateBR:true
	              }
	              ,quantidade:{
	              	required:true,
	              	digits:true
	              },
	              valor:{
	              	required: true,
	              	number: true
	              }
	              
	                
             },
			  messages:{
			  	nome: { 
			  		required: 'Preencha o campo nome',
			  		minlength: 'Campo nome não pode ficar vazio'
			  	},
			  	email:{
			  		required: 'Preencha o campo email',
			  		email: 'Digite um email válido'
			  	},
			  	senha:{
			  		required: 'Preencha o campo senha',
			  		minlength:' No mínimo 8 caracteres'
			  	},
			  	data:{
			  		required: 'Preencha o campo data',
			  		dateBR: 'Digite uma data válida'
			  	},
			  	quantidade :{
			  		required: 'Preencha o campo quantidade',
			  		digits:'Digite números'
			  	},
			  	valor:{
			  		required: 'Preencha o campo valor',
			  		number: 'Digite um número válido'
			  	}
			  	
			  },
			  highlight: function(element) {
			    $(element).closest('.control-group').removeClass('success').addClass('error');
			  },
			 success: function(element) {
			    element
			    
			    .closest('.control-group').removeClass('error').addClass('success');
			  }
			
	});
});