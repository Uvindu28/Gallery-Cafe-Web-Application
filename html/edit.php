
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="form" class="container">
        <form name="form" method="POST" action="includes/update.inc.php">
           <h3>Update</h3>
           <?php
                include_once '../includes/db.inc.php';
            ?>
           
           <input type="hidden" name="id" value="">
           <input type="text" name="name" value="" placeholder="Name">
           <input type="number" name="number" value="" placeholder="price">
           <button type="submit" name="submit" value="signUp">Update</button>
        </form>       
    </div>
    
</body>
</html>