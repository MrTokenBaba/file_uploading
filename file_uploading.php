<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<?php 
	if( isset ($_POST["submit"] ) ){
				
		$file_name = $_FILES["upload"]["name"];
		$tmp_name = $_FILES["upload"]["tmp_name"];
		$folder = "upload_files";
		$destination =  $folder."/".$file_name;
	
			$file_info = pathinfo( $file_name) ;
			$extension =  $file_info['extension'] ;
				
					
				if($_FILES["upload"]["size"] /1024 < 1024){
					
					if( $extension == "jpg" || $extension == "gif" || $extension == "jpeg" || $extension == "png" )
					{
						if(!is_dir ( $folder ) )
						{
							if( mkdir( $folder ) )
							{
								if( move_uploaded_file( $tmp_name , $destination ) )
								{
									echo "file uploaded !!!!";
										
								}	// close move_uploaded_file( $tmp_name , $destination )
								else
								{
									echo "file not moved !!!";
								}
							} // close mkdir( $folder )
							else
							{
								echo " folder not created!!!!";
										}		
						}// close !is_dir ( $folder ) 
						else
						{
							echo "wrong path!!!!";
						}
						
					}
					else  // close $extension == "jpg" || $extension == "gif" || $extension == "jpeg" || $extension == "png"
					{
						echo "only upload jpg , gif , jpeg , png";
					}
					
				} // close $_FILES["upload"]["size"] /1024 < 1024
				else
				{
					echo "file can't be uploaded file size to big";
				}
		}		//close isset ($_POST["submit"]
	
	?>
<body>

	<form action="file_uploading.php" method="post"  enctype="multipart/form-data">
    
    		<input type="file" name="upload" / >
        	<input type="submit" name="submit" />
        
    	</form>
</body>
</html>
