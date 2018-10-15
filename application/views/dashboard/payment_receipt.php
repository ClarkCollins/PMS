
<!------ Include the above in your HEAD tag ---------->
<html>
    <head>
        <title>Payment receipt</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png" sizes="32x32">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <style>
            body {
                margin-top: 20px;
            }
            .left {
                width:200px;
                display:inline-block;
                overflow: auto;
                white-space: nowrap;
                margin:0px auto;
                border:1px red solid;
            }

        </style>
        <div id="left">
            <button onclick="printDiv('print')" style='float: right; margin-right: 200px' type="button" class="btn btn-success">
                Print Invoice   <span class="glyphicon glyphicon-chevron-right"></span>
            </button>
        </div>

        <div id="print"  class="container">
            <div   class="row">
                <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <address>
                                <strong>SENZOKUHLE FUNERSL SERVICE </strong>
                                <br>
                                2135 Sunset Blvd
                                <br>
                                Los Angeles, CA 90026
                                <br>
                                <abbr title="Phone">P:</abbr> (+27)71-353-5461
                            </address>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <p>
                                <em>Date: 1st November, 2013</em>
                            </p>
                            <p>
                                <em>Invoice No. 34522677W</em>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <h1>Invoice</h1>
                        </div>
                        </span>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Policy No.</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-4"><em>Sibusiso Nkonkobe</em></h4></td>
                                    <td class="col-md-2"> 2 </td>
                                    <td class="col-md-1 text-center">R13</td>
                                    <td class="col-md-1 text-center">R26</td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td class="text-right">
                                        <p>
                                            <strong>Subtotal: </strong>
                                        </p>
                                        <p>
                                            <strong>Tax: </strong>
                                        </p></td>
                                    <td class="text-center">
                                        <p>
                                            <strong>R6.94</strong>
                                        </p>
                                        <p>
                                            <strong>R6.94</strong>
                                        </p></td>
                                </tr>
                                <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                    <td class="text-center text-danger"><h4><strong>R31.53</strong></h4></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function printDiv(print) {
                var printContents = document.getElementById(print).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
    </body>
</html>
