--Drop Tables in Order to recreate if needed
DROP TABLE IF EXISTS games CASCADE;
DROP TABLE IF EXISTS description CASCADE;
DROP TABLE IF EXISTS msrp CASCADE;
DROP TABLE IF EXISTS images CASCADE;
DROP TABLE IF EXISTS reviews CASCADE;
DROP TABLE IF EXISTS for_sale CASCADE;

--Create Tables
CREATE TABLE games (
	game_id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(150) NOT NULL
	--description_id INTEGER NOT NULL REFERENCES description (description_id),
	--msrp_id INTEGER NOT NULL REFERENCES msrp (msrp_id),
	--images_id INTEGER NOT NULL REFERENCES images (images_id)
);

CREATE TABLE description (
	description_id SERIAL NOT NULL PRIMARY KEY,
	game_id INTEGER NOT NULL REFERENCES games (game_id),
	description_text TEXT NOT NULL,
	duration INTEGER NOT NULL,
	complexity INTEGER NOT NULL,
	min_players INTEGER NOT NULL,
	max_players INTEGER NOT NULL,	
	CHECK (duration > 0 AND duration < 999),
	CHECK (complexity >= 1 AND complexity <= 5),
	CHECK (min_players >= 1 AND min_players <= max_players),
	CHECK (max_players >= min_players AND max_players <= 999)
);

CREATE TABLE msrp (
	msrp_id SERIAL NOT NULL PRIMARY KEY,
	game_id INTEGER NOT NULL REFERENCES games (game_id),
	msrp_price FLOAT NOT NULL,
	historical_low FLOAT,
	historical_high FLOAT,
	CHECK (msrp_price > 0 AND msrp_price < 9999.99)
);

CREATE TABLE images (
	images_id SERIAL NOT NULL PRIMARY KEY,
	game_id INTEGER NOT NULL REFERENCES games (game_id),
	img_name VARCHAR(150) NOT NULL,
	alt_txt VARCHAR(150) NOT NULL
);


CREATE TABLE reviews (
	review_id SERIAL NOT NULL PRIMARY KEY,
	game_id INTEGER NOT NULL REFERENCES games (game_id),
	rating INTEGER NOT NULL,
	review_text TEXT,
	CHECK (rating <= 5 AND rating >= 0)
);

CREATE TABLE for_sale (
	sale_id SERIAL NOT NULL PRIMARY KEY,
	game_id INTEGER NOT NULL  REFERENCES games (game_id),
	price FLOAT NOT NULL,
	condition VARCHAR(100) NOT NULL,
	sold BOOLEAN NOT NULL DEFAULT FALSE,
	CHECK (price > 0.0 AND price < 9999.99)
);

CREATE TABLE admins (
	admin_id SERIAL NOT NULL PRIMARY,
	username VARCHAR(100) NOT NULL UNIQUE,
	stored_hash TEXT NOT NULL
);

--Base Game Inserts
INSERT INTO games (name)
	VALUES ('Battlestar Galactica: The Board Game');
INSERT INTO games (name)
	VALUES ('Brass: Birmingham');
INSERT INTO games (name)
	VALUES ('Sekigahara: The Unification of Japan');
INSERT INTO games (name)
	VALUES ('Star Trek: Fleet Captains');
INSERT INTO games (name)
	VALUES ('Star Trek: Ascendancy');
INSERT INTO games (name)
	VALUES ('Twilight Imperium (Fourth Edition)');
INSERT INTO games (name)
	VALUES ('War of the Ring: Second Edition');


INSERT INTO description (game_id, description_text, duration, complexity, min_players, max_players)
	VALUES ('1','Battlestar Galactica: The Board Game is an exciting game of mistrust, intrigue, and the struggle for survival. Based on the epic and widely-acclaimed Sci Fi Channel series, Battlestar Galactica: The Board Game puts players in the role of one of ten of their favorite characters from the show. Each playable character has their own abilities and weaknesses, and must all work together in order for humanity to have any hope of survival. However, one or more players in every game secretly side with the Cylons. Players must attempt to expose the traitor while fuel shortages, food contaminations, and political unrest threatens to tear the fleet apart.',
			'120', '3', '3', '6');
INSERT INTO description (game_id, description_text, duration, complexity, min_players, max_players)
	VALUES ('2','Brass: Birmingham is an economic strategy game sequel to Martin Wallace 2007 masterpiece, Brass. Birmingham tells the story of competing entrepreneurs in Birmingham during the industrial revolution, between the years of 1770-1870. As in its predecessor, you must develop, build, and establish your industries and network, in an effort to exploit low or high market demands.',
			'60', '4', '2', '4');
INSERT INTO description (game_id, description_text, duration, complexity, min_players, max_players)
	VALUES ('3','The battle of Sekigahara, fought in 1600 at a crossroads in Japan, unified that nation under the Tokugawa family for more than 250 years. Sekigahara allows you to re-contest that war as Ishida Mitsunari, defender of a child heir, or Tokugawa Ieyasu, Japan''s most powerful daimyo (feudal lord). The campaign lasted only 7 weeks, during which each side improvised an army and a strategy with what forces their allies could provide. Each leader harbored deep doubts as to the loyalty of his units - for good reason. Several daimyo refused to fight; some even turned sides in the midst of battle. To conquer Japan you must do more than field an army - you must be sure it will follow you into combat. Cultivate the loyalty of your allies and deploy them only when you are confident of their allegiance. Win a battle by gaining a defection from the ranks of your opponent.',
			'180', '2', '2', '2');
INSERT INTO description (game_id, description_text, duration, complexity, min_players, max_players)
	VALUES ('4','Star Trek: Fleet Captains, designed for two or four players, is set in the "Prime Universe" of STAR TREK (as seen in the various TV series and movies up to Star Trek: Nemesis) and is more adversarial in nature when compared to Star Trek: Expeditions. Each player takes the role of a faction (or race) from the universe. In the base game, the choices are Klingons and Federation. Each faction has a number of ships (on Clix dials similar to the Heroclix line of components) of varying ability and with a corresponding “size.” Fleets of ships are drafted to a given size total which reflects the victory points required to win. Thus, larger fleet sizes lead to higher point (and longer games).',
			'90', '3', '2', '4');
INSERT INTO description (game_id, description_text, duration, complexity, min_players, max_players)
	VALUES ('5','Boldly go where no one has gone before. In Star Trek: Ascendancy — a board game of exploration, expansion and conflict between the United Federation of Planets, the Klingon Empire, and the Romulan Star Empire — you control the great civilizations of the Galaxy, striking out from your home worlds to expand your influence and grow your civilization. Will you journey for peace and exploration, or will you travel the path of conquest and exploitation? Command starships, establish space lanes, construct starbases, and bring other systems under your banner. With more than 200 plastic miniatures and 30 star systems representing some of the Star Trek galaxy''s most notable planets and locations, Star Trek: Ascendancy puts the fate of the galaxy in your hands.',
			'180', '3', '3', '3');
INSERT INTO description (game_id, description_text, duration, complexity, min_players, max_players)
	VALUES ('6','Twilight Imperium (Fourth Edition) is a game of galactic conquest in which three to six players take on the role of one of seventeen factions vying for galactic domination through military might, political maneuvering, and economic bargaining. Every faction offers a completely different play experience, from the wormhole-hopping Ghosts of Creuss to the Emirates of Hacan, masters of trade and economics. These seventeen races are offered many paths to victory, but only one may sit upon the throne of Mecatol Rex as the new masters of the galaxy.',
			'240', '4', '3', '6');
INSERT INTO description (game_id, description_text, duration, complexity, min_players, max_players)
	VALUES ('7','In War of the Ring, one player takes control of the Free Peoples (FP), the other player controls Shadow Armies (SA). Initially, the Free People Nations are reluctant to take arms against Sauron, so they must be attacked by Sauron or persuaded by Gandalf or other Companions, before they start to fight properly: this is represented by the Political Track, which shows if a Nation is ready to fight in the War of the Ring or not.',
			'150', '4', '2', '4');
	
INSERT INTO msrp (game_id, msrp_price, historical_low, historical_high)
	VALUES ('1', '59.99', '59.99', '59.99');
INSERT INTO msrp (game_id, msrp_price, historical_low, historical_high)
	VALUES ('2', '59.99', '59.99', '59.99');
INSERT INTO msrp (game_id, msrp_price, historical_low, historical_high)
	VALUES ('3', '49.99', '49.99', '49.99');
INSERT INTO msrp (game_id, msrp_price, historical_low, historical_high)
	VALUES ('4', '149.99', '149.99', '149.99');
INSERT INTO msrp (game_id, msrp_price, historical_low, historical_high)
	VALUES ('5', '99.99', '99.99', '99.99');
INSERT INTO msrp (game_id, msrp_price, historical_low, historical_high)
	VALUES ('6', '149.95', '149.95', '149.95');
INSERT INTO msrp (game_id, msrp_price, historical_low, historical_high)
	VALUES ('7', '89.99', '89.99', '89.99');
	
INSERT INTO images (game_id, img_name, alt_txt)
	VALUES ('1', 'battlestargalactica.jpg', 'Box art for Battlestar Galatica the Board Game');
INSERT INTO images (game_id, img_name, alt_txt)
	VALUES ('2', 'brassbirmingham.jpg', 'Box Art for Brass Brimingham');
INSERT INTO images (game_id, img_name, alt_txt)
	VALUES ('3', 'sekigahara.jpg', 'Box Art for Sekigahara');
INSERT INTO images (game_id, img_name, alt_txt)
	VALUES ('5', 'startrekascendancy.jpg', 'Box Art For Star Trek Ascendancy');
INSERT INTO images (game_id, img_name, alt_txt)
	VALUES ('4', 'startrekfleetcaptains.jpg', 'Box Art for Star Trek Fleet Captains');
INSERT INTO images (game_id, img_name, alt_txt)
	VALUES ('6', 'twilightimperium.jpg', 'Box Art for Twilight Imperium 4th Edition');
INSERT INTO images (game_id, img_name, alt_txt)
	VALUES ('7', 'warofthering2nd.jpg', 'Box Art for War of the Ring 2nd Edition');
	
--Test our items are working and connected
SELECT g.name, i.img_name, i.alt_txt
FROM games g, images i
WHERE g.game_id = i.game_id;

--Test joining tables and specific games by id
SELECT 
	g.name,
	d.description_text,
	d.duration,
	d.complexity,
	d.max_players,
	d.min_players,
	m.msrp_price,
	m.historical_low,
	m.historical_high,
	i.img_name,
	i.alt_txt
FROM
	games g
INNER JOIN
	description d ON g.game_id = d.game_id
INNER JOIN
	msrp m ON g.game_id = m.game_id
INNER JOIN
	images i ON g.game_id = i.game_id
WHERE 
	g.game_id = 1;
--ORDER BY duration;
	

--INSERT INTO reviews (game_id, rating, review_text) VALUES ('', '', '');

--INSERT INTO for_sale (game_id, price, condition) VALUES ('', '', '');