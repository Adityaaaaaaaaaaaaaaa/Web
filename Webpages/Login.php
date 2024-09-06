<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/Login style.css">
        <style>
            #loginMsg, #registerMsg {
                font-family: 'Times New Roman', sans-serif;
                font-size: 13px;
                color: palegoldenrod;
            }

            body {
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }

            /* back ground image */
            .backgroundimgLogin {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: url('../Images/backgrounds/willow-xk-nl-1AVWC1RE-unsplash.jpg'); 
                background-size: 100% 100%;
                filter: blur(5px); 
                z-index: -1;
            }
        </style>
        <script>  
            function checkformRg(form) {
                // ARRAY created to identify any encountered error(s) and display it/them to the user at the same time
                var errors = [];

                // regular expression to match only alphanumeric characters and spaces
                var special = /^[\w ]+$/;

                // regular expression to match any digit
                var digits = /\d/;

                // regular expression to match .com at the end of the email address
                var end = /(\.com)$/;

                // regular expression to match a valid phone number pattern 5XXX[?]XXXX where ? is optional white space
                var phone = /^5\d{3}(\s?\d{4})?$/;

                // validation fails if the First Name field is empty
                if (form.mRegFname.value == "") {
                errors.push("First Name is empty!");
                } else if (!special.test(form.mRegFname.value)) {
                // validation fails if First Name does not match our regular expression concerning alphanumeric characters and spaces
                errors.push("First Name contains invalid characters!");
                }

                // validation fails if the Last name field is empty
                if (form.mRegLname.value == "") {
                    errors.push("The Last Name is empty!");
                } else if (!special.test(form.mRegLname.value)) {
                // validation fails if there is any alphanumeric character in Last Name
                    errors.push("Last Name contains invalid characters");
                }
                
                // validation fails if there is any digit in First Name and in Last Name
                if (digits.test(form.mRegFname.value)) {
                    errors.push("First Name cannot have any digits!");
                }
                if (digits.test(form.mRegLname.value)) {
                    errors.push("Last Name cannot have any digits!");
                }

                // validation fails if the Username field is empty
                if (form.mRegUname.value == "") {
                    errors.push("Username is empty!");
                } else if (form.mRegUname.value.length < 5) { 
                    // validation fails if Username is too short (less than 6 characters)
                    errors.push("Username must be at least 5 characters long!");
                }

                if (form.mRegPhone.value == "") {
                    errors.push("Phone number is empty!");
                } else if (!phone.test(form.mRegPhone.value)) {
                    errors.push("Phone number must be in the format 5XXX XXXX or 5XXXXXXX!");
                }

                // validation fails if email field is empty
                if (form.mRegEmail.value == "") {
                    errors.push("Email address is empty!");
                } else if (!end.test(form.mRegEmail.value)) {
                    errors.push("Email must end with .com!");
                }

                // The length of the errors array needs to be greater than 0 to load our message and return false
                if (errors.length > 0) {
                    var message = "ERRORS:\n\n";
                    for (var i = 0; i < errors.length; i++) {
                        message += errors[i] + "\n\n";
                    }
                    alert(message);
                    return false;
                }

                // validation is successful
                return true;
            }
        </script>

        <script>
            //ajax function for login form
            function ajaxLogin(){
                try {
                    requestbox = new XMLHttpRequest();
                } catch (e) { 
                    alert("Your browser does not support AJAX!");
                }

                var uname = document.loginForm.mLogUname.value; //retrieve value
                var url = "../PHP/chkLgUname.php";

                if (uname !== "") { // Check if the username is not empty
                    requestbox.open("POST", url, true); 
                    requestbox.onreadystatechange = verifyUname;
                    requestbox.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    requestbox.send("mLogUname=" + uname);
                } else {
                    document.getElementById('loginMsg').innerHTML = ""; // Clear the message
                }

                function verifyUname(){
                    if((requestbox.readyState == 4) && (requestbox.status == 200)) {
                        document.getElementById('loginMsg').innerHTML = requestbox.responseText;
                    }
                }
            }

            //ajax function for register form
            function ajaxRegister(){
                try {
                    requestbox = new XMLHttpRequest();
                } catch (e) { 
                    alert("Your browser does not support AJAX!");
                }

                var uname = document.registerForm.mRegUname.value; //retrieve value
                var url = "../PHP/chkRgUname.php";

                if (uname !== "") { // Check if the username is not empty
                    requestbox.open("POST", url, true); 
                    requestbox.onreadystatechange = chkUname;
                    requestbox.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    requestbox.send("mRegUname=" + uname);
                } else {
                    document.getElementById('registerMsg').innerHTML = ""; // Clear the message
                }

                function chkUname(){
                    if((requestbox.readyState == 4) && (requestbox.status == 200)) {
                        document.getElementById('registerMsg').innerHTML = requestbox.responseText;
                    }
                }
            }
        </script>
        <script>
			window.onload = function() {
				var fadeElements = document.querySelectorAll('.fade-in');
				for (var i = 0; i < fadeElements.length; i++) {
					fadeElements[i].style.opacity = '1'; 
				}
			};
		</script>
    </head>
    <body>
        <div class="backgroundimgLogin"></div>

        <div class="loginform fade-in">
            <div class="mainForm-box" id="FormBox-id">
                <div>
                    <button type="button" class="switchbut" onclick="login()">Login</button>
                    <button type="button" class="switchbut" onclick="register()">Register</button>
                </div><br>

                <div>
                    <form id="f-login"  name="loginForm" class="log-f" method="post" action="../PHP/checkLogin.php" >
                        <h1>LOG IN</h1>

                        <input type="text" class="input-box" name="mLogUname" placeholder="Enter Username" onblur="ajaxLogin()" required>
                        <div id="loginMsg"></div>
                        <input type="password" class="input-box" name="mLogPwd" placeholder="Add a Password" required>

                        <button type="submit" name="submitLog" class="SubBtn">Login Now</button>
                        <button type="button" class="backBtn" onclick="goBack()">Back</button>
                    </form>
                </div><br>

                <div>
                    <form id="f-regis" name="registerForm" class="Reg-f" method="post" action="../PHP/checkRegis.php" onsubmit="return checkformRg(this)">
                        <h1>Register</h1>

                        <input type="text" class="input-box" name="mRegFname" placeholder="Enter you first name" >
                        <input type="text" class="input-box" name="mRegLname" placeholder="Enter your last name" >
                        <input type="text" class="input-box" name="mRegUname" placeholder="Username" onblur="ajaxRegister()" required>
                        <div id="registerMsg"></div>
                        <input type="email" class="input-box" name="mRegEmail" placeholder="Enter your Email here" >
                        <input type="phone" class="input-box" name="mRegPhone" placeholder="Enter your Phone number here" >
                        <input type="password" class="input-box" name="mRegPwd" placeholder="Add a Password" required>

                        <button type="submit" name="submitReg" class="SubBtn">Register</button>
                        <button type="button" class="backBtn" onclick="goBack()">Back</button>

                    </form>
                </div><br>

                <script>
                    /*Login/register button swtich*/
                    var x=document.getElementById("f-login");
                    var y=document.getElementById("f-regis");
                    var z=document.getElementById("FormBox-id");
                    
                    function register() {
                        x.style.left="-400px";
                        y.style.left="50px";
                        z.style.left="110px";
                    }
                    
                    function login() {
                        x.style.left='50px';
                        y.style.left='450px';
                        z.style.left='0px';
                    }

                    /*back button*/
                    function goBack() {
                        window.history.back();
                    }
                </script>

            </div>
        </div>
    </body>
</html>