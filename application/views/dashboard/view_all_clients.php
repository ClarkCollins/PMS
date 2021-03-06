<?php if ($this->session->flashdata('flash_Success')): ?>
    <h4 style="text-align: center; color: green"><?php echo $this->session->flashdata('flash_Success') ?></h4>
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
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allClient->result() as $value) { ?>
                                <tr class="odd gradeX">
                                    <td><?php echo "SENZO" . $value->PolicyNumber; ?></td>
                                    <td><?php echo ucfirst($value->FirstName); ?></td>
                                    <td><?php echo ucfirst($value->Lastname); ?></td>
                                    <td><?php foreach ($memType->result() as $value1) { ?>
                                        <?php if ($value->MembershipID == $value1->MembershipID): ?>
                                        <?php echo $value1->TypeName; ?>
                                        <?php endif?>
                                        <?php } ?>
                                    </td>
                                    <td class="center">
                                        <?php if ($value->MembershipID == "1"): ?>
                                        <a class="fa fa-pencil-square-o" title="Edit" href="<?php echo site_url() ?>/update_client_page/
                                           <?php echo $value->IDNo ?>/
                                            <?php echo $value->FirstName ?>/
                                           <?php echo $value->Lastname ?>/
                                           <?php echo $value->ContactNo ?>/
                                           <?php echo $value->DOB ?>/
                                           <?php echo $value->Gender ?>/
                                           <?php echo $value->PicturePath ?>/
                                           ">
                                        </a> /
                                        <?php else: ?>
                                        <a class="fa fa-pencil-square-o" title="Edit" href="<?php echo site_url() ?>/update_dependent_page/
                                           <?php echo $value->IDNo ?>/
                                            <?php echo $value->FirstName ?>/
                                           <?php echo $value->Lastname ?>/
                                           <?php echo $value->ContactNo ?>/
                                           <?php echo $value->DOB ?>/
                                           <?php echo $value->Gender ?>/
                                           <?php echo $value->PicturePath ?>/
                                           <?php echo $value->MembershipID ?>/
                                           ">
                                        </a> /
                                        <?php endif ?> 
                                        <?php if ($value->MembershipID == "1"): ?>
                                            <a class="fa fa-plus"  href="<?php echo site_url() ?>/add_dependent/<?php echo $value->PolicyNumber ?>/<?php echo $value->ContactNo ?>" title="Add dependent"></a> /
                                        <?php else: ?>
                                        <?php endif ?> 
                                            <?php if ($value->MembershipID == "1"): ?>
                                        <a class="fa fa-trash" title="Delete" href="<?php echo site_url() ?>/delete/<?php echo $value->PolicyNumber ?>"onclick="return confirm('Are you sure you want to delete this item?');"></a> /
                                            <?php else: ?>
                                        <a class="fa fa-trash" title="Delete" href="<?php echo site_url() ?>/delete_/<?php echo $value->IDNo ?>/<?php echo $value->PolicyNumber ?>"onclick="return confirm('Are you sure you want to delete this item?');"></a> /
                                        <?php endif ?>
                                        <?php if ($value->MembershipID == "1"): ?>
                                        <a href="<?php echo site_url() ?>/payment/
                                           <?php echo $value->IDNo ?>/
                                           <?php echo $value->PolicyNumber ?>/
                                           <?php echo $value->FirstName ?>/
                                           <?php echo $value->Lastname ?>/
                                           <?php echo $value->Premium ?>/
                                           <?php echo $value->Payed ?>/
                                           " title="Make payment">
                                            Payment</a> /
                                        <?php else: ?>
                                        <?php endif ?>
                                        <a href="<?php echo site_url() ?>/client_details/
                                            <?php echo $value->FirstName ?>/
                                           <?php echo $value->Lastname ?>/
                                           <?php echo $value->ContactNo ?>/
                                           <?php echo $value->DOB ?>/
                                           <?php echo $value->Gender ?>/
                                           <?php echo $value->PicturePath ?>/
                                           <?php echo $value->MembershipID ?>/
                                           <?php echo $value->IDNo ?>/
                                           <?php echo $value->Payed ?>/
                                           " title="View details">View</a>
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





































































































































































































































































