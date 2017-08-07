<html>
<head>
    <title>Dark Sky App - @yield('title')</title>
</head>
<body>

    <div class="container">
        @foreach($weather as $value)
        <div>
            <p>Latitide: {{ $value->latitude}}</p>
            <p>Longitide: {{ $value->longitude}}</p>
            <p>Summary: {{ $value->summary}}</p>
            <p>Time: {{ $value->time}}</p>
            <p>------------------------</p>
        </div>
        @endforeach
    </div>
</body>
</html>