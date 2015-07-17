use kragsberger_dk;

drop trigger ADD_TO_SHOPPING_LIST;
drop table MUST_HAVE_ITEM;
drop table SHOPPING_LIST;
drop table LEFTOVERS;
drop table MEAL_PLAN;
drop table INVENTORY;
drop table RECIPE_INGREDIENTS;
drop table RECIPE;
drop table USER;
drop table GROCERIES;

CREATE TABLE USER (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(30) NOT NULL,
  email VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(32) NOT NULL,
  salt VARCHAR(32) NOT NULL,
  rights int NOT NULL DEFAULT 2
);

CREATE TABLE GROCERIES (
  groceries_id INT AUTO_INCREMENT NOT NULL,
  groceries_item_name VARCHAR(30) NOT NULL,
  groceries_info VARCHAR(255) NOT NULL,
  PRIMARY KEY (groceries_id, groceries_item_name, groceries_info)
);

CREATE TABLE RECIPE (
  recipe_id INT AUTO_INCREMENT PRIMARY KEY,
  recipe_name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE RECIPE_INGREDIENTS (
  groceries_id INT NOT NULL,
  recipe_id INT NOT NULL,
  amount_gram INT,
  number_of_item INT,
  FOREIGN KEY (groceries_id) REFERENCES GROCERIES(groceries_id),
  FOREIGN KEY (recipe_id) REFERENCES RECIPE(recipe_id)
);

CREATE TABLE INVENTORY (
  inventory_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  groceries_id INT NOT NULL,
  amount_gram INT,
  number_of_item INT,
  FOREIGN KEY (groceries_id) REFERENCES GROCERIES(groceries_id),
  FOREIGN KEY (user_id) REFERENCES USER(user_id)
);

CREATE TABLE MEAL_PLAN (
  day_number INT NOT NULL,
  user_id INT NOT NULL,
  recipe_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES USER(user_id),
  FOREIGN KEY (recipe_id) REFERENCES RECIPE(recipe_id),
  PRIMARY KEY (day_number, user_id)
);

CREATE TABLE LEFTOVERS (
  leftovers_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  recipe_id INT NOT NULL,
  food_for_no_of_people INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES USER(user_id),
  FOREIGN KEY (recipe_id) REFERENCES RECIPE(recipe_id)
);

CREATE TABLE SHOPPING_LIST (
  user_id INT NOT NULL,
  groceries_id INT NOT NULL,
  amount_gram INT,
  number_of_item INT,
  FOREIGN KEY (user_id) REFERENCES USER(user_id),
  FOREIGN KEY (groceries_id) REFERENCES GROCERIES(groceries_id)
);

CREATE TABLE MUST_HAVE_ITEM (
  must_have_item_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  groceries_id INT NOT NULL,
  in_inventory VARCHAR(3) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES USER(user_id),
  FOREIGN KEY (groceries_id) REFERENCES GROCERIES(groceries_id)
);

CREATE TRIGGER ADD_TO_SHOPPING_LIST 
AFTER UPDATE ON MUST_HAVE_ITEM
FOR EACH ROW
INSERT INTO SHOPPING_LIST (user_id, groceries_id, amount_gram, number_of_item)
VALUES (OLD.user_id, OLD.groceries_id, null, 1);