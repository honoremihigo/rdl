<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="">admin:</label>
        <input type="text" name="adminName">
        <label for="">password:</label>
        <input type="text" name="password" id="">
        <button>register</button>
    </form>
</body>
</html>