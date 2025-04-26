<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Resource - {{ $blog->title }} - UrbanGreen</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap');

        body {
            background: linear-gradient(135deg, #d4f7dc 0%, #a8e6a3 100%);
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 3rem 2rem;
            color: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: white;
            max-width: 600px;
            width: 100%;
            padding: 3rem 3.5rem;
            border-radius: 2rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid #a8e6a3;
            position: relative;
            overflow: hidden;
        }
        .container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, #a8e6a3 0%, transparent 70%);
            transform: rotate(25deg);
            z-index: 0;
        }
        h1 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 2rem;
            text-align: center;
            color: #2f6f2f;
            letter-spacing: 0.1em;
            position: relative;
            z-index: 1;
            text-transform: uppercase;
            text-shadow: 1px 1px 3px rgba(47, 111, 47, 0.6);
        }
        label {
            font-weight: 700;
            margin-bottom: 0.75rem;
            display: block;
            color: #34495e;
            position: relative;
            z-index: 1;
        }
        input[type="text"],
        textarea {
            width: 100%;
            border: 2px solid #2f6f2f;
            border-radius: 1rem;
            padding: 1rem 1.25rem;
            font-size: 1.1rem;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 1.75rem;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            z-index: 1;
        }
        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #68bb59;
            box-shadow: 0 0 12px rgba(104, 187, 89, 0.7);
        }
        button {
            background: linear-gradient(90deg, #2f6f2f 0%, #68bb59 100%);
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 2rem;
            font-weight: 900;
            font-size: 1.3rem;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            transition: background 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 8px 20px rgba(47, 111, 47, 0.6);
            position: relative;
            z-index: 1;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        button:hover {
            background: linear-gradient(90deg, #68bb59 0%, #2f6f2f 100%);
            box-shadow: 0 10px 25px rgba(104, 187, 89, 0.8);
        }
        .btn-back {
            display: inline-block;
            margin-bottom: 2rem;
            background-color: #2f6f2f;
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 1.5rem;
            text-decoration: none;
            font-weight: 700;
            transition: background-color 0.3s ease;
            position: relative;
            z-index: 1;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .btn-back:hover {
            background-color: #68bb59;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('blogs.show', $blog->id) }}" class="btn-back">← Back to Resource</a>
        <h1>Edit Resource</h1>
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $blog->title }}" required />
            <label for="content">Content</label>
            <textarea id="content" name="content" rows="8" required>{{ $blog->content }}</textarea>
            <button type="submit">Update Resource</button>
        </form>
    </div>
</body>
</html>
