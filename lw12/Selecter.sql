USE University;

SELECT 
	FirstName,
    LastName AS FamilyName,
    Age
FROM 
	Student 
WHERE 
	Age = 19;
  
# =================================================
# -------- Get all students with groups -----------
# =================================================
SELECT 
	Student.FirstName,
    Student.LastName AS FamilyName,
    Student.Age,
    `Group`.`Name` AS GroupName
FROM 
	Student
JOIN 
	`Group` ON `Group`.Id = Student.GroupId;
  
# =================================================
# -- Get all students with faculties and groups ---
# =================================================

SELECT 
	Student.FirstName,
    Student.LastName AS FamilyName,
    Student.Age,
    `Group`.`Name` AS GroupName,
    Faculty.`Name` AS FacultyName
FROM 
	Student
JOIN 
	`Group` ON `Group`.Id = Student.GroupId
JOIN 
	Faculty ON Faculty.Id = `Group`.FacultyId;

# =================================================
# ----------- Get student info by id --------------
# =================================================  

SELECT 
	Student.FirstName,
    Student.LastName AS FamilyName,
    Student.Age,
    `Group`.`Name` AS GroupName,
    Faculty.`Name` AS FacultyName
FROM 
	Student
JOIN 
	`Group` ON `Group`.Id = Student.GroupId
JOIN 
	Faculty ON Faculty.Id = `Group`.FacultyId
WHERE 
	Student.Id = 1;