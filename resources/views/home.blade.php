<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Home Page</h1>

    <ul>
        <?php foreach ($menu as $key => $value) : ?>
            <li><a href="<?= $value ?>"><?= $key ?></a></li>
        <?php endforeach ?>
    </ul>
</body>
</html>
