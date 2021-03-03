<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Electronics Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<?php
include('includes/header.php');
?>
<!-- the body section -->
<body>
    <header><h1>My Electronics Shop</h1></header>

    <main>
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
    </main>
    <?php
include('includes/footer.php');
?>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> MyElectronics Shop, Inc.</p>
    </footer>
</body>
</html>