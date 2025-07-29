<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>ERP Reborn</title>

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
    </head>
    <body>
        <div class="card-body table-responsive p-0">
            <div style="text-align: right; font-size: 14px;"><?= date('F j, Y'); ?></div>
            <div style="text-align: center; font-size: 20px; font-weight: bold;">Delivery Order</div>
            <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

            <!-- HEADER -->
            <table style="margin: 30px 0px 15px 1px;">
                <tr>
                    <!-- DO NUMBER -->
                    <td style=" width: 350px;">
                        <table style="font-size: 12px; line-height: 14px; height: 20px;">
                            <tr>
                                <td style="width: 90px; font-weight: bold;">
                                    <div>
                                        DO Number
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td>
                                    <div>
                                        <?= $dataReport[0]['documentNumber']; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <!-- TRANSPORTER -->
                    <td style=" width: 350px;">
                        <table style="font-size: 12px; line-height: 14px; height: 20px;">
                            <tr>
                                <td style="width: 90px; font-weight: bold;">
                                    <div>
                                        Transporter
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td>
                                    <div>
                                        <?= $dataReport[0]['transporterCode'] . " - " . $dataReport[0]['transporterName'] ?? '-'; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <!-- BUDGET -->
                    <td style=" width: 350px;">
                        <table style="font-size: 12px; line-height: 14px; height: 20px;">
                            <tr>
                                <td style="width: 90px; font-weight: bold;">
                                    <div>
                                        Budget
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td>
                                    <div>
                                        <?= $dataReport[0]['combinedBudgetCode'] . " - " . $dataReport[0]['combinedBudgetName']; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <!-- DELIVERY FROM -->
                    <td style=" width: 350px;">
                        <table style="font-size: 12px; line-height: 14px; height: 20px;">
                            <tr>
                                <td style="width: 90px; font-weight: bold;">
                                    <div>
                                        Delivery From
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td>
                                    <div>
                                        <?= $dataReport[0]['deliveryFrom_NonRefID']['Address']; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <!-- SUB BUDGET -->
                    <td style=" width: 350px;">
                        <table style="font-size: 12px; line-height: 14px; height: 20px;">
                            <tr>
                                <td style="width: 90px; font-weight: bold;">
                                    <div>
                                        Sub Budget
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td>
                                    <div>
                                        <?= $dataReport[0]['combinedBudgetSectionCode'] . " - " . $dataReport[0]['combinedBudgetSectionName']; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <!-- DELIVERY TO -->
                    <td style=" width: 350px;">
                        <table style="font-size: 12px; line-height: 14px; height: 20px;">
                            <tr>
                                <td style="width: 90px; font-weight: bold;">
                                    <div>
                                        Delivery To
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td>
                                    <div>
                                        <?= $dataReport[0]['deliveryTo_NonRefID']['Address']; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <!-- DATE -->
                    <td style=" width: 350px;">
                        <table style="font-size: 12px; line-height: 14px; height: 20px;">
                            <tr>
                                <td style="width: 90px; font-weight: bold;">
                                    <div>
                                        Date
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td>
                                    <div>
                                        <?= $dataReport[0]['sys_Data_Entry_DateTimeTZ']; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    
                    <!-- PIC -->
                    <td style=" width: 350px;">
                        <table style="font-size: 12px; line-height: 14px; height: 20px;">
                            <tr>
                                <td style="width: 90px; font-weight: bold;">
                                    <div>
                                        PIC
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td>
                                    <div>
                                        -
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- DETAIL -->
            <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%; border-top: 1px solid black; font-size: 12px;" id="TableReportAdvanceSummary">
                <tr style="height: 20px; font-weight: bold;">
                    <td>
                        <div style="margin: 4px 0px 16px 0px;">
                            No
                        </div>
                    </td>
                    <td>
                        <div style="margin: 4px 0px 16px 0px;">
                            PO Number
                        </div>
                    </td>
                    <td>
                        <div style="margin: 4px 0px 16px 0px;">
                            Product
                        </div>
                    </td>
                    <td>
                        <div style="margin: 4px 0px 16px 0px;">
                            Qty
                        </div>
                    </td>
                    <td>
                        <div style="margin: 4px 0px 16px 0px;">
                            UOM
                        </div>
                    </td>
                    <td>
                        <div style="margin: 4px 0px 16px 0px;">
                            Remark
                        </div>
                    </td>
                </tr>

                <?php $no = 1; $totalQty = 0; ?>
                <?php foreach ($dataReport as $dataDetail) { ?>
                    <?php $totalQty += $dataDetail['quantity']; ?>
                    <tr>
                        <td>
                            <div style="margin-top: 4px;">
                                <?= $no++; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px;">
                                -
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px;">
                                <?= $dataDetail['productCode'] . " - " . $dataDetail['productName']; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px;">
                                <?= $dataDetail['quantity']; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px;">
                                <?= $dataDetail['quantityUnitName']; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px;">
                                <?= $dataDetail['remarks']; ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

                <div style="height: 16px;"></div>

                <tr style="border-top: 1px solid black;height: 20px; font-size: 12px; font-weight: bold;">
                    <td>
                        <div style="margin: 4px 0px 16px 0px;"></div>
                    </td>
                    <td>
                        <div style="margin: 4px 0px 16px 0px;"></div>
                    </td>
                    <td>
                        <div style="margin: 4px 0px 16px 0px;">Total</div>
                    </td>
                    <td>
                        <div style="margin: 4px 0px 16px 0px;"><?= $totalQty; ?></div>
                    </td>
                    <td>
                        <div style="margin: 4px 0px 16px 0px;"></div>
                    </td>
                    <td>
                        <div style="margin: 4px 0px 16px 0px;"></div>
                    </td>
                </tr>
            </table>

            <!-- APPROVAL -->
            <table style="width: 40%; border-collapse: collapse; margin-top: 4px;">
                <tr>
                    <td style="vertical-align: top;">
                        <div style="vertical-align: top; padding: 0px 8px;">
                            <div style="text-align: center; font-weight: bold; font-size: 12px;">
                                Approved by Director
                            </div>
                            <div style="margin-top: 24px;">
                                <table style="width: 100%; height: 2%;">
                                    <td style="font-size: 8px; line-height: 15px; width: 40px;">
                                        {{-- Digital Signature : --}}
                                    </td>
                                    <td style="font-size: 8px; line-height: 15px; max-width: 30px; word-wrap: break-word;">
                                        {{-- bb4ab83f16b88a54afd8523d667dba91 --}}
                                    </td>
                                    <td style="font-size: 8px; line-height: 15px; width: 40px;">
                                        {{-- Digital Signature : --}}
                                    </td>
                                    <td style="font-size: 8px; line-height: 15px; max-width: 30px; word-wrap: break-word;">
                                        {{-- bb4ab83f16b88a54afd8523d667dba91 --}}
                                    </td>
                                </table>
                                <hr style="border: 1px solid black; margin: 8px 0px 2px 0px;" />
                                <div style="text-align: center; line-height: 15px; font-size: 8px;visibility: hidden;">
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
                            <div style="text-align: center; font-weight: bold; font-size: 12px;">
                                Accepted by Vendor
                            </div>
                            <div style="margin-top: 24px;">
                                <table style="width: 100%; height: 2%;">
                                    <td style="font-size: 8px; line-height: 15px; width: 40px;">
                                        {{-- Digital Signature : --}}
                                    </td>
                                    <td style="font-size: 8px; line-height: 15px; max-width: 30px; word-wrap: break-word;">
                                        {{-- bb4ab83f16b88a54afd8523d667dba91 --}}
                                    </td>
                                    <td style="font-size: 8px; line-height: 15px; width: 40px;">
                                        {{-- Digital Signature : --}}
                                    </td>
                                    <td style="font-size: 8px; line-height: 15px; max-width: 30px; word-wrap: break-word;">
                                        {{-- bb4ab83f16b88a54afd8523d667dba91 --}}
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
        </div>
    </body>
</html>