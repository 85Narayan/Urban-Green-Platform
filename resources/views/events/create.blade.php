<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Event - UrbanGreen</title>
  <style>
    body {
      background: linear-gradient(to bottom right, #e6fffa, #f0fff4);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 40px 20px;
    }

    .container {
      max-width: 700px;
      margin: 0 auto;
      background-color: #ffffff;
      border: 2px solid #c6f6d5;
      border-radius: 25px;
      padding: 40px;
      box-shadow: 0 8px 30px rgba(72, 187, 120, 0.2);
      position: relative;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .dashboard-link {
      background-color: #2f855a;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 20px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .dashboard-link:hover {
      background-color: #276749;
    }

    h1 {
      font-size: 36px;
      text-align: center;
      color: #22543d;
      margin-bottom: 10px;
    }

    p.description {
      text-align: center;
      color: #2f855a;
      margin-bottom: 30px;
      font-size: 18px;
    }

    label {
      font-weight: bold;
      color: #2f855a;
      display: block;
      margin-bottom: 8px;
      margin-top: 20px;
      font-size: 16px;
    }

    input[type="text"],
    textarea,
    input[type="datetime-local"] {
      width: 100%;
      padding: 12px;
      border: 2px solid #68d391;
      border-radius: 10px;
      font-size: 16px;
      color: #22543d;
      background-color: #f7fafc;
    }

    textarea {
      resize: vertical;
    }

    .submit-btn {
      background: linear-gradient(to right, #48bb78, #38a169);
      color: white;
      padding: 14px 30px;
      border: none;
      font-size: 16px;
      border-radius: 30px;
      margin-top: 35px;
      cursor: pointer;
      font-weight: bold;
      box-shadow: 0 4px 10px rgba(72, 187, 120, 0.3);
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .submit-btn:hover {
      background-color: #2f855a;
      transform: scale(1.05);
    }

    .error {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    }

    @media (max-width: 600px) {
      .submit-btn, .dashboard-link {
        width: 100%;
        text-align: center;
        display: block;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="top-bar">
    <a href="{{ route('dashboard') }}" class="dashboard-link">← Back to Dashboard</a>
  </div>

  <h1>🌿 Plan Your Event</h1>
  <p class="description">Create an unforgettable experience in <strong>{{ $garden->name }}</strong>.</p>

  <form action="{{ route('gardens.events.store', $garden) }}" method="POST">
    @csrf
    <label for="name">Event Name</label>
    <input type="text" id="name" name="name" required>
    @error('name')
      <p class="error">{{ $message }}</p>
    @enderror

    <label for="description">Description</label>
    <textarea id="description" name="description" rows="5"></textarea>
    @error('description')
      <p class="error">{{ $message }}</p>
    @enderror

    <label for="event_date">Start Date & Time</label>
    <input type="datetime-local" id="event_date" name="event_date" required>
    @error('event_date')
      <p class="error">{{ $message }}</p>
    @enderror

    <label for="end_date">End Date & Time</label>
    <input type="datetime-local" id="end_date" name="end_date">
    @error('end_date')
      <p class="error">{{ $message }}</p>
    @enderror

    <div style="text-align: center;">
      <button type="submit" class="submit-btn">✨ Create Event</button>
    </div>
  </form>
</div>

</body>
</html>