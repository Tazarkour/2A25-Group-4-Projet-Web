
    function EnableDisable(txtPassportNumber) {
        //Reference the Button.
        var btnSubmit = document.getElementById("submit");
 
        //Verify the TextBox value.
        if (txtPassportNumber.value.trim() == "") {
            //Enable the TextBox when TextBox has value.
            btnSubmit.disabled = true;
        } 
        else btnSubmit.disabled = false;
    };
