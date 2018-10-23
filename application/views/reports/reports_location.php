<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reports</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-line-chart fa-fw"></i> Reports 
                    <a href="<?php echo site_url() ?>/reports_"> Staff Report</a>
                </div>
                <div class="panel-body">
                    <p><b>Offices with the most payment:</b></p>
                    <?php echo form_error('e_date'); ?>
                    <form action="<?php echo site_url() ?>/reports" enctype="multipart/form-data"  method="post" role="form">
                        <div id="form" class="row">
                            <!--                            <div class="col-md-3 mb-3">
                                                                    <div class="form-group">
                                                                        <label>Location:</label>
                                                                        <select required class="form-control" name="Location">
                                                                            <option value="">--Select location--</option>
                            <?php foreach ($info2->result() as $value) { ?>
                                                                                    <option value="<?php echo $value->OfficeID ?>"><?php echo $value->City ?></option>
                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                        </div>-->
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label>Start Date:</label>
                                    <input required name="s_date" class="form-control" type="date" max="<?php echo date('Y-m-d') ?>" value="<?php if (isset($_POST['s_date'])) echo $_POST['s_date']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label>End date:</label>
                                    <input required name="e_date" class="form-control" type="date" max="<?php echo date('Y-m-d') ?>" value="<?php if (isset($_POST['e_date'])) echo $_POST['e_date']; ?>">

                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <input style="margin-top: 22px" name="upload" id="submit_btn" type="submit" class="form-control" value="Go!"/>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="sel1"></label>
                            <a id="printBtn" style="width:72px;text-decoration: none; background-color: white; float: right"  href="#"onclick="window.print(); return false;" class="form-control">
                                <i class="fa fa-print" aria-hidden="true"></i> Print
                            </a>
                        </div>
                    </div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                                                google.charts.load('current', {'packages': ['corechart']});
                                                google.charts.setOnLoadCallback(drawChart);

                                                function drawChart() {

                                                    var data = google.visualization.arrayToDataTable([
                                                    ['Location', 'Number of payment'],
                                                    [<?php foreach ($info3->result() as $value) { ?>
                                                        'Stutterheim',
    <?php echo $value->location1 ?>
<?php } ?>],
                                                    [<?php foreach ($info4->result() as $value) { ?>
                                                        'Cathcart', <?php echo $value->location2 ?>
<?php } ?>],
                                                    [<?php foreach ($info5->result() as $value) { ?>
                                                        'Queenstown', <?php echo $value->location3 ?>
<?php } ?>]
                                                    ]);

                                                    var options = {
                                                        title: ''
                                                    };

                                                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                                    chart.draw(data, options);
                                                }
                    </script>
                    <?php if ($info3->result() == false && $info4->result() == false && $info5->result() == false): ?>
                        <div style="width: 900px; height: 500px;" id="div_display" align="center" class="col-md-12 mb-12"><br><br><br><br>
                            No data found.
                        </div>
                    <?php else: ?>
                        <div id="piechart" style="width: 700px; height: 500px;"></div>       
                    <?php endif ?>
                </div>
                <!--            <=========================start of second panel body=============================>    -->
               
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->



















































































































































































































































































































































