<!-- BODY -->
<div class="card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="customer_order_details_table">
        <thead>
            <tr>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Action
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Work
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Product
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    UoM
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Qty
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Price
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Total
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Note
                </th>
            </tr>
        </thead>
        <tbody id="customer_order_details_tbody_table"></tbody>
        <tfoot>
            <tr id="customer_order_details_loading_table" style="display: none;">
                <td colspan="11" class="p-0" style="border: 0px; height: 150px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                            Loading...
                        </div>
                    </div>
                </td>
            </tr>
            <tr id="customer_order_details_message_container_table" style="display: none;">
                <td colspan="11" class="p-0" style="border: 0px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div id="customer_order_details_message_table" class="mt-3 text-red"
                            style="font-size: 1rem; font-weight: 700;"></div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>