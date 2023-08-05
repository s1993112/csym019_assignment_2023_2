<?php
include 'header.php';
require_once 'db.php';

// Check if the user is logged in
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$mysqli = connectDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['courses'])) {
        // Assuming you have a function named generateReport
        generateReport($mysqli, $_POST['courses']);
    }
}

$courses = getCourses($mysqli);

echo "<form method='POST' action='generateReport.php'>";
echo "<table class='course-table'>";
echo "<tr>
        <th>Select</th>
        <th>Course Name</th>
        <th>Course Overview</th>
        <th>Course Highlights</th>
        <th>Course Contents</th>
        <th>Course Details</th>
        <th>List of Modules</th>
        <th>Enhanced Learning</th>
        <th>Credit Scheme</th>
        <th>Entry Requirements</th>
        <th>Fees and Funding</th>
        <th>FAQs</th>
      </tr>";

foreach ($courses as $row) {
    echo "<tr>
            <td><input type='checkbox' name='courses[]' value='{$row['id']}'></td>
            <td>{$row['name']}</td>
            <td>{$row['overview']}</td>
            <td>{$row['highlights']}</td>
            <td>{$row['contents']}</td>
            <td>{$row['details']}</td>
            <td>{$row['modules']}</td>
            <td>{$row['enhanced_learning']}</td>
            <td>{$row['credit_scheme']}</td>
            <td>{$row['entry_requirements']}</td>
            <td>{$row['fees_and_funding']}</td>
            <td>{$row['faqs']}</td>
          </tr>";
}

echo "</table>";
echo "<input type='submit' value='Generate Report'>";
echo "</form>";

closeDB($mysqli);
?>

<style>
  .course-table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
  }

  .course-table th,
  .course-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  .course-table th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  .course-table input[type="checkbox"] {
    transform: scale(1.2);
  }

  .course-table input[type="submit"] {
    margin-top: 10px;
    padding: 10px 20px;
    color: #fff;
    background: #007BFF;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  .course-table input[type="submit"]:hover {
    background: #0056b3;
  }
</style>
