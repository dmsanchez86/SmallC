<?php

class Upload 
{
   private $dir       = "";
   private $type      = "";
   private $file      = "";
   private $peso      = "";
   private $cant      = 0 ; 
   function __construct($dir, $types,$file,$peso,$cant) 
  {
    $this -> setDir($dir);
    $this -> setType($types);
    $this -> setFile($file); 
    $this -> setPeso($peso);
    $this -> setCant($cant);
  }
  private function setCant($cant) 
   {
    if (!empty($cant)) 
    {
      $this->cant = $cant;
    }
    else 
        {
        $this->cant = 0 ; 
        }
   }
   private function setPeso($peso) 
   {
    if (!empty($peso)) 
    {
      $this->peso = $peso;
    }
    else 
        {
        $this->peso = 0 ; 
        }
   }
    private function setDir($dir) 
   {
    if (!empty($dir)) 
    {
     $this->dir = $dir."/";
      //Config::path('public')
    }
   }
   private function setType($type) 
   {
    if (!empty($type)) 
    {
      $this->type = $type;
    }
  }
  
  private function setFile($file) 
   {
    if (!empty($file)) 
    {
      $this->file = $file;
    }
  }
  public function checkType($type)
    {
      if($this->type == null || $this->type =="")
          return "Error";
      for($i = 0 ; $i< count($this->type);$i++)
          {
             if($type ==$this->type[$i] )
                 {
                    return true ; 
                 }
          }
          
          return false ;
        
    }
  
  public function fileUpload()
    {
      
         $fileName="";
     if( $this->file["size"]>(($this->peso)  * 1024 * 1024))
      {
          return  1 ;
      }
      if(!$this->checkType($this->file["type"]))
      {
          return  2; 
      } 
        $ret = array();
	$error =$this->file["error"];
	if(!is_array($this->file["name"])) 
	{
                $ext = str_replace("image/", "", $this->file["type"]);
 	 	$fileName = time() + (7 * 24 * 60 * 60)."".$ext;//$this->file["name"];
 		move_uploaded_file($this->file["tmp_name"],$this->dir.$fileName);
 		//$fileName = renameFileHash($fileName);
    	        //$ret[]= $fileName;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($this->file["name"]);
          
          if($fileCount >$this->cant)
              {
               return  3; 
              }
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = $this->file["name"][$i];
		move_uploaded_file($this->file["tmp_name"][$i],$this->dir.$fileName);
                
                
                
		//$filename = renameFileHash($filename);
	  	//$ret[]= $fileName;
	  }
	
	}
        return str_replace("./" ,"",$this->dir.$fileName);
    }
  


 public function renameFileHash($filename)
 {
 	
 	$newFileName = md5_file( $this->dir.$filename);	
 	$ext = pathinfo($filename, PATHINFO_EXTENSION);
 	rename( $this->dir . $filename, $this->dir . $newFileName . "." . $ext);
 	return $newFileName . "." . $ext;
 }
}







