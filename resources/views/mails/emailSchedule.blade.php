<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Vaccination Schedule</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 20px auto;
      background: #ffffff;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 20px;
    }
    h2 {
      color: #2c3e50;
    }
    .schedule {
      margin-top: 20px;
    }
    .schedule-item {
      padding: 10px;
      border-bottom: 1px solid #eee;
    }
    .schedule-item:last-child {
      border-bottom: none;
    }
    .date {
      font-weight: bold;
      color: #27ae60;
    }
    .notes {
      color: #555;
    }
    .footer {
      margin-top: 30px;
      font-size: 12px;
      color: #888;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Vaccination Schedule for {{ $patientName }}</h2>
    <p>Here are your upcoming vaccination dates. Please make sure to attend each appointment as scheduled.</p>

    <div class="schedule">
      <div class="schedule-item">
        <span class="date">April 15, 2026</span><br>
        <span class="notes">Rabies vaccine - 1st dose</span>
      </div>
      <div class="schedule-item">
        <span class="date">April 22, 2026</span><br>
        <span class="notes">Rabies vaccine - 2nd dose</span>
      </div>
      <div class="schedule-item">
        <span class="date">May 6, 2026</span><br>
        <span class="notes">Rabies vaccine - 3rd dose</span>
      </div>
    </div>

    <div class="footer">
      <p>This is an automated reminder. If you have questions, please contact our clinic.</p>
    </div>
  </div>
</body>
</html>