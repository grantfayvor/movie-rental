<?php

use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([[
            'id' => 1,
            'name' => 'Ant-Man',
            'brand' => 'Marvel',
            'category_id' => 5,
            'details' => 'Armed with the astonishing ability to shrink in scale but increase in strength, con-man Scott Lang must embrace his inner-hero and help his mentor, Dr. Hank Pym, protect the secret behind his spectacular Ant-Man suit from a new generation of towering threats. Against seemingly insurmountable obstacles, Pym and Lang must plan and pull off a heist that will save the world.',
            'selling_price' => '2000',
            'image_location' => 'images/movies/ant-man.jpg',
            'status' => 'HOT',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 2,
            'name' => 'Avatar',
            'brand' => 'Marvel',
            'category_id' => 1,
            'details' => 'On the lush alien world of Pandora live the Na\'vi, beings who appear primitive but are highly evolved. Because the planet\'s environment is poisonous, human/Na\'vi hybrids, called Avatars, must link to human minds to allow for free movement on Pandora. Jake Sully (Sam Worthington), a paralyzed former Marine, becomes mobile again through one such Avatar and falls in love with a Na\'vi woman (Zoe Saldana). As a bond with her grows, he is drawn into a battle for the survival of her world.',
            'selling_price' => '2000',
            'image_location' => 'images/movies/avatar.jpg',
            'status' => 'HOT',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 3,
            'name' => 'Avengers',
            'brand' => 'Marvel',
            'category_id' => 2,
            'details' => 'When Thor\'s evil brother, Loki (Tom Hiddleston), gains access to the unlimited power of the energy cube called the Tesseract, Nick Fury (Samuel L. Jackson), director of S.H.I.E.L.D., initiates a superhero recruitment effort to defeat the unprecedented threat to Earth. Joining Fury\'s "dream team" are Iron Man (Robert Downey Jr.), Captain America (Chris Evans), the Hulk (Mark Ruffalo), Thor (Chris Hemsworth), the Black Widow (Scarlett Johansson) and Hawkeye (Jeremy Renner).',
            'selling_price' => '1500',
            'image_location' => 'images/movies/avengers.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 4,
            'name' => 'Beauty and the Beast',
            'brand' => 'Disney',
            'category_id' => 1,
            'details' => 'An arrogant prince is cursed to live as a terrifying beast until he finds true love. Strangely, his chance comes when he captures an unwary clockmaker, whose place is then taken by his bold and beautiful daughter Belle. Helped by the Beast\'s similarly enchanted servants - including a clock, a teapot and a candelabra - Belle begins to see the sensitive soul behind the fearsome facade. But as time runs out, it soon becomes obvious that Belle\'s cocky suitor Gaston is the real beast of the piece.',
            'selling_price' => '1500',
            'image_location' => 'images/movies/beauty_and_the_beast.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 5,
            'name' => 'Black Panther',
            'brand' => 'Marvel',
            'category_id' => 5,
            'details' => 'After the death of his father, T\'Challa returns home to the African nation of Wakanda to take his rightful place as king. When a powerful enemy suddenly reappears, T\'Challa\'s mettle as king -- and as Black Panther -- gets tested when he\'s drawn into a conflict that puts the fate of Wakanda and the entire world at risk. Faced with treachery and danger, the young king must rally his allies and release the full power of Black Panther to defeat his foes and secure the safety of his people.',
            'selling_price' => '2000',
            'image_location' => 'images/movies/black_panther.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 6,
            'name' => 'Blade Runner',
            'brand' => 'Warner Bros',
            'category_id' => 3,
            'details' => 'Deckard (Harrison Ford) is forced by the police Boss (M. Emmet Walsh) to continue his old job as Replicant Hunter. His assignment: eliminate four escaped Replicants from the colonies who have returned to Earth. Before starting the job, Deckard goes to the Tyrell Corporation and he meets Rachel (Sean Young), a Replicant girl he falls in love with.',
            'selling_price' => '1200',
            'image_location' => 'images/movies/blade_runner.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 7,
            'name' => 'Blood from the Mummy\'s tomb',
            'brand' => 'American International Pictures',
            'category_id' => 4,
            'details' => 'An archaeologist (Andrew Keir) and his team bring back an embalmed Egyptian princess who takes over his daughter (Valerie Leon).',
            'selling_price' => '1000',
            'image_location' => 'images/movies/blood_from_the_mummy\'s_tomb.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 8,
            'name' => 'DeadPool',
            'brand' => 'Marvel',
            'category_id' => 5,
            'details' => 'Wade Wilson (Ryan Reynolds) is a former Special Forces operative who now works as a mercenary. His world comes crashing down when evil scientist Ajax (Ed Skrein) tortures, disfigures and transforms him into Deadpool. The rogue experiment leaves Deadpool with accelerated healing powers and a twisted sense of humor. With help from mutant allies Colossus and Negasonic Teenage Warhead (Brianna Hildebrand), Deadpool uses his new skills to hunt down the man who nearly destroyed his life.',
            'selling_price' => '2000',
            'image_location' => 'images/movies/deadpool.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 9,
            'name' => 'Greatest Showman',
            'brand' => '20th Century Fox',
            'category_id' => 6,
            'details' => 'Inspired by the imagination of P. T. Barnum, The Greatest Showman is an original musical that celebrates the birth of show business & tells of a visionary who rose from nothing to create a spectacle that became a worldwide sensation.',
            'selling_price' => '2200',
            'image_location' => 'images/movies/greatest_showman.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 10,
            'name' => 'Harry Potter',
            'brand' => 'Disney',
            'category_id' => 1,
            'details' => 'Adaptation of the first of J.K. Rowling\'s popular children\'s novels about Harry Potter, a boy who learns on his eleventh birthday that he is the orphaned son of two powerful wizards and possesses unique magical powers of his own. He is summoned from his life as an unwanted child to become a student at Hogwarts, an English boarding school for wizards. There, he meets several friends who become his closest allies and help him discover the truth about his parents\' mysterious deaths.',
            'selling_price' => '1800',
            'image_location' => 'images/movies/harry_potter.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 11,
            'name' => 'House of 1000 Corpses',
            'brand' => 'Lions Gate Films',
            'category_id' => 4,
            'details' => 'An empty fuel tank and a flat tire lead two couples down a terror-riddled road to the House of 1000 Corpses. "House of 1000 Corpses" is at its core a story of family - a cast of twisted individuals who, with each slash of a throat or stab thru the chest, add bodies to their sick human menagerie.',
            'selling_price' => '800',
            'image_location' => 'images/movies/house_of_1000_corpses.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 12,
            'name' => 'Into the Woods',
            'brand' => 'Disney',
            'category_id' => 1,
            'details' => 'As the result of the curse of a once-beautiful witch (Meryl Streep), a baker (James Corden) and his wife (Emily Blunt) are childless. Three days before the rise of a blue moon, they venture into the forest to find the ingredients that will reverse the spell and restore the witch\'s beauty: a milk-white cow, hair as yellow as corn, a blood-red cape, and a slipper of gold. During their journey, they meet Cinderella, Little Red Riding Hood, Rapunzel and Jack, each one on a quest to fulfill a wish.',
            'selling_price' => '1500',
            'image_location' => 'images/movies/into_the_woods.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 13,
            'name' => 'Jumanji',
            'brand' => 'Disney',
            'category_id' => 3,
            'details' => 'Four high school kids discover an old video game console and are drawn into the game\'s jungle setting, literally becoming the adult avatars they chose. What they discover is that you don\'t just play Jumanji - you must survive it. To beat the game and return to the real world, they\'ll have to go on the most dangerous adventure of their lives, discover what Alan Parrish left 20 years ago, and change the way they think about themselves - or they\'ll be stuck in the game forever.',
            'selling_price' => '1900',
            'image_location' => 'images/movies/jumanji.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 14,
            'name' => 'Justice League',
            'brand' => 'DC',
            'category_id' => 2,
            'details' => 'Fuelled by his restored faith in humanity, and inspired by Superman\'s selfless act, Bruce Wayne enlists newfound ally Diana Prince to face an even greater threat. Together, Batman and Wonder Woman work quickly to recruit a team to stand against this newly-awakened enemy. Despite the formation of an unprecedented league of heroes in Batman, Wonder Woman, Aquaman, Cyborg and the Flash, it may be too late to save the planet from an assault of catastrophic proportions.',
            'selling_price' => '200',
            'image_location' => 'images/movies/justice_league.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 15,
            'name' => 'Lazer Team 2',
            'brand' => 'FullScreen Films',
            'category_id' => 5,
            'details' => 'After miraculously stopping an alien invasion, the pressures of sudden fame have left the unlikely heroes known as Lazer Team bitterly divided.',
            'selling_price' => '600',
            'image_location' => 'images/movies/lazer_team_2.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 16,
            'name' => 'Murder on the Orient Express',
            'brand' => '20th Century Fox',
            'category_id' => 2,
            'details' => 'A lavish trip through Europe quickly unfolds into a race against time to solve a murder aboard a train. When an avalanche stops the Orient Express dead in its tracks, the world\'s greatest detective -- Hercule Poirot -- arrives to interrogate all passengers and search for clues before the killer can strike again.',
            'selling_price' => '1200',
            'image_location' => 'images/movies/murder_on_orient_express.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 17,
            'name' => 'Overboard',
            'brand' => 'LionsGate',
            'category_id' => 2,
            'details' => 'Kate is a single, working-class mother of three who\'s hired to clean a luxury yacht that belongs to Leonardo -- a selfish, spoiled and wealthy Mexican playboy. After unjustly firing Kate, Leonardo falls off the boat and wakes up with no memory of who he is. To get payback, Kate shows up at the hospital and convinces the confused amnesiac that they\'re married. As Leonardo tries to get used to manual labor and his new family, Kate starts to wonder how long she can keep fooling her fake husband.',
            'selling_price' => '1200',
            'image_location' => 'images/movies/overboard.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 18,
            'name' => 'Paddington',
            'brand' => 'Studio Canal',
            'category_id' => 1,
            'details' => 'After a deadly earthquake destroys his home in Peruvian rainforest, a young bear (Ben Whishaw) makes his way to England in search of a new home. The bear, dubbed "Paddington" for the london train station, finds shelter with the family of Henry (Hugh Bonneville) and Mary Brown (Sally Hawkins). Although Paddington\'s amazement at urban living soon endears him to the Browns, someone else has her eye on him: Taxidermist Millicent Clyde (Nicole Kidman) has designs on the rare bear and his hide.',
            'selling_price' => '1300',
            'image_location' => 'images/movies/paddington.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 19,
            'name' => 'Pirates of the Carribean',
            'brand' => 'Disney',
            'category_id' => 3,
            'details' => 'Thrust into an all-new adventure, a down-on-his-luck Capt. Jack Sparrow feels the winds of ill-fortune blowing even more strongly when deadly ghost sailors led by his old nemesis, the evil Capt. Salazar, escape from the Devil\'s Triangle. Jack\'s only hope of survival lies in seeking out the legendary Trident of Poseidon, but to find it, he must forge an uneasy alliance with a brilliant and beautiful astronomer and a headstrong young man in the British navy.',
            'selling_price' => '1200',
            'image_location' => 'images/movies/pirates_of_the_caribbean.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 20,
            'name' => 'Star Wars',
            'brand' => 'Walt Disney',
            'category_id' => 5,
            'details' => 'The Imperial Forces -- under orders from cruel Darth Vader (David Prowse) -- hold Princess Leia (Carrie Fisher) hostage, in their efforts to quell the rebellion against the Galactic Empire. Luke Skywalker (Mark Hamill) and Han Solo (Harrison Ford), captain of the Millennium Falcon, work together with the companionable droid duo R2-D2 (Kenny Baker) and C-3PO (Anthony Daniels) to rescue the beautiful princess, help the Rebel Alliance, and restore freedom and justice to the Galaxy.',
            'selling_price' => '1800',
            'image_location' => 'images/movies/star_wars.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 21,
            'name' => 'Thor Ragnarok',
            'brand' => '20th Century Fox',
            'category_id' => 1,
            'details' => 'Imprisoned on the other side of the universe, the mighty Thor finds himself in a deadly gladiatorial contest that pits him against the Hulk, his former ally and fellow Avenger. Thor\'s quest for survival leads him in a race against time to prevent the all-powerful Hela from destroying his home world and the Asgardian civilization.',
            'selling_price' => '1200',
            'image_location' => 'images/movies/thor_ragnarok.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 22,
            'name' => 'Top Gun',
            'brand' => 'Paramount Pictures',
            'category_id' => 2,
            'details' => 'The Top Gun Naval Fighter Weapons School is where the best of the best train to refine their elite flying skills. When hotshot fighter pilot Maverick (Tom Cruise) is sent to the school, his reckless attitude and cocky demeanor put him at odds with the other pilots, especially the cool and collected Iceman (Val Kilmer). But Maverick isn\'t only competing to be the top fighter pilot, he\'s also fighting for the attention of his beautiful flight instructor, Charlotte Blackwood (Kelly McGillis).',
            'selling_price' => '1200',
            'image_location' => 'images/movies/top_gun.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ], [
            'id' => 23,
            'name' => 'Transformers (Revenge of the Fallen)',
            'brand' => 'DreamWorks Pictures, Paramount Pictures',
            'category_id' => 1,
            'details' => 'A lavish trip through Europe quickly unfolds into a race against time to solve a murder aboard a train. When an avalanche stops the Orient Express dead in its tracks, the world\'s greatest detective -- Hercule Poirot -- arrives to interrogate all passengers and search for clues before the killer can strike again.',
            'selling_price' => '1900',
            'image_location' => 'images/movies/transformers_revenge_of_the_fallen.jpg',
            'status' => 'COLD',
            'showing_at' => Carbon\Carbon::now()
        ]]);

    }
}
