@extends('layouts.admin')

@section('content')
    <h1>Edit Task</h1>
    <form action="{{ route('admin.task.update', $task->id) }}" method="POST">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ $task->title }}">
        </div>
        <div>
            <label>Description</label>
            <textarea name="description">{{ $task->description }}</textarea>
        </div>
        <div>
            <label>Status</label>
            <select name="status">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <button type="submit">Update Task</button>
    </form>
@endsection
