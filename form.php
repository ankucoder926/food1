<?php

$name = $_POST['name'];
$number = $_POST['number'];
$adrs = $_POST['adrs'];
$menu = $_POST['menu'];
$qty = $_POST['qty'];
$price = $_POST['price'];

$total_price = $qty * $price; // ✅ Calculate total

$host = "localhost";
$user = "root";
$pass = null;
$db = "food";

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Connection failed");
} else {
    $SQL = "INSERT INTO customer(`name`, `number`, `address`, `menu`, `qty`, `price`, `total_price`)
            VALUES('$name', '$number', '$adrs', '$menu', '$qty', '$price', '$total_price')";

    if ($con->query($SQL)) {
        // Success HTML response
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Order Confirmation</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f8f9fa;
                    text-align: center;
                    padding: 50px;
                }
                .message-box {
                    background-color: #ffffff;
                    border: 1px solid #dee2e6;
                    border-radius: 10px;
                    padding: 30px;
                    max-width: 500px;
                    margin: 0 auto;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                .message-box h1 {
                    color: #28a745;
                }
                .message-box p {
                    color: #343a40;
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <div class="message-box">
                <h1>🎉 Thank you for your order!</h1>
                <p>Your request has been successfully submitted.</p>
                <p>We truly appreciate your business and can\'t wait to serve you! 😊</p>
            </div>
        </body>
        </html>';
    } else {
        echo "Error: " . $SQL . "<br>" . $con->error;
    }

    $con->close();
}
?>
