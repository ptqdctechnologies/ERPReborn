@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
<style>
  #chartdiv {
    width: 100%;
    height: 500px;
  }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">

      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Project Dashboard</label>
        </div>
      </div>

      <!-- <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
            <div class="row">
              <div class="col-md-12">
                <div class="card-body">
                  <div class="card-body table-responsive p-0">
                    <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <tbody>
                        <div id="chartdiv"></div>
                        <img src="{{ asset('AdminLTE-master/dist/img/qdc.png') }}" style="display: block;margin-left: auto;margin-right: auto;margin-left: auto;margin-right: auto;margin-top:10%; width: 15%;" alt="">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </section>
</div>
@include('Partials.footer')

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<!-- Chart code -->
<script>
  am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: true,
      panY: true,
      wheelX: "panX",
      wheelY: "zoomX",
      pinchZoomX: true
    }));

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineY.set("visible", false);


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xRenderer = am5xy.AxisRendererX.new(root, {
      minGridDistance: 30
    });
    xRenderer.labels.template.setAll({
      rotation: -90,
      centerY: am5.p50,
      centerX: am5.p100,
      paddingRight: 15
    });

    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      maxDeviation: 0.3,
      categoryField: "month",
      renderer: xRenderer,
      tooltip: am5.Tooltip.new(root, {})
    }));

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      maxDeviation: 0.3,
      renderer: am5xy.AxisRendererY.new(root, {})
    }));


    // Create series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: "Series 1",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value",
      sequencedInterpolation: true,
      categoryXField: "month",
      tooltip: am5.Tooltip.new(root, {
        labelText: "{valueY}"
      })
    }));

    series.columns.template.setAll({
      cornerRadiusTL: 5,
      cornerRadiusTR: 5
    });
    series.columns.template.adapters.add("fill", function(fill, target) {
      return chart.get("colors").getIndex(series.columns.indexOf(target));
    });

    series.columns.template.adapters.add("stroke", function(stroke, target) {
      return chart.get("colors").getIndex(series.columns.indexOf(target));
    });


    // Set data
    var data = [{
      month: "Januari",
      value: 1000
    }, {
      month: "Februari",
      value: 900
    }, {
      month: "Maret",
      value: 800
    }, {
      month: "April",
      value: 700
    }, {
      month: "Mei",
      value: 600
    }, {
      month: "Juni",
      value: 500
    }, {
      month: "Juli",
      value: 500
    }, {
      month: "Agustus",
      value: 600
    }, {
      month: "September",
      value: 700
    }, {
      month: "Oktober",
      value: 800
    }, {
      month: "November",
      value: 900
    }, {
      month: "Desember",
      value: 1000
    }];

    xAxis.data.setAll(data);
    series.data.setAll(data);


    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);

  }); // end am5.ready()
</script>


@endsection