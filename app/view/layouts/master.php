<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'My Website'; ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="public/assets/css/BodyStyle.css">
    <link rel="stylesheet" href="public/assets/css/FixNav.css">
    <link rel="stylesheet" href="public/assets/css/Off-canav.css">
    <link rel="stylesheet" href="public/assets/css/Grid.css">
    <link rel="stylesheet" href="public/assets/css/Card.css">
    <link rel="stylesheet" href="public/assets/css/Button.css">
    <link rel="stylesheet" href="public/assets/css/Avatar.css">
    <link rel="stylesheet" href="public/assets/css/Notification.css">
    <link rel="stylesheet" href="public/assets/css/List.css">
    <link rel="stylesheet" href="public/assets/css/Tab.css">
    <link rel="stylesheet" href="public/assets/css/Table.css">
    <link rel="stylesheet" href="public/assets/css/DragDrop.css">
    <link rel="stylesheet" href="public/assets/css/Modal.css">
    <link rel="stylesheet" href="public/assets/css/Form.css">
    <link rel="stylesheet" href="public/assets/css/Alerts.css">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Afacad' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bayon' rel='stylesheet'>
    <link rel="stylesheet" href="public/assets/css/Fonts.css">
    <!-- Icon -->
    <link rel="icon" href="public/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Fix NavBar -->
    <?php include 'navbar.php'; ?>
    
    <!-- Main -->
    <?php echo $content; ?>
    

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JS -->
    <script src="public/assets/js/Modal.js"></script>
    <script src="public/assets/js/FixNav.js"></script>
    <script src="public/assets/js/Off-canav.js"></script>
    <script src="public/assets/js/ListSearch.js"></script>
    <script src="public/assets/js/Tab.js"></script>
    <script src="public/assets/js/TableSearch.js"></script>
    <script src="public/assets/js/DragDrop.js"></script>

    

   
    
</body>
</html>