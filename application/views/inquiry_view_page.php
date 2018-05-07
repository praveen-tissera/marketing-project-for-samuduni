

                        <?php
                        if (isset($result)) {
                                    echo "<div class=\"alert alert-info\" role=\"alert\">";
                                        echo $result;
                                    echo "</div>";
                                } 
                        if (isset($result_display)) {

                                
                           //print_r($result_display);
                            echo "<table class=\"table\">"; 
                                echo "<thead>";

                                    echo "<tr>";
                                        echo "<th>Inquiry ID</th><th>Register ID</th><th>Register Date/Time</th> <th>Student Name</th> <th>Inqury Type</th> <th>Programme Code</th><th>Contact Number</th><th>Email</th><th>Information</th><th>Date/Time</th><th>Follow Up 1</th><th>Follow Up 1 Description</th><th>Follow Up 2</th><th>Follow Up 2 Description</th><th>Other</th><th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach ($result_display as $value) {
                                        if($value->status == 'info'){
                                            $link = "<a class=\"btn btn-success btn-xs\" href=\"". base_url("index.php/inquiry/convert_inquiry/success/$value->inquiryid")."\">Success</a>";
                                        }
                                        else if($value->status == 'follow up' ){

                                            $link = "<a class=\"btn btn-danger btn-xs\" href=\"" . base_url("index.php/inquiry/convert_inquiry/followup/$value->inquiryid")."\">Follow Up</a><hr>" . "<a class=\"btn btn-info btn-xs\" href=\"" . base_url("index.php/inquiry/convert_inquiry/register/$value->inquiryid")."\">Register</a> ";
                                        }
                                        else if($value->status == 'none'){
                                            
                                            $link = "<a class=\"btn btn-danger btn-xs\" href=\"" . base_url("index.php/inquiry/convert_inquiry/followup/$value->inquiryid")."\">Follow Up</a> ";
                                        }
                                        else if ($value->status == 'success') {
                                            $link = "<a href=\"#\" class=\"btn btn-warning btn-xs\">Completed</a>";
                                        }

                                       $inquirydate=date_create($value->datetime);
                                            
                                            if($value->status == 'follow up' || $value->status == 'none'){
                                                $currentdate=date_create(date("Y-m-d H:i:s"));
                                                $diff=date_diff($inquirydate,$currentdate);
                                                echo $diff->days;
                                                if($diff->days <=3){
                                                    $value->status = 'orange';
                                                }elseif ($diff->days >= 4 && $diff->days <= 7 ) {
                                                    $value->status = 'brown';
                                                }elseif ($diff->days >= 8 && $diff->days <= 14 ) {
                                                    $value->status = 'red';
                                                }elseif ($diff->days>=15) {
                                                    $value->status = 'black';
                                                }


                                            }
                                            
                                   echo "<tr class=\"$value->status\">";
                                        

                                        echo "<th scope=\"row\">" . str_pad($value->inquiryid, 5, '0', STR_PAD_LEFT) ."</th><td>"; if(isset($value->registercode)){echo $value->registercode;}
                                        echo "</td><td>";
                                        if(isset($value->registerdate)){echo $value->registerdate;}
                                        echo "</td><td>$value->name</td> <td>$value->type</td><td>$value->programename</td><td>$value->contact</td><td>$value->email</td><td>$value->information</td><td>$value->datetime</td><td>$value->followuponedate</td><td>$value->followuponedescription</td><td>$value->followuptwodate</td><td>$value->followuptwodescription</td><td>$value->other</td><td>$link</td>";
                                   echo "</tr>";
                                 }
                                    
                                echo "</tbody>";
                            echo "</table>";
                        }
                        

                         ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        if( $("#menu-toggle").attr('class') == 'btn btn-default btn-sm glyphicon glyphicon-menu-right'){
            $("#menu-toggle").attr('class','btn btn-default btn-sm glyphicon glyphicon-menu-left');
        }
        else{
             $("#menu-toggle").attr('class','btn btn-default btn-sm glyphicon glyphicon-menu-right');
        }
    });
    </script>

</body>

</html>
