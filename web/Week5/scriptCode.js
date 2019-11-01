
    function addPlayers(){
        for (i = 0; i < players.length; i++){
            document.getElementById("activePlayers").innerHTML += "<p class = 'lists' id = 'defaultList'> " + players[i] + '</p>';   
            
            var string = players[i];
            var firstName = string.replace(/ .*/,''); // verified working

                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        firstName = this.responseText;
                    }
                };
                xmlhttp.open("GET","encounters.php?q="+firstName,true);
                xmlhttp.send();

                
                
            
            }
            for (i = 0; i < list.length; i++){
                    list[i].style.color = ""; 
                }
    
            localStorage.clear();
            localStorage.setItem("storedPlayers", JSON.stringify(players));
            players.length = 0;
       
    
        }
    function rollInitiative(){
        //somehow figure how to pair the span number to the user
        //pass in the global variable

        //build a for loop, in each loop, roll a dice, then add array[0] to it, that's your first number
        //stick that number in a new array diceRolls[0] accessable by encounters


        //that first number = the span number that shows. 
    }



//         function addPlayersEncounter(){
//             for (i = 0; i < players.length; i++){
//                 document.getElementById("activePlayersEncounter").innerHTML += "<p class = 'lists' id = 'defaultList'> " + players[i] + '</p>';   
                
//                 }
//                 for (i = 0; i < list.length; i++){
//                         list[i].style.color = ""; 
//                     }
        
//                 localStorage.clear();
//                 localStorage.setItem("storedPlayers", JSON.stringify(players));
//                 players.length = 0;
           
        
//             }

//   type="text/javascript">
  jQuery.noConflict();
  jQuery(document).ready(function($) {
      $('.form-control').keyup(function(event) {
          var textBox = event.target;
          var start = textBox.selectionStart;
          var end = textBox.selectionEnd;
          textBox.value = textBox.value.charAt(0).toUpperCase() + textBox.value.slice(1).toLowerCase();
          textBox.setSelectionRange(start, end);
      });
  });

function deleteDefault(){
    for(i = 0; i < 8; i++) {
        var elmnt = document.getElementById("defaultList");
        elmnt.remove();
    }

   
//document.getElementById('defaultList').onclick = changeColor;

function changeColor(){
    document.body.style.color="green";
    return false;
}




}