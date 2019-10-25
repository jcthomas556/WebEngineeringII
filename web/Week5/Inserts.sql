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

SELECT npc_fname FROM npc_characters WHERE npc_fname = '$name'

_________________________________ WEEK 6


ALTER TABLE player_characters
ADD COLUMN date_entered timestamp;

ALTER TABLE npc_characters
ADD COLUMN date_entered timestamp;

ALTER TABLE player_characters
ALTER date_entered SET DEFAULT now();

ALTER TABLE npc_characters
ALTER date_entered set default now();

UPDATE player_characters 
SET date_entered = now();

UPDATE npc_characters 
SET date_entered = now();

ALTER TABLE player_characters
ALTER COLUMN date_entered SET NOT NULL;

ALTER TABLE npc_characters
ALTER COLUMN date_entered SET NOT NULL;

DELETE FROM player_characters
WHERE date_entered = current_date;

DELETE FROM npc_characters
WHERE date_entered = current_date;


---------------------- join for date filtering
--- beautiful union and sort of time stamps

SELECT
   player_fname,
   player_lname,
   date_entered
FROM
   player_characters
UNION
SELECT
   npc_fname,
   npc_lname,
   date_entered
FROM
   npc_characters
ORDER BY date_entered DESC LIMIT 15;

SELECT player_character.player_fname, npc_characters.npc_fname, a.city FROM player_characters
JOIN address AS a ON p.id = a.person_id
WHERE a.zip = '97299';

SELECT p.*, a.street, a.city FROM persons AS p
JOIN address AS a ON p.id = a.person_id
WHERE a.zip = '97299';


----need a unique constraint

CREATE UNIQUE INDEX CONCURRENTLY player_characters_player_fname 
ON player_characters (player_fname);

CREATE UNIQUE INDEX CONCURRENTLY npc_characters_player_fname 
ON npc_characters (npc_fname);

ALTER TABLE player_characters 
ADD CONSTRAINT unique_player_characters_player_fname 
UNIQUE USING INDEX player_characters_player_fname;

ALTER TABLE npc_characters 
ADD CONSTRAINT unique_npc_characters_player_fname 
UNIQUE USING INDEX npc_characters_player_fname;

SELECT player_fname 
FROM player_characters
WHERE player_fname = 


SELECT player_fname 
FROM player_characters
WHERE player_fname = 'Saul';