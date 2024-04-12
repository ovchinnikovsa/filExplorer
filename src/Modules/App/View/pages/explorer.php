<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorer</title>
</head>

<body>
    <h1>Explorer</h1>
    <?php if ($fileScanner) { ?>
        <ul>
            <?php foreach ($fileScanner->getFiles() as $file) { ?>
            <li><?php var_dump($file); ?></li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>Unable to scan files</p>
    <?php } ?>
</body>

</html>