<!-- resources/views/file/showAll.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>All File Contents</title>
</head>
<body>
    <h1>All File Contents</h1>
    @foreach ($fileContents as $filename => $content)
        <h2>{{ $filename }}</h2>
        <pre>{{ $content }}</pre>
    @endforeach
</body>
</html>
