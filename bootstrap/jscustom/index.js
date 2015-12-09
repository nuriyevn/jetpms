updatePrice = function() {

//   document.getElementById("country_select").style.color = "red";

   country_value = document.getElementById("country_select").value;
   bedscount_value = document.getElementById("bedscount_select").value;

   console.log("country_select: " + country_value);
   console.log("bedscount_select: " + bedscount_value);
   console.log(typeof country_value); 
   console.log(typeof bedscount_value);
   
   if (country_value ===  'What country hostel from?' || bedscount_value === 'How many beds')
   {
      console.log("Invalid params.\n"); 
   }
   else
   {  
      var b_price = 0;
      switch (bedscount_value)
      {
         case "1":
            b_price = 2;
            bedscount = "from 1 to 10";
            break;
         case "2":
            b_price = 5;
            bedscount = "from 11 to 18";
            break;
         case "3":
            b_price = 10;
            bedscount = "from 19 to 26";
            break;
         case "4":
            b_price = 12;
            bedscount = "more than 26";
            break;
      }
      switch (country_value)
      {
         case "1":
            country = "Ukraine";
            b_price *= 1;
            break;
         case "2":
            country = "Russia";
            b_price *= 1.25;
            break;
         case "3":
            country = "Another country";
            b_price *= 1.5;

      }
      
     document.getElementById("big-price").innerText = b_price + "$";
   }
}
