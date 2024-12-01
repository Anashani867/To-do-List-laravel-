<h1>My Tasks</h1>
<form method="POST" action="{{ route('todos.store') }}">
    @csrf
    <input type="text" name="title" placeholder="Task Title" required>
    <textarea name="description" placeholder="Task Description"></textarea>
    <button type="submit">Add Task</button>
</form>

<ul>
    @foreach ($todos as $todo)
        <li>
            {{ $todo->title }} - {{ $todo->status ? 'Completed' : 'Not Completed' }}
            <form method="POST" action="{{ route('todos.destroy', $todo->id) }}">
                @csrf @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
