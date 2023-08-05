<?php
include 'header.php';
require_once 'db.php';

// Check if the user is logged in
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseData = [
        'name' => $_POST['course_name'],
        'overview' => $_POST['course_overview'],
        'highlights' => $_POST['course_highlights'],
        'contents' => $_POST['course_contents'],
        'details' => $_POST['course_details'],
        'modules' => $_POST['list_of_modules'],
        'enhanced_learning' => $_POST['enhanced_learning'],
        'credit_scheme' => $_POST['credit_scheme'],
        'entry_requirements' => $_POST['entry_requirements'],
        'fees_and_funding' => $_POST['fees_and_funding'],
        'faqs' => $_POST['faqs']
    ];

    $mysqli = connectDB();

    if (insertCourse($mysqli, $courseData)) {
        echo "New course added successfully";
    } else {
        echo "Error: Unable to add course";
    }

    closeDB($mysqli);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="course_name">Course Name:</label><br>
        <input type="text" id="course_name" name="course_name"><br>
        <label for="course_overview">Course Overview:</label><br>
        <textarea id="course_overview" name="course_overview"></textarea><br>
        <label for="course_highlights">Course Highlights:</label><br>
        <textarea id="course_highlights" name="course_highlights"></textarea><br>
        <label for="course_contents">Course Contents:</label><br>
        <textarea id="course_contents" name="course_contents"></textarea><br>
        <label for="course_details">Course Details:</label><br>
        <textarea id="course_details" name="course_details"></textarea><br>
        <label for="list_of_modules">List of Modules:</label><br>
        <textarea id="list_of_modules" name="list_of_modules"></textarea><br>
        <label for="enhanced_learning">Enhanced Learning:</label><br>
        <textarea id="enhanced_learning" name="enhanced_learning"></textarea><br>
        <label for="credit_scheme">Credit Scheme:</label><br>
        <textarea id="credit_scheme" name="credit_scheme"></textarea><br>
        <label for="entry_requirements">Entry Requirements:</label><br>
        <textarea id="entry_requirements" name="entry_requirements"></textarea><br>
        <label for="fees_and_funding">Fees and Funding:</label><br>
        <textarea id="fees_and_funding" name="fees_and_funding"></textarea><br>
        <label for="faqs">FAQs:</label><br>
        <textarea id="faqs" name="faqs"></textarea><br>
        <input type="submit" value="Add Course">
    </form>
</body>
</html>
