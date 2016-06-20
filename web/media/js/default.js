$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};

$(document).ready( function() {
   //Inititializations here
   
   var x = 0;
   $('.minipage ul li').each( function() {
      ( x== 0) ? $(this).addClass('show') : $(this).addClass('hide');
      x++;
   });
   
   //Attach lightbox functions
   $("a img").each( function() {
      
      if( $(this).parent().hasAttr('href') ){
         if ($(this).parent().attr('href').match(/(jpg|jpeg|png|gif)/)){
            $(this).parent().attr('rel', 'lightbox-ba');
            $(this).parent().addClass('beforeafter');
            $(this).parent().attr('title', $(this).attr('alt'));
         }
      }
   })
   //this was serperated to make sure they all get put into the same grouping
   $('a.beforeafter').lightbox();
   
   setInterval( 'swapMiniPage()', 6000 );
          
});


var current = 0;

function swapMiniPage(){
   var max = $('.minipage ul li').length;
   //console.log(max);
   
   $('.minipage ul li.show').slideToggle( 300, function(){
      $(this).removeClass('show');
      
      if( current < max ){
         $(this).next('li').addClass('show').slideToggle(300);
      }else{
         $('.minipage ul li:first').addClass('show').slideToggle(300);
         current = 0;
      }
      
   });
   
   current++;
}


function echo(object){
    var str = '';
    var c = 0;
    for (var prop in object) {
        str += prop;
        str += (c % 2 == 0) ? " : " : " | ";
        c++;
    }
    alert(str);
}