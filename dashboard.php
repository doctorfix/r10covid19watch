  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Dashboard</h1>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                      <div class="inner">
                          <h3 id="totaldiagnosed">0</h3>

                          <p>Total Covid Cases</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-person-add"></i>
                      </div>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                      <div class="inner">
                          <h3 id="totalvaccinated">0</h3>

                          <p>Total Vaccinated</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-checkmark-circled"></i>
                      </div>

                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                      <div class="inner">
                          <h3 id="totalsymptomatic">0</h3>

                          <p>Total Symptomatic</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-sad"></i>
                      </div>

                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                      <div class="inner">
                          <h3 id="totalasymptomatic">0</h3>

                          <p>Total Asymptomatic</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-happy"></i>
                      </div>

                  </div>
              </div>
              <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
              <!-- Left col -->
              <section class="col-lg-6 connectedSortable">
                  <div class="card card-danger">
                      <div class="card-header">
                          <h3 class="card-title">Case by Gender</h3>

                      </div>
                      <div class="card-body">
                          <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </section>
              <section class="col-lg-6 connectedSortable">
                  <div class="card card-success">
                      <div class="card-header">
                          <h3 class="card-title">Case by Age Group</h3>

                      </div>
                      <div class="card-body">
                          <div class="chart">
                              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </section>
              <section class="col-lg-6 connectedSortable">
                  <div class="card card-warning">
                      <div class="card-header">
                          <h3 class="card-title">Case by Nationality</h3>

                      </div>
                      <div class="card-body">
                          <canvas id="pieChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </section>
              <section class="col-lg-6 connectedSortable">
                  <div class="card card-info">
                      <div class="card-header">
                          <h3 class="card-title">Minor VS Adult</h3>

                      </div>
                      <div class="card-body">
                          <canvas id="pieChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </section>
              <!-- right col -->
          </div>
          <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  <script>
      $(function() {


          $.ajax({
                  method: "POST",
                  url: window.location.pathname + "api/dashboard.php",
              })
              .done(function(response) {
                  let dashboarddata = [];
                  dashboarddata = response[0];
                  //   console.log();
                  $("#totaldiagnosed").text(parseInt(dashboarddata.totaldiagnosed).toLocaleString());
                  $("#totalvaccinated").text(parseInt(dashboarddata.totalvaccinated).toLocaleString());
                  $("#totalsymptomatic").text(parseInt(dashboarddata.totalsymptomatic).toLocaleString());
                  $("#totalasymptomatic").text(parseInt(dashboarddata.totalasymptomatic).toLocaleString());

                  let pieData = {
                      labels: [
                          'Male', 'Female'
                      ],
                      datasets: [{
                          data: [dashboarddata.totalmale, dashboarddata.totalfemale],
                          backgroundColor: ['#f56954', '#00a65a'],
                      }]
                  }

                  let pieData2 = {
                      labels: [
                          'FILIPINO', 'FOREIGNER'
                      ],
                      datasets: [{
                          data: [dashboarddata.totallocal, dashboarddata.totalforeigner],
                          backgroundColor: ['#f39c12', '#00c0ef'],
                      }]
                  }

                  let pieData3 = {
                      labels: [
                          'MINOR', 'ADULT'
                      ],
                      datasets: [{
                          data: [dashboarddata.totalminor, dashboarddata.totaladult],
                          backgroundColor: ['#3c8dbc', '#d2d6de'],
                      }]
                  }


                  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
                  var pieChartCanvas2 = $('#pieChart2').get(0).getContext('2d');
                  var pieChartCanvas3 = $('#pieChart3').get(0).getContext('2d');
                  var pieOptions = {
                      maintainAspectRatio: false,
                      responsive: true,
                  }
                  //Create pie or douhnut chart
                  // You can switch between pie and douhnut using the method below.
                  new Chart(pieChartCanvas, {
                      type: 'pie',
                      data: pieData,
                      options: pieOptions,

                  })

                  new Chart(pieChartCanvas2, {
                      type: 'pie',
                      data: pieData2,
                      options: pieOptions,

                  })

                  new Chart(pieChartCanvas3, {
                      type: 'pie',
                      data: pieData3,
                      options: pieOptions,

                  })
              });

          $.ajax({
                  method: "POST",
                  url: window.location.pathname + "api/dashboardagegroup.php",
              })
              .done(function(response) {
                  barchartdata = response[0];
                  var data = {
                      labels: Object.keys(barchartdata),
                      datasets: [{
                              label: 'Age',
                              backgroundColor: 'rgba(60,141,188,0.9)',
                              borderColor: 'rgba(60,141,188,0.8)',
                              pointRadius: false,
                              pointColor: '#3b8bba',
                              pointStrokeColor: 'rgba(60,141,188,1)',
                              pointHighlightFill: '#fff',
                              pointHighlightStroke: 'rgba(60,141,188,1)',
                              data: Object.values(barchartdata)
                          }
                      ]
                  }



                  var barChartCanvas = $('#barChart').get(0).getContext('2d')
                  var barChartData = $.extend(true, {}, data)
                  var temp0 = data.datasets[0]
                  barChartData.datasets[0] = temp0

                  var barChartOptions = {
                      responsive: true,
                      maintainAspectRatio: false,
                      datasetFill: false
                  }

                  new Chart(barChartCanvas, {
                      type: 'bar',
                      data: barChartData,
                      options: barChartOptions
                  })
              });






      });
  </script>