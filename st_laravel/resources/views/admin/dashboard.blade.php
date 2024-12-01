{{--@extends('layouts.admin')--}}

{{--@section('content')--}}
{{--    <h1>Admin Dashboard</h1>--}}
{{--    <p>Total Tasks: {{ $taskCount }}</p>--}}
{{--    <p>Completed Tasks: {{ $completedCount }}</p>--}}
{{--    <p>Pending Tasks: {{ $pendingCount }}</p>--}}
{{--@endsection--}}


{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Admin Dashboard</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<h1>Welcome to the Admin Dashboard</h1>--}}
{{--<h1>Admin Dashboard</h1>--}}
{{--<p>Total Tasks: {{ $taskCount }}</p>--}}
{{--<p>Completed Tasks: {{ $completedCount }}</p>--}}
{{--<p>Pending Tasks: {{ $pendingCount }}</p>--}}
{{--</body>--}}
{{--</html>--}}



<h1>Admin Dashboard</h1>
<table>
    <thead>
    <tr>
        <th>Task</th>
        <th>User</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($todos as $todo)
        <tr>
            <td>{{ $todo->title }}</td>
            <td>{{ $todo->user->name }}</td>
            <td>{{ $todo->status ? 'Completed' : 'Not Completed' }}</td>
            <td>
                <form method="POST" action="{{ route('admin.todos.destroy', $todo->id) }}">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

