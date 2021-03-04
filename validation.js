//user id validation starts
function name_validation(){
    'use strict';
    var userid_name = document.getElementById("name");
    var userid_value = document.getElementById("name").value;
    var userid_length = userid_value.length;
    if(userid_length<4 || userid_length>80)
    {
    document.getElementById('name_err').innerHTML = 'Value must not be less than 4 characters and greater than 80 characters';
    userid_name.focus();
    document.getElementById('name_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('name_err').innerHTML = 'Valid user name';
    document.getElementById('name_err').style.color = "#00AF33";
    }
    }
    //user id validation ends
    //password validation starts
    function price_validation(){
    'use strict';
    var price_name = document.getElementById("price");
    var price_value = document.getElementById("price").value;
    var price_length = price_value.length;
    if(price_value <= 1.50  || price_value > 2500)
    {
    document.getElementById('price_err').innerHTML = 'Password must be at least 6 chracters long';
    price_name.focus();
    document.getElementById('price_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('price_err').innerHTML = 'Valid password';
    document.getElementById('price_err').style.color = "#00AF33";
    }
    }
    //password validation ends
    //user weight validation starts
    function weight_validation(){
    'use strict';
    var weight_name = document.getElementById("weight");
    var weight_value = document.getElementById("weight").value;
    var weight_length = weight_value.length;

    if(weight_value <= 0|| weight_value > 700)
    {
    document.getElementById('weight_err').innerHTML = 'weight must bemore than 0 and less than 700.';
    weight_name.focus();
    document.getElementById('weight_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('weight_err').innerHTML = 'Valid weight';
    document.getElementById('weight_err').style.color = "#00AF33";
    }
    }
    //user name validation ends
    //email validation starts
    function email_validation(){
    'use strict';
    var email_name = document.getElementById("email");
    var email_value = document.getElementById("email").value;
    var email_length =email_value.length;
    var mailformat = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
    
    if(!email_value.match(mailformat)  || email_length === 0)
    {
    document.getElementById('email_err').innerHTML = 'You must select a email';
    email_name.focus();
    document.getElementById('email_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('email_err').innerHTML = 'email selected.';
    document.getElementById('email_err').style.color = "#00AF33";
    }
    }




    function address_validation (){


        var address_name = document.getElementById("address");
        var address_value = document.getElementById("address").value;
        var address_length = address_value.length;
    
        if(address_length <= 4|| address_length > 200)
        {
        document.getElementById('address_err').innerHTML = 'address must be more than 4 and less than 200.';
        address_name.focus();
        document.getElementById('address_err').style.color = "#FF0000";
        }
        else
        {
        document.getElementById('address_err').innerHTML = 'Valid address';
        document.getElementById('address_err').style.color = "#00AF33";
        }
        }


        function postcode_validation(){
            'use strict';
            var postcode_name = document.getElementById("postcode");
            var postcode_value = document.getElementById("postcode").value;
            var postcode_length =postcode_value.length;
            var postcode_format = /[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}/
            
            if(!postcode_value.match(postcode_format)  || postcode_length === 0)
            {
            document.getElementById('postcode_err').innerHTML = 'You must select a postcode';
            postcode_name.focus();
            document.getElementById('postcode_err').style.color = "#FF0000";
            }
            else
            {
            document.getElementById('postcode_err').innerHTML = 'postcode selected.';
            document.getElementById('postcode_err').style.color = "#00AF33";
            }
            }
        
    
    //postcode validation ends
    //zip validation starts
   
    //gender validation ends