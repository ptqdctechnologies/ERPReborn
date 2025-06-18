<div class="card-body">
    <div class="card px-3 py-4">
        <!-- INFORMASI -->
        <div class="row">
            <div class="col">
                <!-- SUBMITTED DATE -->
                <div class="row information_approval" style="gap: 4px;">
                    <dt class="col-lg-4">
                        Submitted Date
                    </dt>
                    <dd class="col">
                        <?= date('j F Y'); ?>
                    </dd>
                </div>

                <!-- PIC -->
                <div class="row information_approval" style="gap: 4px;">
                    <dt class="col-lg-4">
                        PIC
                    </dt>
                    <dd class="col">
                        Joko Wiyono
                    </dd>
                </div>

                <!-- BUDGET -->
                <div class="row information_approval" style="gap: 4px;">
                    <dt class="col-lg-4">
                        Budget
                    </dt>
                    <dd class="col" style="line-height: 15px;">
                        Q000062 - XL Microcell 2007
                    </dd>
                </div>

                <!-- SITE -->
                <div class="row information_approval" style="gap: 4px;">
                    <dt class="col-lg-4">
                        Sub Budget
                    </dt>
                    <dd class="col" style="line-height: 15px;">
                        240 - Cendana Andalas
                    </dd>
                </div>
            </div>

            <div class="col">
                <!-- CURRENCY -->
                <div class="row information_approval" style="gap: 4px;">
                    <dt class="col-lg-4">
                        Currency
                    </dt>
                    <dd class="col">
                        IDR - Indonesian Rupiah
                    </dd>
                </div>

                <!-- EXCHANGE RATE -->
                <div class="row information_approval" style="gap: 4px;">
                    <dt class="col-lg-4">
                        Exchange Rate
                    </dt>
                    <dd class="col">
                        0
                    </dd>
                </div>

                <!-- REASON -->
                <div class="row information_approval" style="gap: 4px;">
                    <dt class="col-lg-4">
                        Reason
                    </dt>
                    <dd class="col" style="line-height: 15px;">
                        -
                    </dd>
                </div>
            </div>
        </div>

        <!-- ATTACHMENT FILE -->
        <div class="row container_attachment">
            <div class="col-12 title_attachment">
                Attachment Files For Additional Revenue:
            </div>

            <div class="col-12 mt-2">
                <p>-</p>
            </div>
        </div>

        <!-- TABLE -->
        <div class="row m-0">
            <div class="card-body p-0 d-flex justify-content-center">
                <table class="table table-hover text-nowrap border border-dark" style="width: max-content;">
                    <thead>
                        <tr style="background-color: #4b586a;">
                            <th class="font-weight-bold text-white text-center">Description</th>
                            <th class="font-weight-bold text-white text-center">Valuta</th>
                            <th class="font-weight-bold text-white text-center">Origin</th>
                            <th class="font-weight-bold text-white text-center">Previous</th>
                            <th class="font-weight-bold text-white text-center">Add(subt)</th>
                            <th class="font-weight-bold text-white text-center">Total Current</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- SECTION ONE -->
                        <tr style="color: #404040;">
                            <td>
                                Customer Order (CO)
                            </td>
                            <td class="text-center">
                                IDR
                            </td>
                            <td class="text-right">
                                1,000,000.00
                            </td>
                            <td class="text-right">
                                500,000.00
                            </td>
                            <td class="text-right">
                                100,000.00
                            </td>
                            <td class="text-right">
                                1,600,000.00
                            </td>
                        </tr>
                        <tr>
                            <td class="border_top_dotted">
                                
                            </td>
                            <td class="border_top_dotted text-center">
                                Foreign Currency
                            </td>
                            <td class="border_top_dotted text-right">
                                USD
                            </td>
                            <td class="border_top_dotted text-right">
                                200.00
                            </td>
                            <td class="border_top_dotted text-right">
                                50.00
                            </td>
                            <td class="border_top_dotted text-right">
                                250.00
                            </td>
                        </tr>
                        <tr>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                Total Equivalent
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                IDR
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div 
                                    class="float-right border_bottom_dotted" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Origin CO IDR + Origin CO Foreign Currency <br /> Origin CO IDR : - <br /> Origin CO Foreign Currency : - * Transaction's rate (-) <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    1,000,000.00
                                </div>
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Previous CO IDR + Previous CO Foreign Currency <br /> Previous CO IDR : - <br /> Previous CO Foreign Currency : - * - <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    500,000.00
                                </div>
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Add(subt) CO IDR + Add(subt) CO Foreign Currency <br /> Add(subt) CO IDR : - <br /> Add(subt) CO  Foreign Currency : - * - <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    100,000.00
                                </div>
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Total Current CO IDR + Total Current CO USD <br /> Total Current CO IDR : - <br /> Total Current CO Foreign Currency : - * - <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    1,600,000.00
                                </div>
                            </td>
                        </tr>

                        <!-- SECTION TWO -->
                        <tr style="color: #404040;">
                            <td>
                                Add(Subt) Cost
                            </td>
                            <td class="text-center">
                                IDR
                            </td>
                            <td class="text-right">
                                600,000.00
                            </td>
                            <td class="text-right">
                                300,000.00
                            </td>
                            <td class="text-right">
                                50,000.00
                            </td>
                            <td class="text-right">
                                950,000.00
                            </td>
                        </tr>
                        <tr style="color: #404040;">
                            <td></td>
                            <td class="text-center">
                                Foreign Currency
                            </td>
                            <td class="text-right">
                                USD
                            </td>
                            <td class="text-right">
                                100.00
                            </td>
                            <td class="text-right">
                                20.00
                            </td>
                            <td class="text-right">
                                120.00
                            </td>
                        </tr>
                        <tr>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                Total Equivalent
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                IDR
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Origin Add(Subt) Cost IDR + Origin Add(Subt) Cost Foreign Currency <br /> Origin Add(Subt) Cost IDR : - <br /> Origin Add(Subt) Cost Foreign Currency : - * Transaction's rate (-) <br />"
                                    style="width: max-content; cursor: help;">
                                    600,000.00
                                </div>
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Previous Add(Subt) Cost IDR + Recorded Cost Foreign Currency + Balance Budget Foreign Currency <br /> Previous Add(Subt) Cost IDR : - <br /> Recorded Cost Foreign Currency : 0.00 (- * Transaction's exchange rate) <br /> Balance Budget Foreign Currency : 0.00 * -"
                                    style="width: max-content; cursor: help;"
                                    >
                                    300,000.00
                                </div>
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Add(Subt) Cost IDR + Add(Subt) Cost Foreign Currency <br /> Add(Subt) Cost IDR : - <br /> Add(Subt) Cost Foreign Currency : - * - <br />"
                                    style="width: max-content; cursor: help;">
                                    50,000.00
                                </div>
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Total Current Add(Subt) Cost IDR  + Recorded Cost Foreign Currency + Balance Budget Foreign Currency + Add(Subt) Cost Foreign Currency <br /> Total Current Add(Subt) Cost IDR : - <br /> Recorded Cost Foreign Currency : 0.00 (- * Transaction's exchange rate) <br /> Balance Budget Foreign Currency : 0.00 * - <br /> Add(Subt) Cost Foreign Currency : - * - <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    950,000.00
                                </div>
                            </td>
                        </tr>

                        <!-- SECTION THREE -->
                        <tr style="color: #404040;">
                            <td>
                                Gross Margin
                            </td>
                            <td class="text-center">
                                IDR
                            </td>
                            <td class="text-right">
                                400,000.00
                            </td>
                            <td class="text-right">
                                200,000.00
                            </td>
                            <td class="text-right">
                                50,000.00
                            </td>
                            <td class="text-right">
                                650,000.00
                            </td>
                        </tr>
                        <tr style="color: #404040;">
                            <td class="border_top_dotted">
                                
                            </td>
                            <td class="border_top_dotted text-center">
                                Foreign Currency
                            </td>
                            <td class="border_top_dotted text-right">
                                USD
                            </td>
                            <td class="border_top_dotted text-right">
                                100.00
                            </td>
                            <td class="border_top_dotted text-right">
                                30.00
                            </td>
                            <td class="border_top_dotted text-right">
                                180.00
                            </td>
                        </tr>
                        <tr>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                Total Equivalent
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                IDR
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Origin Gross Margin IDR + Origin Gross Margin Foreign Currency <br /> Origin Gross Margin IDR : - <br /> Origin Gross Margin Foreign Currency : - * Transaction's rate (-) <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    400,000.00
                                </div>
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Previous CO Total - Previous Add(Subt) Cost Total <br /> Previous CO Total : - <br /> Previous Add(Subt) Cost Total : - <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    200,000.00
                                </div>
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Add(Subt) CO Total - Add(Subt) Add(Subt) Cost Total <br /> Add(Subt) CO Total : - <br /> Add(Subt) Cost Total : - <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    50,000.00
                                </div>
                            </td>
                            <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="Total Current CO Total - Total Current Add(Subt) Cost Total <br /> Total Current CO Total : - <br /> Total Current Add(Subt) Cost Total : - <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    650,000.00
                                </div>
                            </td>
                        </tr>

                        <!-- SECTION FOUR -->
                        <tr>
                            <td class="font-weight-bold text-danger">
                                Gross Margin
                            </td>
                            <td class="font-weight-bold text-danger text-center">
                                %
                            </td>
                            <td class="text-dark font-weight-bold">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="(Origin Gross Margin Total / Origin CO Total) * 100% <br /> Origin Gross Margin Total : - <br /> Origin CO Total : - <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    40%
                                </div>
                            </td>
                            <td class="text-dark font-weight-bold">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="(Previous Gross Margin Total / Previous CO Total) * 100% <br /> Previous Gross Margin Total : - <br /> Previous CO Total : - <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    40%
                                </div>
                            </td>
                            <td></td>
                            <td class="text-dark font-weight-bold">
                                <div
                                    class="float-right border_bottom_dotted"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    data-html="true"
                                    title="(Total Current Gross Margin Total / Total Current CO Total) * 100% <br /> Total Current Gross Margin Total : - <br /> Total Current CO Total : - <br />"
                                    style="width: max-content; cursor: help;"
                                    >
                                    40.63%
                                </div>
                            </td>
                        </tr>
                        <tr style="background-color: #ffff00;">
                            <td class="font-weight-bold text-danger">
                                Gross Margin Movement
                            </td>
                            <td class="font-weight-bold text-danger text-center">
                                %
                            </td>
                            <td class="text-dark font-weight-bold">
                                <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Total Current Gross Margin % - Origin Gross Margin %) <br /> Total Current Gross Margin % : - <br /> Origin Gross Margin % : - <br />" style="width: max-content; cursor: help;">
                                    -
                                </div>
                            </td>
                            <td class="text-dark font-weight-bold">
                                <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Total Current Gross Margin % - Previous Gross Margin %) <br /> Total Current Gross Margin % : - <br /> Previous Gross Margin % : - <br />" style="width: max-content; cursor: help;">
                                    -
                                </div>
                            </td>
                            <td></td>
                            <td>
                                <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Total Current Gross Margin % - Previous Gross Margin %) <br /> Total Current Gross Margin % : - <br /> Previous Gross Margin % : - <br />" style="width: max-content; cursor: help;">
                                    +0.63%
                                </div>
                            </td>
                        </tr>

                        <!-- SECTION FIVE -->
                        <tr style="color: #404040;">
                            <td class="border-dark border-top">
                                Recorded Cost
                            </td>
                            <td class="border-dark border-top text-center">
                                IDR
                            </td>
                            <td class="border-dark border-top">
                                580,000.00
                            </td>
                            <td class="border-dark border-top">
                                290,000.00
                            </td>
                            <td class="border-dark border-top">
                                40,000.00
                            </td>
                            <td class="border-dark border-top text-right">
                                910,000.00
                            </td>
                        </tr>
                        <tr style="color: #404040;">
                            <td class="border_top_dotted"></td>
                            <td class="border_top_dotted text-center">
                                Foreign Currency
                            </td>
                            <td class="border_top_dotted">
                                USD
                            </td>
                            <td class="border_top_dotted">
                                90.00
                            </td>
                            <td class="border_top_dotted">
                                15.00
                            </td>
                            <td class="border_top_dotted text-right">
                                105.00
                            </td>
                        </tr>
                        <tr>
                            <td class="border-dark border-top font-weight-bold text-dark">
                                Total Equivalent
                            </td>
                            <td class="border-dark border-top font-weight-bold text-dark text-center">
                                IDR
                            </td>
                            <td class="border-dark border-top font-weight-bold text-dark">
                                580,000.00
                            </td>
                            <td class="border-dark border-top font-weight-bold text-dark">
                                290,000.00
                            </td>
                            <td class="border-dark border-top font-weight-bold text-dark">
                                40,000.00
                            </td>
                            <td class="border-dark border-top font-weight-bold text-dark text-right">
                                <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Recorded Cost IDR + Recorded Cost Foreign Currency <br /> Recorded Cost IDR : 28,847,447 <br /> Recorded Cost Foreign Currency : 0 (0.00 * Transaction's exchange rate) <br />" style="width: max-content; cursor: help;">
                                    910,000.00
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-dark border-top font-weight-bold text-red">
                                Actual Gross Margin
                            </td>
                            <td class="border-dark border-top font-weight-bold text-red text-center">
                                %
                            </td>
                            <td class="border-dark border-top"></td>
                            <td class="border-dark border-top"></td>
                            <td class="border-dark border-top"></td>
                            <td class="border-dark border-top font-weight-bold text-dark text-right">
                                <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="([Total Current CO * % Progress - Total Recorded Cost]/Total Current CO * % Progress)*100% Total Current CO : 11,073,733,917 <br /> % Progress : 0.00 % <br /> Total Recorded Cost : 28,847,447 <br />" style="width: max-content; cursor: help;">
                                    43.13%
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODIFY BUDGET TABLE -->
        <div class="row mx-0" style="margin-top: 30px;">
            <div class="col text-center font-weight-bold table_title mb-2">
                MODIFY BUDGET LIST (CART)
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap" style="border: 2px solid #e9e9e9;">
                    <thead>
                        <tr>
                            <th class="text-center">Product ID</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Origin</th>
                            <th class="text-center">Previous</th>
                            <th class="text-center">Qty(+/-)</th>
                            <th class="text-center">Add(subt)</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left" style="padding-left: .70rem;">
                                2000253
                            </td>
                            <td class="text-left text-wrap">
                                Install PLN Connection
                            </td>
                            <td class="text-left">
                                IDR
                            </td>
                            <td class="text-left">
                                500,000.00
                            </td>
                            <td class="text-left">
                                +2
                            </td>
                            <td class="text-left">
                                100,000.00
                            </td>
                            <td class="text-left">
                                600,000.00
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="padding-left: .70rem;">
                                2000245
                            </td>
                            <td class="text-left text-wrap">
                                Concrete Formwork
                            </td>
                            <td class="text-left">
                                IDR
                            </td>
                            <td class="text-left">
                                150,000.00
                            </td>
                            <td class="text-left">
                                +1
                            </td>
                            <td class="text-left">
                                50,000.00
                            </td>
                            <td class="text-left">
                                200,000.00
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="padding-left: .70rem;">
                                1000185
                            </td>
                            <td class="text-left text-wrap">
                                Cable Ladder Outdoor W300
                            </td>
                            <td class="text-left">
                                IDR
                            </td>
                            <td class="text-left">
                                300,000.00
                            </td>
                            <td class="text-left">
                                -1
                            </td>
                            <td class="text-left">
                                -75,000.00
                            </td>
                            <td class="text-left">
                                225,000.00
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="padding-left: .70rem;">
                                1000185
                            </td>
                            <td class="text-left text-wrap">
                                Cable Ladder Outdoor W300
                            </td>
                            <td class="text-left">
                                IDR
                            </td>
                            <td class="text-left">
                                200,000.00
                            </td>
                            <td class="text-left">
                                +3
                            </td>
                            <td class="text-left">
                                -90,000.00
                            </td>
                            <td class="text-left">
                                290,000.00
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" style="padding-left: .70rem;">
                                2000127
                            </td>
                            <td class="text-left text-wrap">
                                Install Kabel grounding BCC 50mm
                            </td>
                            <td class="text-left">
                                USD
                            </td>
                            <td class="text-left">
                                100,000.00
                            </td>
                            <td class="text-left">
                                +2
                            </td>
                            <td class="text-left">
                                40,000.00
                            </td>
                            <td class="text-left">
                                140,000.00
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="font-weight-bold text-left" style="font-size: 12px;">
                                GRAND TOTAL
                            </td>
                            <td class="font-weight-bold text-left">
                                1,455,000.00
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>