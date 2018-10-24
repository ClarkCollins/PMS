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
                </div>
                <div class="panel-body">
                    <p><b>Total payment per consultant:</b></p>
                    <?php echo form_error('e_date'); ?>
                    <form action="<?php echo site_url() ?>/reports_" enctype="multipart/form-data"  method="post" role="form">
                        <div id="form" class="row">
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
<?php if($staff->result() != null):?>
                    
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="sel1"></label>
                            <a id="printBtn" style="width:72px;text-decoration: none; background-color: white; float: right; margin-bottom: 5px"  href="#"onclick="window.print(); return false;" class="form-control">
                                <i class="fa fa-print" aria-hidden="true"></i> Print
                            </a>
                        </div>
                    </div>   
                        <div class="col-md-12 mb-12s">

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Total amount of payment recieved</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($staff->result() as $value) { ?>
                                    <tr>
                                        <td><?php echo $value->FirstName." ".$value->Lastname ?></td>
                                        <td><?php echo "R ".$value->total ?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td><b>Total:</b></td>
                                        <td>
                                            <?php foreach ($total->result() as $value) { ?> 
                                            <b><?php echo "R ".$value->total ?></b> 
                                                <?php } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php else:?>
                    <div align="center" style="width: 900px; height: 300px;"><br><br><br>
                        No data found.</div>  
<?php endif?>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->



























































































































































































































































































































































































