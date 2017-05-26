<?php
    include('session.php');
    require_once('sidebar.php');
    require_once('topnavbar.php');

//aqui vai ter grafico com profs com numero de bac, mas e phd
//grafico com numero de alunos inscritos por departamento
//
?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Work Load</h4>
                                    </div>
                                    <div class="content">
                                      <div class="box box-warning" id="changeColor">
                                        <div class="box-header with-border">
                                          <h3 class="box-title" id="ProjectUCTitle">UC 1</h3>
                                          <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" id="leftUCBtn"><i class="fa fa-angle-left fa-2x"></i></button>
                                            <button type="button" class="btn btn-box-tool" id="rightUCBtn"><i class="fa fa-angle-right fa-2x"></i></button>
                                          </div>

                                        </div>
                                        <div class="box-body">
                                          <canvas id="pieChart" style="height:250px"></canvas>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                              <div class="col-md-6">
                                <div class="card">
                                    <div class="content">
                                      <div class="box box-info">
                                        <div class="box-header with-border">
                                          <h3 class="box-title">Line Chart</h3>

                                        </div>
                                        <div class="box-body">
                                          <div class="chart">
                                            <canvas id="lineChart" style="height:250px"></canvas>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                  <div class="card">
                                      <div class="header">
                                          <h4 class="title">Notes By UC</h4>
                                      </div>
                                      <div class="content">
                                        <div class="box box-warning">
                                          <div class="box-body">
                                            <canvas id="notesUC" style="height:250px"></canvas>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php require_once('footer.php'); ?>

                <script src="js/charts.js" type="text/javascript"></script>
</html>
