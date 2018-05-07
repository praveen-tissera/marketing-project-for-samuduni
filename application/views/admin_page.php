<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" />
    

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/style/simple-sidebar.css"); ?>" />

    <!-- jQuery -->
    <script src="<?php echo base_url("assets/bootstrap/js/jquery.js"); ?>"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>

  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript">
$('document').ready(function(){
    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
        
    });
});

</script>
<style type="text/css">
    .red{background-color:#ff0000 !important;}
    .orange{background-color: #ff9900;}
    .blue{background-color: #3366ff;}
    .green{background-color: #33cc33;}
    .purpal{background-color: #ff3399;}
</style>
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Admin Panel
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/inquiry/view_inquiry/all/asc/all')?>">All Inquiries</a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/inquiry/summary_inquery/')?>">Reports</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/user_authentication/logout')?>">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                    <a href="#menu-toggle" class="btn btn-default glyphicon glyphicon-menu-right" id="menu-toggle"></a>
                    
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-6"><h3>Monitoring Table</h3>
                    <!--<table class="table table-striped">
                        <thead>
                            <tr> 
                                <th>Total Number of Inquiries</th> <th>Your Inquiry Count</th> <th>Rate</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <th><?php //echo $total_today_inquiries[0]->inquirycount; ?></th> <th><?php //echo $total_today_inquiries[0]->inquirycount; ?></th> 
                                <th>
                                    <?php 
                                        //if($total_today_inquiries[0]->inquirycount != 0){
                                            //echo ($total_today_inquiries[0]->inquirycount/$total_today_inquiries[0]->inquirycount)*100 . '%';
                                        //}else{echo 0 .'%';}
                                        
                                    ?>
                                </th> 
                            </tr>
                        </tbody>
                            

                        
                    </table>
                    
                    </div>
                    <div class="col-sm-6">
                        <h3 class="form-inline">Custom Report </h3>
                            <div id="reportrange" class="pull-left form-control" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                <span id="daterange"></span> <b class="caret"></b>
                            </div>
                        

                         <table class="table table-striped">
                        <thead>
                            <tr> 
                                <th>Total Number of Inquiries</th> <th>Your Inquiry Count</th> <th>Rate</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <th><?php //echo $total_today_inquiries[0]->inquirycount; ?></th> <th><?php //echo $total_today_inquiries[0]->inquirycount; ?></th> 
                                <th>
                                    <?php 
                                        //if($total_today_inquiries[0]->inquirycount != 0){
                                           // echo ($total_today_inquiries[0]->inquirycount/$total_today_inquiries[0]->inquirycount)*100 . '%';
                                       // }else{echo 0 .'%';}
                                        
                                    ?>
                                </th> 
                            </tr>
                        </tbody>
                            

                        
                    </table> -->

                    </div> 
                    <div class="row">
                        <div class="col-sm-12">
                        <?php //print_r($inquiry_summary_byuser) ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr> <th>Programe</th> <th>Inquiries</th> <th>Success</th> <th>Success Rate</th> <th>Target</th> <th>Target Rate</th> </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($user_target as $targetkey => $targetvalue) {
                                        foreach ($inquiry_summary_byuser as $key => $value) {
                                             if($value['programeid'] == $targetvalue->programeid){
                                                $successrate = round(($value['successcount']/$value['inquirycount'])*100,2);
                                                if($successrate > 76){$class = 'purpal';}
                                                elseif($successrate > 54){$class='green';}
                                                elseif($successrate > 41){$class='blue';}
                                                elseif($successrate > 31){$class='orange';}
                                                else{$class='red';}
                                                echo "<tr class=\"$class\">";
                                                    echo "<td>".  $key . "</td>";
                                                    echo "<td>".  $value['inquirycount'] . "</td>";
                                                    echo "<td>".  $value['successcount'] . "</td>";
                                                    echo "<td>".  round(($value['successcount']/$value['inquirycount'])*100,2) . "%</td>";
                                                    echo "<td>".  $targetvalue->targetcount . "</td>";
                                                    echo "<td>".  round(($value['successcount']/$targetvalue->targetcount)*100,2) . "%</td>";
                                                echo "</tr>"; 
                                            }
                                        }
                                   
                                } ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        if( $("#menu-toggle").attr('class') == 'btn btn-default glyphicon glyphicon-menu-right'){
            $("#menu-toggle").attr('class','btn btn-default glyphicon glyphicon-menu-left');
        }
        else{
             $("#menu-toggle").attr('class','btn btn-default glyphicon glyphicon-menu-right');
        }
    });
    </script>

</body>

</html>
