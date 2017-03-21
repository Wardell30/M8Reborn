<?php 
    include('session.php');
    require_once('sidebar.php'); 
    require_once('topnavbar.php');

//here comes the mysql part

/* Course

<div class="business-card" id="course1">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="circleCourse">G</div>
                                                </div>
                                                <div class="media-body coursePanel">
                                                    <h2 class="media-heading courseName">Gestão</h2>
                                                    <div class="job">DEGI</div>
                                                    <div class="mail">Bachelor Degree (3 years)</div>
                                                    <div class="expandUC"><a href="#ucs1" data-toggle="collapse">Learn More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="ucs1" class="collapse">
                                            <div class="row">
                                                <div class="col-md-10 col-sm-offset-1">
                                                    <div class="card">
                                                        <div class="business-card">
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <img class="media-object img-circle profile-img" src="images/teachers/clobo.png">
                                                                </div>
                                                                <div class="media-body coursePanel">
                                                                    <h2 class="media-heading courseName">Coordenator: Carla Lobo</h2>
                                                                    <div class="description">Este curso pretende garantir aos licenciados em Gestão uma formação integrada e sequencial que consubstancie uma aprendizagem progressivamente orientada para o exercício autónomo das suas funções profissionais complementadas com uma cidadania exemplar. Em particular, procura-se garantir:
o desenvolvimento de competências na área das ciências empresariais;
a utilização dos instrumentos de análise económica no contexto empresarial;
a formação interdisciplinar imprescindível ao bom desempenho de uma atividade no âmbito empresarial, nas áreas científicas do Direito, Matemática e Estatística e Informática</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="business-card uccourse">
                                                            <a href="#semester11" data-toggle="collapse">1st Year</a>
                                                        </div>
                                                    </div>
                                                    <div class="row collapse" id="semester11">
                                                        <div class="col-md-10 col-sm-offset-1">
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc11" data-toggle="collapse">1st Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc21" data-toggle="collapse">2nd Semester</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="business-card uccourse">
                                                            <a href="#semester21" data-toggle="collapse">2nd Year</a>
                                                        </div>
                                                    </div>
                                                    <div class="row collapse" id="semester21">
                                                        <div class="col-md-10 col-sm-offset-1">
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc31" data-toggle="collapse">1st Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc41" data-toggle="collapse">2nd Semester</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="business-card uccourse">
                                                            <a href="#semester31" data-toggle="collapse">3rd Year</a>
                                                        </div>
                                                    </div>
                                                    <div class="row collapse" id="semester31">
                                                        <div class="col-md-10 col-sm-offset-1">
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc51" data-toggle="collapse">1st Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc61" data-toggle="collapse">2nd Semester</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



*/


/*  UCS

    <div class="row collapse" id="uc11">
        <div class="col-md-8 col-sm-offset-1">
            <div class="card">
                <div class="business-card uccourse">
                    Contabilidade Geral (5 ECTS)
                </div>
            </div>
        </div>
    </div>

*/

?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"><?php echo $_SESSION['login_user']; ?> Courses</h4>
                                    </div>
                                    <div class="content all-icons">
                                        
                                    </div>
                                </div>
                                <button class="w3-button w3-xlarge w3-circle w3-blue w3-hover-indigo w3-card-4 addBtn" id="addCourse">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php require_once('footer.php'); ?>

                <script type="text/javascript">
                    $(document).ready(function () {
                        var jsonObj;
                        $("#addCourse").click(function(){
                            $.getJSON("teachers.json", function(json) {
                                jsonObj = json;
                            });
                            $('#addCourses').modal('show');
                        });
                    });
                </script>
</html>
