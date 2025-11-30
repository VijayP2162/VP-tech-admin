<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice PDF</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif; /* PDF safe font */
            font-size: 13px;
            color: #333;
        }

        .invoice-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
            letter-spacing: 1px;
        }

        .info-box {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table thead {
            background: #f4f4f4;
        }

        table th {
            padding: 10px;
            border: 1px solid #ccc;
            font-weight: bold;
            text-align: left;
        }

        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .total-row td {
            font-weight: bold;
            background: #f9f9f9;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>

    <h2 class="invoice-title">INVOICE</h2>

    <div class="info-box">
        <p><strong>Customer Name:</strong> {{ $name }}</p>
        <p><strong>Total Amount:</strong> ₹{{ $amount }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 50px;">S.No</th>
                <th>Description</th>
                <th style="width: 80px;">Qty</th>
                <th style="width: 100px;">Price</th>
                <th style="width: 120px;">Amount</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>Website Development</td>
                <td>1</td>
                <td>₹12,000</td>
                <td>₹12,000</td>
            </tr>

            <tr>
                <td>2</td>
                <td>Hosting Charges (1 Year)</td>
                <td>1</td>
                <td>₹2,000</td>
                <td>₹2,000</td>
            </tr>

            <tr class="total-row">
                <td colspan="4" style="text-align:right;">Grand Total</td>
                <td>₹14,000</td>
            </tr>
        </tbody>
    </table>

    <p class="footer">Generated automatically — Thank you for your business!</p>

</body>
</html>
