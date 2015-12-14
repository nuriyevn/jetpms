$(function() {

//jQuery time
   var current_fs, next_fs, previous_fs; //fieldsets
   var left, opacity, scale; //fieldset properties which we will animate
   var animating; //flag to prevent quick multi-click glitches
   var room_count = 0;
   var hostel_name = "";
   
   $(".next").click(function(){

     if ($(this).attr("id") === "step1_next")
     {
         
         room_count = $('[name="room_count"]').val();
         hostel_name = $('[name="hostel_name"]').val();
         
         var message = "";
         var invalid = false;

         if (!hostel_name.length)
         {
            message += "Hostel name is empty. ";
            invalid = true;
         }
         if (!room_count.length)
         {
            message += "Room count is empty. "
            invalid = true;
         }
         else if (parseInt(room_count, 10) < 1 || parseInt(room_count, 10) > 24)
         {
            message += "Room count must be between 1 and 42. ";
            invalid = true;
         }
         
         if (invalid)
            return false;
         else
         {
            var rooms_container = $("#rooms_container");          
            var i = 5;
            var s = $("<select/>").attr("id", i);
            $.post("/php/getRoomTypes.php", function(data) {
                  var room_types = jQuery.parseJSON(data);
                  $.each(room_types, function(key, value)
                  {
                     console.log(value[0] + value[1]);
                     s.append($("<option></option>")
                     .attr("value", value[0])
                     .text(value[1])
                     );
                  });
                  rooms_container.html(s);
                     
            });
            
            for (i = 0; i < room_count; i++)
            {
               var input = $("<input type=\"\" name=\"room-name\" placeholder=\"Give a name for this room\" />");
               s.attr("id", i);
               //rooms_container.html(input);
               rooms_container.append(s);
            }
            
            
         }
     }
     else if ($(this).attr("id") === "step2_next")
     {
       console.log("step2 next");
         
     }      

      if (animating) return false;
      animating = true;
      current_fs = $(this).parent();

     next_fs = $(this).parent().next();

     //activate next step on progressbar using the index of next_fs
     $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

     //show the next fieldset
     next_fs.show();
     //hide the current fieldset with style
     current_fs.animate({opacity: 0}, {
         step: function(now, mx) {
             //as the opacity of current_fs reduces to 0 - stored in "now"
             //1. scale current_fs down to 80%
             scale = 1 - (1 - now) * 0.2;
             //2. bring next_fs from the right(50%)
             left = (now * 50)+"%";
             //3. increase opacity of next_fs to 1 as it moves in
             opacity = 1 - now;
             current_fs.css({'transform': 'scale('+scale+')'});
             next_fs.css({'left': left, 'opacity': opacity});
         },
         duration: 200,
         complete: function(){
             current_fs.hide();
             animating = false;
         },
         //this comes from the custom easing plugin
         easing: 'easeInOutBack'
     });
   });

   $(".previous").click(function(){
    if ($(this).attr("id") === "step2_prev")
     {
         console.log("Step 2 prev");
     }
     else if ($(this).attr("id") === "step3_prev")
     {
         console.log("Step3 prev");
     }
     if(animating) return false;
     animating = true;

     current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();

     //de-activate current step on progressbar
     $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

     //show the previous fieldset
     previous_fs.show();
     //hide the current fieldset with style
     current_fs.animate({opacity: 0}, {
         step: function(now, mx) {
             //as the opacity of current_fs reduces to 0 - stored in "now"
             //1. scale previous_fs from 80% to 100%
             scale = 0.8 + (1 - now) * 0.2;
             //2. take current_fs to the right(50%) - from 0%
             left = ((1-now) * 50)+"%";
             //3. increase opacity of previous_fs to 1 as it moves in
             opacity = 1 - now;
             current_fs.css({'left': left});
             previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
         },
         duration: 200,
         complete: function(){
             current_fs.hide();
             animating = false;
         },
         //this comes from the custom easing plugin
         easing: 'easeInOutBack'
     });
   });

   $(".submit").click(function(){
      if ($(this).attr("id") === "step3_submit")
      {
         console.log("step3 submit");
      }
      return false;
   })

});
