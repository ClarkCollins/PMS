<?php if ($this->session->flashdata('flash_Success')): ?>
<h1>Client Added</h1>
<?php endif ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Client</h1>
        </div>
    </div>
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <i class="fa fa-users fa-fw"></i> Client List
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <a href="<?php echo site_url() ?>/add_client" class="btn btn-info pull-right" role="button">Add New Client</a><br><br>
                                
                                <thead>
                                    <tr>
                                        <th>Policy No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($allClient->result() as $value) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $value->PolicyNumber; ?></td>
                                        <td><?php echo ucfirst($value->FirstName); ?></td>
                                        <td><?php echo ucfirst($value->Lastname); ?></td>
                                        <td class="center"><?php echo $value->Status; ?></td>
                                        <td class="center">Delete</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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





































































































































