$(document).ready(function() {

//jQuery time
   var current_fs, next_fs, previous_fs; //fieldsets
   var left, opacity, scale; //fieldset properties which we will animate
   var animating; //flag to prevent quick multi-click glitches
   var room_count = 0;
   var room_count_old = 0;
   var refresh_prices = 0;
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
         // Room count has been changed, delete old room's info
         if (room_count != room_count_old)
         {
            $("#rooms_container").empty();
            refresh_prices = 1;
            room_count_old = room_count;
             
         // Templated controls which is cloned during rooms generation
         var $select_type = $("<select id='room_type'></select>");
         var $input_name = $("<input type='text' id='room_name' placeholder = 'Give a name for this room'/>");
         var $input_bedcount = $("<input type='number' id='room_capacity' placeholder='How many beds in this room?'/>");

         // Getting all room types from database
         var posting = $.post("/php/getRoomTypes.php", function(data) {
               var room_type = jQuery.parseJSON(data);
               $.each(room_type, function(key, value)
               {
                  $("<option></option>").attr('value', value[0]).text(value[1]).clone().appendTo($select_type);
               });
         });

         // wating for readiness of post
         posting.done(function()
         {
            for (i = 1; i <= room_count; i++)
            {
               $("<h3>Room#" + i + "</h3>").appendTo("#rooms_container");
               $input_name.clone().attr('id', 'room_name_'+  i).appendTo("#rooms_container");
               $select_type.clone().attr('id', 'room_type_' + i).appendTo("#rooms_container");
               $input_bedcount.clone().attr('id', 'room_capacity_'+i).appendTo("#rooms_container");
            }
         });
         }    
      }
      
      next_animate($(this));
   });

   $("#step2_next").click(function(){
      if (refresh_prices === 1)
      {
         $("#prices_container").empty();
         refresh_prices = 0;
            
         // UL ROOM TAB LIST
         $("<ul id='price_tabs' class='nav nav-tabs'></ul>").appendTo("#prices_container")  ;

         console.log("room_count step2next =" + room_count);
         for (i = 1; i <= room_count; i++)
         {
            $("#price_tabs").append($("<li><a href='"+"#room"+i+"' data-toggle='tab'>Room#"+i+"</li>"));
         }
         $("#price_tabs li:first").addClass("active");
         
         // DIV TAB-CONTENT
         $("#prices_container").append("<div id='tabs_content' class='tab-content'></div>");
         for (i = 1; i <= room_count; i++)
         {
            var $div = $("<div class='tab-pane' id='room"+i+"'></div>").appendTo("#tabs_content");
            
            $div.append("<h3>Check the data below: Room "+i+"</h3>");
            $div.append("<p>Room's name is: <b>" + $("#room_name_"+ i).val()  +"</b></p>");
            
            var index = $("#room_type_"+i).val();
            var room_type = $("#room_type_"+ i +" option[value='" + index + "']").text();
            var capacity = $("#room_capacity_" + i).val();
            $div.append("<p>Room's type is: <b>" + room_type + "</b></p>");
            $div.append("<p>Room's capacity is: <b>" + capacity + "</b></p>");
            $div.append("<p>Please, define price per bed in this room</p>")
            $div.append("<input id='room_rate_" + i  + "' type='number' placeholder='Price in local currency'></input>");
         }
         $("#tabs_content div:first").addClass("active");
      
      } // refresh price if clause
      next_animate($(this));

   });
   
   $("#step2_prev").click(function(){
      prev_animate($(this));
   });
   
   $("#step3_prev").click(function(){
      prev_animate($(this));
   });

   // Submitting basic settings for hostel 
   $("#step3_submit").click(function(){
      
      var rooms = [];
      var hostel_info = {
         "hostel_name": hostel_name,
         "room_count": room_count
      };
      for (i = 1; i <= room_count; i++)
      {
         
         room = {
            "name": $("#room_name_" + i).val(),    
            "type": $("#room_type_" + i).val(),
            "capacity": $("#room_capacity_" + i).val(),
            "rate": $("#room_rate_" + i).val() 
         };
         rooms.push(room);
      }
   
      console.log(JSON.stringify(rooms) + JSON.stringify(hostel_info));
      $.ajax({
         type: 'POST',
         url: '/configure/doConfigure.php',
         data: 'hostel_info=' +  encodeURIComponent(JSON.stringify(hostel_info)) + '&rooms=' + encodeURIComponent(JSON.stringify(rooms)),
         success: function(msg) {
            $("#prices_container").prepend("<p>Configured successfully!</p>");
            //alert("Success! Please, click ok to proceed.");
            window.location = window.location.origin = "/dashboard/index.php";
         }
      });
      
      return false;
   }) 

});
