 $(document).ready(function(){
            setTimeout(function() {
               $('.alert-popup').fadeOut(1500);
            }, 1000);
            $('.alert-popup').click(function(){
                $(this).fadeOut(3000);
            });
            
  });