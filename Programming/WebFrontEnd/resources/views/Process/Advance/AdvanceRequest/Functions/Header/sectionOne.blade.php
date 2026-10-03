<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT SIDE -->
        <div class="col-md-12 col-lg-5">
            <!-- BUDGET CODE -->
            @include('getFunction.getBudgetCode')
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-12 col-lg-5">
            <!-- SUB BUDGET CODE -->
            @include('getFunction.getSiteCode')
        </div>
    </div>
</div>