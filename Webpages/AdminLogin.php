<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/admin style.css">
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>
	<script>
		window.onload = function() {
			var mainContent = document.querySelector(".main");
			mainContent.style.opacity = "1";
		};
	</script>
</head>
<body>

    <div class="background"></div>
    <div class="loginform fade-in">
        <div class="mainForm-box" id="FormBox-id">
            <form id="f-login" name="loginForm" class="log-f" method="post" action="../PHP/adminAccess.php">

                <h1>Admin login</h1>
                <input type="text" class="input-box" name="adminUname" placeholder="Enter Username" onblur="checkAdminName()" required>
                <div id="adUname"></div>
                <input type="password" class="input-box" name="adminPwd" placeholder="Add a Password" onblur="checkAdminPass()" required>
                <div id="adPwd"></div>
                <button type="button" class="backBtn" onclick="goBack()">Back</button><br><br>

                <div id="submitButton" style="display: none;">
                    <button type="submit" class="submitBtn">Log in</button>
                </div>

            </form>
        </div>
    </div> 
    <script>
        const form = document.getElementById("f-login");
        const adUname = document.getElementById("adUname");
        const adPwd = document.getElementById("adPwd");
        const submitButton = document.getElementById("submitButton");

        function checkAdminName() {
            const adminUname = form.adminUname.value;
            if (adminUname !== "") {
                fetch("../PHP/adminLgchk.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `adminUname=${adminUname}`
                })
                .then(response => response.text())
                .then(data => {
                    adUname.innerHTML = data;
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                });
            } else {
                adUname.innerHTML = "";
            }
        }

        function checkAdminPass() {
            const adminPass = form.adminPwd.value;
            if (adminPass !== "") {
                fetch("../PHP/adminpassLgchk.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `adminPwd=${adminPass}`
                })
                .then(response => response.text())
                .then(data => {
                    adPwd.innerHTML = data;
                    if (data.trim() === "Access Credentials Verified!") {
                        submitButton.style.display = "block";
                    } else {
                        submitButton.style.display = "none";
                    }
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                });
            } else {
                adPwd.innerHTML = "";
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
