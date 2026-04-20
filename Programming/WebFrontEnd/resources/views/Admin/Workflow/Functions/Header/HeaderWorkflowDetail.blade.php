<div class="card-body">
    <div id="workflow_detail_content" class="row py-3" style="display: none;">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="timeline mb-0">
                            <!-- START AREA (tetap) -->
                            <div class="d-flex align-items-center"
                                style="margin-bottom: 15px; margin-right: 10px; position: relative; left: 5px; gap: 0.3rem;">
                                <span class="bg-blue"
                                    style="border-radius: 4px; display: inline-block; font-weight: 600; padding: 5px;">START</span>
                                <div onclick="addNextStep('')"
                                    style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>

                            <div class="d-flex align-items-center" style="gap: 0.3rem;">
                                <!-- <div
                                    style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da; margin-left: 60px;">
                                    <i class="fas fa-plus"></i>
                                </div> -->
                                <div
                                    style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da; margin-left: 60px;">
                                    <i class="fas fa-gift"></i>
                                </div>
                                <div style="width: fit-content;">
                                    <div class="input-group">
                                        <input id="workflow_detail_start" class="form-control" readonly
                                            style="border-radius:0; width: 181px;">
                                    </div>
                                </div>
                            </div>

                            <!-- END AREA -->
                            <div id="end-area">
                                <div class="d-flex align-items-center"
                                    style="margin-bottom: 15px; margin-right: 10px; position: relative; left: 15px; gap: 0.3rem;">
                                    <span class="bg-blue"
                                        style="border-radius: 4px; display: inline-block; font-weight: 600; padding: 5px;">END</span>
                                </div>

                                <div class="d-flex align-items-center" style="gap: 0.3rem;">
                                    <div
                                        style="background-color: #e9ecef; padding: 4px; border: 1px solid #ced4da; margin-left: 60px;">
                                        <i class="fas fa-gift"></i>
                                    </div>
                                    <div style="width: fit-content;">
                                        <div class="input-group">
                                            <input class="form-control" readonly style="border-radius:0; width: 181px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="workflow_detail_loading" class="row py-3 align-items-center justify-content-center" style="display: none;">
        <div id="loadingBudget" class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>