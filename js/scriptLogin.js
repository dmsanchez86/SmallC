$(document).ready(function()
{
     var pathname = window.location.pathname; // Returns path only
        if(pathname.indexOf('/error') >-1)
        {
             $(".form-group").toggleClass('has-error'); 
        }
 
                   
	$("#btnLogin").click(function()
        {

		if(!validar())
                {
                       $(".form-group").toggleClass('has-error'); 
			return;
		}
                else 
                {
                    $('#formLogin').submit();
                }
	});


	$('#txtPass').bind('keypress', loginSubmit);
	$('#txtName').bind('keypress', loginSubmit);

});

function loginSubmit(e)
{
	var code = (e.keyCode ? e.keyCode : e.which);
	if(code == 13) 
        { 
		$('#formLogin').submit();
	}
}

function validar()
{
        if($('#txtPass').val() ==="" || $('#txtPass').val().length <3 ||  $('#txtName').val() ==="" ||  $('#txtName').val().length <3)
        {
            return false;
        } 
        else
        {
          return true;  
        }
	
}