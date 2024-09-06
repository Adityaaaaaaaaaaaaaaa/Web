<?php session_start(); ?>
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

            /* mouse trail effect */
            .trail {
                z-index: 0; /* set to -3 if it lags */
                width: 5px;
                height: 5px;
                border-radius: 50%;
                background: #ff0000;
                position: fixed;
                animation: trail .5s cubic-bezier(0.42, 0, 0.58, 1) forwards;
            }

            @keyframes trail {
                0%, 100% {
                    transform: scale(0) translateY(0);
                    opacity: 0;
                }
                20% {
                    transform: scale(1) translateY(0px);
                    opacity: 0.8;
                }
                50% {
                    transform: scale(1.2) translateY(0px);
                    opacity: 1;
                }
                80% {
                    transform: scale(1) translateY(0px);
                    opacity: 0.8;
                }
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
        
        <!-- Particle container -->
        <div id="particle-container"></div>

        <div class="loginform fade-in main">
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

        <!-- mouse trail -->
        <script src="../Js/mouse.js"></script>

        <script>
            // Function to create particles
            function createParticle() {
                const particle = document.createElement('div');
                particle.className = 'particle';
                const size = Math.random() * 20 + 5; // Randomize particle size
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.left = Math.random() * window.innerWidth + 'px';
                particle.style.top = window.innerHeight + 'px'; // Start particles from the bottom
                document.getElementById('particle-container').appendChild(particle);
                
                // Remove particle after animation duration
                setTimeout(() => {
                    particle.remove();
                }, 10000); // particle animation duration
            }

            // Generate particles at regular intervals
            setInterval(createParticle, 100); // particle density and speed
        </script>
    </body>
</html>
