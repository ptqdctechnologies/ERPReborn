<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>ERP Reborn</title>

    <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">

    <style>
    </style>
</head>

<body>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black; width: 110px; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 11px; font-weight: bold;">
                    PO No
                </div>
            </td>
            <td style="border: 1px solid black; width: 110px; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 11px; font-weight: bold;">
                    Rev No
                </div>
            </td>
            <td style="border: 1px solid black; width: 110px; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 11px; font-weight: bold;">
                    PO Date
                </div>
            </td>
            <td style="width: 100px; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 11px; font-weight: bold;">
                </div>
            </td>
            <td rowspan="2">
                <img src="{{ public_path('image/qdc.png') }}" alt="qdc" height="50" />
            </td>
        </tr>

        <tr>
            <td style="border: 1px solid black; width: 110px; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 10px;">
                    <?= $dataReport[0]['documentNumber']; ?>
                </div>
            </td>
            <td style="border: 1px solid black; width: 110px; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 10px;">
                    <?= $dataReport[0]['revision'] ?? '-'; ?>
                </div>
            </td>
            <td style="border: 1px solid black; width: 110px; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 10px;">
                    <?= substr($dataReport[0]['date'], 0, 10); ?>
                </div>
            </td>
            <td style="width: 100px; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 10px;">

                </div>
            </td>
        </tr>
    </table>

    <table style="width: 100%; margin-top: 4px;">
        <tr>
            <td style="width: 63%;">
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
            <td>
                <div style="vertical-align: top; font-size: 11px; height: 20px; font-weight: bold;">
                    Deliver To :
                </div>
                <div style="vertical-align: top; font-size: 10px; height: 50px;">
                    <?= $dataReport[0]['deliveryTo_NonRefID']['address'] ?? $dataReport[0]['deliveryTo_NonRefID']['Address'] ?? '-'; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width: 63%;"></td>
            <td>
                <div style="vertical-align: top; font-size: 11px; height: 20px; font-weight: bold;">
                    Invoice To :
                </div>
                <div style="vertical-align: top; font-size: 10px; line-height: 15px;">
                    PT Qdc Technologies Gedung Graha QDC Jl. Mampang Prapatan Raya Blok C No.28 -
                    Jakarta Selatan 12790 Indonesia Telp: +62 21 79191234 Fax: +62 21 79193333
                </div>
                <div style="vertical-align: top; font-size: 10px; height: 20px;">
                    Attn. Finance Dept
                </div>
            </td>
        </tr>
        <tr>
            <td style="font-size: 28px; font-weight: bold;">
                Purchase Order
            </td>
        </tr>
    </table>

    <table style="border-collapse: collapse; width: 100%; margin-top: 4px; border: 1px solid black;">
        <tr>
            <td style="border: 1px solid black; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 10px; font-weight: bold;">
                    PIC Sourcing
                </div>
            </td>
            <td style="border: 1px solid black; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 10px; font-weight: bold;">
                    Delivery Date Estimate
                </div>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 10px;">
                    -
                </div>
            </td>
            <td style="border: 1px solid black; height: 30px;">
                <div style="text-align: center; line-height: 30px; font-size: 10px;">
                    <?= substr($dataReport[0]['deliveryDateTimeTZ'], 0, 10) ?? '-'; ?>
                </div>
            </td>
        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse; margin-top: 16px;">
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black; height: 20px;">
                <div style="font-size: 11px; font-weight: bold; margin: 4px 0;">
                    No
                </div>
            </td>
            <td style="border: 1px solid black; height: 20px;">
                <div style="font-size: 11px; font-weight: bold; margin: 4px 0;">
                    Item
                </div>
            </td>
            <td style="border: 1px solid black; height: 20px;">
                <div style="font-size: 11px; font-weight: bold; margin: 4px 0;">
                    UOM
                </div>
            </td>
            <td style="border: 1px solid black; height: 20px;">
                <div style="font-size: 11px; font-weight: bold; margin: 4px 0;">
                    Currency
                </div>
            </td>
            <td style="border: 1px solid black; height: 20px;">
                <div style="font-size: 11px; font-weight: bold; margin: 4px 0;">
                    Qty
                </div>
            </td>
            <td style="border: 1px solid black; height: 20px;">
                <div style="font-size: 11px; font-weight: bold; margin: 4px 0;">
                    Price
                </div>
            </td>
            <td style="border: 1px solid black; height: 20px;">
                <div style="font-size: 11px; font-weight: bold; margin: 4px 0;">
                    Total
                </div>
            </td>
        </tr>

        <?php $number = 1;?>
        <?php $subTotal = 0; ?>
        <?php foreach ($dataReport as $dataDetail) { ?>
        <?php    $total = $dataDetail['quantity'] * $dataDetail['productUnitPriceCurrencyValue']; ?>
        <?php    $subTotal += $total; ?>
        <tr>
            <td>
                <div style="margin-top: 4px; font-size: 11px;">
                    <?= $number++; ?>
                </div>
            </td>
            <td>
                <div style="margin-top: 4px; font-size: 11px;">
                    <?= $dataDetail['productCode'] . " - " . $dataDetail['productName']; ?>
                </div>
            </td>
            <td>
                <div style="margin-top: 4px; font-size: 11px;">
                    <?= $dataDetail['quantityUnitName']; ?>
                </div>
            </td>
            <td>
                <div style="margin-top: 4px; font-size: 11px;">
                    <?= $dataDetail['productUnitPriceCurrencyISOCode']; ?>
                </div>
            </td>
            <td>
                <div style="margin-top: 4px; font-size: 11px;">
                    <?= number_format($dataDetail['quantity'], 2, '.', ','); ?>
                </div>
            </td>
            <td>
                <div style="margin-top: 4px; font-size: 11px;">
                    <?= number_format($dataDetail['productUnitPriceCurrencyValue'], 2, '.', ','); ?>
                </div>
            </td>
            <td>
                <div style="margin-top: 4px; font-size: 11px;">
                    <?= number_format($total, 2, '.', ','); ?>
                </div>
            </td>
        </tr>
        <?php } ?>
    </table>

    <table style="width: 100%; border: 1px solid black; margin-top: 16px;">
        <td style="width: 60%;">
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
        <td>
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
                            <?= number_format($subTotal, 2, '.', ','); ?>
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
                            <?= number_format($subTotal * ((int) $dataReport[0]['vatRatio']), 2, '.', ','); ?>
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
                            <?= number_format($subTotal, 2, '.', ','); ?>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </table>

    <table style="width: 100%; border-collapse: collapse; margin-top: 16px;">
        <tr>
            <td style="border: 0px solid black; width: 160px; height: 30px;">
                <div style="font-size: 11px; vertical-align: top; line-height: 30px;">
                    <!-- Manager/PM Approval -->
                </div>
            </td>
            <td style="border: 0px solid black; width: 90px; height: 30px;">
                <div style="font-size: 10px; vertical-align: top; line-height: 30px;">
                    {{-- marungkil --}}
                </div>
            </td>
            <td style="border: 0px solid black; width: 120px; height: 30px;">
                <div style="font-size: 10px; vertical-align: top; line-height: 15px;">
                    {{-- d76f3e28ca516277dd15a9d7c0d5e69d --}}
                </div>
            </td>
            <td style="vertical-align: top;">
                <div style="vertical-align: top; padding: 0px 8px;">
                    <div style="text-align: center; font-weight: bold; font-size: 11px;">
                        Approved by Director
                    </div>
                    <div style="margin-top: 10px;">
                        <table style="width: 100%;">
                            <td style="text-align:center;">
                                <div style="display:inline-block;">
                                    <?= DNS2D::getBarcodeHTML('https://www.qdc.co.id', 'QRCODE', 2, 2) ?>
                                </div>
                            </td>
                        </table>
                        <hr style="border: 1px solid black; margin: 8px 0px 2px 0px;" />
                        <div style="text-align: center; line-height: 15px; font-size: 10px;">
                            Redi
                        </div>
                        <div style="font-size: 10px;">
                            Date: <?= date('j F Y'); ?>
                        </div>
                    </div>
                </div>
            </td>
            <td style="vertical-align: top;">
                <div style="vertical-align: top; padding: 0 8px;">
                    <div style="text-align: center; font-weight: bold; font-size: 11px;">
                        Accepted by Vendor
                    </div>
                    <div style="margin-top: 10px;">
                        <table style="width: 100%; visibility: hidden;">
                            <td style="text-align:center;">
                                <div style="display:inline-block;">
                                    <?= DNS2D::getBarcodeHTML('https://www.qdc.co.id', 'QRCODE', 2, 2) ?>
                                </div>
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
    </table>

    <table style="margin-top: 4px;">
        <tr>
            <div
                style="font-size: 12px; vertical-align: top; font-weight: bold; line-height: 15px; margin-bottom: 4px;">
                End of Purchase Order No
            </div>
        </tr>
        <tr>
            <div style="font-size: 10px; vertical-align: top; line-height: 15px;">
                - Price includes Indonesian withholding taxes and other applicate Indonesian
            </div>
        </tr>
        <tr>
            <div style="font-size: 10px; vertical-align: top; line-height: 15px;">
                - Purchase of hazardous chemicals must be attached MSDS (Material Safety Data Sheet)
            </div>
        </tr>
        <tr>
            <div style="font-size: 10px; vertical-align: top; line-height: 15px;">
                - Supplier shall subject to the terms and conditions set forth on this PO General Terms and
                Conditions or Contract Condition and amendment if any
            </div>
        </tr>
        <tr>
            <div style="font-size: 10px; vertical-align: top; line-height: 15px;">
                - Supplier shall return the confirmation of acceptance by signature and title, this should be
                facsimile to Qdc at +62 21 79193333
            </div>
        </tr>
        <tr>
            <div style="font-size: 10px; vertical-align: top; line-height: 15px;">
                - Supplier shall PO reference number in every invoice submitted and shall attach the "Faktur Pajak"
                (Qdc NPWP : 02.194.081.2-058.000)
            </div>
        </tr>
        <tr>
            <div style="font-size: 10px; vertical-align: top; line-height: 15px;">
                - Supplier shall submit copy of PO, Material received report (if any), final BoQ(if any),FAT or
                BAST(if any) to Qdc otherwise it will be rejected
            </div>
        </tr>
    </table>
</body>

</html>