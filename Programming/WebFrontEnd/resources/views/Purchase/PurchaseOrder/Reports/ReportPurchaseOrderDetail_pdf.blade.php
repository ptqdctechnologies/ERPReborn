<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">

    <style>
        @page {
            margin: 100px 30px 450px 30px;
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
            padding-top: 240px;
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
        <!-- <div class="page-number"></div> -->

        <!-- PAYMENT TERM -->
        <table style="width: 100%; border: 1px solid black; margin-bottom: 16px;">
            <td style="width: 60%; border: 1px solid black;">
                <div style="padding-left: 4px;">
                    <div style="vertical-align: top; line-height: 10px; font-size: 10px; font-weight: bold;">
                        Payment Term :
                    </div>
                    <div style="vertical-align: top; line-height: 10px; font-size: 10px;">
                        Cash 100% in advance
                    </div>
                </div>
                <div style="padding-left: 4px; margin: 40px 0px;">
                    <div style="vertical-align: top; line-height: 10px; font-size: 10px; font-weight: bold;">
                        Remark :
                    </div>
                    <div style="vertical-align: top; line-height: 10px; font-size: 10px;">
                        Material untuk pembangunan Site Office dan Site Storage
                    </div>
                </div>
            </td>
            <td style="border: 1px solid black;">
                <table style="padding: 0px 4px;">
                    <tr>
                        <td style="line-height: 20px;width: 95px;">
                            <div style="vertical-align: top; font-size: 12px; font-weight: bold;">
                                Sub Total
                            </div>
                        </td>
                        <td style="line-height: 20px; width: 95px;">
                            <div style="vertical-align: top; font-size: 12px;">
                                Rp.
                            </div>
                        </td>
                        <td style="line-height: 20px; width: 95px;">
                            <div style="vertical-align: top; font-size: 12px; text-align: right;">
                                27,030,500.00
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="line-height: 20px;width: 95px;">
                            <div style="vertical-align: top; font-size: 12px; font-weight: bold;">
                                VAT 11 %
                            </div>
                        </td>
                        <td style="line-height: 20px; width: 95px;">
                            <div style="vertical-align: top; font-size: 12px;">
                                Rp.
                            </div>
                        </td>
                        <td style="line-height: 20px; width: 95px;">
                            <div style="vertical-align: top; font-size: 12px; text-align: right;">
                                0.00
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="line-height: 20px;width: 95px;">
                            <div style="vertical-align: top; font-size: 12px; font-weight: bold;">
                                Total
                            </div>
                        </td>
                        <td style="line-height: 20px; width: 95px;">
                            <div style="vertical-align: top; font-size: 12px;">
                                Rp.
                            </div>
                        </td>
                        <td style="line-height: 20px; width: 95px;">
                            <div style="vertical-align: top; font-size: 12px; text-align: right;">
                                27,030,500.00
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </table>

        <!-- NOTE -->
        <table>
            <tr style="line-height: 15px;">
                <td style="width: 40px;">
                    <div style="font-size: 10px;">
                        Note :
                    </div>
                </td>
                <td>
                    <div style="font-size: 10px;">
                        - Purchase of hazardous chemicals must be attached MSDS (Material Safety Data Sheet)
                    </div>
                </td>
            </tr>
            <tr style="line-height: 15px;">
                <td style="width: 40px;"></td>
                <td>
                    <div style="font-size: 10px;">
                        - Price includes Indonesian withholding taxes and other applicate Indonesian
                    </div>
                </td>
            </tr>
        </table>

        <!-- APPROVAL -->
        <table style="width: 100%; border-collapse: collapse; margin-top: 4px;">
            <tr>
                <td style="border: 1px solid black; width: 160px; height: 30px;">
                    <div style="font-size: 12px; vertical-align: top; line-height: 30px;"> 
                        Manager/PM Approval
                    </div>
                </td>
                <td style="border: 1px solid black; width: 90px; height: 30px;">
                    <div style="font-size: 10px; vertical-align: top; line-height: 30px;"> 
                        marungkil
                    </div>
                </td>
                <td style="border: 1px solid black; width: 190px; height: 30px;">
                    <div style="font-size: 10px; vertical-align: top; line-height: 15px;"> 
                        d76f3e28ca516277dd15a9d7c0d5e69d
                    </div>
                    <div style="font-size: 10px; vertical-align: top; line-height: 15px;"> 
                        Date: 18 Jul 2024
                    </div>
                </td>
                <td rowspan="5" style="vertical-align: top;">
                    <div style="vertical-align: top; padding: 0px 8px;">
                        <div style="text-align: center; font-weight: bold;">
                            Approved by Director
                        </div>
                        <div style="margin-top: 24px;">
                            <table style="width: 100%;">
                                <td style="font-size: 8px; line-height: 15px; width: 40px;">
                                    Digital Signature :
                                </td>
                                <td style="font-size: 8px; line-height: 15px; max-width: 30px; word-wrap: break-word;">
                                    bb4ab83f16b88a54afd8523d667dba91
                                </td>
                            </table>
                            <hr style="border: 1px solid black; margin: 8px 0px 2px 0px;" />
                            <div style="text-align: center; line-height: 15px; font-size: 8px;">
                                Redi
                            </div>
                            <div style="font-size: 10px;">
                                Date: 22 Jul 2024
                            </div>
                        </div>
                    </div>
                </td>
                <td rowspan="5" style="vertical-align: top;">
                    <div style="vertical-align: top; padding: 0 8px;">
                        <div style="text-align: center; font-weight: bold;">
                            Accepted by Vendor
                        </div>
                        <div style="margin-top: 24px;">
                            <table style="width: 100%; visibility: hidden;">
                                <td style="font-size: 8px; line-height: 15px; width: 40px;">
                                    Digital Signature :
                                </td>
                                <td style="font-size: 8px; line-height: 15px; max-width: 30px; word-wrap: break-word;">
                                    bb4ab83f16b88a54afd8523d667dba91
                                </td>
                            </table>
                            <hr style="border: 1px solid black; margin: 8px 0px 2px 0px;" />
                            <div style="text-align: center; line-height: 15px; font-size: 8px; visibility: hidden;">
                                Redi
                            </div>
                            <div style="font-size: 10px;">
                                Date: 22 Jul 2024
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td style="border: 1px solid black; width: 160px; height: 30px;">
                    <div style="font-size: 12px; vertical-align: top; line-height: 30px;"> 
                        Reviewed by P & C Mgr
                    </div>
                </td>
                <td style="border: 1px solid black; width: 90px; height: 30px;">
                    <div style="font-size: 10px; vertical-align: top; line-height: 30px;"> 
                        emir
                    </div>
                </td>
                <td style="border: 1px solid black; width: 190px; height: 30px;">
                    <div style="font-size: 10px; vertical-align: top; line-height: 15px;"> 
                        d76f3e28ca516277dd15a9d7c0d5e69d
                    </div>
                    <div style="font-size: 10px; vertical-align: top; line-height: 15px;"> 
                        Date: 18 Jul 2024
                    </div>
                </td>
            </tr>

            <tr>
                <td style="border: 1px solid black; width: 160px; height: 30px;">
                    <div style="font-size: 12px; vertical-align: top; line-height: 30px;"> 
                        Related GM Approval
                    </div>
                </td>
                <td style="border: 1px solid black; width: 90px; height: 30px;">
                    <div style="font-size: 10px; vertical-align: top; line-height: 30px;"> 
                        
                    </div>
                </td>
                <td style="border: 1px solid black; width: 190px; height: 30px;">
                    <div style="font-size: 10px; vertical-align: top; line-height: 15px;"> 
                        d76f3e28ca516277dd15a9d7c0d5e69d
                    </div>
                    <div style="font-size: 10px; vertical-align: top; line-height: 15px;"> 
                        Date: 18 Jul 2024
                    </div>
                </td>
            </tr>

            <tr>
                <td style="border: 1px solid black; width: 160px; height: 30px;">
                    <div style="font-size: 12px; vertical-align: top; line-height: 30px;"> 
                        Operations Director Approval
                    </div>
                </td>
                <td style="border: 1px solid black; width: 90px; height: 30px;">
                    <div style="font-size: 10px; vertical-align: top; line-height: 30px;"> 
                        
                    </div>
                </td>
                <td style="border: 1px solid black; width: 190px; height: 30px;">
                    <div style="font-size: 10px; vertical-align: top; line-height: 15px;"> 
                        d76f3e28ca516277dd15a9d7c0d5e69d
                    </div>
                    <div style="font-size: 10px; vertical-align: top; line-height: 15px;"> 
                        Date: 18 Jul 2024
                    </div>
                </td>
            </tr>

            <tr>
                <td style="border: 1px solid black; width: 160px; height: 30px;">
                    <div style="font-size: 12px; vertical-align: top; line-height: 30px;"> 
                        Finance & Acc GM Approval
                    </div>
                </td>
                <td style="border: 1px solid black; width: 90px; height: 30px;">
                    <div style="font-size: 10px; vertical-align: top; line-height: 30px;"> 
                        adhe.kurniawan
                    </div>
                </td>
                <td style="border: 1px solid black; width: 190px; height: 30px;">
                    <div style="font-size: 10px; vertical-align: top; line-height: 15px;"> 
                        d76f3e28ca516277dd15a9d7c0d5e69d
                    </div>
                    <div style="font-size: 10px; vertical-align: top; line-height: 15px;"> 
                        Date: 18 Jul 2024
                    </div>
                </td>
            </tr>
        </table>

        <!-- END -->
        <table style="margin-top: 4px;">
            <tr>
                <div style="font-size: 12px; vertical-align: top; font-weight: bold; line-height: 15px; margin-bottom: 4px;"> 
                    End of Purchase Order No
                </div>
            </tr>
            <tr>
                <div style="font-size: 8px; vertical-align: top; line-height: 15px;"> 
                    - Supplier shall subject to the terms and conditions set forth on this PO General Terms and Conditions or Contract Condition and amendment if any
                </div>
            </tr>
            <tr>
                <div style="font-size: 8px; vertical-align: top; line-height: 15px;">
                    - Supplier shall return the confirmation of acceptance by signature and title, this should be facsimile to Qdc at +62 21 79193333
                </div>
            </tr>
            <tr>
                <div style="font-size: 8px; vertical-align: top; line-height: 15px;">
                    - Supplier shall PO reference number in every invoice submitted and shall attach the "Faktur Pajak" (Qdc NPWP : 02.194.081.2-058.000)
                </div>
            </tr>
            <tr>
                <div style="font-size: 8px; vertical-align: top; line-height: 15px;">
                    - Supplier shall submit copy of PO, Material received report (if any), final BoQ(if any),FAT or BAST(if any) to Qdc otherwise it will be rejected
                </div>
            </tr>
        </table>
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
