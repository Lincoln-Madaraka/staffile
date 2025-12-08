<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payslip</title>
    <style>
        body { font-family: sans-serif; }
        .section { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Payslip</h2>
    <div class="section">Name: {{ $salary->user->name }}</div>
    <div class="section">Amount: {{ number_format($salary->amount, 2) }}</div>
    <div class="section">Gross: {{ number_format($salary->gross_salary, 2) }}</div>
    <div class="section">Net: {{ number_format($salary->net_salary, 2) }}</div>
    <div class="section">Date: {{ $salary->created_at->format('Y-m-d') }}</div>
</body>
</html>
