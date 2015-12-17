$(document).ready(function() {



//jQuery time
   var current_fs, next_fs, previous_fs; //fieldsets
   var left, opacity, scale; //fieldset properties which we will animate
   var animating; //flag to prevent quick multi-click glitches
   var room_count = 0;
   var hostel_name = "";

   next_animate = function(obj)
   {
      if (animating) return false;
      animating = true;
      current_fs = obj.parent();

     next_fs = obj.parent().next();

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

   };

   prev_animate = function(obj){
     if(animating) return false;
     animating = true;

     current_fs = obj.parent();
      previous_fs = obj.parent().prev();

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
   };
   
   
   $("#step1_next").click(function(){
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
         $("#rooms_container").empty();
   
         // Creating first room
         $("<h3>Room#1</h3>").appendTo("#rooms_container");
         $("#rooms_container").append("<input type='text' id = 'room_name_1' placeholder='Give a name for this room'/>");
         $("#rooms_container").append("<select id='room_type_1'></select>");
         
         // Getting all room types from database
         var posting = $.post("/php/getRoomTypes.php", function(data) {
               var room_type = jQuery.parseJSON(data);
               $.each(room_type, function(key, value)
               {
                  console.log(value[0] + value[1]);
                  $("#room_type_1").append($("<option></option>")
                  .attr("value", value[0])
                  .text(value[1])
                  );
               });
               
                                   
         });

         // wating for readiness of post
         posting.done(function()
         {
            for (i = 2; i <= room_count; i++)
            {
               
               $("<h3>Room#" + i + "</h3>").appendTo("#rooms_container");
               $("#room_name_1").clone().attr('id', 'room_name_'+  i).appendTo("#rooms_container");
               $("#room_type_1").clone().attr('id', 'room_types_' + i).appendTo("#rooms_container");
            }
               
         });
           
      }
      
      next_animate($(this));
   });

   $("#step2_next").click(function(){
      console.log("Step 2 next");   
      for (i = 1; i <= room_count; i++)
      {
      }
      
      $("#prices_container").empty();
      
      // UL ROOM TAB LIST
      $("<ul id='price_tabs' class='nav nav-tabs'></ul>").appendTo("#prices_container")  ;

      console.log("room_count step2next =" + room_count);
      for (i = 0; i < room_count; i++)
      {
         if (i === 0)
            $("#price_tabs").append($("<li class='active'><a href='"+"#room"+(i+1)+"' data-toggle='tab'>Room#"+(i+1)+"</li>"));
         else
            $("#price_tabs").append($("<li><a href='"+"#room"+(i+1)+"' data-toggle='tab'>Room#"+(i+1)+"</li>"));
      }
      
      // DIV TAB-CONTENT
      
      $("#prices_container").append("<div id='tabs_content' class='tab-content'></div>");
      
      for (i = 1; i <= room_count; i++)
      {
         var $div;
         if (i === 1)
            $div = $("<div class='tab-pane active' id='room"+i+"'></div>").appendTo("#tabs_content");
         else
            $div = $("<div class='tab-pane' id='room"+i+"'></div>").appendTo("#tabs_content");
         
         $div.append("<h3>Check the data below: Room "+i+"</h3>");
         alert($("#room_name_"+i).val()); 
         $div.append("<p>Room's name is:" + $("#room_name_"+ i)'.val()  +"</p>");
        // $div.append("<p>Room's type is:" + $("#room_type_" + i)) 
         $div.append("<input type='number'></input>");
         
         
      }
      
      
      next_animate($(this));

   });
   
   $("#step2_prev").click(function(){
      console.log("Step 2 prev");
      prev_animate($(this));
   });
   
   $("#step3_prev").click(function(){
      console.log("Step3 prev");
   
      prev_animate($(this));
   });

   
   $("#step3_submit").click(function(){
      console.log("step3 submit");
      return false;
   })

});
