<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../includes/db.inc.php';
include_once '../includes/functions.inc.php';

$reservation = getReservations($conn);

// Check if the cancel form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel'])) {
    $reservation_id = $_POST['cancel'];
    deleteReservation($conn, $reservation_id); // Call the function to delete reservation

    // After deletion, redirect back to tableReservations.php to refresh the table
    header("Location: tableReservations.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Reservations</title>
    <style>
       body, ul, li {
            font-family: 'Arial', sans-serif;
            margin: 0;
                    padding: 0;
            list-style: none;
        }

        .container-crud {
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        .styled-table th {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #343a40;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .btn-confirm {
            background-color: #009879;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-confirm:hover {
            background-color: #0fa3b1;
        }

        .btn-cancel {
            background-color: #d62828;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-confirm:hover {
            background-color: #ef233c;
        }
    </style>
</head>
<body>
    <?php include_once 'staff_dashboard.php'; ?>

    <div class="container-crud">
        <div class="header">
            <h2>Table Reservations</h2>
        </div>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>No of Adults</th>
                    <th>No of Children</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservation as $reservations): ?>
                    <tr>
                        <td><?php echo $reservations['id']; ?></td>
                        <td><?php echo $reservations['name']; ?></td>
                        <td><?php echo $reservations['email']; ?></td>
                        <td><?php echo $reservations['phoneNumber']; ?></td>
                        <td><?php echo $reservations['date']; ?></td>
                        <td><?php echo $reservations['time']; ?></td>
                        <td><?php echo $reservations['noOfAdults']; ?></td>
                        <td><?php echo $reservations['noOfChildren']; ?></td>
                        <td>
                            <!-- Confirm button unchanged -->
                            <center><button class="btn-confirm" onclick="confirmReservation('<?php echo $reservations['email']; ?>', '<?php echo $reservations['name']; ?>')">Confirm</button></center>
                            
                            <!-- Form for Cancel button -->
                            <form method="post">
                                <center><button class="btn-cancel" type="submit" name="cancel" value="<?php echo $reservations['id']; ?>" onclick="cancelReservation('<?php echo $reservations['email']; ?>', '<?php echo $reservations['name']; ?>')">Cancel</button></center>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function send(action, email, name) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../includes/send.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                }
            };

            xhr.send("action=" + action + "&email=" + email + "&name=" + name);
        }

        function confirmReservation(email, name) {
            send('confirm', email, name);
        }
        function cancelReservation(email, name) {
            send('cancel', email, name);
        }
    </script>

</body>
</html>
