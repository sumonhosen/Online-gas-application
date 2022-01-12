<?php
	
        if(isset($_GET["user_dwn_file"])){

            $file = urldecode($_GET["user_dwn_file"]); 


            if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)){

                $filepath = "upload/admin/" . $file;

                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($filepath));
                    flush(); 
                    readfile($filepath);
            }else{
                http_response_code(404);
                die();
            }
        } 
       if(isset($_GET["admin_dwn_file"])){

            $file = urldecode($_GET["admin_dwn_file"]); 


            if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)){

                $filepath = "upload/user/" . $file;

                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($filepath));
                    flush(); 
                    readfile($filepath);
            }else{
                http_response_code(404);
                die();
            }
        } 


?>