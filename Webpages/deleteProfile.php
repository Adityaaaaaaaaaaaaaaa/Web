<?php
	session_start();

	if(!(isset($_SESSION['user_login']) || isset($_SESSION['adminUname']))){
		include ('../PHP/Taketwoconnect.php');
		
		header("location: ../Webpages/Login.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Delete Profile</title>

		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Profile style.css" >
		<script>
    		// fade-in animation on page load
			window.onload = function () {
				var fadeElements = document.querySelectorAll('.fade-in');
				for (var i = 0; i < fadeElements.length; i++) {
					fadeElements[i].style.opacity = '1'; // Change opacity to 1 for fade-in
				}
			};
		</script>
        <script>
            function ajaxPwd() {
				try {
					requestbox = new XMLHttpRequest();
				} catch (e) {
					alert("Your browser does not support AJAX!");
				}

				var passwd = document.delProfile.delPwd.value;
				var url = "../PHP/chkDelete.php";

				if (passwd !== "") {
					requestbox.open("POST", url, true);
					requestbox.onreadystatechange = chkpwd;
					requestbox.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					requestbox.send("delPwd=" + passwd);
				} else {
					document.getElementById('delbtn').innerHTML = "";
					document.getElementById('delbtn').style.display = "none"; // Hide the button
				}

				function chkpwd() {
					if ((requestbox.readyState == 4) && (requestbox.status == 200)) {
						document.getElementById('delbtn').innerHTML = requestbox.responseText;
						if (requestbox.responseText.includes("See you soon!")) {
							document.getElementById('delbtn').style.display = "block"; // Show the button
						} else {
							document.getElementById('delbtn').style.display = "none"; // Hide the button
						}
					}
				}
			}
        </script>
		<style>
			a {
				text-decoration: none;
				color: black;
			}
		</style>
	</head>
	<body>

		<?php include "../Webpages/Header.php"; ?>

		<div id="containerHere"></div>

		<script>
			document.addEventListener("DOMContentLoaded", function() {
				loadXMLDoc();
			});

			function loadXMLDoc() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						try {
							var xmlDoc = this.responseXML;

							// Recreate HTML structure
							var container = xmlDoc.getElementsByTagName("container")[0];
							var htmlContainer = document.createElement("div");
							htmlContainer.id = container.getAttribute("id");
							htmlContainer.className = container.getAttribute("class");

							var info = container.getElementsByTagName("info")[0];
							var infoDiv = document.createElement("div");
							infoDiv.id = info.getAttribute("id");
							htmlContainer.appendChild(infoDiv);

							var heading1 = info.getElementsByTagName("heading1")[0];
							var h1 = document.createElement("h1");
							h1.textContent = heading1.textContent;
							infoDiv.appendChild(h1);

							var heading5 = info.getElementsByTagName("heading5")[0];
							var h5 = document.createElement("h5");
							h5.innerHTML = heading5.textContent;
							infoDiv.appendChild(h5);

							var form = container.getElementsByTagName("form")[0];
							var formElement = document.createElement("form");
							formElement.name = form.getAttribute("name");
							formElement.method = form.getAttribute("method");
							formElement.action = form.getAttribute("action");
							htmlContainer.appendChild(formElement);

							var formdiv = form.getElementsByTagName("formdiv")[0];
							var formdivDiv = document.createElement("div");
							formdivDiv.id = formdiv.getAttribute("id");
							formElement.appendChild(formdivDiv);

							var label1 = formdiv.getElementsByTagName("label1")[0];
							var label1Div = document.createElement("div");
							label1Div.className = label1.getAttribute("class");
							formdivDiv.appendChild(label1Div);

							var paras = label1.getElementsByTagName("para");
							for (var i = 0; i < paras.length; i++) {
								var p = document.createElement("p");
								p.textContent = paras[i].textContent;
								label1Div.appendChild(p);
								if (i < paras.length - 1) {
									label1Div.appendChild(document.createElement("br"));
								}
							}
							label1Div.appendChild(document.createElement("br")); 
							label1Div.appendChild(document.createElement("br")); 

							var label2 = formdiv.getElementsByTagName("label2")[0];
							var label2Div = document.createElement("div");
							label2Div.id = label2.getAttribute("id");
							label2Div.className = label2.getAttribute("class");
							formdivDiv.appendChild(label2Div);

							var label2Label = document.createElement("label");
							label2Label.setAttribute("for", "password1");
							label2Label.textContent = "Enter Password";
							label2Div.appendChild(label2Label);
							label2Div.appendChild(document.createElement("br"));

							var input = document.createElement("input");
							input.type = "password";
							input.name = "delPwd";
							input.id = "passwordField";
							input.setAttribute("onblur", "ajaxPwd()");
							label2Div.appendChild(input);
							label2Div.appendChild(document.createElement("br")); 
							label2Div.appendChild(document.createElement("br")); 

							var delBtnDiv = label2.getElementsByTagName("div")[0];
							var delBtnContainer = document.createElement("div");
							delBtnContainer.id = delBtnDiv.getAttribute("id");
							delBtnDiv.childNodes.forEach(function(node) {
								delBtnContainer.appendChild(node.cloneNode(true));
							});
							label2Div.appendChild(delBtnContainer);
							label2Div.appendChild(document.createElement("br"));

							var buttonDiv = container.getElementsByTagName("buttonDiv")[0];
							var buttonDivDiv = document.createElement("div");
							buttonDivDiv.id = buttonDiv.getAttribute("id");
							formdivDiv.appendChild(buttonDivDiv);

							var button = buttonDiv.getElementsByTagName("button")[0];
							var buttonElement = document.createElement("button");
							buttonElement.id = button.getAttribute("id");
							buttonElement.disabled = button.getAttribute("disabled");
							buttonDivDiv.appendChild(buttonElement);

							var a = button.getElementsByTagName("a")[0];
							var aElement = document.createElement("a");
							aElement.href = a.getAttribute("href");
							aElement.textContent = a.textContent;
							buttonElement.appendChild(aElement);

							// Append to div
							document.getElementById("containerHere").appendChild(htmlContainer);
						} catch (error) {
							console.error("Error parsing XML:", error);
						}
					}
				};
				xhttp.open("GET", "../XML/deleteProfile.xml", true);
				xhttp.send();
			}
        </script>


		<?php include '../Webpages/Footer.php'; ?>

		<script src="../Js/mouse.js"></script>
		<script src="../Js/dark-mode.js"></script>
	</body>
</html>
