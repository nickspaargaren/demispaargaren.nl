<html lang="nl">

<head>
    <title>404 | <? echo $settings->projectnaam ?></title>
    <style>
        body {
            margin: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: "Helvetica Neue", Helvetica, arial;
        }
    </style>
    <?php echo $settings->analytics . "\n"; ?>
</head>

<body>
    <div>
        <h1>404</h1>
        <p><a href="<?php echo $base; ?>">Home</a></p>
    </div>
</body>

</html>