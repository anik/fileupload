<?php
/*
* @ Upload And Unzip File Using PHP
* @Author #Anik Biswas
* @www.renoyes.com
*/

$name = "";
if(isset($_POST['hidden'])){
		
		//Upload the File in Directory
		$temp = explode(".", $_FILES["file"]["name"])[1]; //Get the extension
		if($temp == "zip"){
			move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"].".zip") or die("Couldn't upload. Check permissions and retry. \n");
			$name = $_FILES["file"]["name"].".zip";
			}
		
		
		// Unzip File 
		$path = pathinfo(realpath($name), PATHINFO_DIRNAME);
		$zip = new ZipArchive;
		$res = $zip->open($name);
		if ($res === TRUE) {
		  // extract it to the path we determined above
		  $zip->extractTo($path);
		  $zip->close();
		  echo "WOOT! $name extracted to $path \n";
		} else {
		  echo "Doh! I couldn't open $name \n";
		}
		
		
		
		//Delete The Zip File
		if (!unlink($name)){ echo ("Error deleting $file \n"); }
		else{ echo ("Deleted $name \n"); }
	}


?>


<form action='' enctype='multipart/form-data' method='post'>
    <p>Please Upload a ZIP File.</p>
	<input type='hidden' name='hidden' value="test">
    <input type='file' name='file'>
    <input type='submit'/>
</form>
