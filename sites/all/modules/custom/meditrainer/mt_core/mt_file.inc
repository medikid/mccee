<?php

class mt_file {
    public  $fileName,
	    $fileName_w_extension,
	    $fileExtension,
	    $fileType,
	    $folderName,
	    $folderPath,
	    $fileModuleName,
	    $filePath_relative,
	    $filePath_absolute;
    
    function __construct($FileName_w_extension) {
	$fileNameParts = pathinfo($FileName_w_extension);
	$this->fileName = $fileNameParts['filename'];
	$this->folderPath = $fileNameParts['dirname'];
	$this->fileExtension = $fileNameParts['extension'];
	$this->fileName_w_extension = $this->fileName.$this->fileExtension;
	$this->setFileType();
    }
    
    function setFileName(){
	$fileNameParts = pathinfo($this->fileName_w_extension);
	$this->fileName = $fileNameParts['filename'];
    }
    function getFileName(){
	if (!isset($this->fileName)){
	$fileNameParts = pathinfo($this->fileName_w_extension);
	$this->fileName = $fileNameParts['filename'];
	}
	return $this->fileName;
    }
    
    function setFileName_w_extension($FileName_w_extension){
	 $this->fileName_w_extension = $FileName_w_extension;
    }
    function getFileName_w_extension(){
	return $this->fileName_w_extension;
    }
    function getFileExtension(){
	$fileNameParts = pathinfo($this->fileName_w_extension);
	return $fileNameParts['extension'];
    }
    
    function setFileType(){
	switch($this->fileExtension){
	    case 'jpg':
		$this->fileType = 'Image';
		break;
	    case 'png':
		$this->fileType = 'Image';
		break;
	    case 'gif':
		$this->fileType = 'Image';
		break;
	    case 'csv':
		$this->fileType = 'CSV';
		break;
	    case 'xls':
		$this->fileType = 'Image';
		break;
	    case 'txt':
		$this->fileType = 'Notepad';
		break;
	    case 'avi':
		$this->fileType = 'Video';
		break;
	    case 'mpg':
		$this->fileType = 'Video';
		break;
	    default:
		$this->fileType = 'Data';
		break;
	}
    }
    
}

?>
