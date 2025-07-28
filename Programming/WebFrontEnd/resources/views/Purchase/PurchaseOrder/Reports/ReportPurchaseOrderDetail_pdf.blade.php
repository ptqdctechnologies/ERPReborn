<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">

    <style>
        @page {
            margin: 100px 30px 530px 30px;
        }
        header, footer {
            position: fixed;
            left: 0;
            right: 0;
            height: 20px;
            text-align: center;
            line-height: 35px;
        }
        header {
            top: -80px;
        }
        footer {
            bottom: -15px;
        }
        body {
            margin-top: 20px;
            padding-top: 255px;
        }
        /* main {
            background-color: lightblue;
        } */
    </style>
</head>
<body>
    <header>
        <table style="width: 100%;">
            <tr>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 0px; font-size: 11px; font-weight: bold;">
                        PO No
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 0px; font-size: 11px; font-weight: bold;">
                        Rev No
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 0px; font-size: 11px; font-weight: bold;">
                        PO Date
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 0px; font-size: 11px; font-weight: bold;">
                        Page No
                    </div>
                </td>
                <td rowspan="2">
                    <img src="{{ public_path('image/qdc.png') }}" alt="qdc" height="50" style="margin-left: 10px;" />
                </td>
            </tr>

            <tr>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 0px; font-size: 10px;">
                        <?= $dataReport[0]['documentNumber']; ?>
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 0px; font-size: 10px;">
                        <?= $dataReport[0]['revision'] ?? '-'; ?>
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 0px; font-size: 10px;">
                        <?= $dataReport[0]['date']; ?>
                    </div>
                </td>
                <td style="border: 1px solid black; width: 110px; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 0px; font-size: 10px;">
                        <?= $dataReport[0]['revision'] ?? '-'; ?>
                    </div>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 4px;">
            <tr>
                <td style="width: 463px;">
                    <table style="width: 251.5px;">
                        <tr>
                            <td style="height: 40px;"></td>
                        </tr>
                        <tr style="border: 1px solid black;">
                            <td style="padding: 4px;">
                                <div style="vertical-align: top; font-size: 11px; height: 20px; font-weight: bold;">
                                    Supplier :
                                </div>
                                <div style="vertical-align: top; font-size: 10px; height: 20px;">
                                    <?= $dataReport[0]['supplierCode']; ?> - <?= $dataReport[0]['supplierName']; ?>
                                </div>
                                <div style="vertical-align: top; font-size: 10px; line-height: 15px;">
                                    <?= $dataReport[0]['supplierAddress']; ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; font-weight: bold;">
                                Purchase Order
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table style="width: 100%;">
                        <tr style="border: 1px solid black;">
                            <td style="padding: 4px;">
                                <div style="vertical-align: top; font-size: 11px; height: 20px; font-weight: bold;">
                                    Deliver To :
                                </div>
                                <div style="vertical-align: top; font-size: 10px; height: 50px;">
                                    <?= $dataReport[0]['deliveryTo_NonRefID']['address'] ?? $dataReport[0]['deliveryTo_NonRefID']['Address'] ?? '-'; ?>
                                </div>
                            </td>
                        </tr>
                        <tr><td style="height: 4px;"></td></tr>
                        <tr style="border: 1px solid black;">
                            <td style="padding: 4px;">
                                <div style="vertical-align: top; font-size: 11px; height: 20px; font-weight: bold;">
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
                        <?= $dataReport[0]['combinedBudgetCode']; ?>
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        -
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        -
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        <?= $dataReport[0]['deliveryDateTimeTZ'] ?? '-'; ?>
                    </div>
                </td>
                <td style="border: 1px solid black; height: 30px;">
                    <div style="vertical-align: middle; text-align: center; line-height: 30px; font-size: 10px;">
                        <?= Session::get("SessionLoginName"); ?>
                    </div>
                </td>
            </tr>
        </table>
    </header>

    <footer>
        <!-- PAYMENT TERM -->
        <table style="width: 100%; border: 1px solid black; margin-bottom: 16px;">
            <td style="width: 60%; border: 1px solid black;">
                <div style="padding-left: 4px;">
                    <div style="vertical-align: top; line-height: 10px; font-size: 10px; font-weight: bold;">
                        Payment Term :
                    </div>
                    <div style="vertical-align: top; line-height: 10px; font-size: 10px;">
                        <?= $dataReport[0]['termOfPaymentName'] ?? '-'; ?>
                    </div>
                </div>
                <div style="padding-left: 4px; margin: 10px 0px;">
                    <div style="vertical-align: top; line-height: 10px; font-size: 10px; font-weight: bold;">
                        Remark :
                    </div>
                    <div style="vertical-align: top; line-height: 10px; font-size: 10px;">
                        <?= $dataReport[0]['remarks'] ?? '-'; ?>
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
                                <?= $dataReport['totalIDRWithoutPPN'] ?? '-'; ?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="line-height: 20px;width: 95px;">
                            <div style="vertical-align: top; font-size: 12px; font-weight: bold;">
                                VAT <?= (int) $dataReport[0]['vatRatio']; ?> %
                            </div>
                        </td>
                        <td style="line-height: 20px; width: 95px;">
                            <div style="vertical-align: top; font-size: 12px;">
                                Rp.
                            </div>
                        </td>
                        <td style="line-height: 20px; width: 95px;">
                            <div style="vertical-align: top; font-size: 12px; text-align: right;">
                                0
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
                                <?= $dataReport['totalIDRWithoutPPN'] ?? '-'; ?>
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
                    <div style="font-size: 11px; vertical-align: top; line-height: 30px;"> 
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
                        <div style="text-align: center; font-weight: bold; font-size: 11px;">
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
                                Date: <?= date('j F Y'); ?>
                            </div>
                        </div>
                    </div>
                </td>
                <td rowspan="5" style="vertical-align: top;">
                    <div style="vertical-align: top; padding: 0 8px;">
                        <div style="text-align: center; font-weight: bold; font-size: 11px;">
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
                                Date: <?= date('j F Y'); ?>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td style="border: 1px solid black; width: 160px; height: 30px;">
                    <div style="font-size: 11px; vertical-align: top; line-height: 30px;"> 
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
                    <div style="font-size: 11px; vertical-align: top; line-height: 30px;"> 
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
                    <div style="font-size: 11px; vertical-align: top; line-height: 30px;"> 
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
                    <div style="font-size: 11px; vertical-align: top; line-height: 30px;"> 
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
                <div style="font-size: 10px; vertical-align: top; line-height: 15px;"> 
                    - Supplier shall subject to the terms and conditions set forth on this PO General Terms and Conditions or Contract Condition and amendment if any
                </div>
            </tr>
            <tr>
                <div style="font-size: 10px; vertical-align: top; line-height: 15px;">
                    - Supplier shall return the confirmation of acceptance by signature and title, this should be facsimile to Qdc at +62 21 79193333
                </div>
            </tr>
            <tr>
                <div style="font-size: 10px; vertical-align: top; line-height: 15px;">
                    - Supplier shall PO reference number in every invoice submitted and shall attach the "Faktur Pajak" (Qdc NPWP : 02.194.081.2-058.000)
                </div>
            </tr>
            <tr>
                <div style="font-size: 10px; vertical-align: top; line-height: 15px;">
                    - Supplier shall submit copy of PO, Material received report (if any), final BoQ(if any),FAT or BAST(if any) to Qdc otherwise it will be rejected
                </div>
            </tr>
        </table>
    </footer>

    <main>
        <table class="TableReportAdvanceSummary" style="width: 100%;" id="TableReportAdvanceSummary">
            <tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 11px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        No
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 11px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        Product Name
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 11px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        Qty
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 11px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        Price
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 11px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        UOM
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div style="font-size: 11px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Total IDR
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 11px; font-weight: bold; margin: 4px 8px 4px 8px;">
                                    With VAT
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 11px; font-weight: bold; margin: 4px 8px 4px 8px;">
                                    Without VAT
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div style="font-size: 11px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Total Other Currency
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 11px; font-weight: bold; margin: 4px 8px 4px 8px;">
                                    With VAT
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 11px; font-weight: bold; margin: 4px 8px 4px 8px;">
                                    Without VAT
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 11px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        Currency
                    </div>
                </td>
            </tr>

            <?php $number = 1; ?>
            <?php foreach ($dataReport as $dataDetail) { ?>
                <tr>
                    <td>
                        <div style="margin-top: 4px; font-size: 11px;">
                            <?= $number++; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; max-width: 125px; font-size: 11px;">
                            <?= $dataDetail['productCode'] . " - " . $dataDetail['productName']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 11px;">
                            <?= $dataDetail['quantity']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 11px;">
                            <?= $dataDetail['productUnitPriceCurrencyValue']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 11px;">
                            <?= $dataDetail['quantityUnitName']; ?>
                        </div>
                    </td>
                    <td>
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    <div style="margin-top: 4px; font-size: 11px;">
                                        <?= $dataDetail['totalIDRWithPPN'] ?? '-'; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="margin-top: 4px; font-size: 11px;">
                                        <?= $dataDetail['totalIDRWithoutPPN'] ?? '-'; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    <div style="margin-top: 4px; font-size: 11px;">
                                        <?= $dataDetail['totalOtherCurrencyWithPPN'] ?? '-'; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="margin-top: 4px; font-size: 11px;">
                                        <?= $dataDetail['totalOtherCurrencyWithPPN'] ?? '-'; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 11px;">
                            <?= $dataDetail['productUnitPriceCurrencyISOCode']; ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </main>
</body>
</html>
