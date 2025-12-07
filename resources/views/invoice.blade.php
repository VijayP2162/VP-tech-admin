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
                <th>Organization</th>
                <th>Quotation ID</th>

                <th>Description</th>
                <th style="width: 40px;">Qty</th>
                <th style="width: 40px;">Duration</th>
                <th style="width: 40px;">GST</th>
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

            $duration_months=[
            "1"=> '3 Months',
            "2"=>'6 Months',
            "3"=>'10 Months',
            "4"=>'1 year'];
            $grand_total = 0;
            @endphp

            @foreach($services as $index => $service)
            @php
            $quantity = $service->quantity ?? 1;
            $organization=$service->organization;
            $quatation_id=$service->quatation_id;
            $price = $service->quatation_amount ?? 0;
            $total = $service->quatation_amount ?? ($quantity * $price);
            $grand_total += $total;
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{$organization}}</td>
                <td>{{$quatation_id}}</td>
                <td>{{ $service_names[$service->service_provide] ?? 'Unknown Service' }}</td>
                <td>{{ $quantity }}</td>
                <td>{{ $duration_months[$service->duration_month]?? '-' }}</td>
                <td>SGST 9 % <br>
                    GGST 9 %
                </td>
                <td>₹{{ number_format($total, 2) }}</td>
            </tr>
            @endforeach

            <!-- Grand Total Row -->
            <tr class="total-row">
                <td colspan="7" style="text-align:right; font-weight:bold;">Grand Total</td>
                <td style="font-weight:bold;">₹{{ number_format($grand_total, 2) }}</td>
            </tr>


        </tbody>
    </table>

    <h3>Other Information</h3>
    <table style="margin-top :40px;">
        <tr>
            <th>S.No</th>
            <th>Service</th>
            <th>Technology</th>

            <th>Domain</th>
            <th style="width:150px;">Hosting</th>
            <th> Maintance</th>


        <tr>
            <td>1</td>
            <td> Portfolio (Single Page) </td>
            <td> HTML <br>CSS<br>Javascript<br>Jquery</td>
            <td> Custom Domain <br>
                ₹ 3000.00
            </td>
            <td>
                ₹ 6000.00
            </td>
            <td> -</td>
        <tr>
            <td>2</td>
            <td> Mulitiple (Single Page) </td>
            <td> HTML <br>CSS<br>Javascript<br>Jquery</td>
            <td> Custom Domain <br>
                ₹ 3000.00
            </td>
            <td>
                ₹ 6000.00
            </td>
            <td>New Page Added
                <br>
                ₹ 700.00
            </td>

        </tr>

        <tr>

            <td>3</td>
            <td> Web Application </td>
            <td>

                <b>Frontend</b> <br>
                HTML <br>CSS<br>Javascript<br>Jquery <br>
                <B>Backend</B> <br>
                PHP 8.2 <br>
                AJAX <br>
                <b>DataBase
                </b> <br>
                MYSQL <br>

                <b>FrameWork</b> <br>

                Laravel <br>

            </td>
            <td> Custom Domain <br>
                ₹ 6000.00
            </td>
            <td>
                ₹ 8000.00
            </td>
            <td>New Page Added
                <br>
                ₹ 1500.00

                <br>
                DataBase Maintaince <br>

                ₹ 3500.00

            </td>

        </tr>



        
        <tr>

            <td>4</td>
            <td> SEO/SEM </td>
            <td>
                Keyword Search <br>
                Google Optimized <br>
                On Page <br>
                Off Page <br>
                Google Ads
            </td>
            <td>
                -
            </td>
            <td>
                -
            </td>
            <td>
                Monthly Report (On Page & Off Page) <br>
                ₹ 2500.00
            </td>
        </tr>



        <tr>

            <td>5</td>
            <td> Digital Marketing </td>
            <td>
                Product Ads <br> (WhatsApp & FaceBook & Instagram) <br>
               
            </td>
            <td>
                -
            </td>
            <td>
                -
            </td>
            <td>
                Monthly Report (Regular Poster) <br>
                ₹ 2500.00
            </td>
        </tr>

        </tr>
    </table>



    <p class="footer">Generated automatically — Thank you for your business!</p>

</body>

</html>