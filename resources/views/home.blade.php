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

    Profile
    <li>Name: {{ $user['name'] }}</li>
    <li>Email: {{ $user['email'] }}</li>
    @switch($movieCategory)
        @case('action')
            <h4>Action Movies</h4>
            @break
        @case('comedy')
            <h4>Comedy Movies</h4>
            @break
        @case('drama')
            <h4>Drama Movies</h4>
            @break
        @default
            <h4>Other Movies</h4>
    @endswitch
    </li>
</body>
</html>
