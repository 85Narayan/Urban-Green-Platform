<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $blog->title }} - UrbanGreen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #e8f5e9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem;
            color: #2e7d32;
        }
        .container {
            max-width: 700px;
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin: 0 auto;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .published-date {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }
        .content {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #374151;
            white-space: pre-wrap;
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
        .btn-group {
            margin-top: 2rem;
            display: flex;
            gap: 1rem;
        }
        .btn-edit, .btn-delete {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-edit {
            background-color: #fbbf24;
            color: #1f2937;
        }
        .btn-edit:hover {
            background-color: #f59e0b;
        }
        .btn-delete {
            background-color: #dc2626;
            color: white;
        }
        .btn-delete:hover {
            background-color: #b91c1c;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('blogs.index') }}" class="btn-back">← Back to Blogs</a>
        <h1>{{ $blog->title }}</h1>
        <div class="published-date">Published on {{ $blog->created_at->format('F j, Y') }}</div>
        <div class="content">{!! nl2br(e($blog->content)) !!}</div>
        <div class="btn-group">
            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn-edit">Edit</a>
            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">Delete</button>
            </form>
        </div>
    </div>
</body>
</html>
