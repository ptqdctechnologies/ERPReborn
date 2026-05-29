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
        <div style="text-align: center; font-size: 20px; font-weight: bold;">Reimbursement to Debit Note</div>
        <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>
    </div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
        <tr>
            <!-- REM NUMBER -->
            <td style="width: 350px;">
                <table>
                    <tr>
                        <td style="width: 80px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                REM Number
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                                -
                            </div>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- BUDGET -->
            <td style="width: 350px;">
                <table>
                    <tr>
                        <td style="width: 80px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                Budget
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                                -
                            </div>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- DATE RANGE -->
            <td style="width: 350px;">
                <table>
                    <tr>
                        <td style="width: 80px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                Date Range
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                                -
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <!-- DN NUMBER -->
            <td style="width: 350px;">
                <table>
                    <tr>
                        <td style="width: 80px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                DN Number
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                                -
                            </div>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- CUSTOMER -->
            <td style="width: 350px;">
                <table>
                    <tr>
                        <td style="width: 80px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                Budget
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                                -
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- DETAIL -->
    <table style="margin-left: 1px; width: 100%;">
        <thead>
            <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
                <td rowspan="2"
                    style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        No
                    </div>
                </td>
                <td colspan="9"
                    style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Reimbursement
                    </div>
                </td>
                <td colspan="8"
                    style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Debit Note
                    </div>
                </td>
            </tr>
            <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Number
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Date
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Customer
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Total IDR
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Total Other Currency
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Total Equivalent IDR
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Payment
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        REM to Payment Balance
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        REM Status
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Number
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Date
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Total IDR
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Total Other Currency
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Total Equivalent IDR
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Payment
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        REM to DN Balance
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        DN Status
                    </div>
                </td>
            </tr>
        </thead>

        <tbody>
            <?php $counter = 1; ?>
            <?php foreach ($dataReport as $data) { ?>
            <tr>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $counter++; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['REM_Number'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['REM_Date'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['REM_CustomerCode'] ?? ''; ?> -
                        <?= $data['REM_CustomerName'] ?? ''; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['REM_Total_IDR'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['REM_Total_Other_Currency'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['REM_Total_Equivalent_IDR'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        -
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['balanceREM_ToPayment'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['REM_Status'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['DN_Number'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['DN_Date'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['DN_Total_IDR'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['DN_Total_Other_Currency'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['DN_Total_Equivalent_IDR'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        -
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['balanceREM_ToDN'] ?? '-'; ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px; font-size: 12px;">
                        <?= $data['DN_Status'] ?? '-'; ?>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>