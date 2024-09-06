<?php
include "./Taketwoconnect.php";

try {

	//create table inquiry
	$tb_Inquiry = "CREATE TABLE inquiry (
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		cName varchar(50) NOT NULL,
		cSurname varchar(50) NOT NULL,
		cEmail varchar(100) NOT NULL,
		cMessage varchar(500) 
	);";

	if (mysqli_query($conn, $tb_Inquiry)) {
		echo "<br>Table inquiry created successfully.";
	} else {
		echo "<br>Error creating table: " . mysqli_error($conn);
	}

	//sample pre filled data
	$inq = "INSERT INTO inquiry (cName, cSurname, cEmail, cMessage)
	VALUES
	('Luna', 'Starshine', 'luna.starshine@example.com', 'Hello, I\'m interested in your products. Can you provide me with some information about the prices?'),
	('Xander', 'Frost', 'xander.frost@example.com', 'Hi there, I\'m considering making a purchase. Could you please send me a catalog along with the prices?'),
	('Aurora', 'Blaze', 'aurora.blaze@example.com', 'Good day! I\'m Aurora and I\'m curious about your services. Can you give me a quote for the items I\'m interested in?'),
	('Nova', 'Storm', 'nova.storm@example.com', 'Greetings! I\'m Nova and I\'m looking to buy some of your products. Could you let me know if there are any special offers available?'),
	('Phoenix', 'Flame', 'phoenix.flame@example.com', 'Hey, I\'m interested in your merchandise. Can you provide details on the pricing and any ongoing promotions?'),
	('Skyler', 'Wolfe', 'skyler.wolfe@example.com', 'Hi, I\'m Skyler and I\'m interested in purchasing your goods. Can you please let me know if there are any discounts available?'),
	('Alexa', 'Midnight', 'alexa.midnight@example.com', 'Hello, I\'m considering making a purchase from your store. Could you provide me with a price list for your products?'),
	('Raven', 'Shadow', 'raven.shadow@example.com', 'Hi there, I\'m Raven and I\'m interested in your offerings. Can you provide me with pricing information for the items I\'m interested in?'),
	('Scarlett', 'Rose', 'scarlett.rose@example.com', 'Greetings! I\'m Scarlett and I\'m interested in buying from you. Can you please send me details about the prices?'),
	('Phoenix', 'Blaze', 'phoenix.blaze@example.com', 'Hello, I\'m interested in your products. Can you provide me with pricing information and any ongoing promotions?'),
	('Serenity', 'Waves', 'serenity.waves@example.com', 'Hi, I\'m Serenity and I\'m considering purchasing from your store. Can you provide me with pricing details for the items I\'m interested in?'),
	('Blaze', 'Storm', 'blaze.storm@example.com', 'Hey there, I\'m interested in making a purchase. Can you please send me information about the prices?'),
	('Xander', 'Frost', 'xander.frost@example.com', 'I\'m Xander again! Just wanted to follow up on my previous inquiry. Any updates on the pricing?'),
	('Skyler', 'Wolfe', 'skyler.wolfe@example.com', 'Hi, it\'s Skyler here. I have some questions regarding the prices. Can you assist me with that?'),
	('Aurora', 'Blaze', 'aurora.blaze@example.com', 'Hello again! Aurora here. I noticed your prices have changed. Could you explain the updates?'),
	('Luna', 'Starshine', 'luna.starshine@example.com', 'Hey, Luna here. I\'m ready to make a purchase. Can you provide me with the buying process?'),
	('Jennifer', 'Taii', 'jentaii@gmail.com', 'Hi, Jenny here!. I\'m ready to buy! Could you confirm the prices before I proceed?');
	";

	if (mysqli_query($conn, $inq)) {
		echo "Insert successfully.";
	} else {
		echo "Error inserting table: " . mysqli_error($conn);
	}



	//create table reservation
	$tb_Reserve = "CREATE TABLE reservation (
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		cName varchar(50) NOT NULL,
		cSurname varchar(50) NOT NULL,
		cPhone varchar(10) NOT NULL,
		cEmail varchar(100) NOT NULL,
		cMeeting_date date NOT NULL,
		cMessage text 
	);";

	if (mysqli_query($conn, $tb_Reserve)) {
		echo "<br>Table reservation created successfully.";
	} else {
		echo "<br>Error creating table: " . mysqli_error($conn);
	}

	//sample pre filled data
	$rsv = "INSERT INTO reservation (cName, cSurname, cPhone, cEmail, cMeeting_date, cMessage)
	VALUES
	('Luna', 'Starshine', '5556 1234', 'luna.starshine@example.com', '2024-05-15', 'Booking for a custom portrait session.'),
	('Xander', 'Frost', '5557 9876', 'xander.frost@example.com', '2024-05-20', 'Reserving a spot for the outdoor photo shoot event.'),
	('Aurora', 'Blaze', '5558 5678', 'aurora.blaze@example.com', '2024-05-25', 'Making a reservation for the sunset photography workshop.'),
	('Nova', 'Storm', '5559 2345', 'nova.storm@example.com', '2024-06-01', 'Booking for a family portrait session.'),
	('Phoenix', 'Flame', '5550 1111', 'phoenix.flame@example.com', '2024-06-05', 'Reserving a slot for the newborn baby photoshoot.'),
	('Skyler', 'Wolfe', '5551 2222', 'skyler.wolfe@example.com', '2024-06-10', 'Making a reservation for the pet photography session.'),
	('Alexa', 'Midnight', '5552 3333', 'alexa.midnight@example.com', '2024-06-15', 'Booking for a corporate headshot session.'),
	('Raven', 'Shadow', '5553 4444', 'raven.shadow@example.com', '2024-06-20', 'Reserving a spot for the fashion photography workshop.'),
	('Scarlett', 'Rose', '5554 5555', 'scarlett.rose@example.com', '2024-06-25', 'Making a reservation for the engagement photoshoot.'),
	('Phoenix', 'Blaze', '5555 6666', 'phoenix.blaze@example.com', '2024-06-30', 'Booking for a custom wedding photography package.'),
	('Serenity', 'Waves', '5556 7777', 'serenity.waves@example.com', '2024-07-05', 'Reserving a slot for the maternity photoshoot.'),
	('Blaze', 'Storm', '5557 8888', 'blaze.storm@example.com', '2024-07-10', 'Making a reservation for the graduation portrait session.'),
	('Apollo', 'Light', '5558 9999', 'apollo.light@example.com', '2024-07-15', 'Booking for a celestial-themed photo session.'),
	('Luna', 'Shadow', '5559 0000', 'luna.shadow@example.com', '2024-07-20', 'Reserving a spot for the nighttime portrait session.'),
	('Aurora', 'Borealis', '5550 1111', 'aurora.borealis@example.com', '2024-07-25', 'Making a reservation for the northern lights photography tour.'),
	('Orion', 'Night', '5551 2222', 'orion.night@example.com', '2024-07-30', 'Booking for a stargazing and astrophotography event.'),
	('Luna', 'Starshine', '5556 1234', 'luna.starshine@example.com', '2024-08-05', 'Booking for a sunrise photoshoot.'),
	('Luna', 'Starshine', '5556 1234', 'luna.starshine@example.com', '2024-08-10', 'Reserving a spot for the full moon photography session.');    
	";

	if (mysqli_query($conn, $rsv)) {
		echo "Insert successfully.";
	} else {
		echo "Error inserting table: " . mysqli_error($conn);
	}



	//create table feedback
	$tb_Feedback = "CREATE TABLE feedback (
		id INT(11) AUTO_INCREMENT PRIMARY KEY, 
		cName varchar(50) NOT NULL,
		cSurname varchar(50) NOT NULL,
		cAge varchar(6) NOT NULL,
		cgender varchar(5) NOT NULL,
		cQuality_service varchar(10) NOT NULL,
		cProduct_quality varchar(10) NOT NULL,
		cRecommend varchar(10) NOT NULL,
		cSuggestion varchar(500) 
	);";

	if (mysqli_query($conn, $tb_Feedback)) {
		echo "<br>Table feedback created successfully.";
	} else {
		echo "<br>Error creating table: " . mysqli_error($conn);
	}

 	//sample pre filled data
	$fbk = "INSERT INTO feedback (cName, cSurname, cAge, cgender, cQuality_service, cProduct_quality, cRecommend, cSuggestion)
	VALUES
	('Luna', 'Starshine', '0-30', 'F', 'Good', 'Very Good', 'Yes', 'I love your products! They are of excellent quality.'),
	('Xander', 'Frost', '31-60', 'M', 'Average', 'Good', 'Maybe', 'The service was good, but the product quality could be improved.'),
	('Aurora', 'Blaze', '61-100', 'F', 'Excellent', 'Very Good', 'Yes', 'I recommend your products to everyone! They are amazing.'),
	('Nova', 'Storm', '0-30', 'M', 'Good', 'Average', 'Yes', 'I had a good experience with your service, but the product quality was average.'),
	('Phoenix', 'Flame', '31-60', 'F', 'Very Good', 'Good', 'Yes', 'I really love your products! They exceeded my expectations.'),
	('Skyler', 'Wolfe', '61-100', 'M', 'Good', 'Very Good', 'Maybe', 'The service was good overall, but I think the product quality could be better.'),
	('Alexa', 'Midnight', '0-30', 'F', 'Excellent', 'Excellent', 'Yes', 'Your products are fantastic! I\'m a satisfied customer.'),
	('Raven', 'Shadow', '31-60', 'M', 'Good', 'Very Good', 'Yes', 'I had a good experience with your service. The product quality was very good.'),
	('Scarlett', 'Rose', '61-100', 'F', 'Excellent', 'Excellent', 'Yes', 'I love your products! The quality is excellent.'),
	('Phoenix', 'Blaze', '0-30', 'M', 'Very Good', 'Good', 'Yes', 'Your products are really good. I would recommend them to others.'),
	('Serenity', 'Waves', '31-60', 'F', 'Good', 'Average', 'Maybe', 'The service was good, but I think there\'s room for improvement in product quality.'),
	('Blaze', 'Storm', '61-100', 'M', 'Excellent', 'Very Good', 'Yes', 'Your products are excellent! I\'m very satisfied with my purchase.'),
	('Apollo', 'Light', '0-30', 'X', 'Good', 'Average', 'No', 'I had a good experience with your service. The product quality was average.'),
	('Luna', 'Shadow', '31-60', 'M', 'Average', 'Good', 'Maybe', 'I think your products are good, but there\'s room for improvement in quality.'),
	('Aurora', 'Borealis', '61-100', 'F', 'Excellent', 'Excellent', 'Yes', 'I love your products! They are of top-notch quality.'),
	('Orion', 'Night', '0-30', 'X', 'Good', 'Very Good', 'Yes', 'Your products are good. I would recommend them to others.'),
	('Draco', 'Malfoy', '31-60', 'M', 'Average', 'Good', 'No', 'The service was satisfactory, but the product quality could be improved.'),
	('Bellatrix', 'Lestrange', '61-100', 'F', 'Good', 'Very Good', 'Maybe', 'The service was good, but I expected better quality products.'),
	('Hermione', 'Granger', '0-30', 'X', 'Excellent', 'Excellent', 'Yes', 'Your products are excellent! I highly recommend them.'),
	('Ron', 'Weasley', '31-60', 'M', 'Good', 'Average', 'Maybe', 'I think your products are good, but the service could be improved.'),
	('Ginny', 'Weasley', '61-100', 'F', 'Very Good', 'Good', 'Yes', 'Your products are really good. I would definitely recommend them to others.'),
	('Harry', 'Potter', '0-30', 'M', 'Very Good', 'Good', 'Yes', 'I love your products! They are amazing.'),
	('Luna', 'Starshine', '31-60', 'F', 'Good', 'Average', 'Maybe', 'The service was good, but I think the product quality could be improved.'),
	('Neville', 'Longbottom', '61-100', 'M', 'Excellent', 'Very Good', 'Yes', 'I love your products! They are excellent quality.'),
	('Luna', 'Starshine', '0-30', 'M', 'Very Good', 'Good', 'Yes', 'Your products are very good. I recommend them to others.'),
	('Ginny', 'Weasley', '31-60', 'F', 'Good', 'Average', 'Maybe', 'The service was good, but I think the product quality could be improved.'),
	('Hermione', 'Granger', '61-100', 'M', 'Excellent', 'Very Good', 'Yes', 'I love your products! They are of excellent quality.'),
	('Luna', 'Starshine', '0-30', 'F', 'Good', 'Very Good', 'Yes', 'Your products are really good. I love them.'),
	('Luna', 'Starshine', '31-60', 'F', 'Good', 'Average', 'Maybe', 'The service was good, but I think the product quality could be better.'),
	('Luna', 'Starshine', '61-100', 'F', 'Excellent', 'Excellent', 'Yes', 'I love your products! They are amazing.'),
	('Luna', 'Starshine', '0-30', 'F', 'Very Good', 'Good', 'Yes', 'Your products are very good. I recommend them to others.'),
	('Luna', 'Starshine', '31-60', 'F', 'Good', 'Average', 'Maybe', 'The service was good, but I think the product quality could be improved.'),
	('Luna', 'Starshine', '61-100', 'F', 'Excellent', 'Very Good', 'Yes', 'I love your products! They are of excellent quality.');
	";

	if (mysqli_query($conn, $fbk)) {
		echo "Insert successfully.";
	} else {
		echo "Error inserting table: " . mysqli_error($conn);
	}

} catch (Exception $e) {
	echo "Error: " . $e->getMessage();
}

mysqli_close($conn);
?>