<?php

class Uploader {
  //declare private variables that will be inaccessible to scripts outside of this class
  private $destinationSubDirectory;
  private $maxFileSize;
  private $fileParamNameInForm;
	private $isFileExists;
	private $isSuccess;
	private $errorMessage;
	private $permPath;
	
  //function __construct is a "constructor function", which means it is called automatically when a new object is created
  public function __construct($fileParamNameInForm, $destinationSubDirectory, $maxFileSize=NULL) {
  
		//set default values of some flags
		$this->isFileExists = false;
		$this->isUploadSuccess = false;
		
		//this function expects to receive the name of the <input type="file" name="...."> field as a parameter
    $this->fileParamNameInForm = $fileParamNameInForm;

		//set the subdirectory where uploaded files will be permanently stored.
		//make sure this subdirectory is readable and writeable by "other" in the folder permission settings
    $this->destinationSubDirectory = $destinationSubDirectory;

		//the maximum file size that the server will be set to accept.  e.g. "10M", "20M", etc.
		if (!is_null($maxFileSize)) {
	    $this->maxFileSize = $maxFileSize;
			ini_set("upload_max_filesize", $this->maxFileSize);
			ini_set("post_max_size", $this->maxFileSize);
		}
  } //end function __construct

	public function getPermanentPath() {
		return $this->permPath;
	}
	
	public function getError() {
		return $this->errorMessage;
	}
	
  public function upload() {

		//the following variable holds the temporary path where the server automatically stored the file
		//we will eventually move this file to a permanent path lower down in the code
		$tempPath = $_FILES[$this->fileParamNameInForm]['name'];
				
		//extract the filename from the temporary path
		//you dont need to understand this!
		ereg("([^\\/]*)$", $tempPath, $regs); //this is doing a regular expression match for the filename
		$fileName = $regs[1];	//this holds just the filename, not the whole path

		//we want all our filenames to be lowercase with no spaces in them
		$newregs = preg_replace('/\s/','_', $regs[1]); //convert all spaces to underscores
		$fileName = trim($newregs); //remove any white-space at the beginning or end of the filename
		$fileName = strtolower($fileName); //make the filename all lowercase

		//now we specify the new path where were going to permanently store the file
		//the permanent path for this file will be the subdirectory we specified at the top of this file, and the filename we just created
		$permPath = $this->destinationSubDirectory . "/" . $fileName;

		// check to see if a file was uploaded
		// easiest way is to make sure the size of the file is greater than zero
		if ($_FILES[$this->fileParamNameInForm]['size'] > 0) {
			//the user did upload a file
			$this->fileExists = true;
		
			// try to move the file from the temporary path to the subdirectory we specified as a permanent place
			if (move_uploaded_file($_FILES[$this->fileParamNameInForm]['tmp_name'], $permPath)) {
				//if the move operation worked, great.
				$this->uploadSuccess = true;
				$this->permPath = $permPath; //the new permanent location of the file on the server
			} else {
				//if the move operation didn't work, too bad.
				$this->uploadSuccess = false;
				//put together a comprehensible error message
				$this->errorMessage = "Could not move file from {$_FILES[$this->fileParamNameInForm]['tmp_name']} to {$permPath}";
			}
		} else {
			// if the filesize is not greater than zero, then the user didn't upload a file after all.
			$this->fileExists = false;
			//put together a comprehensible error message
			$this->errorMessage = "No file uploaded";
		} //end else

		//return true or false, whether the upload worked
		return $this->uploadSuccess;
  } //end function upload()
  
} //end class

?>