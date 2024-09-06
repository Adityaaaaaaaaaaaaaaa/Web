-- Domains /////////////////////////////////////////////////////////////////////////////////////////////////////
CREATE DOMAIN menuID_dom AS VARCHAR(4) 
	CHECK (VALUE LIKE 'M%');

CREATE DOMAIN productID_dom AS VARCHAR(4) 
	CHECK (VALUE LIKE 'P%');

CREATE DOMAIN staffID_dom AS VARCHAR(4) 
	CHECK (VALUE LIKE 'SF%');

CREATE DOMAIN supplierID_dom AS VARCHAR(4) 
	CHECK (VALUE LIKE 'SP%');

CREATE DOMAIN customerID_dom AS VARCHAR(4) 
	CHECK (VALUE LIKE 'C%');

CREATE DOMAIN CN_ID_dom AS VARCHAR(5) 
	CHECK (VALUE LIKE '_N%'); 

CREATE DOMAIN reservationID_dom AS VARCHAR(5) 
	CHECK (VALUE LIKE '_R%'); 



-- Tables /////////////////////////////////////////////////////////////////////////////////////////////////////
-- Menu table
CREATE TABLE Menu (
  	menu_id menuID_dom NOT NULL,
  	item_name VARCHAR(50) NOT NULL,
  	description TEXT,
  	price_Rs NUMERIC(6, 2) NOT NULL CHECK (price_Rs BETWEEN 0.00 AND 9999.00),
  	category VARCHAR(75) NOT NULL,
  	PRIMARY KEY (menu_id)
);


-- Suppliers table
CREATE TABLE Suppliers (
  	supplier_id supplierID_dom NOT NULL,
  	supplier_name VARCHAR(75) NOT NULL,
  	supplier_contact VARCHAR(10) NOT NULL,
  	supplier_email VARCHAR(100) NOT NULL UNIQUE,
  	street VARCHAR(50) NOT NULL,
  	city VARCHAR(50) NOT NULL,
  	PRIMARY KEY (supplier_id)
);


-- Staff table
CREATE TABLE Staff (
  	staff_id staffID_dom NOT NULL, 
  	first_name VARCHAR(50) NOT NULL,
  	last_name VARCHAR(50) NOT NULL,
  	email VARCHAR(100) NOT NULL UNIQUE,
  	phone_number VARCHAR(10) NOT NULL,
  	street VARCHAR(50) NOT NULL,
  	city VARCHAR(50) NOT NULL,
  	position VARCHAR(50) NOT NULL CHECK (position IN ('Owner', 'Manager', 'Waiter', 'Cook', 'Inventory_keeper', 'Cleaner', 'Helper')),
  	join_date DATE NOT NULL CHECK (join_date <= CURRENT_DATE),
  	salary_Rs NUMERIC(7, 2) NOT NULL CHECK (salary_Rs BETWEEN 11000.00 AND 99999.00 ),
  	PRIMARY KEY (staff_id)
);

-- Inventory table
CREATE TABLE Inventory (
  	product_id productID_dom NOT NULL,
  	product_name VARCHAR(50) NOT NULL,
  	stock_quantity INTEGER NOT NULL,
  	reorder_threshold INTEGER NOT NULL,
  	supplier_id supplierID_dom NOT NULL,
  	PRIMARY KEY (product_id),
  	FOREIGN KEY (supplier_id) REFERENCES Suppliers
		ON DELETE SET NULL
		ON UPDATE CASCADE
);

-- Customer Orders table
CREATE TABLE Customer_Orders (
  	CN_id CN_ID_dom NOT NULL,
  	customer_id customerID_dom NOT NULL,
  	first_name VARCHAR(50) NOT NULL,
  	last_name VARCHAR(50) NOT NULL,
  	email VARCHAR(100) NOT NULL,
  	phone_number VARCHAR(10) NOT NULL,
  	street VARCHAR(50) NOT NULL,
  	city VARCHAR(50) NOT NULL,
  	Date DATE NOT NULL,
  	menu_id menuID_dom NOT NULL,
  	PRIMARY KEY (CN_id, customer_id),
  	FOREIGN KEY (menu_id) REFERENCES Menu
		ON DELETE SET NULL
		ON UPDATE CASCADE
);

-- Reservation table
CREATE TABLE Reservation (
  	reservation_id reservationID_dom NOT NULL,
  	CN_id CN_ID_dom NOT NULL,
  	customer_id customerID_dom NOT NULL,
  	rsv_date DATE NOT NULL,
  	rsv_time TIME NOT NULL,
  	guests_num INTEGER NOT NULL CHECK (guests_num BETWEEN 0 AND 15 ),
  	staff_id staffID_dom,
  	PRIMARY KEY (reservation_id),
  	FOREIGN KEY (staff_id) REFERENCES Staff
    	ON DELETE SET NULL
    	ON UPDATE CASCADE,
  	FOREIGN KEY (CN_id, customer_id) REFERENCES Customer_Orders (CN_id, customer_id)
   		ON DELETE SET NULL
    	ON UPDATE CASCADE
);



-- Views //////////////////////////////////////////////////////////////////////////////////////////////////////////
-- View of low Inventory items:

CREATE VIEW low_inventory AS
SELECT i.product_name, i.stock_quantity, i.reorder_threshold
FROM Inventory i
WHERE i.stock_quantity < i.reorder_threshold;


-- View of menu items with their category:

CREATE VIEW menu_categories AS
SELECT m.item_name, m.category
FROM Menu m
ORDER BY category ASC;


-- View to show the average salary for each staff position:

CREATE VIEW average_salary_by_position AS
SELECT position, AVG(salary_Rs) AS average_salary
FROM Staff
GROUP BY position;


-- View to get full customer list:

CREATE VIEW customer_list AS 
SELECT DISTINCT customer_id, first_name, last_name, street, city, phone_number, email 
FROM Customer_Orders
ORDER BY customer_id; 


-- View to get customer reservations: 

CREATE VIEW customer_reservation_details AS
SELECT r.reservation_id, r.rsv_date, r.rsv_time, r.guests_num, c.customer_id, c.first_name, c.last_name, c.email, c.phone_number
FROM Reservation r
JOIN Customer_Orders c ON r.customer_id = c.customer_id
GROUP BY r.reservation_id, r.rsv_date, r.rsv_time, r.guests_num, c.customer_id, c.first_name, c.last_name, c.email, c.phone_number
ORDER BY r.rsv_date, r.rsv_time;




-- Functions //////////////////////////////////////////////////////////////////////////////////////////////////
-- Function to inserting a new record into the Customer table:

CREATE OR REPLACE FUNCTION insert_customer(
	xCN_id CN_ID_dom,
	xcustomer_id customerID_dom,
	xfirst_name VARCHAR(50),
	xlast_name VARCHAR(50),
	xemail VARCHAR(100),
	xphone_number NUMERIC(10),
	xstreet VARCHAR(50),
	xcity VARCHAR(50),
	xdate DATE,
	xmenu_id menuID_dom
) RETURNS VOID AS $$
BEGIN
	INSERT INTO Customer_Orders (CN_id, customer_id, first_name, last_name, email, phone_number, street, city, date, menu_id)
	VALUES (xCN_id, xcustomer_id, xfirst_name, xlast_name, xemail, xphone_number, xstreet, xcity, xdate, xmenu_id);
	
	RAISE INFO 'New Customer with ID % inserted successfully', xcustomer_id;
	RAISE INFO 'Customer Name: % %', xfirst_name, xlast_name;
	RAISE INFO 'Customer contact: %', xphone_number;
	RAISE INFO 'Customer email: %', xemail;
	RAISE INFO 'Customer address: % , %', xstreet, xcity;
	
	EXCEPTION
		WHEN foreign_key_violation THEN
			RAISE EXCEPTION 'Invalid Menu ID: % - INSERTION FAILED', xmenu_id
			USING HINT = 'Check Menu ID again';
		WHEN others THEN
			RAISE EXCEPTION 'Error inserting customer, Please recheck insert or Try again';
END;
$$ LANGUAGE plpgsql;





-- Function to update a record in the Inventory table:

CREATE OR REPLACE FUNCTION update_inventory_quantity(
  	xproduct_id productID_dom,
  	xquantity INTEGER
) RETURNS VOID AS $$
DECLARE
  	rows_updated INTEGER;
BEGIN  
  	UPDATE Inventory
  	SET stock_quantity = xquantity
  	WHERE product_id = xproduct_id;

  	-- check if any rows were updated
  	GET DIAGNOSTICS rows_updated = ROW_COUNT;

  	IF rows_updated = 0 THEN
    	RAISE EXCEPTION 'Product with ID % not found', xproduct_id
		USING HINT = 'Check Product ID again';
  	ELSE
    	RAISE NOTICE 'Update Successful';
    	RAISE NOTICE 'Inventory quantity updated for product with ID %', xproduct_id;
  	END IF;
  
  	EXCEPTION
    	WHEN others THEN
      		RAISE EXCEPTION 'ERROR - Product ID % not updated or not found', xproduct_id
	  		USING HINT ='Check Product ID again';
END;
$$ LANGUAGE plpgsql;





-- Function to delete a record from the Staff table:

CREATE OR REPLACE FUNCTION delete_staff(
  staff_id_in staffID_dom 
) 
RETURNS VOID AS $$
BEGIN
  	DELETE FROM Staff
  	WHERE staff_id = staff_id_in;

  	IF NOT FOUND THEN
    	RAISE EXCEPTION 'Staff with ID % not found', staff_id_in
		USING HINT = 'Check Staff ID';
  	ELSE
    	RAISE NOTICE 'Staff with ID % deleted successfully', staff_id_in;
  	END IF;
END;
$$ LANGUAGE plpgsql;





-- Function to get a list of customers who have made reservations for a specific date:

CREATE OR REPLACE FUNCTION get_customers_for_date(rsv_date_in date)
RETURNS TABLE (first_name VARCHAR, last_name VARCHAR, email VARCHAR, phone_number VARCHAR, rsv_date DATE)
AS $$
BEGIN
    RETURN QUERY
    SELECT c.first_name, c.last_name, c.email, c.phone_number, r.rsv_date
    FROM Customer_Orders c
    JOIN Reservation r ON c.customer_id = r.customer_id
    WHERE r.rsv_date = rsv_date_in
    GROUP BY c.first_name, c.last_name, c.email, c.phone_number, r.rsv_date;
        
    IF NOT EXISTS (SELECT 1 FROM Reservation WHERE Reservation.rsv_date = rsv_date_in) THEN
        RAISE EXCEPTION 'No reservations found for date %', rsv_date_in
		USING HINT = 'Check Reservation DATE';
    ELSE
        RAISE NOTICE 'Data retrieved successfully';
        RAISE NOTICE 'Customer list for reservation date: %', rsv_date_in;
    END IF;
END;
$$ LANGUAGE plpgsql;





-- Triggers //////////////////////////////////////////////////////////////////////////////////////////////////////////////
-- Trigger to check insert before insert or update in reservation table

CREATE OR REPLACE FUNCTION check_reservation_customer()
RETURNS TRIGGER AS $$
BEGIN
    IF NEW.customer_id NOT IN (SELECT customer_id FROM Customer_Orders) THEN
        RAISE EXCEPTION 'Invalid Customer ID or insert new customer' 
            USING HINT = 'Check Customer ID';
    END IF;

    IF NEW.staff_id NOT IN (SELECT staff_id FROM Staff) THEN
        RAISE EXCEPTION 'Invalid Staff ID' 
            USING HINT = 'Check Staff ID';
    END IF;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER check_reservation_customer_trigger
AFTER INSERT OR UPDATE ON Reservation
FOR EACH ROW
EXECUTE FUNCTION check_reservation_customer(); 





-- trigger 2 , check insert on menu before insert

CREATE OR REPLACE FUNCTION check_menu_insert()
RETURNS TRIGGER AS $$
BEGIN
    -- Check if item name is not null and not an empty string
    IF NEW.item_name IS NULL OR NEW.item_name = '' THEN
        RAISE EXCEPTION 'Item name cannot be null or empty'
		USING HINT = 'Check item name';
    END IF;
    
    -- Check if price_Rs is within valid range
    IF NEW.price_Rs < 0.00 OR NEW.price_Rs > 9999.00 THEN
        RAISE EXCEPTION 'Price must be between 0.00 and 9999.00'
		USING HINT = 'Check Price';
    END IF;
    
    -- Check if category is not null and not an empty string
    IF NEW.category IS NULL OR NEW.category = '' THEN
        RAISE EXCEPTION 'Category cannot be null or empty'
		USING HINT = 'Check Category';
    END IF;
    
    -- Assign a default value for description column if it is not provided by user
    IF NEW.description IS NULL THEN
        NEW.description := 'No description available';
    END IF;
    
    -- Check if description is not an empty string
    IF NEW.description = '' THEN
        RAISE EXCEPTION 'Description cannot be empty'
		USING HINT = 'Check Description';
    END IF;

	-- Check if menu_id already exists
    IF EXISTS (SELECT 1 FROM Menu WHERE menu_id = NEW.menu_id) THEN
        RAISE EXCEPTION 'Menu item with ID % already exists', NEW.menu_id
		USING HINT = 'Check Menu ID again';
    END IF;
    
    -- If all checks pass, return the new row
	RAISE NOTICE 'Insert Successful';
	RAISE INFO 'Menu ID: %', NEW.menu_id;
	RAISE INFO 'Item name: %', NEW.item_name;
	RAISE INFO 'Description: %', NEW.description;
	RAISE INFO 'Category: %', NEW.category;
	RAISE INFO 'Price: Rs %', NEW.price_Rs;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER menu_insert_trigger
BEFORE INSERT ON Menu
FOR EACH ROW
EXECUTE FUNCTION check_menu_insert();



-- Index ///////////////////////////////////////////////////////////////////////////////////////////////////////////

CREATE INDEX menu_category_index ON Menu(category);
CREATE INDEX customer_id_index ON Customer_Orders(customer_id);
CREATE INDEX CN_id_index ON Customer_Orders(CN_id);
CREATE INDEX reservation_id_index ON Reservation(reservation_id);



-- Users ///////////////////////////////////////////////////////////////////////////////////////////////////////////

-- Users 
CREATE USER Owner_R WITH PASSWORD 'owner123456789';
CREATE USER Manager WITH PASSWORD 'manager123456789';
CREATE USER Cook WITH PASSWORD 'cook123456789';
CREATE USER Waiter WITH PASSWORD 'waiter123456789';
CREATE USER Inventory_keeper WITH PASSWORD 'inventory123456789';

-- manager permissions
GRANT SELECT, INSERT, UPDATE ON Menu TO Manager;
GRANT SELECT, INSERT, UPDATE ON Inventory TO Manager;
GRANT SELECT, INSERT, UPDATE ON Staff TO Manager;
GRANT SELECT, INSERT, UPDATE ON Customer_Orders TO Manager;
GRANT SELECT, INSERT, UPDATE ON Reservation TO Manager;
GRANT SELECT, UPDATE ON Suppliers TO Manager;

-- cook permissions
GRANT SELECT, INSERT, UPDATE ON Menu TO Cook;
GRANT SELECT ON Inventory TO Cook;
GRANT SELECT, INSERT, UPDATE ON Suppliers TO Cook;

-- waiter permissions
GRANT SELECT ON Menu TO Waiter;
GRANT SELECT, INSERT, UPDATE ON Customer_Orders TO Waiter;
GRANT SELECT, INSERT, UPDATE ON Reservation TO Waiter;

-- inventory_keeper permissions
GRANT SELECT ON Menu TO Inventory_keeper;
GRANT SELECT, INSERT, UPDATE ON Inventory TO Inventory_keeper;
GRANT SELECT, UPDATE ON Suppliers TO Inventory_keeper;

-- owner permissions
GRANT ALL PRIVILEGES ON Menu TO Owner_R WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON Inventory TO Owner_R WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON Staff TO Owner_R WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON Customer_Orders TO Owner_R WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON Reservation TO Owner_R WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON Suppliers TO Owner_R WITH GRANT OPTION;


