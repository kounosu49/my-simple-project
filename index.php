<?php
// Protected PHP file - CMS managed content
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Simple Project - PHP Version</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to My Simple Project (PHP)</h1>
    <p>このファイルはCMS管理下のPHPファイルです。</p>
    <p>現在時刻: <?php echo date('Y-m-d H:i:s'); ?></p>
</body>
</html>