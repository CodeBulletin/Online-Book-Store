# PHP BOOK STORE

<h2>Purpose of this project is to learn PHP, HTML, CSS and MySQL</h2>

<h4>Owner</h4>

[CodeBulletin](https://github.com/CodeBulletin)

<h4>Collaborators</h4>

[Deviousgazelle](https://github.com/Deviousgazelle) <br/>
[Rajatbisht](https://github.com/Rajatsbisht) <br/>
[ritik936](https://github.com/ritik936)

[site hosted at 000webhost](http://bookmaniapro.000webhostapp.com)

<br/>
<br/>
MySql Tables required in database for this project <br/>

```mysql
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- CART TABLE

CREATE TABLE `cart table` (
  `UserID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ITEM TABLE

CREATE TABLE `item table` (
  `ItemID` int(11) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemPrice` decimal(10,2) NOT NULL,
  `ItemAuthor` varchar(255) NOT NULL,
  `ItemSeller` varchar(255) NOT NULL,
  `ItemDiscription` text NOT NULL,
  `ItemImage` varchar(255) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Order-Item Table

CREATE TABLE `order-item` (
  `OrderID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ORDER Table

CREATE TABLE `order table` (
  `OrderID` int(11) NOT NULL,
  `OrderTotal` double NOT NULL,
  `OrderDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- User-Order Table

CREATE TABLE `user-order` (
  `UserID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- USER TABLE

CREATE TABLE `user table` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `UserPassword` varchar(128) NOT NULL,
  `UserFullName` varchar(255) NOT NULL,
  `UserEmail` varchar(255) NOT NULL,
  `UserPhone` text NOT NULL,
  `UserAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Primary Keys

ALTER TABLE `cart table`
  ADD PRIMARY KEY (`UserID`,`ItemID`);

ALTER TABLE `item table`
  ADD PRIMARY KEY (`ItemID`);
  
ALTER TABLE `order-item`
  ADD PRIMARY KEY (`OrderID`,`ItemID`);

ALTER TABLE `order table`
  ADD PRIMARY KEY (`OrderID`);

ALTER TABLE `user-order`
  ADD PRIMARY KEY (`UserID`,`OrderID`);
  
ALTER TABLE `user table`
  ADD PRIMARY KEY (`UserID`);

-- Auto Increment

ALTER TABLE `item table`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15024;
  
ALTER TABLE `order table`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30121;

ALTER TABLE `user table`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1733;

-- ITEM TABLE DATA

INSERT INTO `item table` (`ItemID`, `ItemName`, `ItemPrice`, `ItemAuthor`, `ItemSeller`, `ItemDiscription`, `ItemImage`, `Type`) VALUES
(15016, 'Parade\'s End', '550.00', 'Ford Madox Ford', 'MadDogs', '	\r\nParade\'s End is a tetralogy (four related novels) by Ford Madox Ford. It is set mainly in England and on the Western Front in World War I, where Ford served as an officer in the Welsh Regiment, a life vividly depicted in the novels. Ford Madox Ford (1873–1939) was an English novelist, poet, critic and editor whose journals.\r\n\r\nThe four novels were originally published under the titles: Some Do Not ..., No More Parades, A Man Could Stand Up, and Last Post. They were combined into one volume as Parade\'s End, which has been ranked at number 57 on the Modern Library\'s 100 Best Novels list.\r\n\r\nJ. Gray hailed \"possibly the greatest 20th-century novel in English\". Likewise, Mary Gordon labelled it as \"quite simply, the best fictional treatment of war in the history of the novel\".\r\n\r\nThe novels chronicle the life of Christopher Tietjens, \"the last Tory\", a brilliant government statistician from a wealthy landowning family who is serving in the British Army during World War I. His wife Sylvia is a flippant socialite who seems intent on ruining him. Tietjens may or may not be the father of his wife\'s child.', 'Images/ParadesEnd.png', 'Fiction'),
(15017, 'Herbert West', '400.00', 'H. P. Lovecraft', 'BBox', '	\r\n\"Herbert West—Reanimator\" is a story by American horror fiction writer H. P. Lovecraft. The story is the first to mention Lovecraft\'s fictional Miskatonic University. It is also notable as one of the first depictions of zombies as scientifically reanimated corpses, with animalistic and uncontrollable temperament.\r\n\r\nThe narrator is a doctor who went to medical school with the titular character. Informing the reader that Herbert West has recently disappeared. The narrator goes on to explain how he met West when they were both young men in medical school, and the narrator became fascinated by West\'s theories, which postulated that the human body is simply a complex, organic machine, which could be \"restarted.\" West initially tries to prove this hypothesis, but is unsuccessful. West realizes he must experiment on human subjects. The two men spirit away numerous supplies from the medical school and set up shop in an abandoned farmhouse. At first, they pay a group of men to rob graves for them, but none of the experiments are successful. West and the narrator go into grave robbing for themselves. One night, West and the narrator steal a corpse of a construction worker who died just that morning in an accident. They take it back to the farmhouse and inject it with West\'s solution, but nothing happens. Later an inhuman scream is heard from within the room containing the corpse which forces the two students to instinctively flee into the night. West accidentally tips over a lantern and the farmhouse catches fire. West and the narrator escape. The next day, however, the newspaper reads that a grave in potter\'s field had been molested violently the night before, as with the claws of a beast.', 'Images/HerbertWest.png', 'Fiction'),
(15018, 'Autobiography of Benjamin Franklin', '900.00', 'Benjamin Franklin', 'Global Biography', 'Autobiography of Benjamin Franklin', 'Images/BenjaminFranklin.png', 'NonFiction'),
(15019, 'Demon Slayer: Kimetsu no Yaiba, Vol. 1', '500.00', 'Gotouge Koyoharu', 'Viz Media', '\r\nTanjiro sets out on the path of the Demon Slayer to save his sister and avenge his family! In Taisho-era Japan, Tanjiro Kamado is a kindhearted boy who makes a living selling charcoal. But his peaceful life is shattered when a demon slaughters his entire family. His little sister Nezuko is the only survivor, but she has been transformed into a demon herself! Tanjiro sets out on a dangerous journey to find a way to return his sister to normal and destroy the demon who ruined his life. Learning to slay demons won\'t be easy, and Tanjiro barely knows where to start. The surprise appearance of another boy named Giyu, who seems to know what\'s going on, might provide some answers...but only if Tanjiro can stop Giyu from killing his sister first! Action-adventure title similar to InuYasha that pits samurai swords against demons.', 'Images/DemonSlayerVol1.jpeg', 'Manga'),
(15020, 'One-Punch Man, Vol. 23', '700.00', 'Yusuke Murata', 'One', 'Life gets pretty boring when you can beat the snot out of any villain with just one punch. Nothing about Saitama passes the eyeball test when it comes to superheroes, from his lifeless expression to his bald head to his unimpressive physique. However, this average-looking guy has a not-so-average problem-he just can\'t seem to find an opponent strong enough to take on! Narinki\'s private force is now free from Super S\'s control. Bushi Drill, Okama Itachi and Iaian plot their escape, but threat level Demon monster Malong Hair appears before they can flee, and a fierce fight breaks out. Elsewhere, their master Atomic Samurai encounters a creepy opponent!', 'Images/OnePunchManVol23.jpeg', 'Manga'),
(15021, 'Naruto Volume 30', '445.00', 'Kishimoto Masashi', 'Transinfopreneur', 'Sakura takes her place at the front of the fight to save Naruto. With Granny Chiyo at her side, she must battle Sasori, who can create golems from the undead. But Granny Chiyo is a puppet master too - only it could be Sakura\'s strings she\'s pulling!', 'Images/NarutoVol30.jpeg', 'Manga'),
(15022, 'The Theory of Everything: The Origin and Fate of the Universe', '400.00', 'Stephen Hawking', 'Apple', 'Seven lectures by the brilliant theoretical physicist have been compiled into this book to try to explain to the common man, the complex problems of mathematics and the question that has been gripped everyone all for centuries, the theory of existence.\r\n\r\nUndeniably intelligent, witty and childlike in his explanations, the narrator describes every detail about the beginning of the universe. He describes what a theory that can state the initiation of everything would encompass.\r\n\r\nIdeologies about the universe by Aristotle, Augustine, Hubble, Newton and Einstein have all been briefly introduced to the reader. Black holes and Big Bang has been explained in an unsophisticated manner for anyone to understand.\r\n\r\nAll these events and individual theories may be strung together to create a theory of the origin of everything and the author strongly believes that the origin might not necessarily be from a singular event. He advocates the idea of a multi-dimensional origin with a no-boundary condition to remain true to the theories of modern physics and quantum physics.\r\n\r\nThe book provides a clear view of the world through Stephen?s mind where he respectfully dismisses the belief that the Universe conforms by a supernatural and all-powerful entity.\r\n\r\nAbout the Author\r\nStephen Hawking: An English cosmologist, theoretical physicist, author as well as the Director of Research at the Centre for Theoretical Cosmology under the University of Cambridge, Stephen Hawking is a scholar with more than a dozen of honorary degrees. In was in 1963 that Stephen Hawking contracted a rare motor neuron disorder which gave him just two years to live, yet he went to Cambridge to become what he is today.', 'Images/TOE.jpg', 'NonFiction'),
(15023, 'One-Punch Man, Vol. 5', '600.00', 'Yusuke Murata', 'One', 'Nothing about Saitama passes the eyeball test when it comes to superheroes, from his lifeless expression to his bald head to his unimpressive physique. However, this average-looking guy has a not-so-average problem-he just can\'t seem to find an opponent strong enough to take on! To stop a Demon-level crisis, Saitama and company head toward the action. However, even Class S heroes prove to be no match for the Deep Sea King! In order to protect the good citizens, our heroes will need to summon all of their courage and confront this threat!', 'Images/OnePunchManVol5.jpeg', 'Manga');

```
