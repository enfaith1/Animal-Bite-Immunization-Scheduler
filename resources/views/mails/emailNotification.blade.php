<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaccination Schedule</title>
</head>
<body style="margin:0; padding:0; background-color:#DAF1DE; font-family:Arial, sans-serif;">

  <table width="100%" cellpadding="0" cellspacing="0" style="padding: 32px 16px;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px; width:100%; border-radius:16px; overflow:hidden; box-shadow: 0 4px 24px rgba(5,31,32,0.10);">

          <!-- Header -->
          <tr>
            <td style="background: linear-gradient(135deg, #051F20 0%, #163832 100%); padding: 32px 32px 24px; text-align:center;">
              <p style="margin:0 0 8px; font-size:22px;">💉</p>
              <h1 style="margin:0; font-size:18px; font-weight:700; color:#DAF1DE; letter-spacing:-0.3px;">Animal Bite Immunization Scheduler</h1>
              <p style="margin:6px 0 0; font-size:13px; color:#9EB698;">Anti-Rabies Vaccination Appointment</p>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td style="background:#ffffff; padding: 32px;">

              <p style="margin:0 0 6px; font-size:16px; font-weight:700; color:#051F20;">Hello, 👋</p>
              <p style="margin:0 0 24px; font-size:14px; color:#163832; line-height:1.7;">
                You have an anti-rabies vaccination scheduled for today. Please appear for your appointment; completing all doses is essential for your protection.
              </p>

              <!-- Schedule Table -->
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td colspan="2" style="padding-bottom:12px; font-size:11px; font-weight:700; color:#235347; text-transform:uppercase; letter-spacing:1px; border-bottom: 1px solid #9EB698;">
                    📅 Today's Antirabies Vaccination Appointment
                  </td>
                </tr>

                <!-- Dose 1 -->
                <tr>
                  <td style="padding: 14px 0; border-bottom: 1px solid #e0e0e0; width:50%;">
                    <span style="display:inline-block; background:linear-gradient(135deg,#9EB698,#235347); color:white; font-size:11px; font-weight:700; padding:3px 10px; border-radius:50px; margin-bottom:4px;">DOSE {{ $dose_number }}</span><br>
                    <span style="font-size:15px; font-weight:700; color:#235347;">{{ $today }}</span>
                  </td>
                  <td style="padding: 14px 0; border-bottom: 1px solid #e0e0e0; font-size:13px; color:#163832; vertical-align:middle;">
                    Rabies Vaccine — {{ $dose_number }}{{ $dose_number == '2' ? 'nd' : ($dose_number == '3' ? 'rd' : 'th') }} Dose
                  </td>
                </tr>
              </table>
              
              <!-- Notice -->
              <table width="100%" cellpadding="0" cellspacing="0" style="margin-top:24px;">
                <tr>
                  <td style="background:#DAF1DE; border-left: 4px solid #9EB698; border-radius:8px; padding:14px 16px; font-size:13px; color:#163832; line-height:1.6;">
                    ⚠️  <strong style="color:#051F20;">Reminder:</strong> Missing any dose may reduce effectiveness. Contact us immediately if you need to reschedule.
                  </td>
                </tr>
              </table>

            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background:#163832; padding: 20px 32px; text-align:center;">
              <p style="margin:0; font-size:12px; color:#9EB698; line-height:1.7;">
                This is an automated reminder. Please do not reply to this email.<br>
                For questions, contact your nearest Animal Bite Treatment Center.
              </p>
              <p style="margin:10px 0 0; font-size:11px; color:#9EB69880;">© 2026 Animal Bite Immunization Scheduler</p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>

</body>
</html>