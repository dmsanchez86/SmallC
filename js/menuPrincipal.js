
$(document).ready(function() 
{
    
  
  $('.treeview-menu li').click(function () 
    {
        var url = $(this).attr('rel');
        var elementos = $('.li__');
        var size = elementos.size();
        $('#iframe').attr('src', url);
        
      for(var i = 1 ; i<= size;i++)
      {
      	if("_li"+i == this.id)
      	{
           $(this).attr('class', "active");
            //$('#_btn_ocul').click();
      	}
      	else
      	{
           $("#_li"+i).attr('class', "");
      	}
      }
      
      
    });
      $('#_li1').click();

});