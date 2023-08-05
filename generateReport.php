<?php
include 'header.php';
require_once 'db.php';
// Check if the user is logged in
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
// MySQLi connection
$mysqli = connectDB();


// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Include ChartJS library
echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';

// Arrays to store course names and credits for bar chart
$course_names = [];
$course_credits = [];

// Arrays to store module names and credits for pie chart
$module_names = [];
$module_credits = [];

// Check if form is submitted
if (isset($_POST['courses'])) {
    // Prepare SQL query to select only submitted courses
    $ids = implode(",", array_map('intval', $_POST['courses']));
    $query = "SELECT * FROM Courses WHERE id IN ($ids)";

    // Execute the query
    $result = $mysqli->query($query);

    // Loop through the result and collect data for chart
    while ($row = $result->fetch_assoc()) {
        // Add this course's name and credit to arrays
        $course_names[] = $row['name'];
        $course_credits[] = $row['credit_scheme'];

        // Prepare SQL query to select modules of this course
        $query = "SELECT * FROM Courses WHERE id = {$row['id']}";

        // Execute the query
        $result2 = $mysqli->query($query);

        // Loop through the result and collect data for pie chart
        while ($row2 = $result2->fetch_assoc()) {
            $module_names[] = $row2['modules'];
            $module_credits[] = $row2['credit_scheme'];
        }
    }

$barChartWidth = 100;
$barChartHeight = 50;
$pieChartWidth = 100;
$pieChartHeight = 50;

// Create the charts
echo "<canvas id='barChart' style='padding: 20px; width: $barChartWidth; height: $barChartHeight;'></canvas>";
echo "<script>
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: ['" . implode("', '", $course_names) . "'],
                datasets: [{
                    label: 'Total Credits',
                    data: [" . implode(", ", $course_credits) . "],
                    backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Total Credits for Each Course'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>";

echo "<canvas id='pieChart' style='padding: 20px; width: $pieChartWidth; height: $pieChartHeight;'></canvas>";
echo "<script>
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: ['" . implode("', '", $module_names) . "'],
                datasets: [{
                    label: 'Module Credits',
                    data: [" . implode(", ", $module_credits) . "],
                    backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Module Credits for Each Course'
                    }
                }
            }
        });
    </script>";
}
 

// Close the connection
$mysqli->close();
?>
