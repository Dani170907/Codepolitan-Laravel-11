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
    @if ($user['role'] == 'admin')
        <li>Role: Administrator</li>
    @elseif ($user['role'] == 'user')
        <li>Role: User</li>
    @else
        <li>Role: Unknown</li>
    @endif
</body>
</html>
