

    document.getElementById("fname").addEventListener("keypress", function(e) {
        if(this.selectionStart == 0) {
        // uppercase first letter
        forceKeyPressUppercase(e);
        } else {
        // lowercase other letters
        forceKeyPressLowercase(e);
        }
    }, false);
