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
            <div style="text-align: center; font-size: 20px; font-weight: bold;">Account Payable</div>
            <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

            <!-- HEADER -->
            <table style="margin: 30px 0px 15px 1px;">
                <tr>
                    <!-- BUDGET -->
                    <td style="width: 350px;">
                        <table>
                            <tr>
                                <td style="width: 110px; height: 20px;">
                                    <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                                        Budget
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td style="height: 20px;">
                                    <div style="font-size: 14px; line-height: 14px;">
                                        <?= $dataReport['project']['code']; ?> - <?= $dataReport['project']['name']; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <!-- SUB BUDGET -->
                    {{-- <td style="width: 350px;">
                        <table>
                            <tr>
                                <td style="width: 110px; height: 20px;">
                                    <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                                        Sub Budget
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td style="height: 20px;">
                                    <div style="font-size: 14px;line-height: 14px;">
                                        <?php $dataReport['site']['code']; ?> - <?= $dataReport['site']['name']; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td> --}}
                </tr>

                {{-- <tr>
                    <!-- SUPPLIER -->
                    <td style="width: 350px;">
                        <table>
                            <tr>
                                <td style="width: 110px; height: 20px;">
                                    <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                                        Supplier
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td style="height: 20px;">
                                    <div style="font-size: 14px;line-height: 14px;">
                                        <?php $dataReport['supplier']['code'] ?? '-'; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <!-- DATE -->
                    <td style="width: 350px;">
                        <table>
                            <tr>
                                <td style="width: 110px; height: 20px;">
                                    <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                                        Date
                                    </div>
                                </td>
                                <td style="width: 5px;">
                                    :
                                </td>
                                <td style="height: 20px;">
                                    <div style="font-size: 14px;line-height: 14px;">
                                        <?php $dataReport['date'] ?? '-'; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> --}}
            </table>

            <table style="margin-left: 1px; width: 100%;">
                <tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            No
                        </div>
                    </td>
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            AP Number
                        </div>
                    </td>
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Date
                        </div>
                    </td>
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Sub Budget
                        </div>
                    </td>
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Supllier
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
                            Tax Invoice Number
                        </div>
                    </td>
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Submitter
                        </div>
                    </td>
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Status
                        </div>
                    </td>
                </tr>

                <?php $counter = 1; ?>
                <?php foreach ($dataReport['data'] as $data) { ?>
                    <tr>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $counter++; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $data['number']; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $data['date']; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $data['sub_budget']; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $data['supplier']; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($data['total_idr'], 2); ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($data['total_other_currency'], 2); ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($data['total_equivalent_idr'], 2); ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $data['tax_invoice_number']; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $data['submitter']; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $data['status']; ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

                <tr style="border-top: 1px solid black;">
                    <td style="height: 20px; text-align: left;" colspan="5">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">GRAND TOTAL</div>
                    </td>
                    <td style="height: 20px; text-align: left;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalIDR'], 2); ?></div>
                    </td>
                    <td style="height: 20px; text-align: left;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalOtherCurrency'], 2); ?></div>
                    </td>
                    <td style="height: 20px; text-align: left;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalEquivalentIDR'], 2); ?></div>
                    </td>
                    <td style="height: 20px; text-align: left;" colspan="3">
                    </td>
                </tr>
            </table>
        </div>
    </body>

</html>