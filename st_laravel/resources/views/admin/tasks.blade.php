<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Tasks</title>
</head>
<body>
<h1>Tasks Management</h1>
<ul>
    @foreach ($tasks as $task)
        <li>{{ $task }}</li>
    @endforeach
</ul>
</body>
</html>
