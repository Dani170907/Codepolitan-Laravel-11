<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies Page</title>
</head>
<body>
    <h1>Movie</h1>
    <ul>
        <?php foreach ($menu as $key => $value) : ?>
            <li><a href="<?= $value ?>"><?= $key ?></a></li>
        <?php endforeach ?>
    </ul>
    {{ dd($movie) }}
</body>
</html>
