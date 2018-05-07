<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page</title>

    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
  



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
    <style type="text/css">
        table{font-size: 11px;}
       table a {font-size: 9px !important;}
       a {font-size: 12px !important;}
       .orange{background-color:#ffc966 }
       .brown{background-color: #ff8000;}
       .red{background-color: #ffb3b3;}
       .black{background-color: #333333;color: #fff;}
    </style>
    <!-- jQuery -->
    <script src="<?php echo base_url("assets/bootstrap/js/jquery.js"); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script src="https://use.fontawesome.com/b4e2e47a22.js"></script>
    <script type="text/javascript">
        function searchdetail(value){
            
            var searchval = value;
            document.getElementById('type').value = searchval; 
            if($('#search').val() != ''){
                document.getElementById('searchform').submit();
            }
            else{
                alert('Fill Your Search Rquirment');
            }
            
        }
        
    </script>
    <script>
        $(document).ready(function (){
            
            $('#followup').on('click',function(){
                
                var strToSearch = $('#new').attr('class');
                var strActive = 'active';
                var daterange = encodeURIComponent($('#daterange').html());
                
                if(strToSearch.indexOf(strActive) != -1){
                    var link = '<?php echo base_url("index.php/inquiry/view_inquiry/all/desc/");?>'+daterange;
                }
                else{
                    var link = '<?php echo base_url("index.php/inquiry/view_inquiry/all/asc/");?>'+daterange;
                }

    
                window.open(link,'_parent');
                return false;
            });

            $('#register').on('click',function(){
                
                var strToSearch = $('#new').attr('class');
                var strActive = 'active';
                var daterange = $('#daterange').html();
               
                if(strToSearch.indexOf(strActive) != -1){
                    var link = '<?php echo base_url("index.php/inquiry/view_inquiry/register/desc/");?>'+daterange;
                }
                else{
                    var link = '<?php echo base_url("index.php/inquiry/view_inquiry/register/asc/");?>'+daterange;
                }

    
                window.open(link,'_parent');
                return false;
            });

            $('#success').on('click',function(){
                
                var strToSearch = $('#new').attr('class');
                var strActive = 'active';
                var daterange = $('#daterange').html();
               
                if(strToSearch.indexOf(strActive) != -1){
                    var link = '<?php echo base_url("index.php/inquiry/view_inquiry/success/desc/");?>'+daterange;
                }
                else{
                    var link = '<?php echo base_url("index.php/inquiry/view_inquiry/success/asc/");?>'+daterange;
                }

    
                window.open(link,'_parent');
                return false;
            });
           
        });
        

    </script>
    <script>
        

    </script>
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript">
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
</script>

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
        <div id="page-content-wrapper" style="overflow: auto;">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-sm-6">
                    
                    <a href="#menu-toggle" class="btn btn-default btn-sm glyphicon glyphicon-menu-right" id="menu-toggle"></a>
                    <a href="<?php echo base_url('index.php/inquiry/insert_inquiry/')?>" class="btn btn-default btn-sm">Enter Inquiry</a> &nbsp;
                    <a href="#" class="btn btn-danger btn-sm" id="followup">Follow Up</a> &nbsp;
                    <a href="<?php echo base_url('index.php/inquiry/view_inquiry/register/asc')?>" class="btn btn-info btn-sm" id="register">Register List</a>&nbsp;
                    <a href="<?php echo base_url('index.php/inquiry/view_inquiry/success/asc')?>" class="btn btn-success btn-sm" id="success">Success List</a>
                   
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary btn-xs <?php echo (isset($recorde_order) && $recorde_order == 'desc')? 'active':'none' ?>"  id="new">
                        <input type="radio"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Newest
                      </label>
                      <label class="btn btn-primary btn-xs <?php echo (isset($recorde_order) && $recorde_order == 'asc')? 'active': 'none'; ?>" id="old">
                        <input type="radio"> <i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Older
                      </label>
                    </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                       <!--  <input type="text" name="daterange" id="daterange" value="01/01/2015 - 01/31/2015"  class="form-control" /> -->

                        <div id="reportrange" class="pull-right form-control" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                            <span id="daterange"></span> <b class="caret"></b>
                        </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <form action="<?php echo base_url('index.php/inquiry/inqirysearch')?>" method="post" id="searchform">
                        <input type="hidden" name="searchtype" id="type">
                            <div class="input-group form-inline"> 
                                <input id="search" name="search" class="form-control" aria-label="Text input with dropdown button" required> 
                                <div class="input-group-btn"> <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search <span class="caret"></span></button> 
                                <ul class="dropdown-menu dropdown-menu-right"> 
                                    <li><a id="stdname"  href="#" onclick="searchdetail('From Student Name');">From Student Name</a></li> 
                                    <li><a id="type" href="#" onclick="searchdetail('From Type');">From Type</a></li> 
                                    <li><a id="programename" href="#"" onclick="searchdetail('From Programe Name');">From Programe Name</a></li> 
                                    <li role="separator" class="divider"></li> <li><a href="#">Separated link</a></li> 
                                </ul> 
                                </div> 
                            </div>
                        </form>
                         
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                    


                   

                    <hr>

                        

   

</body>

</html>
