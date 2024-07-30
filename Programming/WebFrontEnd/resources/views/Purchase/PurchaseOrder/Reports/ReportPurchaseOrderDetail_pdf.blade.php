<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">

    <style>
        @page {
            margin: 100px 30px 100px 30px;
        }
        header, footer {
            position: fixed;
            left: 0;
            right: 0;
            height: 50px;
            text-align: center;
            line-height: 35px;
        }
        header {
            top: -80px;
        }
        footer {
            bottom: -50px;
        }
        .page-number:before {
            content: "Page " counter(page);
        }
        body {
            margin-top: 20px;
            padding-top: 250px;
        }
        main {
            background-color: lightblue;
        }
        table {
            /* width: 100%; */
            /* border-collapse: collapse; */
        }
        table, th, td {
            /* border: 1px solid black; */
        }
        th, td {
            /* padding: 8px; */
            /* text-align: left; */
        }
    </style>
</head>
<body>
    <header>
        <table style="width: 100%;">
            <tr>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px; font-weight: bold;">
                        PO No
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px; font-weight: bold;">
                        Rev No
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px; font-weight: bold;">
                        PO Date
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px; font-weight: bold;">
                        PO No
                    </div>
                </td>
                <td rowspan="2">
                    <img src="{{ url('/image/qdc.png') }}" alt="qdc" height="50" style="margin-left: 10px;" />
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        PO01-24000006
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        null
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        12 Jan 2024
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        1 of 1
                    </div>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 4px;">
            <tr>
                <td style="width: 463px;">
                    <table style="width: 251.5px;">
                        <tr><td style="height: 40px;"></td></tr>
                        <tr style="border: 1px solid black;">
                            <td style="padding: 4px;">
                                <div style="vertical-align: top; font-size: 10px; height: 20px; font-weight: bold;">
                                    Vendor :
                                </div>
                                <div style="vertical-align: top; font-size: 10px; height: 20px;">
                                    M. Nasir
                                </div>
                                <div style="vertical-align: top; font-size: 10px; line-height: 15px;">
                                    Dusun Kenteng RT 002 RW 008 , Kenteng Kec Toroh G r o b o g a n T e l p : 0 8 1 2 6 6 5 2 3 4 1 9 F a x : - K A B U P A T E N G R O B O G A N
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 24px; font-weight: bold;">
                                Purchase Order
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table style="width: 100%;">
                        <tr style="border: 1px solid black;">
                            <td style="padding: 4px;">
                                <div style="vertical-align: top; font-size: 10px; height: 20px; font-weight: bold;">
                                    Deliver To :
                                </div>
                                <div style="vertical-align: top; font-size: 10px; height: 50px;">
                                    PT QDC Technologies
                                </div>
                            </td>
                        </tr>
                        <tr><td style="height: 4px;"></td></tr>
                        <tr style="border: 1px solid black;">
                            <td style="padding: 4px;">
                                <div style="vertical-align: top; font-size: 10px; height: 20px; font-weight: bold;">
                                    Invoice To :
                                </div>
                                <div style="vertical-align: top; font-size: 10px; line-height: 15px;">
                                    PT Qdc Technologies Gedung Graha QDC Jl. Mampang Prapatan Raya Blok C No.28 - Jakarta Selatan 12790 Indonesia Telp: +62 21 79191234 Fax: +62 21 79193333
                                </div>
                                <div style="vertical-align: top; font-size: 10px; height: 20px;">
                                    Attn. Finance Dept
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 4px;">
            <tr>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px; font-weight: bold;">
                        Project Code
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px; font-weight: bold;">
                        Budget Type
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px; font-weight: bold;">
                        PIC Sourcing
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px; font-weight: bold;">
                        Delivery Date Estimate
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px; font-weight: bold;">
                        PIC Printing
                    </div>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        Q000197
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        Project
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        procurement.admin
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        18 Jul 2024
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        icha
                    </div>
                </td>
            </tr>
        </table>
    </header>

    <footer>
        <div class="page-number"></div>
    </footer>

    <main>
        <table>
            @foreach($data['items'] as $item)
                <tr>
                    <td>{{ $item['Header1'] }}</td>
                    <td>{{ $item['Header2'] }}</td>
                    <td>{{ $item['Header3'] }}</td>
                </tr>
            @endforeach
        </table>
    </main>
</body>
</html>
