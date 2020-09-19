<?php
include "../../assets/fxn.php";

$reportId = $_POST['reportId'];
$testName = $_POST['testName'];
$testName = e_d('e',$testName);
// $labID = $_SESSION["UID"];
// echo $prescriptionID;

// $labTest = $details[0]['labTestAdvice'];
//Upload Functionality Here
if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
	$fileName = $_FILES['uploadedFile']['name'];
	$fileSize = $_FILES['uploadedFile']['size'];
	$fileType = $_FILES['uploadedFile']['type'];
	$fileNameCmps = explode(".", $fileName);
	$fileExtension = strtolower(end($fileNameCmps));
	$success = 0;
	if ($fileSize<3100000) {
		$newFileName = md5(time() . $fileNameCmps[0]) . '.' . $fileExtension;
		$allowedfileExtensions = array('jpg','png','jpeg','pdf','doc','docx');
		if (in_array($fileExtension, $allowedfileExtensions)) {
			$uploadFileDir = '../../UPLOADS/';
			$dest_path = $uploadFileDir . $newFileName;
			if(move_uploaded_file($fileTmpPath, $dest_path)) {
				$message ='File is successfully uploaded.';
				$success=1;
			}else {
				$message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
			}
		}else {
			$message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
		}
	}else {
		$message = "The File is larger than acceptable limit.".$fileSize;
	}
}
if ($success) {
	$accessLink = "https://static.sehat.com/".$newFileName;
	$accessLink = e_d('e',$accessLink);
		// doThis("INSERT INTO `labreports`( `prescriptionID`, `laboratoryID`, `patientID`, `testName`, `reportLink`, `testTime`) VALUES ('$prescriptionID','$labID','$patientID','$testName','$accessLink',CURRENT_TIMESTAMP())");

		doThis("UPDATE `labreports` SET `reportUploaded`='1',`testName`= '$testName' ,`reportLink`= '$accessLink',`testTime`= CURRENT_TIMESTAMP(), `enabled` = '-1' WHERE `id` = '$reportId'");
}else {
	echo $message;
}
?>
<script type="text/javascript">
  alert("<?php echo $message; ?>");
  window.location='../uploadReport.php';
</script>
