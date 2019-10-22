INSERT into npc_characters (npc_fname, npc_lname, npc_ac, npc_init_bonus, npc_race_type, enemy) 
VALUES (
    'Jim',
    'Jammin',
    '16',
    '3',
    'humanoid',
    'f'
    );


INSERT into npc_characters (npc_fname, npc_lname, npc_ac, npc_init_bonus, npc_race_type, enemy) 
VALUES (
    'Bob',
    'Belcher',
    '17',
    '-2',
    'humanoid',
    'f'
    );


INSERT into npc_characters (npc_fname, npc_lname, npc_ac, npc_init_bonus, npc_race_type, enemy) 
VALUES (
    'Louise',
    'Belcher',
    '10',
    '7',
    'child',
    't'
    );

INSERT into player_characters (player_fname, player_lname, player_ac, player_init_bonus, player_race, player_class) 
VALUES (
    'Saul',
    'Solarian',
    '14',
    '1',
    'Aasimar',
    'Sorcerer'
    );

INSERT into player_characters (player_fname, player_lname, player_ac, player_init_bonus, player_race, player_class) 
VALUES (
    'Flouise',
    'Knight',
    '18',
    '-1',
    'Water Genasi',
    'Paladin'
    );

INSERT into player_characters (player_fname, player_lname, player_ac, player_init_bonus, player_race, player_class) 
VALUES (
    'Arra',
    'Khai',
    '14',
    '3',
    'Aarakocra',
    'Ranger'
    );


INSERT into images (player_character, img_description, img) 
VALUES (
    't',
    'saul_image',
    bytea('saul_image.jpg')
    );


UPDATE player_characters
SET image_id = 
    (
        SELECT image_id
        FROM images
        WHERE img_description = 'saul_image'
    ) 
WHERE
   player_fname = 'Saul';

SELECT * FROM npc_characters WHERE npc_fname = '$name'

_________________________________ WEEK 6


ALTER TABLE player_characters
ADD COLUMN date_entered timestamp;

ALTER TABLE npc_characters
ADD COLUMN date_entered timestamp;

ALTER TABLE player_characters
Collumn date_entered set default CURRENT_DATE;

ALTER TABLE npc_characters
Collumn date_entered set default CURRENT_DATE;

make both collumns not null