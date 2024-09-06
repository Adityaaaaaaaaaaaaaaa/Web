-- revoke user access to user Manager 
REVOKE INSERT, UPDATE ON Customer_Orders FROM Manager;
REVOKE INSERT, UPDATE ON Reservation FROM Manager;


-- Views ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-- View of low Inventory items:
SELECT * 
FROM low_inventory;


-- View of menu items with their category:
SELECT * 
FROM menu_categories;


-- View to show the average salary for each staff position:
SELECT * 
FROM average_salary_by_position;


-- View to get customer list 
SELECT * 
FROM customer_list;


-- View to get customer reservations 
SELECT * 
FROM customer_reservation_details;


-- Functions /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-- Function to inserting a new record into the Customer table
-- Test 1 - Error invalid menu
SELECT insert_customer('CN194', 'C076', 'Jessica', 'Doe', 'jessicadoe@example.com', '51515151', '13 Unlucky Rd', 'Flacq', '2023-04-05', 'M099');
SELECT insert_customer('CN195', 'C077', 'Sophia', 'Smith', 'sophiasmith@example.com', '58765432', '23 Royal Rd', 'Port Louis', '2023-04-13', 'M099');
SELECT insert_customer('CN196', 'C078', 'Aiden', 'Williams', 'aidenwilliams@example.com', '57892135', '45 Queen Elizabeth Ave', 'Beau Bassin', '2023-04-13', 'M099');
SELECT insert_customer('CN197', 'C079', 'Ethan', 'Taylor', 'ethantaylor@example.com', '57312945', '68 Rue de Eglise', 'Rose Hill', '2023-04-13', 'M099');

-- Test 2 - Successful 
SELECT insert_customer('CN194', 'C076', 'Albert', 'Sour', 'albertsour@example.com', '53535454', '12 Main St', 'Albion', '2023-04-05', 'M031');
SELECT insert_customer('CN195', 'C077', 'Sarah', 'Leclaire', 'sarahleclaire@example.com', '59262478', '32 Royal Road', 'Beau Bassin', '2023-04-05', 'M012');
SELECT insert_customer('CN196', 'C078', 'Jonathan', 'Chang', 'jonathanchang@example.com', '58102754', '17 Barking Lane', 'Port Louis', '2023-04-05', 'M043');
SELECT insert_customer('CN197', 'C079', 'Marie', 'Dupont', 'mariedupont@example.com', '58509413', '25 Sunflower Street', 'Rose Hill', '2023-04-05', 'M064');

-- Test 3 - Check in Customer Table 
SELECT * FROM Customer_Orders WHERE customer_id > 'C075' ;





-- Function to update a record in the Inventory table
-- Test 1 - Error
SELECT update_inventory_quantity('P999', 10);
SELECT update_inventory_quantity('P999', 20);
SELECT update_inventory_quantity('P999', 30);
SELECT update_inventory_quantity('P999', 40);

-- Test 2 - Successful
SELECT update_inventory_quantity('P009', 60); -- 1st try
SELECT update_inventory_quantity('P009', 70); -- 2nd try

-- Test 3 - Check in Inventory table
SELECT * 
FROM Inventory 
WHERE product_id = 'P009'; -- should be set to 70 on 2nd try 



 

-- Function to delete a record from the Staff table
-- To delete this staff from records , insert this new staff 
INSERT INTO Staff (staff_id, first_name, last_name, email, phone_number, street, city, position, join_date, salary_Rs)
VALUES
('SF26', 'Joe', 'Trump', 'joetrump@gmail.com', '59567439', 'Savanna Avenue', 'Valeta', 'Cook', '2021-03-12', 23000.00);

--Test 1 - Error - Staff Id does not exist 
SELECT delete_staff('SF99');

-- success 
-- Delete the new insert with id SF26
SELECT delete_staff('SF26');

-- Verify that the staff was deleted
SELECT * 
FROM Staff 
WHERE staff_id >= 'SF20';






-- Function to get a list of customers who have made reservations for a specific date:
-- Test 1 - Error - invalid dates 
SELECT * FROM get_customers_for_date('2025-03-29');
SELECT * FROM get_customers_for_date('2020-03-29');

-- Test 2 - Successful Date 
SELECT * FROM get_customers_for_date('2023-03-30');
SELECT * FROM get_customers_for_date('2023-04-01');





-- Trigger ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-- Trigger on Reservation tables:
-- test trigger - invalid customer id
INSERT INTO Reservation (reservation_id, CN_id, customer_id, rsv_date, rsv_time, guests_num, staff_id)
VALUES 
('CR071', 'CN194', 'C999', '2023-04-04', '18:30:00', 4, 'SF19');

-- test trigger - invalid staff id
INSERT INTO Reservation (reservation_id, CN_id, customer_id, rsv_date, rsv_time, guests_num, staff_id)
VALUES 
('CR071', 'CN194', 'C076', '2023-04-04', '18:30:00', 4, 'SF99');

-- Correct insert 
INSERT INTO Reservation (reservation_id, CN_id, customer_id, rsv_date, rsv_time, guests_num, staff_id)
VALUES 
('CR071', 'CN194', 'C076', '2023-04-04', '18:00:00', 4, 'SF19'),
('CR072', 'CN195', 'C077', '2023-04-04', '18:30:00', 5, 'SF24'),
('CR073', 'CN196', 'C078', '2023-04-04', '19:00:00', 6, 'SF09'),
('CR074', 'CN197', 'C079', '2023-04-04', '19:30:00', 7, 'SF05');

-- check reservation for insert 
SELECT *
FROM Reservation
WHERE reservation_id >= 'CR070';





-- Trigger 2: To check insert on menu table 
-- Test Incorrect insert
INSERT INTO Menu (menu_id, item_name, description, price_Rs, category)
VALUES 
('M076', '', 'Fried chicken with fries', 200.00, 'Fast Food'); -- empty item name

INSERT INTO Menu (menu_id, item_name, description, price_Rs, category)
VALUES('M077', 'Beef burger with Onions', 'Juicy beef patty with lettuce and cheese along with Onions, lots of Onions', 10000.00, 'Fast Food'); -- invalid price

INSERT INTO Menu (menu_id, item_name, description, price_Rs, category)
VALUES('M078', 'Steak', 'Tender beef steak with garlic butter', 300.00, ''); -- empty category

-- Add No description available 
INSERT INTO Menu (menu_id, item_name, description, price_Rs, category)
VALUES('M077', 'Piment Confi', '', 500.00, 'Dessert'); -- empty description

-- Same menu ID 
INSERT INTO Menu (menu_id, item_name, description, price_Rs, category)
VALUES('M075', 'kebab Poulet', 'Pain Kebab with Poulet and chilly', 60.00, 'Fast Food'); -- menu id already exists

-- Correct Insert
INSERT INTO Menu (menu_id, item_name, description, price_Rs, category)
VALUES ('M076', 'Spaghetti', 'Delicious spaghetti with tomato sauce and Hot chilli sauce , sorry for your stomach in advance !', 350.00, 'Pasta');

-- View new menu insert
SELECT * 
FROM Menu 
WHERE menu_id>'M070';


-- Complex Queries 
-- join the Inventory and Suppliers tables on the supplier_id column to return a list of all products with their corresponding supplier information.

SELECT Inventory.product_name, Suppliers.supplier_name 
FROM Inventory
INNER JOIN Suppliers 
ON Inventory.supplier_id = Suppliers.supplier_id;


-- Which customers have reservations assigned to them, which reservations have no customers assigned, and which customers have no reservations assigned to them?

SELECT c.CN_id, c.customer_id, c.first_name, c.last_name, r.reservation_id, r.rsv_date
FROM Customer_Orders c
FULL OUTER JOIN Reservation r ON c.CN_id = r.CN_id AND c.customer_id = r.customer_id;


-- What is the name and email of customers who made reservations with a party size of 4 or more? 

SELECT c.customer_id, first_name, last_name, email 
FROM Customer_Orders c 
JOIN Reservation r ON c.customer_id = r.customer_id 
WHERE r.guests_num >= 4
GROUP BY c.customer_id, first_name, last_name, email
ORDER BY c.customer_id;


-- Combine the first name, last name, and phone number of customers and staff members into a single result set.

SELECT first_name, last_name, phone_number
FROM Customer_Orders
UNION
SELECT first_name, last_name, phone_number
FROM Staff;


-- Find suppliers who have products in stock below the reorder threshold.

SELECT supplier_id FROM Inventory
WHERE stock_quantity < reorder_threshold
INTERSECT
SELECT supplier_id FROM Suppliers;


-- Make a report of all customers who made at least one reservation in the given dates  '2023-03-20' to  '2023-03-30' , 
-- including the total number of reservations and revenue generated from those reservations?"
-- This query can aslo be used to view the payment amount of the customers on the different days they were present
SELECT  c.customer_id, c.first_name, c.last_name, r.rsv_date, 
        COUNT(r.customer_id) AS number_of_reservations, 
        SUM(m.price_Rs * r.guests_num) AS total_revenue
FROM Customer_Orders c 
JOIN reservation r ON c.customer_id = r.customer_id
JOIN menu m ON c.menu_id = m.menu_id
WHERE r.rsv_date >= '2023-03-20' 
AND r.rsv_date <= '2023-03-30'
GROUP BY c.customer_id, c.first_name, c.last_name, r.rsv_date
HAVING COUNT(r.customer_id) >= 1 
ORDER BY r.rsv_date;





-- Simple queries

-- Discover the menu 
SELECT *
FROM Menu;


-- View all staff position Waiter ordered by salary
SELECT * 
FROM Staff
WHERE position = 'Waiter'
ORDER BY salary_rs;


-- Find all the customers whose city address starts with "P" and sort them by their customer id.

SELECT DISTINCT c.customer_id, * , c.cn_id
FROM Customer_Orders c
WHERE city LIKE 'P%' 
GROUP BY c.cn_id, c.customer_id;


-- Find the stock quantity of product where the stock quantity is less than the reorder threshold.

SELECT product_name, stock_quantity, reorder_threshold
FROM Inventory
WHERE stock_quantity < reorder_threshold;


-- Find the number of menu items in each category and return only those categories where the number of items is greater than 3:

SELECT category, COUNT(*) AS num_items
FROM Menu
GROUP BY category
HAVING COUNT(*) > 3;




