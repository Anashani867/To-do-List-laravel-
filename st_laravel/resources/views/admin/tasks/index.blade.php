@extends('layouts.admin')

@section('content')
    <h1>All Tasks</h1>
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Assigned User</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->user->name }}</td>
                <td>
                    <a href="{{ route('admin.task.edit', $task->id) }}">Edit</a>
                    <form action="{{ route('admin.task.delete', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $tasks->links() }}
@endsection
