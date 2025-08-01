<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payslip</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #000; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Payslip - {{ $salary->user->name }}</h2>

    <table>
        <tr><th>Gross Salary</th><td>KES {{ number_format($salary->gross_salary) }}</td></tr>
        <tr><th>SHIF</th><td>KES {{ number_format($salary->shif) }}</td></tr>
        <tr><th>Housing Levy</th><td>KES {{ number_format($salary->housing_levy) }}</td></tr>
        <tr><th>PAYE (30%)</th><td>KES {{ number_format($salary->paye) }}</td></tr>
        <tr><th>Net Salary</th><td><strong>KES {{ number_format($salary->net_salary) }}</strong></td></tr>
    </table>
</body>
</html>
