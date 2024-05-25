<?php
use App\Controller\ProductController;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add product</h1>
    <br>
    <form action="create_product" method="POST">
        <input type="text" name="name" /><br>
        <input type="nuumber" name="price" /><br>
        <input type="number" name="stocks" /><br>
        <input type="submit" name="submit" />

    </form>
</body>
</html>

<?php
var_dump($_SERVER);
?>