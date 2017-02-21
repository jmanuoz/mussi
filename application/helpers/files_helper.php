<?php

function subirimagen($name,$tmpname,$path,$nuevoNombre){
		
	$filename = stripslashes($name);
  	$extension = getExtension($filename);
 	$extension = strtolower($extension);
	
	if ($extension != "jpg" && $extension != "jpeg" && $extension != "gif" && $extension != "png"){
           
 	    ?><script languaje="javascript">
	    alert('La imagen <?php echo $img; ?> debe ser del tipo jpg, png o gif');
	    return "";
	    </script><?php 
 	}else{
		
		
	    	    	
	    	$newname=$path.$nuevoNombre.".".$extension;
		$uploadedfile=$tmpname;
		
	    	move_uploaded_file($uploadedfile, $newname);
                
	    	return $nuevoNombre.".".$extension;
		
		
	}
	
		
}

function getExtension($str) {
    $i = strrpos($str,".");
    if (!$i) { return ""; }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}

function subirarchivo($name,$tmpname,$path){
		
	$filename = stripslashes($name);
  	
  	$uploadedfile=$tmpname;
	
	move_uploaded_file($uploadedfile,$path.$filename);
	return $filename;
		
}
