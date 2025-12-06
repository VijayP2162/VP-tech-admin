<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice PDF</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            /* PDF safe font */
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
            padding: 6px;
            border: 1px solid #ccc;
            font-weight: bold;
            text-align: left;
        }

        table td {
            padding: 6px;
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

    <h2 class="invoice-title">QUOTATION </h2>

    <div class="info-box">
        <strong>VP Tech Pvt Ltd </strong> <br>
        <strong>VIJAY P</strong><br>
        vijayp2162@gmail.com<br>
        +91 84898 52162<br>

        www.vptech.com <br>
        Pudukkottai - 614 618 <br>
    </div>

    <table>
    <thead>
        <tr>
            <th style="width: 50px;">S.No</th>
            <th>Description</th>
            <th style="width: 80px;">Qty</th>
            <th style="width: 100px;">Duration</th>
            <th style="width: 100px;">Price</th>
            <th style="width: 120px;">Amount</th>
        </tr>
    </thead>

    <tbody>
        @php
        $service_names = [
            1 => 'Portfolio (Single Page)',
            2 => 'Static Website (Multiple Page)',
            3 => 'Web Application',
            4 => 'SEO',
            5 => 'Digital Marketing'
        ];
        $grand_total = 0;
        @endphp

        @foreach($services as $index => $service)
            @php
            $quantity = $service->quantity ?? 1;
            $price = $service->price ?? 0;
            $total = $service->total ?? ($quantity * $price);
            $grand_total += $total;
            @endphp
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $service_names[$service->service_provide] ?? 'Unknown Service' }}</td>
            <td>{{ $quantity }}</td>
            <td>{{ $service->duration ?? '-' }}</td>
            <td>₹{{ number_format($price, 2) }}</td>
            <td>₹{{ number_format($total, 2) }}</td>
        </tr>
        @endforeach

        <!-- Grand Total Row -->
        <tr class="total-row">
            <td colspan="5" style="text-align:right; font-weight:bold;">Grand Total</td>
            <td style="font-weight:bold;">₹{{ number_format($grand_total, 2) }}</td>
        </tr>
    </tbody>
</table>


    <p class="footer">Generated automatically — Thank you for your business!</p>

</body>

</html>