<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Halaman Home</h1>
    <hr>
    selamat datang <?php echo $username; ?>
    <a href="<?php echo base_url('contohsesi/hapussesi') ?>">Log Out</a>
</body>
</html>