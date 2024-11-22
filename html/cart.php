<?php
session_start();

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); 
            }
        }
    }
}

if (isset($_POST['update'])) {
    if ($_GET['action'] == 'update') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                $_SESSION['cart'][$key]['quantity'] = $_POST['quantity'];
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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

        .cart-container {
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

        table td input[type="number"] {
            width: 60px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table td button {
            background-color: #d9534f;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        table td button:hover {
            background-color: #c9302c;
        }

        .checkout-link {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #5bc0de;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .checkout-link:hover {
            background-color: #31b0d5;
        }
    </style>
</head>
<body>
    <h1>Your Cart</h1>
    <div class="cart-container">
        <?php if (!empty($_SESSION['cart'])): ?>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $key => $value):
                    $total += $value['price'] * $value['quantity'];
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($value['name']); ?></td>
                        <td>$<?php echo number_format($value['price'], 2); ?></td>
                        <td>
                            <form method="POST" action="cart.php?action=update&id=<?php echo $value['id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $value['quantity']; ?>" min="1">
                                <button type="submit" name="update">Update</button>
                            </form>
                        </td>
                        <td>$<?php echo number_format($value['price'] * $value['quantity'], 2); ?></td>
                        <td>
                            <form method="POST" action="cart.php?action=remove&id=<?php echo $value['id']; ?>">
                                <button type="submit" name="remove">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3">Total</td>
                    <td>$<?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
            </table>
        <?php else: ?>
            <p>Your cart is empty</p>
        <?php endif; ?>
    </div>
    <a href="checkout.php">Proceed to Checkout</a>
</body>
</html>
