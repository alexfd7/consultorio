function open_close_menu(valor,url){
	
      if(valor==1){            
        $('body').addClass('sidebar-mini layout-fixed'); 
      }else{
        
        $('body').addClass('sidebar-mini layout-fixed sidebar-collapse');                       
      }


      $( "#pushmenu" ).on( "click", function() {
            
            var open = $('body').hasClass('sidebar-collapse');

             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             
             $.ajax({
                url: url,
                method: 'post',
                data: {open: (open ? 1 : 0)},
                success: function(result){
                
                  
                }});
              
      });   

}
