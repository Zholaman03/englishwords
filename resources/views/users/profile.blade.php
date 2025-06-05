<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    UserProfile
    <h2>{{ Auth::user()->name }}</h2>

    <ul>
        @foreach ($savedWords as $word)
        <li>{{ $word->word }}</li>
        @endforeach
    </ul>
    <ul>
        @foreach ( $users as $user)
        <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</body>
</html>