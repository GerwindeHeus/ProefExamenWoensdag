DROP DATABASE IF EXISTS `Bowlingcentrum2`;
CREATE DATABASE `Bowlingcentrum2`;

USE `Bowlingcentrum2`;

CREATE TABLE `Persoon`(
	`Id` 				INT 			NOT NULL 		AUTO_INCREMENT PRIMARY KEY,
    `TypePersoonId`		INT				NOT NULL,
    `Voornaam`			VARCHAR(100)    NOT NULL,
    `Tussenvoegsel`		VARCHAR(50)     NULL,
    `Achternaam`		VARCHAR(100)	NOT NULL,
    `Roepnaam` 		VARCHAR(100) 		NOT NULL,	
    `IsVolwassen`		TINYINT			NULL,
    `IsActief` 		TINYINT(1) 			NOT NULL 			DEFAULT 1,
    `Opmerking` 	TEXT				NULL,
    `DatumAangemaakt`TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=INNODB;

INSERT INTO Persoon(
	 TypePersoonId
    ,Voornaam
    ,Tussenvoegsel
    ,Achternaam
    ,Roepnaam
    ,IsVolwassen
    ,IsActief
    ,Opmerking
    ,DatumAangemaakt
    ,DatumGewijzigd
) VALUES
(1, 'Mazin', NULL, 'Jamil', 'Mazin', 1, 1, 'lekker bowlen', sysdate(6), sysdate(6)),
(1, 'Arjan', 'de', 'Ruijter', 'Arjan', 1, 1, 'lekker bowlen', sysdate(6), sysdate(6)),
(1, 'Hans', NULL, 'Odijk', 'Hans', 1, 1, 'lekker bowlen', sysdate(6), sysdate(6)),
(1, 'Dennis', 'van', 'Wakeren', 'Dennis', 1, 1, 'lekker bowlen', sysdate(6), sysdate(6)),
(2, 'Wilco', 'van de', 'Grift', 'Wilco', 1, 1, 'lekker bowlen', sysdate(6), sysdate(6)),
(3, 'Tom', NULL, 'Sanders', 'tom', 0, 1, 'lekker bowlen', sysdate(6), sysdate(6)),
(3, 'Andrew', NULL, 'Sanders', 'Andrew', 0, 1, 'lekker bowlen', sysdate(6), sysdate(6)),
(3, 'Julian', NULL, 'Kaldenheuvel', 'Julian', 1, 1, 'lekker bowlen', sysdate(6), sysdate(6));

CREATE TABLE `Baan` (
	`Id`			INT 			NOT NULL 			AUTO_INCREMENT PRIMARY KEY,
	`Nummer`		INT				NOT NULL,
    `HeeftHek` 		TINYINT(1) 		NOT NULL 			DEFAULT 0,
	`IsActief` 		TINYINT(1) 		NOT NULL 			DEFAULT 1,
    `Opmerking` 	TEXT			NULL,
    `DatumAangemaakt`TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=INNODB;

INSERT INTO Baan(
	 Nummer
    ,HeeftHek
    ,IsActief
    ,Opmerking
    ,DatumAangemaakt
    ,DatumGewijzigd
) VALUES
(1, 0, 1, 'Mooie baan', sysdate(6), sysdate(6)),
(2, 0, 1, 'Mooie baan', sysdate(6), sysdate(6)),
(3, 0, 1, 'Mooie baan', sysdate(6), sysdate(6)),
(4, 0, 1, 'Mooie baan', sysdate(6), sysdate(6)),
(5, 0, 1, 'Mooie baan', sysdate(6), sysdate(6)),
(6, 0, 1, 'Mooie baan', sysdate(6), sysdate(6)),
(7, 1, 1, 'Mooie baan', sysdate(6), sysdate(6)),
(8, 1, 1, 'Mooie baan', sysdate(6), sysdate(6));

CREATE TABLE `Reservering`(
	`Id`				INT 			NOT NULL 			AUTO_INCREMENT PRIMARY KEY,
    `PersoonId`			INT 	        NOT NULL,
	`OpeningsTijdId`	INT 			NOT NULL,
    `TariefId`			INT 			NOT NULL,
    `BaanId`			INT 			NOT NULL,
    `PakketOptieId`		INT 			NULL,
    `ReserveringstatusId`		INT 			NOT NULL,
    `Reserveringnummer`			BIGINT				NOT NULL,
    `Datum`			DATETIME			NOT NULL,
    `AantalUren`	TINYINT			NOT NULL,
    `BeginTijd`		TIME 			NOT NULL,
    `EindTijd`		TIME			NOT NULL,
    `AantalVolwassenen`	INT			NOT NULL,
    `AantalKinderen`	INT			NOT NULL,	
	`IsActief` 		TINYINT(1) 		NOT NULL 			DEFAULT 1,
    `Opmerking` 	TEXT			NULL,
    `DatumAangemaakt`TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT PersoonReservering FOREIGN KEY (`PersoonId`) REFERENCES Persoon(`Id`),
    CONSTRAINT BaanReservering FOREIGN KEY (`BaanId`) REFERENCES Baan(`Id`)
)ENGINE=INNODB;

INSERT INTO Reservering(
	 PersoonId
    ,OpeningsTijdId
    ,TariefId
    ,BaanId
    ,PakketOptieId
    ,ReserveringstatusId
    ,Reserveringnummer
    ,Datum
    ,AantalUren
    ,BeginTijd
    ,EindTijd
    ,AantalVolwassenen
    ,AantalKinderen
    ,IsActief
    ,Opmerking
    ,DatumAangemaakt
    ,DatumGewijzigd
) VALUES 
(1, 2, 1, 8, 1, 1, 2022122000001, sysdate(6), 1, '15:00:00', '16:00:00', 4, 2, 1,'Reservering', sysdate(6), sysdate(6)),
(2, 2, 1, 2, 3, 1, 2022122000002, sysdate(6), 1, '17:00:00', '18:00:00', 4, NULL, 1,'Reservering', sysdate(6), sysdate(6)),
(3, 7, 2, 3, 1, 1, 2022122000003, sysdate(6), 2, '16:00:00', '18:00:00', 4, NULL, 1,'Reservering', sysdate(6), sysdate(6)),
(1, 2, 1, 6, NULL, 1, 2022122000004, sysdate(6), 2, '17:00:00', '19:00:00', 4, NULL, 1,'Reservering', sysdate(6), sysdate(6)),
(4, 3, 1, 4, 4, 1, 2022122000005, sysdate(6), 1, '14:00:00', '15:00:00', 4, NULL, 1,'Reservering', sysdate(6), sysdate(6)),
(5, 10, 3, 5, 4, 1, 2022122000006, sysdate(6), 2, '19:00:00', '21:00:00', 4, NULL, 1,'Reservering', sysdate(6), sysdate(6));