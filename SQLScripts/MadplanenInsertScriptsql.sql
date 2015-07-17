use kragsberger_dk;

insert into USER (first_name, last_name, email, password, salt) values ('Thomas', 'Kragsberger', 'Thomas_kragsberger@live.dk', '48ac2f7249ac26647ea2c7aea3fa59a7', 'e4dee3f7802852167d0d5f89ad68a8bf');
insert into USER (first_name, last_name, email, password, salt) values ('Bente', 'Kragsberger', 'Bente_kragsberger@live.dk', '48ac2f7249ac26647ea2c7aea3fa59a7', 'e4dee3f7802852167d0d5f89ad68a8bf');
insert into USER (first_name, last_name, email, password, salt, rights) values ('Admin', 'Admin', 'Admin@admin.dk', '48ac2f7249ac26647ea2c7aea3fa59a7', 'e4dee3f7802852167d0d5f89ad68a8bf', 1);

insert into GROCERIES (groceries_item_name, groceries_info) values ('Hakket Oksekød', '14%');
insert into GROCERIES (groceries_item_name, groceries_info) values ('Gulerødder', 'Økologiske');
insert into GROCERIES (groceries_item_name, groceries_info) values ('Flåede Tomater', 'Dåser');
insert into GROCERIES (groceries_item_name, groceries_info) values ('Spagetti', 'Almindelige');
insert into GROCERIES (groceries_item_name, groceries_info) values ('Tomatpure', 'Dåser');
insert into GROCERIES (groceries_item_name, groceries_info) values ('Løg', 'Poser');
insert into GROCERIES (groceries_item_name, groceries_info) values ('Hvidløg', 'Fed');
insert into GROCERIES (groceries_item_name, groceries_info) values ('Ris', 'Jasminris/Basmatic/....');
insert into GROCERIES (groceries_item_name, groceries_info) values ('Flute', 'Brød');
insert into GROCERIES (groceries_item_name, groceries_info) values ('Taco Kryderi', 'Blandet krydderi');
insert into GROCERIES (groceries_item_name, groceries_info) values ('Ketchup', 'Flaske');

insert into RECIPE (recipe_name) values ('Spagetti og Kødsovs');
insert into RECIPE (recipe_name) values ('Taco skaller');

insert into RECIPE_INGREDIENTS (groceries_id, recipe_id, amount_gram, number_of_item) values (1, 1, 500, null);
insert into RECIPE_INGREDIENTS (groceries_id, recipe_id, amount_gram, number_of_item) values (3, 1, null, 2);
insert into RECIPE_INGREDIENTS (groceries_id, recipe_id, amount_gram, number_of_item) values (4, 1, 100, null);
insert into RECIPE_INGREDIENTS (groceries_id, recipe_id, amount_gram, number_of_item) values (5, 1, null, 1);
insert into RECIPE_INGREDIENTS (groceries_id, recipe_id, amount_gram, number_of_item) values (6, 1, null, 2);
insert into RECIPE_INGREDIENTS (groceries_id, recipe_id, amount_gram, number_of_item) values (7, 1, null, 5);
insert into RECIPE_INGREDIENTS (groceries_id, recipe_id, amount_gram, number_of_item) values (1, 2, 500, null);
insert into RECIPE_INGREDIENTS (groceries_id, recipe_id, amount_gram, number_of_item) values (7, 2, null, 5);
insert into RECIPE_INGREDIENTS (groceries_id, recipe_id, amount_gram, number_of_item) values (8, 2, 300, null);
insert into RECIPE_INGREDIENTS (groceries_id, recipe_id, amount_gram, number_of_item) values (9, 2, null, 1);
insert into RECIPE_INGREDIENTS (groceries_id, recipe_id, amount_gram, number_of_item) values (10, 2, null, 2);

insert into INVENTORY (user_id, groceries_id, amount_gram, number_of_item) values (1, 2, 500, null);

insert into MEAL_PLAN (day_number, user_id, recipe_id) values (1, 1, 1);
insert into MEAL_PLAN (day_number, user_id, recipe_id) values (1, 2, 1);

insert into LEFTOVERS (user_id, recipe_id, food_for_no_of_people) values (1, 2, 2);

insert into SHOPPING_LIST (user_id, groceries_id, amount_gram, number_of_item) values (1, 3, null, 2);
insert into SHOPPING_LIST (user_id, groceries_id, amount_gram, number_of_item) values (1, 4, null, 1);
insert into SHOPPING_LIST (user_id, groceries_id, amount_gram, number_of_item) values (1, 5, null, 1);
insert into SHOPPING_LIST (user_id, groceries_id, amount_gram, number_of_item) values (1, 6, null, 1);
insert into SHOPPING_LIST (user_id, groceries_id, amount_gram, number_of_item) values (1, 7, null, 1);

insert into MUST_HAVE_ITEM (user_id, groceries_id, in_inventory) values (1, 11, 'yes');

update MUST_HAVE_ITEM
set in_inventory = 'no'
where must_have_item_id = 1;