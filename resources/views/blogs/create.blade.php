<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create a New Blog - UrbanGreen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #e8f5e9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem;
            color: #2e7d32;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
            color: #2e7d32;
        }
        input[type="text"],
        textarea {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            font-family: inherit;
            margin-bottom: 1.25rem;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #2e7d32;
            box-shadow: 0 0 5px rgba(46, 125, 50, 0.5);
        }
        button {
            background-color: #2e7d32;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #1b5e20;
        }
        .btn-back {
            display: inline-block;
            margin-bottom: 1.5rem;
            background-color: #2e7d32;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #1b5e20;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('dashboard') }}" class="btn-back">← Back to Dashboard</a>
        <h1>Create a New Resource</h1>
        <form action="{{ route('blogs.store') }}" method="POST">
            @csrf
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required />
            <label for="content">Content</label>
            <textarea id="content" name="content" rows="8" required></textarea>
            <button type="submit">Publish Resource</button>
        </form>
    </div>
</body>
</html>
