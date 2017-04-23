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
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Work Load</h4>
                                        <p class="category">Project from one UC</p>
                                    </div>
                                    <div class="content">
                                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                        <div class="footer">
                                            <div class="legend">
                                                <i class="fa fa-circle text-info"></i> Task 1
                                                <i class="fa fa-circle text-danger"></i> Task 2
                                                <i class="fa fa-circle text-warning"></i> Task 3
                                            </div>
                                            <hr>
                                            <div class="stats">
                                                <i class="fa fa-clock-o"></i> Last updated n minutes ago
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php require_once('footer.php'); ?>

<script type="text/javascript">
    	$(document).ready(function(){
        	m8reborn.initChartist();
        });
	</script>
</html>
