

                        <?php
                        if (isset($result)) {
                                    echo "<div class=\"alert alert-info\" role=\"alert\">";
                                        echo $result;
                                    echo "</div>";
                                } 
                        if (isset($programme)) {
                            //print_r($this->session->userdata['logged_in']);
                            echo form_open('inquiry/insert_inquiry'); 
                                echo "<div class=\"form-group\">";
                                echo "<h3 class=\"text-capitalize\">This Inquiry Own By {$this->session->userdata['logged_in']['username']}</h3>";  
                              echo "</div>";
                            
                              echo "<div class=\"form-group\">";
                                echo "<label>Student Name</label>";
                                echo "<input type=\"text\" name=\"name\" class=\"form-control\" required placeholder=\"Student Name\">";
                              echo "</div>";
                              echo "<div class=\"form-group\">";
                                echo "<label>Prgramme Selected</label>";
                                //print_r($programme);
                                echo "<select class=\"form-control text-capitalize\" name=\"programmeid\" required>";
                                    
                                        foreach ($programme as $value) {
                                            echo "<option value=\"$value->programeid\">";
                                            echo $value->programename;
                                            echo "</option>";
                                        }
                                    
                                echo "</select>";
                              echo "</div>";
                              echo "<div class=\"form-group\">";
                                echo "<label>Source(Type)</label>";
                                
                                echo "<select class=\"form-control text-capitalize\" name=\"type\" required>";
                                    
                                        
                                            echo "<option value=\"walking\">Walking</option>";
                                            echo "<option value=\"faccebook\">FaceBook</option>";
                                            echo "<option value=\"telephone\">Telephone</option>";
                                            echo "<option value=\"mobile\">Mobile</option>";
                                            echo "<option value=\"email\">Email</option>";
                                            echo "<option value=\"referral\">Referral</option>";
                                            echo "<option value=\"exhibition\">Exhibition</option>";
                                            echo "<option value=\"other\">Other</option>";                                      
                                echo "</select>";
                              echo "</div>";
                              echo "<div class=\"form-group\">";
                                echo "<label>Contact Number</label>";
                                echo "<input type=\"tel\" name=\"contact\" class=\"form-control\" required placeholder=\"Contactable Number\">";
                              echo "</div>";
                              echo "<div class=\"form-group\">";
                                echo "<label>Email Address</label>";
                                echo "<input type=\"email\" name=\"email\" class=\"form-control\" required placeholder=\"Email Address\">";
                              echo "</div>";
                              echo "<div class=\"form-group\">";
                                echo "<label>Information</label>";
                                echo "<textarea name=\"information\" class=\"form-control\" rows=\"3\"></textarea>";
                              echo "</div>";
                              echo "<button type=\"submit\" class=\"btn btn-block btn-success\">Add This Inquiry</button>";

                             form_close(); 
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
