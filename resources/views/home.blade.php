<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <h1>Home Page</h1>

    <ul>
        @foreach ($menu as $key => $value)
            <li>
                <a href="<?= $value ?>"><?= $key ?></a>
            </li>
        @endforeach
    </ul>

    <ol>
        @foreach ($movies as $movie)
            <p class="{{ $movie['year'] < 2000 ? 'text-red-500' : 'text-green-500' }} {{ $loop->first ? 'font-bold' : ($loop->last ? 'italic' : '') }}">
                {{ $movie['title'] . ' - ' . $movie['year'] }}
            </p>
        @endforeach
    </ol>

    Profile
    <li>Name: {{ $user['name'] }}</li>
    <li>Email: {{ $user['email'] }}</li>


    {{-- <ul>
        @for ($index = 0; $index < count($movies); $index++)
        <li>{{ $movies[$index]['title'] . ' - ' . $movies[$index]['year']}}</li>
        @endfor
    </ul> --}}

        @foreach ($movies as $movie)

            {{-- <p>{{ $loop->iteration }}. {{ $movie['title'] . ' - ' . $movie['year'] }}</p> --}}
            {{-- @if($loop->first)
                <h4>First Movie: {{ $movie['title'] . ' - ' . $movie['year'] }}</h4>
            @elseif ($loop->last)
                <h4>Last Movie: {{ $movie['title'] . ' - ' . $movie['year'] }}</h4>
            @else
                <h4>{{ $movie['title'] . ' - ' . $movie['year'] }}</h4>
            @endif --}}

            <p>Movie: {{ $loop->iteration }} of {{ $loop->count }}: {{ $movie['title'] }} - {{ $movie['year'] }}</p>
        @endforeach

{{--
    <ol>
        @foreach ($movies as $movie)
            @if($movie['year'] < 2000)
                @continue
            @endif

            @if($movie['year'] > 2018)
                @break
            @endif
            <li>{{ $movie['title'] . ' - ' . $movie['year'] }}</li>
        @endforeach
    </ol> --}}

    {{-- <ol>
        @forelse ($movies as $movie)
            <li>{{ $movie['title'] . ' - ' . $movie['year'] }}</li>
        @empty
            <li>Not found</li>
        @endforelse
    </ol> --}}
</body>
</html>
