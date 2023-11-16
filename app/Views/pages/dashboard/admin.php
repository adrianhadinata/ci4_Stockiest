<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js" integrity="sha256-EVZCmhajjLhgTcxlGMGUBtQiYULZCPjt0uNTFEPFTRk=" crossorigin="anonymous"></script>
<style>
    html, body {
        overflow:hidden !important;
    }
</style>
<div class="container-fluid" style="overflow: auto;">
    <div class="row vh-100 mt-5">
        <div class="col-md-6 d-flex mt-2">
            <div class="card card-animate text-center w-100" style="height: 33rem">
                <div class="card-header">
                    7 Day Sales Summary
                </div>
                <div class="card-body w-100" style="height: 100%;">
                    <div id="main" style="width: 100%; height: 400px;"></div>
                </div>
                <div class="card-footer text-muted">
                    Total Sales Rp. 1.000.000 Net Profit Rp. 100.000
                </div>
                </div>
            </div>
        <div class="col-md-6 mt-2">
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card card-animate text-center w-100 text-white bg-warning" style="max-height: 18rem; height: 16rem">
                        <div class="card-header">
                            Today's Sales
                        </div>
                        <div class="card-body w-100 d-flex align-items-center justify-content-center">
                            <h1 class="card-title">Rp. 1.000.000,-</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card card-animate text-center w-100 text-white bg-success" style="max-height: 18rem; height: 16rem">
                        <div class="card-header">
                            Today's Net Profit
                        </div>
                        <div class="card-body w-100 d-flex align-items-center justify-content-center">
                            <h1 class="card-title">Rp. 1.000.000,-</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 d-flex">
                    <div class="card card-animate text-center w-100 text-white bg-primary" style="max-height: 18rem; height: 16rem">
                        <div class="card-header">
                            Incoming Stock
                        </div>
                        <div class="card-body w-100 d-flex align-items-center justify-content-center">
                            <h1 class="card-title">0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card card-animate text-center w-100 text-white bg-danger" style="max-height: 18rem; height: 16rem">
                        <div class="card-header">
                            Outbound Stock
                        </div>
                        <div class="card-body w-100 d-flex align-items-center justify-content-center">
                            <h1 class="card-title">0</h1>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

<script>
    var chartDom = document.getElementById('main');
    var myChart = echarts.init(chartDom, 'dark');
    var data = [820, 932, 901, 934, 1290, 1330, 1320];
    var option;

    option = {
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
        data: data,
        type: 'line',
        areaStyle: {}
        }
    ]
    };

    option && myChart.setOption(option);

    $(window).on('resize', function(){
        if(myChart != null && myChart != undefined){
            myChart.resize();
        }
    });
</script>

<?= $this->endSection(); ?>