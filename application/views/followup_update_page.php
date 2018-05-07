

                        <?php
                        if (isset($result)) {
                                    echo "<div class=\"alert alert-info\" role=\"alert\">";
                                        echo $result;
                                    echo "</div>";
                                } 
                        if (isset($result_followup) && isset($result_inquiry) && isset($result_programe)) {
                            //print_r($this->session->userdata['logged_in']);
                            echo form_open('inquiry/update_followup_inquiry'); 
                                echo "<input type=\"hidden\" name=\"inquiryid\" value=\"$result_inquiry->inquiryid\"> ";
                                echo "<div class=\"form-group\">";
                                echo "<h3 class=\"text-capitalize\">This Inquiry Own By {$this->session->userdata['logged_in']['username']}</h3>";  
                                echo "</div>";
                                echo "<div class=\"form-group\">";
                                echo "<label>Inquiry ID</label>";
                                echo "<input type=\"text\" class=\"form-control\" required value=\"" .str_pad($result_inquiry->inquiryid, 5, '0', STR_PAD_LEFT)."\">";
                                echo "</div>";
                                echo "<div class=\"form-group\">";
                                echo "<label>Student Name</label>";
                                echo "<input type=\"text\" name=\"name\" class=\"form-control\" required value=\"$result_inquiry->name\"\">";
                                echo "</div>";
                                echo "<div class=\"form-group\">";
                                echo "<label>Course Selected</label>";
                                echo "<input type=\"text\" name=\"programeid\" class=\"form-control\" required value=\"".$result_programe[0]->programename."\"\">";
                                echo "</div>";
                                echo "<div class=\"form-group\">";
                                echo "<label>Source(Type)</label>";
                                echo "<input type=\"text\" name=\"type\" class=\"form-control\" required value=\"".$result_inquiry->type."\"\">";
                                echo "</div>";
                              
                              
                                echo "<div class=\"form-group\">";
                                echo "<label>Contact Number</label>";
                                echo "<input type=\"text\" name=\"contact\" class=\"form-control\" required value=\"".$result_inquiry->contact."\"\">";
                                echo "</div>";
                                echo "<div class=\"form-group\">";
                                echo "<label>Email Address</label>";
                                
                                echo "<input type=\"text\" name=\"email\" class=\"form-control\" required value=\"".$result_inquiry->email."\"\">";
                                echo "</div>";
                                echo "<div class=\"form-group\">";
                                echo "<label>Information</label>";
                                echo "<textarea name=\"information\" class=\"form-control\" rows=\"3\">" . $result_inquiry->information . "</textarea>";
                                echo "</div>";
                            if($result_followup[0]->followupstatus == 'follow up one'){
                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up Status</label>";
                                
                                echo "<input type=\"text\" name=\"followupstatus\" class=\"form-control\" disabled value=\"".$result_followup[0]->followupstatus."\"\">";
                                echo "</div>";
                              

                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up One Date</label>";
                                
                                echo "<input type=\"text\" name=\"followuponedate\" class=\"form-control\" disabled value=\"".$result_followup[0]->followuponedate."\"\">";
                                echo "</div>";
                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up One Desription</label>";
                                echo "<textarea name=\"followuponedescription\" class=\"form-control\" rows=\"3\" disabled>".$result_followup[0]->followuponedescription."</textarea>";
                                echo "</div>";
                              
                             
                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up Two Desription</label>";
                                echo "<textarea name=\"followuptwodescription\" class=\"form-control\" rows=\"3\"></textarea>";
                                echo "</div>";
                            }
                            else if($result_followup[0]->followupstatus == 'follow up two'){
                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up Status</label>";
                                
                                echo "<input type=\"text\" name=\"followupstatus\" class=\"form-control\" disabled value=\"".$result_followup[0]->followupstatus."\"\">";
                                echo "</div>";
                              

                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up One Date</label>";
                                
                                echo "<input type=\"text\" name=\"followuponedate\" class=\"form-control\" disabled value=\"".$result_followup[0]->followuponedate."\"\">";
                                echo "</div>";

                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up One Desription</label>";
                                
                                echo "<input type=\"text\" name=\"followuponedescription\" class=\"form-control\" disabled value=\"".$result_followup[0]->followuponedescription."\"\">";
                                echo "</div>";

                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up Two Date</label>";
                                
                                echo "<input type=\"text\" name=\"followuptwodate\" class=\"form-control\" disabled value=\"".$result_followup[0]->followuptwodate."\"\">";
                                echo "</div>";

                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up Two Desription</label>";
                                
                                echo "<input type=\"text\" name=\"followuptwodescription\" class=\"form-control\" disabled value=\"".$result_followup[0]->followuptwodescription."\"\">";
                                echo "</div>";

                                echo "<div class=\"form-group\">";
                                echo "<label>Other</label>";
                                
                                echo "<input type=\"text\" name=\"other\" class=\"form-control\" required value=\"".$result_followup[0]->other."\"\">";
                                echo "</div>";
                            }
                            else if($result_followup[0]->followupstatus == 'other'){
                                echo "test";
                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up Status</label>";
                                
                                echo "<input type=\"text\" name=\"followupstatus\" class=\"form-control\" disabled value=\"".$result_followup[0]->followupstatus."\"\">";
                                echo "</div>";
                              

                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up One Date</label>";
                                
                                echo "<input type=\"text\" name=\"followuponedate\" class=\"form-control\" disabled value=\"".$result_followup[0]->followuponedate."\"\">";
                                echo "</div>";

                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up One Desription</label>";
                                
                                echo "<input type=\"text\" name=\"followuponedescription\" class=\"form-control\" disabled value=\"".$result_followup[0]->followuponedescription."\"\">";
                                echo "</div>";

                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up Two Date</label>";
                                
                                echo "<input type=\"text\" name=\"followuptwodate\" class=\"form-control\" disabled value=\"".$result_followup[0]->followuptwodate."\"\">";
                                echo "</div>";

                                echo "<div class=\"form-group\">";
                                echo "<label>Follow Up Two Desription</label>";
                                
                                echo "<input type=\"text\" name=\"followuptwodescription\" class=\"form-control\" disabled value=\"".$result_followup[0]->followuptwodescription."\"\">";
                                echo "</div>";

                                echo "<div class=\"form-group\">";
                                echo "<label>Other</label>";
                                
                                echo "<input type=\"text\" name=\"other\" class=\"form-control\" required value=\"".$result_followup[0]->other."\"\">";
                                echo "</div>";
                            }
                              

                              echo "<button type=\"submit\" class=\"btn btn-block btn-success\">Update This Inquiry</button>";

                             form_close(); 
                         }
                           /* print_r($result_followup);
                            echo '<br>';
                             print_r($result_inquiry);
                             echo '<br>';
                              print_r($result_programe);*/

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
