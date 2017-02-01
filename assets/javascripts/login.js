$('document').ready(function(){ 
    $("#login-form").validate({ /* validations inputs */
        rules:{
            password: {
                required: true,
            },
            user: {
                required: true,
            },
	},
        messages:{
           password: "Por favor ingrese su contraseña",
           user: "Por favor ingrese su usuario",
       },
	   submitHandler: submitForm	
       });

    function submitForm(){  /* login submit */
        var data = $("#login-form").serialize();
        $.ajax({
            type : 'POST',
            url  : 'loginProcess.php',
            data : data,
            
            beforeSend: function(){ 
                $("#error").fadeOut();
                $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Enviando');
            },
            success :  function(response){      
                if(response=="ok"){
                    $("#btn-login").html('<img src="assets/images/btn-ajax-loader.gif" /> &nbsp; Enviando');
                    setTimeout(' window.location.href = "dashboard.php"; ',4000);
                }
                else{
                    $("#error").fadeIn(1000, function(){      
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
                        $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Enviando');
                    });
                }
            }
        });
        return false;
    }
    /* login submit */
});