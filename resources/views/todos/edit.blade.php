<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
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
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        
        button, .cancel-btn {
            flex: 1;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        button[type="submit"] {
            background: #667eea;
            color: white;
        }
        
        button[type="submit"]:hover {
            background: #5568d3;
        }
        
        .cancel-btn {
            background: #e0e0e0;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .cancel-btn:hover {
            background: #d0d0d0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>✏️ Edit Todo</h1>
        
        <form method="POST" action="{{ route('todos.update', $todo) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Todo Title</label>
                <input type="text" id="title" name="title" value="{{ $todo->title }}" required>
            </div>
            
            <div class="button-group">
                <button type="submit">Update Todo</button>
                <a href="{{ route('todos.index') }}" class="cancel-btn">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
