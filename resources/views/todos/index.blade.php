<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 100%;
            padding: 40px;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        .form-group input {
            flex: 1;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-group button {
            padding: 12px 24px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-group button:hover {
            background: #5568d3;
        }

        .todos-list {
            list-style: none;
        }

        .todo-item {
            display: flex;
            align-items: center;
            padding: 16px;
            background: #f9f9f9;
            border-radius: 6px;
            margin-bottom: 12px;
            transition: all 0.3s;
        }

        .todo-item:hover {
            background: #f0f0f0;
        }

        .todo-item.completed .todo-text {
            text-decoration: line-through;
            color: #999;
        }

        .todo-checkbox {
            width: 20px;
            height: 20px;
            margin-right: 16px;
            cursor: pointer;
        }

        .todo-text {
            flex: 1;
            color: #333;
            font-size: 16px;
        }

        .todo-actions {
            display: flex;
            gap: 8px;
        }

        .edit-btn {
            padding: 6px 12px;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .edit-btn:hover {
            background: #357abd;
        }

        .delete-btn {
            padding: 6px 12px;
            background: #ff6b6b;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .delete-btn:hover {
            background: #ee5a52;
        }

        .empty-state {
            text-align: center;
            color: #999;
            padding: 40px 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>📝 Todo App</h1>

        <form method="POST" action="{{ route('todos.store') }}" class="form-group">
            @csrf
            <input type="text" name="title" placeholder="Add a new todo..." required>
            <button type="submit">Add</button>
        </form>

        @if ($todos->count() > 0)
        <ul class="todos-list">
            @foreach ($todos as $todo)
            <li class="todo-item {{ $todo->completed ? 'completed' : '' }}">
                <form method="POST" action="{{ route('todos.update', $todo) }}" style="display: flex; align-items: center; flex: 1;">
                    @csrf
                    @method('PUT')
                    <input type="checkbox" class="todo-checkbox" name="completed"
                        {{ $todo->completed ? 'checked' : '' }}
                        onchange="this.form.submit()">
                    <span class="todo-text">{{ $todo->title }}</span>
                </form>
                <div class="todo-actions">
                    <a href="{{ route('todos.edit', $todo) }}" class="edit-btn">Edit</a>
                    <form method="POST" action="{{ route('todos.destroy', $todo) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <div class="empty-state">
            <p>No todos yet. Add one to get started!</p>
        </div>
        @endif
    </div>
</body>

</html>