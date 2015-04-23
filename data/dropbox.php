<?php
/**
 * DropZone File Upload
 * --------------------------------------------------
 * See more at: 
 *     http://www.startutorial.com/articles/view/
 * 		how-to-build-a-file-upload-form-using-dropzonejs-and-php
 * --------------------------------------------------
 * @param string $uploadFolder Full file path to save uploads to
 * @param array $extensions array of file extensions to allow to be uploaded and moved to $uploadFolder
 * @param array $_FILES file uploads
 * --------------------------------------------------
 **/

$storeFolder = 'uploads';
$extensions = ['.jpg']; 
//$extensions = ['.jpg','.txt','.csv','.zip','.exe'];

/**
 * !DO NOT EDIT!
 * --------------------------------------------------
 **/
$ds = DIRECTORY_SEPARATOR;
if (!empty($_FILES)) {
	
	// Check for valid file extension

	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
	$targetFile =  $targetPath. $_FILES['file']['name'];
	move_uploaded_file($tempFile,$targetFile);
}
?>