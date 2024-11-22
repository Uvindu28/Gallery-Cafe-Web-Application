<?php
session_start();

if (isset($_POST['checkout'])) {
    unset($_SESSION['cart']);
    header('Location: orderConfirmation.php'); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #fffcf2;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #ffba08;
        }

        .checkout-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #ffba08;
            color: #fff;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .total-row {
            font-weight: bold;
        }

        .checkout-button {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #5bc0de;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .checkout-button:hover {
            background-color: #31b0d5;
        }
    </style>
</head>
<body>
    <h1>Checkout</h1>
    <div class="checkout-container">
        <?php if (!empty($_SESSION['cart'])): ?>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $value):
                    $total += $value['price'] * $value['quantity'];
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($value['name']); ?></td>
                        <td>$<?php echo number_format($value['price'], 2); ?></td>
                        <td><?php echo $value['quantity']; ?></td>
                        <td>$<?php echo number_format($value['price'] * $value['quantity'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3">Total</td>
                    <td>$<?php echo number_format($total, 2); ?></td>
                </tr>
            </table>
            <form method="POST" action="">
                <button type="submit" name="checkout">Checkout</button>
            </form>
        <?php else: ?>
            <p>Your cart is empty</p>
        <?php endif; ?>
    </div>
</body>
</html>
