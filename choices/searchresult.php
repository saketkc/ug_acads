<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}
    if (isset($_POST['dep'])){
	$dep = $_POST['dep'];
}
    
   

            
                            if ($dep=="Chemical (B.Tech) 2009 Batch")
                            {
                       header( 'Location: https://docs.google.com/spreadsheet/embeddedform?formkey=dEhhWWxSOWdTbmxBQkpQcEpJOW1kLXc6MQ' ) ;
                            }
                            if ($dep=="Chemical (DD) 2009 Batch")
                            {
                                header( 'Location: https://docs.google.com/spreadsheet/embeddedform?formkey=dEhhWWxSOWdTbmxBQkpQcEpJOW1kLXc6MQ' ) ;
                            }
                             if ($dep=="Civil (B.Tech) 2009 Batch")
                            {
                                header( 'Location: https://docs.google.com/spreadsheet/embeddedform?formkey=dE5VV1dvR0FmekxQVzVCOVpPTWtDVVE6MQ' ) ;
                            }
                            if ($dep=="CSE 2009 Batch")
                            {
                                header( 'Location: https://docs.google.com/spreadsheet/embeddedform?formkey=dEFHNERZYjV0bXFHRzRZeExqTFdBdUE6MQ' ) ;
                            }
                            if ($dep=="Electrical B.Tech 2009 Batch")
                            {
                                header( 'Location: https://docs.google.com/spreadsheet/embeddedform?formkey=dG0tTlhzMEMxYnVfTlJiMEh4QmgtUGc6MQ' ) ;
                            }
                             if ($dep=="Electrical DD-CSP 2009 Batch")
                            {
                                header( 'Location: https://docs.google.com/spreadsheet/embeddedform?formkey=dDVjNlNQem8xV2JPUmgzWVhmWTA1VkE6MQ' ) ;
                            }
                             if ($dep=="Electrical DD-Micro 2009 Batch")
                            {
                                header( 'Location: https://docs.google.com/spreadsheet/embeddedform?formkey=dFJuLWdGaThIQUpFUjFJckUzV3Y1ZWc6MQ' ) ;
                            }
                            
                        
                        
                          
           
                    
                       
                ?> 
         
            


