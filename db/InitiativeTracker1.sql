create table player_characters(player_id SERIAL primary key, player_fname varchar(50) NOT NULL,
player_lname varchar(50), player_ac int NOT NULL, player_Init_Bonus int NOT NULL, player_race varchar(50),
player_class varchar(50) );

create table npc_characters(npc_id SERIAL primary key, npc_fname varchar(50) NOT NULL,
npc_lname varchar(50), npc_ac int NOT NULL, npc_Init_Bonus int NOT NULL, npc_race_type varchar(50),
enemy BOOl);

create table images(image_id SERIAL primary key, player_id int references player_characters(player_id) NOT NULL,
npc_id int references npc_characters(npc_id) NOT NULL, player_character BOOL, img_description text);