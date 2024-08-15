<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'My Website'; ?></title>
    <link rel="stylesheet" href="../../../public/assets/css/BodyStyle.css">
    <link rel="stylesheet" href="../../../public/assets/css/FixNav.css">
    <link rel="stylesheet" href="../../../public/assets/css/Off-canav.css">
    <script src="../../../public/assets/js/FixNav.js"></script>
    <script src="../../../public/assets/js/Off-canav.js"></script>

</head>
<body>

    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Fix NavBar -->
    <?php include 'navbar.php'; ?>

    <div class="row">
        <!-- Off-canav -->
        <?php include 'off-canav.php'; ?>

        <!-- Main -->
        <div class="main">
            <?php echo $content; ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>