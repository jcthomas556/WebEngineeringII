
function validateField() {
    var street, text;
    var city, text;
    var state, text;
    var zip, text;

    street = document.getElementById("street").value;
    city = document.getElementById("city").value;
    state = document.getElementById("state").value;
    zip = document.getElementById("zip").value;

    if (street == "" || city == "" || state == "" || zip == "") {

        document.getElementById("alertMsg").innerHTML = "All forms must be filled out.";
    }
    else {
       document.getElementById("alertMsg").innerHTML = "";
    }

    //this will queue the error after the first fill out. I still like how it works though. If I didn't want that I would just do 4 different functions
}




        function warnUser() {
        }
    


    
    function validateLastName() {
        var last_name, text;
        last_name = document.getElementById("last_name").value;
        if (last_name == "") {
            document.getElementById("alertMsg").innerHTML = "All forms must be filled out.";
        }
        else{
            document.getElementById("alertMsg").innerHTML = "";
        }

    }



    function validateFirstName() {
        var first_name, text;

        first_name = document.getElementById("first_name").value;
        if (first_name == "") {
            
            document.getElementById("alertMsg").innerHTML = "All forms must be filled out.";
        }
       else{
            document.getElementById("alertMsg").innerHTML = "";
        }

    }



    function validateAddress() {
        var address, text;
        term = document.getElementById("address").value;

        if (address == "") {
            document.getElementById("alertMsg").innerHTML = "All forms must be filled out.";
        }
        else{
            document.getElementById("alertMsg").innerHTML = "";
        }
    }





function calculateTotal(checkedValue) {
    var total = parseFloat(document.getElementById("total").value);
    //alert(checkedValue.checked);
    

   if (checkedValue.checked){
                       //it's checked
        total += parseFloat(checkedValue.value);
        //alert(total);
   }
   else{
   //its not checked
                       total -= parseFloat(checkedValue.value);
   }
   
document.getElementById("total").value = total;
    //alert(checkedValue);

}

function removeOne(){
    unset($orderArray[$_SESSION['order'][0]]);
}