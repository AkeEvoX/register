$(document).ready(function(){
	
	//alert('hello validatetor') ;
	
});

/* set default validator */
$.validator.setDefaults ({
	
	highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
	
});

$('#frmRegister').validate({
	
	rules:{
		InputFirstName : { required:false } 
		,InputLastName : { required:false }
		,InputAge : {	 required:false ,number:true }
		,InputPhone : { required:false ,number:true }
		,InputPhoneEmer : { required:false ,number:true }
		,InputAddress : { required:false }
		,InputEmail: { required:false ,email:true }
		,InputDisease : { required:false }

	}
	,messages:{
		// #customize message error 
		// element : { parameter: "",parameter : ""}
	}
	,submitHandler:function(form){
		

		try{

			$form = $(form);
			$inputs = $form.find("input ,select ,button ,textarea");
			var serializeData = $form.serialize();


			$.ajax({
				url:'process/register.php?rdm=' + new Date().getMilliseconds()
				,type:'post'
				,dataType:'json'
				,data : serializeData
				,success:function(data){

					console.log(data);
					
					alert('request register success =>' + data.result );
					
				}
				,error:function(xhr,status,err){
					alert('service error : ' + err.message);
				}
			});
		}
		catch(err)
		{
			alert('service unvaliable : ' + err.description);
		}


	}

});


/*

#override message by element

messages: {
    firstname: "Enter your firstname",
    lastname: "Enter your lastname",
    username: {
        required: "Enter a username",
        minlength: jQuery.format("Enter at least {0} characters"),
        remote: jQuery.format("{0} is already in use")
    }
}
*/