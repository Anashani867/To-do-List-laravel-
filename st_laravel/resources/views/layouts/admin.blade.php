<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
<header>
    <h2>Admin Panel</h2>
    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.tasks') }}">Tasks</a>
    </nav>
</header>
<main>
    @yield('content')
</main>
</body>
</html>
