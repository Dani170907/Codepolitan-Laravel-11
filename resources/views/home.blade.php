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


    {{-- <ul>
        @for ($index = 0; $index < count($movies); $index++)
        <li>{{ $movies[$index]['title'] . ' - ' . $movies[$index]['year']}}</li>
        @endfor
    </ul> --}}

    {{-- <ol>
        @foreach ($movies as $movie)
            <li>{{ $movie['title'] . ' - ' . $movie['year'] }}</li>
        @endforeach
    </ol> --}}

    <ol>
        @forelse ($movies as $movie)
            <li>{{ $movie['title'] . ' - ' . $movie['year'] }}</li>
        @empty
            <li>Not found</li>
        @endforelse
    </ol>
</body>
</html>
