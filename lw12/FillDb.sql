USE University;

INSERT INTO `Faculty` 
	(`Name`) 
VALUES 
	('Faculty1'),
	('Faculty2'),
	('Faculty3');

# ======================================
# ------------ Groups ------------------
# ======================================

INSERT INTO `Group` 
	(`Name`, `FacultyId`) 
VALUES 
	('Group1', 1), ('Group2', 1), ('Group3', 1),    
	('Group4', 2), ('Group5', 2), ('Group6', 2),    
	('Group7', 3), ('Group8', 3), ('Group9', 3);

# ======================================
# ------------ Students ----------------
# ======================================

INSERT INTO `Student`ч
	(`FirstName`, `LastName`, `Age`, `GroupId`)
VALUES 
	('Student', '1', 18, 1), 
	('Student', '2', 19, 1), 
	('Student', '3', 19, 1), 
	('Student', '4', 19, 1), 
	('Student', '5', 18, 1),

	('Student', '1', 18, 2),
	('Student', '2', 19, 2),
	('Student', '3', 19, 2),
	('Student', '4', 19, 2),
	('Student', '5', 19, 2),

	('Student', '1', 19, 3),
	('Student', '2', 19, 3),
	('Student', '3', 19, 3),
	('Student', '4', 19, 3),
	('Student', '5', 19, 3),

	('Student', '1', 19, 4),
	('Student', '2', 19, 4),
	('Student', '3', 19, 4),
	('Student', '4', 19, 4),
	('Student', '5', 19, 4),

	('Student', '1', 19, 5),
	('Student', '2', 19, 5),
	('Student', '3', 19, 5),
	('Student', '4', 19, 5),
	('Student', '5', 19, 5),

	('Student', '1', 19, 6),
	('Student', '2', 19, 6),
	('Student', '3', 19, 6),
	('Student', '4', 19, 6),
	('Student', '5', 19, 6),

	('Student', '1', 19, 7),
	('Student', '2', 19, 7),
	('Student', '3', 19, 7),
	('Student', '4', 19, 7),
	('Student', '5', 19, 7),

	('Student', '1', 19, 8),
	('Student', '2', 19, 8),
	('Student', '3', 19, 8),
	('Student', '4', 19, 8),
	('Student', '5', 19, 8),

	('Student', '1', 19, 9),
	('Student', '2', 19, 9),
	('Student', '3', 19, 9),
	('Student', '4', 19, 9),
	('Student', '5', 18, 9);