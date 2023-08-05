<?php
// db.php
function connectDB() {
    $mysqli = new mysqli('localhost', 'root', '', 'dbtest');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    return $mysqli;
}

function closeDB($mysqli) {
    $mysqli->close();
}

function getUserPassword($mysqli, $username) {
    $query = "SELECT password FROM Users WHERE username = '$username'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['password'];
    } else {
        return false;
    }
}
function insertCourse($mysqli, $courseData) {
    $query = "INSERT INTO Courses (name, overview, highlights, contents, details, modules, enhanced_learning, credit_scheme, entry_requirements, fees_and_funding, faqs) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(
        'sssssssssss',
        $courseData['name'],
        $courseData['overview'],
        $courseData['highlights'],
        $courseData['contents'],
        $courseData['details'],
        $courseData['modules'],
        $courseData['enhanced_learning'],
        $courseData['credit_scheme'],
        $courseData['entry_requirements'],
        $courseData['fees_and_funding'],
        $courseData['faqs']
    );

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function deleteCourse($mysqli, $courseId) {
    $deleteQuery = "DELETE FROM Courses WHERE id = ?";
    
    $stmt = $mysqli->prepare($deleteQuery);
    $stmt->bind_param('i', $courseId);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }









    
}










function getCourses($mysqli) {
    $courses = array();

    $query = "SELECT * FROM Courses";
    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }

    return $courses;
}
 











?>