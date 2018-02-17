<?php


class Zipper {
    
	private $_files = array (),
	        $_zip;

	        public function __construct() {

	        	$this->_zip = new ZipArchive;
	        }

    public function add($input) {
    	if (is_array($input)) {
    		 
    		 $this->_files = array_merge($this->_files, $input);


    	}else{
    		
    		$this->_files[] = $input;
    	}
    }

     public function store($location = null) {
           
           if (count($this->_files) && $location) {
                
                foreach ($this->_files as $index => $file) {
                	 
                	 if (!file_exists($file)) {
                	 	  //Remove From Array

                	 	unset($this->_files[$index]);
                	 }
                }

                //open the zip 

                if ($this->_zip->open($location,file_exists($location) ? ZipArchive:: OVERWRITE : ZipArchive::CREATE )){

                	//loop throw the files and add to zip

                	foreach ($this->_files as $file) {
                		$this->_zip->addFile($file, $file);
                	}
                     
                      //close the zip
                	$this->_zip->close();
                	

                }

                
                
               
           }        


     }

     public function show(){
        $dir = "files/text/";

        if ($opendir = opendir($dir)) {
            while (($file = readdir($opendir)) !== FALSE){
                if ($file!="." && $file!=".." ) {
                        

                        echo "<label> $file </label><br>"; 
                          
                }
            }
        }
     }

    
}