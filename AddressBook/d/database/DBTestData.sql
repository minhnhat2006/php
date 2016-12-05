-- List of Cities
INSERT INTO `city` (`city_id`, `name`) VALUES
(1, 'Zurich'),
(2, 'Geneva'),
(3, 'Basel'),
(4, 'Lausanne'),
(5, 'Bern'),
(6, 'Winterthur'),
(7, 'Lucerne'),
(8, 'St. Gallen'),
(9, 'Lugano'),
(10, 'Biel/Bienne'),
(11, 'Thun'),
(12, 'Köniz'),
(13, 'La Chaux-de-Fonds'),
(14, 'Schaffhausen'),
(15, 'Fribourg'),
(16, 'Vernier'),
(17, 'Chur'),
(18, 'Neuchâtel'),
(19, 'Uster'),
(20, 'Sion');

-- List of entries
INSERT INTO `entry` (`entry_id`, `name`, `first_name`, `street`, `zip_code`, `city_id`) VALUES
(1, 'Sarah', 'Sarah', 'Kappelergasse', '10xx', 11),
(2, 'Simon', 'Simon', 'Tastentanzenstrasse', '17xx', 2),
(3, 'Laura', 'Laura', 'Hochbaumstrasse', '20xx', 3),
(4, 'Florian', 'Florian', 'Denkmaschinenstrasse', '23xx', 4),
(5, 'Audrey', 'Audrey', 'Kappelergasse', '24xx', 5),
(6, 'Samuel', 'Samuel', 'Zichzachweg', '25xx', 6),
(7, 'Julien', 'Julien', 'Tastentanzenstrasse', '29xx', 7),
(8, 'Lara', 'Lara', 'Denkmaschinenstrasse', '36xx', 8),
(9, 'Luca', 'Luca', 'Hochbaumstrasse', '45xx', 9),
(10, 'Manon', 'Manon', 'Kappelergasse', '48xx', 10),
(11, 'Kevin', 'Kevin', 'Hochbaumstrasse', '50xx', 11),
(12, 'Sophie', 'Sophie', 'Tastentanzenstrasse', '51xx', 12),
(13, 'CA1', 'CA1', 'test', '11xxx', 1),
(14, 'CA2', 'CA2', 'Test', '11xxx', 1),
(15, 'CB1', 'CB1', 'Test', '10xxx', 1),
(16, 'CB2', 'CB2', 'Test', '10xxx', 1),
(17, 'CC1', 'CC1', 'Test', '12xxx', 1),
(18, 'CC2', 'CC2', 'Test', '12xxx', 1),
(19, 'CD1', 'CD1', 'Test', '13xxx', 1),
(20, 'CD2', 'CD2', 'Test', '13xxx', 1);

-- List of Groups
INSERT INTO `group` (`group_id`, `name`) VALUES
(1, 'A'),
(2, 'AA'),
(3, 'B'),
(4, 'C'),
(5, 'D');