@extends('layouts.dashboard', ['title' => "Système d'Information de Vente"])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <x-statbox />
            <!-- /.row -->

            <!-- <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                          <i class="fas fa-chart-pie mr-1"></i>
                          Sales
                        </h3>
                        <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                              <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="tab-content p-0">
                          <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                              <canvas id="revenue-chart-canvas" style="height: 300px; display: block; width: 900px;" class="chartjs-render-monitor" width="900" height="300"></canvas>
                           </div>
                          <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="sales-chart-canvas" style="height: 300px; display: block; width: 900px;" class="chartjs-render-monitor" width="900" height="300"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card bg-gradient-info">
                      <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                          <i class="fas fa-th mr-1"></i>
                          Sales Graph
                        </h3>

                        <div class="card-tools">
                          <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas class="chart chartjs-render-monitor" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 627px;" width="627" height="250"></canvas>
                      </div>
                      <div class="card-footer bg-transparent">
                        <div class="row">
                          <div class="col-4 text-center">
                            <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

                            <div class="text-white">Mail-Orders</div>
                          </div>
                          <div class="col-4 text-center">
                            <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

                            <div class="text-white">Online</div>
                          </div>
                          <div class="col-4 text-center">
                            <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

                            <div class="text-white">In-Store</div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="row">
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Area Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" class="chartjs-render-monitor" width="764" height="250"></canvas>
                    </div>
                  </div>
                </div>

                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Donut Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" class="chartjs-render-monitor" width="764" height="250"></canvas>
                  </div>
                </div>

                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Pie Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" class="chartjs-render-monitor" width="764" height="250"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Line Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" class="chartjs-render-monitor" width="764" height="250"></canvas>
                    </div>
                  </div>
                </div>

                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Bar Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" class="chartjs-render-monitor" width="764" height="250"></canvas>
                    </div>
                  </div>
                </div>

                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Stacked Bar Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" class="chartjs-render-monitor" width="764" height="250"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- <div class="row">
              <div class="col-12">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      Interactive Area Chart
                    </h3>

                    <div class="card-tools">
                      Real time
                      <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                        <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="interactive" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1582px; height: 300px;" width="1582" height="300"></canvas><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1582px; height: 300px;" width="1582" height="300"></canvas><div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg style="width: 100%; height: 100%;"><g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><text style="position: absolute; text-align: center;" x="28.02500009536743" y="294" class="flot-tick-label tickLabel">0</text><text style="position: absolute; text-align: center;" x="179.8075759483106" y="294" class="flot-tick-label tickLabel">10</text><text style="position: absolute; text-align: center;" x="335.56515170588636" y="294" class="flot-tick-label tickLabel">20</text><text style="position: absolute; text-align: center;" x="491.3227274634622" y="294" class="flot-tick-label tickLabel">30</text><text style="position: absolute; text-align: center;" x="647.0803032210379" y="294" class="flot-tick-label tickLabel">40</text><text style="position: absolute; text-align: center;" x="802.8378789786136" y="294" class="flot-tick-label tickLabel">50</text><text style="position: absolute; text-align: center;" x="958.5954547361895" y="294" class="flot-tick-label tickLabel">60</text><text style="position: absolute; text-align: center;" x="1114.3530304937651" y="294" class="flot-tick-label tickLabel">70</text><text style="position: absolute; text-align: center;" x="1270.1106062513409" y="294" class="flot-tick-label tickLabel">80</text><text style="position: absolute; text-align: center;" x="1425.8681820089166" y="294" class="flot-tick-label tickLabel">90</text></g><g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><text style="position: absolute; text-align: right;" x="8.949999809265137" y="269" class="flot-tick-label tickLabel">0</text><text style="position: absolute; text-align: right;" x="1" y="15" class="flot-tick-label tickLabel">50</text><text style="position: absolute; text-align: right;" x="1" y="218.2" class="flot-tick-label tickLabel">10</text><text style="position: absolute; text-align: right;" x="1" y="167.4" class="flot-tick-label tickLabel">20</text><text style="position: absolute; text-align: right;" x="1" y="116.6" class="flot-tick-label tickLabel">30</text><text style="position: absolute; text-align: right;" x="1" y="65.8" class="flot-tick-label tickLabel">40</text></g></svg></div></div>
                  </div>
                </div>

              </div>
            </div> -->

            <!-- <div class="row">
              <div class="col-md-6">
                
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      Line Chart
                    </h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="line-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 763.5px; height: 300px;" width="763" height="300"></canvas><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 763.5px; height: 300px;" width="763" height="300"></canvas><div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg style="width: 100%; height: 100%;"><g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><text style="position: absolute; text-align: center;" x="37.02500009536743" y="294" class="flot-tick-label tickLabel">0</text><text style="position: absolute; text-align: center;" x="142.87685194721928" y="294" class="flot-tick-label tickLabel">2</text><text style="position: absolute; text-align: center;" x="248.72870379907113" y="294" class="flot-tick-label tickLabel">4</text><text style="position: absolute; text-align: center;" x="354.580555650923" y="294" class="flot-tick-label tickLabel">6</text><text style="position: absolute; text-align: center;" x="460.4324075027748" y="294" class="flot-tick-label tickLabel">8</text><text style="position: absolute; text-align: center;" x="562.3092594499941" y="294" class="flot-tick-label tickLabel">10</text><text style="position: absolute; text-align: center;" x="668.161111301846" y="294" class="flot-tick-label tickLabel">12</text></g><g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><text style="position: absolute; text-align: right;" x="1" y="269" class="flot-tick-label tickLabel">-1.5</text><text style="position: absolute; text-align: right;" x="1" y="226.66666666666669" class="flot-tick-label tickLabel">-1.0</text><text style="position: absolute; text-align: right;" x="1" y="184.33333333333334" class="flot-tick-label tickLabel">-0.5</text><text style="position: absolute; text-align: right;" x="5.983333587646484" y="15" class="flot-tick-label tickLabel">1.5</text><text style="position: absolute; text-align: right;" x="5.983333587646484" y="142" class="flot-tick-label tickLabel">0.0</text><text style="position: absolute; text-align: right;" x="5.983333587646484" y="99.66666666666667" class="flot-tick-label tickLabel">0.5</text><text style="position: absolute; text-align: right;" x="5.983333587646484" y="57.333333333333336" class="flot-tick-label tickLabel">1.0</text></g></svg></div></div>
                  </div>
                  
                </div>

                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      Area Chart
                    </h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="area-chart" style="height: 338px; padding: 0px; position: relative;" class="full-width-chart"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 801.5px; height: 338px;" width="801" height="338"></canvas><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 801.5px; height: 338px;" width="801" height="338"></canvas></div>
                  </div>
                  
                </div>

              </div>

              <div class="col-md-6">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      Bar Chart
                    </h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 763.5px; height: 300px;" width="763" height="300"></canvas><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 763.5px; height: 300px;" width="763" height="300"></canvas><div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg style="width: 100%; height: 100%;"><g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><text style="position: absolute; text-align: center;" x="161.1045450730757" y="294" class="flot-tick-label tickLabel">February</text><text style="position: absolute; text-align: center;" x="298.01818258112127" y="294" class="flot-tick-label tickLabel">March</text><text style="position: absolute; text-align: center;" x="430.35681837255305" y="294" class="flot-tick-label tickLabel">April</text><text style="position: absolute; text-align: center;" x="559.7121215300126" y="294" class="flot-tick-label tickLabel">May</text><text style="position: absolute; text-align: center;" x="36.499241915616125" y="294" class="flot-tick-label tickLabel">January</text><text style="position: absolute; text-align: center;" x="684.1257580843838" y="294" class="flot-tick-label tickLabel">June</text></g><g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><text style="position: absolute; text-align: right;" x="8.949999809265137" y="269" class="flot-tick-label tickLabel">0</text><text style="position: absolute; text-align: right;" x="8.949999809265137" y="205.5" class="flot-tick-label tickLabel">5</text><text style="position: absolute; text-align: right;" x="1" y="15" class="flot-tick-label tickLabel">20</text><text style="position: absolute; text-align: right;" x="1" y="142" class="flot-tick-label tickLabel">10</text><text style="position: absolute; text-align: right;" x="1" y="78.5" class="flot-tick-label tickLabel">15</text></g></svg></div></div>
                  </div>
                </div>

                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      Donut Chart
                    </h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="donut-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 763.5px; height: 300px;" width="763" height="300"></canvas><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 763.5px; height: 300px;" width="763" height="300"></canvas><span class="pieLabel" id="pieLabel0" style="position: absolute; top: 69.5px; left: 439.7px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series2<br>30%</div></span><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 209.5px; left: 417.7px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series3<br>20%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 128.5px; left: 258.7px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series4<br>50%</div></span></div>
                  </div>
                </div>
              </div>
            </div> -->
        </div>
    </section>
@endsection
