
  //from multi-select.html
  function showChoices(){
  //retrieve data
  var selLanguage = document.getElementById("selLanguage");
  //set up output string
  var result = "<h2>Your Languages</h2>";
  result += "<ul> n";
  //step through options
  for (i = 0; i < selLanguage.length; i++){
   //examine current option
   currentOption = selLanguage[i];
   //print it if it has been selected
   if (currentOption.selected == true){
   result += " <li>" + currentOption.value + "</li> n";
   } // end if
  } // end for loop
  //finish off the list and print it out
  result += "</ul> n";
  output = document.getElementById("output");
  output.innerHTML = result;
  } // end showChoices