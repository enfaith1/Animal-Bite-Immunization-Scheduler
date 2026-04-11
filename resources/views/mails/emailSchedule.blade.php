<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Vaccination Schedule</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, sans-serif;">
  <table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse; background-color:#ffffff; margin:20px auto; border:1px solid #ddd;">
    <!-- Header -->
    <tr>
      <td align="center" style="background-color:#163832; padding:20px; color:#ffffff;">
        <h2 style="margin:0; font-size:20px;">Animal Bite Immunization Scheduler</h2>
        <p style="margin:0; font-size:14px;">Anti-Rabies Vaccination Schedule</p>
      </td>
    </tr>

    <!-- Body -->
    <tr>
      <td style="padding:20px; color:#333333;">
        <p style="font-size:16px; font-weight:bold; margin:0 0 10px;">Hello, {{ $patientName }}</p>
        <p style="font-size:14px; line-height:1.5; margin:0 0 20px;">
          Your anti-rabies vaccination schedule has been confirmed. Please attend each appointment on time —
          completing all doses is essential for full protection against rabies.
        </p>

        <p style="font-size:14px; font-weight:bold; margin:0 0 10px;">📅 Your Appointments</p>

        <!-- Schedule Items -->
        @foreach ($scheduledDays as $index => $day)
        <table width="100%" cellpadding="10" cellspacing="0" style="border:1px solid #ddd; margin-bottom:10px;">
          <tr>
            <td width="60" align="center" style="background-color:#235347; color:#ffffff; font-weight:bold;">
              D{{ $index + 1 }}
            </td>
            <td style="font-size:14px; color:#333333;">
              <div style="font-weight:bold;">{{ $day }}</div>
              <div>Rabies Vaccine — {{ $index + 1 }}{{ $index + 1 == 1 ? 'st' : ($index + 1 == 2 ? 'nd' : ($index + 1 == 3 ? 'rd' : 'th')) }} Dose</div>
            </td>
          </tr>
        </table>
        @endforeach

        <!-- Notice -->
        <table width="100%" cellpadding="10" cellspacing="0" style="border:1px solid #9EB698; background-color:#f9f9f9; margin-top:20px;">
          <tr>
            <td style="font-size:13px; color:#333333;">
              <strong>Important Reminder:</strong> Missing or delaying any dose may reduce the effectiveness of your treatment.
              If you are unable to attend a scheduled appointment, please contact our clinic immediately to reschedule.
            </td>
          </tr>
        </table>
      </td>
    </tr>

    <!-- Footer -->
    <tr>
      <td align="center" style="background-color:#163832; padding:15px; color:#ffffff; font-size:12px;">
        <p style="margin:0;">This is an automated reminder. Please do not reply to this email.<br>
        For questions or concerns, contact your nearest Animal Bite Treatment Center.</p>
        <p style="margin:10px 0 0;">© 2026 Animal Bite Immunization Scheduler. All rights reserved.</p>
      </td>
    </tr>
  </table>
</body>
</html>
