<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Official Referee Certificate</title>

  <style>
    @page {
      size: A4 portrait;
      margin: 18mm;
    }

    body {
      font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
      font-size: 11pt;
      color: #000;
      width: 100%;
      margin: 0 auto;
    }

    /* FRAME */
    .page {
      border: 3px solid #1a237e;
      padding: 10mm;
    }

    /* HEADER */
    .header {
      text-align: center;
      border-bottom: 2px solid #1a237e;
      padding-bottom: 6mm;
      margin-bottom: 8mm;
    }

    .header-title {
      font-size: 18pt;
      font-weight: bold;
      letter-spacing: 1px;
      color: #1a237e;
    }

    .header-sub {
      font-size: 11pt;
      margin-top: 2mm;
      color: #444;
    }

    .header-line {
      width: 60mm;
      height: 2px;
      background: #ff9800;
      margin: 4mm auto;
    }

    /* PROFILE */
    .profile {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 8mm;
    }

    .profile td {
      vertical-align: top;
    }

    /* PHOTO */
    .photo-box {
      width: 40mm;
      height: 50mm;
      border: 2px solid #1a237e;
      text-align: center;
    }

    .photo-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* NAME */
    .name-box {
      font-size: 15pt;
      font-weight: bold;
      color: #1a237e;
      margin-bottom: 2mm;
    }

    .role-box {
      font-size: 11pt;
      color: #444;
    }

    /* INFO TABLE */
    .info-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 5mm;
    }

    .info-table td {
      border: 1px solid #ddd;
      padding: 3mm;
      font-size: 10.5pt;
    }

    .label {
      width: 45mm;
      background: #f5f7fb;
      font-weight: bold;
      color: #1a237e;
    }

    /* BADGE */
    .badge {
      display: inline-block;
      border: 1px solid #ff9800;
      padding: 2mm 4mm;
      color: #ff9800;
      font-weight: bold;
      border-radius: 4px;
      font-size: 10pt;
      margin-top: 2mm;
    }

    /* SIGN */
    .sign-section {
      margin-top: 10mm;
      border-top: 1px solid #1a237e;
      padding-top: 6mm;
    }

    .sign-title {
      text-align: center;
      font-size: 13pt;
      font-weight: bold;
      margin-bottom: 6mm;
      color: #1a237e;
    }

    .sign-table {
      width: 100%;
    }

    .sign-box {
      text-align: center;
    }

    .sign-line {
      width: 55mm;
      height: 1px;
      background: #000;
      margin: 18mm auto 4mm auto;
    }

    .stamp {
      width: 28mm;
      height: 28mm;
      border: 1.5px solid #c62828;
      border-radius: 50%;
      margin: 4mm auto;
      font-size: 7pt;
      color: #c62828;
      font-weight: bold;
      padding-top: 6mm;
    }

    /* FOOTER */
    .footer {
      margin-top: 8mm;
      text-align: center;
      font-size: 8.5pt;
      color: #555;
      border-top: 1px solid #ddd;
      padding-top: 3mm;
    }
  </style>
</head>

<body>

  <div class="page">

    <!-- HEADER -->
    <div class="header">
      <div class="header-title">IRAN TAEKWONDO FEDERATION</div>
      <div class="header-line"></div>
      <div class="header-sub">Official International Referee Profile</div>
    </div>

    <!-- PROFILE -->
    <table class="profile">
      <tr>
        <td width="45mm">
          <div class="photo-box">
            <img src="{{ $referee->image 
                        ? public_path('refereeProfile/'.$referee->image) 
                        : public_path('refereeProfile/profile.png') }}">
          </div>
        </td>
        <td>
          <div class="name-box">
            {{ $referee->name }} {{ $referee->family }}
          </div>

          <div class="role-box">
            International Taekwondo Referee
          </div>

          <div class="badge">
            Grade: {{ $referee->degree->name }}
          </div>

          <table class="info-table">
            <tr>
              <td class="label">Referee Code</td>
              <td>{{ $referee->referee_id }}</td>
            </tr>
            <tr>
              <td class="label">National ID</td>
              <td>{{ $referee->natonial_code }}</td>
            </tr>
            <tr>
              <td class="label">Birth Year</td>
              <td>{{ $referee->birth_year }}</td>
            </tr>
            <tr>
              <td class="label">Phone</td>
              <td>{{ $referee->phone }}</td>
            </tr>
            <tr>
              <td class="label">Email</td>
              <td>{{ $referee->email }}</td>
            </tr>
            <tr>
              <td class="label">Province</td>
              <td>{{ $referee->province->name }}</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <!-- SIGNATURE -->
    <div class="sign-section">
      <div class="sign-title">Official Validation</div>

      <table class="sign-table">
        <tr>
          <td class="sign-box">
            <div class="sign-line"></div>
            <strong>Federation President</strong><br>
            Iran Taekwondo Federation
            <div class="stamp">IRAN<br>TKD</div>
          </td>

          <td class="sign-box">
            <div class="sign-line"></div>
            <strong>Head of Referee Committee</strong><br>
            Official Authority
            <div class="stamp">REFEREE<br>COMMITTEE</div>
          </td>
        </tr>
      </table>
    </div>

    <!-- FOOTER -->
    <div class="footer">
      This document is officially generated by the Iran Taekwondo Federation System<br>
      Document ID: TKD-REF-{{ date('Y') }}-{{ $referee->id }}
    </div>

  </div>

</body>

</html>