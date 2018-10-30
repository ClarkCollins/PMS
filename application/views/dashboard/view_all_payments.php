<?php if ($this->session->flashdata('flash_Success')): ?>
    <h4 style="text-align: center; color: green"><?php echo $this->session->flashdata('flash_Success') ?></h4>
<?php endif ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Payment</h1>
        </div>
    </div>
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <i class="fa fa-money fa-fw"></i> Payment List
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
<!--                                <a href="<?php echo site_url() ?>/make_payment" class="btn btn-info pull-right" role="button">Make Payment</a><br><br>-->
                                
                                <thead>
                                    <tr>
                                        <th>Invoice No.</th>
                                        <th>Client Name</th>
                                        <th>Staff</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach ($payment->result() as $value) { ?>
                                    
                                    <tr class="odd gradeX">
                                        <td> <?php echo $value->InvoiceID ?></td>
                                        <td> <?php echo $value->FirstName." ".$value->Lastname ?></td>
                                        <td> <?php echo $value->fname." ".$value->lname ?></td>
                                        <td> <?php echo "R".$value->Amount?></td>
                                        <td class="center"> <?php echo $value->Date ?></td>
                                        <td><a class="fa fa-print" target="blank_" href="<?php echo site_url() ?>/view_payment/
                                                                  <?php echo $value->FirstName ?>/
                                                                  <?php echo $value->Lastname ?>/
                                                                  <?php echo $value->fname ?>/
                                                                  <?php echo $value->lname ?>/
                                                                  <?php echo $value->InvoiceID ?>/
                                                                  <?php echo $value->Street ?>/
                                                                  <?php echo $value->City ?>/
                                                                  <?php echo $value->Code ?>/
                                                                  <?php echo $value->Date ?>/
                                                                  <?php echo $value->PolicyNumber ?>/
                                                                  <?php echo $value->Amount ?>/
                                                                  <?php echo $value->Time ?>/"
                                                              > Print</a></td>
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


























































































































































































