<?php

if(isset($_POST['firstname'])){
	$resp = array();

	$resp['fname'] = $_POST['firstname'];

	echo json_encode($resp);
}



/*if(isset($_FILES)){
	//$resp = array('payload' => 'fname: '.$_POST['firstname']);

	//echo json_encode($resp);

	$ds = DIRECTORY_SEPARATOR;  //1
	 
	$storeFolder = 'uploads';   //2
	 
	if (!empty($_FILES)) {
	     
	    $tempFile = $_FILES['file']['tmp_name'];

	    foreach($tempFile as $key => $tmp_name)
			{
			    $file_name = $key.$_FILES['file']['name'][$key];
			    $file_size =$_FILES['file']['size'][$key];
			    $file_tmp =$_FILES['file']['tmp_name'][$key];
			    $file_type=$_FILES['file']['type'][$key];  
			    move_uploaded_file($file_tmp,"uploads/".time().$file_name);
			}   

	    echo json_encode($tempFile);       //3             
	     
	}
}*/

if(isset($_FILES)){
	//$resp = array('payload' => 'fname: '.$_POST['firstname']);

	//echo json_encode($resp);

	$ds = DIRECTORY_SEPARATOR;  //1
	 
	$storeFolder = 'uploads';   //2
	 
	if (!empty($_FILES)) {
	     
	    $tempFile = $_FILES['file']['tmp_name'];

	    $file_name = $_FILES['file']['name'];

	    move_uploaded_file($tempFile,"uploads/".time().$file_name);  

	    echo json_encode($tempFile);       //3             
	     
	}
}


