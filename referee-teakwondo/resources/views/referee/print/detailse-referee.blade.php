<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Referee Match Report</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 18mm;
        }

        body {
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
            font-size: 11pt;
            color: #000;
            margin: 0 auto;
        }

        .page {
            border: 3px solid #1a237e;
            padding: 10mm;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #1a237e;
            padding-bottom: 6mm;
            margin-bottom: 8mm;
        }

        .header-title {
            font-size: 18pt;
            font-weight: bold;
            color: #1a237e;
        }

        .header-line {
            width: 60mm;
            height: 2px;
            background: #ff9800;
            margin: 4mm auto;
        }

        .header-sub {
            font-size: 11pt;
            color: #444;
        }

        .section-title {
            font-size: 14pt;
            font-weight: bold;
            color: #1a237e;
            margin-bottom: 4mm;
        }

        .text {
            font-size: 11pt;
            line-height: 1.9;
            margin-bottom: 5mm;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5mm;
        }

        .info-table td {
            border: 1px solid #ddd;
            padding: 3mm;
        }

        .label {
            background: #f5f7fb;
            font-weight: bold;
            width: 55mm;
            color: #1a237e;
        }

        .badge {
            display: inline-block;
            border: 1px solid #ff9800;
            padding: 2mm 4mm;
            color: #ff9800;
            font-weight: bold;
            border-radius: 4px;
            font-size: 10pt;
        }

        .sign-section {
            margin-top: 12mm;
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
            <div class="header-sub">Official Referee Match Report</div>
        </div>

        <!-- INTRO -->
        <div class="section-title">Referee Assignment Report</div>

        <div class="text">
            Referee <strong>{{ $referee->name }} {{ $referee->family }}</strong>, ranked as
            <span class="badge">{{ $referee->degree->name }}</span>,
            was officially invited to officiate at the competition
            <strong>{{ $gameMatch->event_title }}</strong>,
            held on <strong>{{ $gameMatch->event_date }}</strong>.
        </div>

        <!-- DETAILS -->
        <table class="info-table">
            <tr>
                <td class="label">Attendance Status</td>
                <td>
                    @if(!$refereeMatch->is_present)
                    <strong style="color:#c62828;">Did Not Attend</strong>

                    @else
                    <strong style="color:#2e7d32;">Attended</strong>
                    @endif
                </td>
            </tr>



            @if($refereeMatch->is_present)

            <tr>
                <td class="label">Performance Score</td>
                <td>{{ $refereeMatch->score }} / 100</td>
            </tr>

            <tr>
                <td class="label">Is Observer</td>
                <td>
                    @if($refereeMatch->is_observer)
                    <span style="color:#2e7d32; font-weight:bold;">Yes</span>
                    @else
                    No
                    @endif
                </td>
            </tr>
            <tr>
                <td class="label">Best Referee Award</td>
                <td>
                    @if($refereeMatch->is_best_referee)
                    <span style="color:#2e7d32; font-weight:bold;">Yes</span>
                    @else
                    No
                    @endif
                </td>
            </tr>

            @endif

        </table>

        <!-- SIGNATURES -->
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
            This document is automatically generated by the Iran Taekwondo Federation System<br>
            Document ID: TKD-MATCH-REPORT-2026-001
        </div>

    </div>
</body>

</html>