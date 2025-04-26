<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gardening Blogs - UrbanGreen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem;
            color: #2e7d32;
        }
        header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }
        .btn-back {
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
        article {
            background: white;
            padding: 1.5rem 2rem;
            margin-bottom: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        article h2 {
            font-size: 1.75rem;
            margin-bottom: 0.75rem;
        }
        article p {
            font-size: 1rem;
            line-height: 1.6;
            color: #4a4a4a;
        }
        article a.read-more {
            display: inline-block;
            margin-top: 1rem;
            color: #2e7d32;
            font-weight: 600;
            text-decoration: none;
            border-bottom: 2px solid transparent;
            transition: border-color 0.3s ease;
        }
        article a.read-more:hover {
            border-color: #2e7d32;
        }
    </style>
</head>
<body>
    <header>
        <h1>Gardening Blogs</h1>
        <a href="{{ route('dashboard') }}" class="btn-back">Back to Dashboard</a>
    </header>

    <main>
        @foreach($blogs as $blog)
            <article>
                <h2>{{ $blog->title }}</h2>
                <p>{{ Str::limit($blog->content, 300) }}</p>
                <a href="{{ route('blogs.show', $blog->id) }}" class="read-more">Read More &rarr;</a>
            </article>
        @endforeach
    </main>
</body>
</html>
