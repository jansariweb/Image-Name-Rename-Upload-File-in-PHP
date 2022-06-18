<h1>Rename Name</h1>
<form class="" method="post" id="frm" enctype="multipart/form-data">

	 <div class="form-group col-md-6">
                                    <label>Upload Image <span class="text text-danger">*</span></label>
                                    <div>
                                        
                                        <input type="file" class="filestyle image" name="image">
                                        <span class="text text-info">Thumbnail Diamension : (600*400) Extension : JPG,JPEG,PNG File </span>
                                    </div>
                                    <input type="hidden" name="oldimage" id="oldimage" value=">">
                                </div>
        <button type="submit" name="submit" value="submit" class="btn btn-primary waves-effect waves-light">Save</button>

</form>
<hr>
<h1>Upload File</h1>
<form class="" method="post" id="frm" enctype="multipart/form-data">

     <div class="form-group col-md-6">
                                    <label>Upload Image <span class="text text-danger">*</span></label>
                                    <div>
                                        
                                        <input type="file" class="filestyle image" name="image">
                                        <span class="text text-info">Thumbnail Diamension : (600*400) Extension : JPG,JPEG,PNG File </span>
                                    </div>
                                    <input type="hidden" name="oldimage" id="oldimage" value=">">
                                </div>
        <button type="submit" name="upload" value="upload" class="btn btn-primary waves-effect waves-light">upload</button>

</form>
<?php
/*Rename Name*/
if(isset($_POST["submit"])) {
	$target_file   		= "assets/images/city/";
	$file_name    		= $_FILES["image"]["name"];
	$temp_name    		= $_FILES["image"]["tmp_name"];

	$image_name =  preg_replace( "/[^a-z0-9\._]+/", "-", strtolower($file_name) );
	$image_name = explode(".", $image_name);

        $file_ext   = strtolower(end(explode('.',$file_name)));
        
        $extensions = array("jpeg","jpg","png","xls");
      
        if(in_array($file_ext,$extensions)=== false)
        {
           echo "extension not allowed, please choose a JPEG or PNG file.";
        }

        $temp = explode(".", $file_name);
      
        $newfilename = $image_name[0]. substr(round(microtime(true)), -4) . '.' . end($temp);

        echo "<br>";
        echo $newfilename;
}
/*Upload File*/
function upload_file($file_name,$temp_name,$target_file,$extensions='')
     {
        ///$file_ext   = end(explode('.',$file_name));
        $file_ext   = strtolower(end(explode('.',$file_name)));
        $extensions = array("jpeg","jpg","png","webp");

        $image_name =  preg_replace( "/[^a-z0-9\._]+/", "-", strtolower($file_name) );
        $image_name = explode(".", $image_name);

        if(in_array($file_ext,$extensions)=== false)
        {
           echo "extension not allowed, please choose a JPEG or PNG file.";
        }
        $temp = explode(".", $file_name);
        $newfilename = $image_name[0]. substr(round(microtime(true)), -4) . '.' . end($temp);
        if(move_uploaded_file($temp_name, $target_file.$newfilename)) 
        {
            //return $newfilename;
            echo "upload file";

        } else 
        {    
            echo "Sorry, there was an error uploading your file.";
        }
     }
     if(isset($_POST["upload"])) {
        $target_dir   = "blogs/";
        $target_file  = $target_dir;
        $file_name    = $_FILES["image"]["name"];
        $temp_name    = $_FILES["image"]["tmp_name"];

        upload_file($file_name,$temp_name,$target_file);

        //echo "target file ".$target_file." file_name ".$file_name." temp_name ".$temp_name." <br>";


        /*$file_ext   = end(explode('.',$file_name));
        $extensions = array("jpeg","jpg","png","webp");

        $image_name =  preg_replace( "/[^a-z0-9\._]+/", "-", strtolower($file_name) );
        $image_name = explode(".", $image_name);

        if(in_array($file_ext,$extensions)=== false)
        {
           echo "extension not allowed, please choose a JPEG or PNG file.";
        }
        $temp = explode(".", $file_name);
        $newfilename = $image_name[0]. substr(round(microtime(true)), -4) . '.' . end($temp);
        if(move_uploaded_file($temp_name, $target_file.$newfilename)) 
        {
            //return $newfilename;
            echo "upload file";

        } else 
        {    
            echo "Sorry, there was an error uploading your file.";
        }*/
     }


     /* 
     * codeigniter code

     public function upload_and_rename_file_img($file_name,$temp_name,$target_file,$extensions='')
     {
        $file_ext   = strtolower(end(explode('.',$file_name)));
        $extensions = array("jpeg","jpg","png","webp");

        $image_name =  preg_replace( "/[^a-z0-9\._]+/", "-", strtolower($file_name) );
        $image_name = explode(".", $image_name);
      
        if(in_array($file_ext,$extensions)=== false)
        {
           $this->session->set_flashdata('error',"extension not allowed, please choose a JPEG or PNG or WEBP file.");
           redirect($_SERVER['HTTP_REFERER']);
        }

        $temp = explode(".", $file_name);
        $newfilename = $image_name[0]. substr(round(microtime(true)), -4) . '.' . end($temp);
        if(move_uploaded_file($temp_name, $target_file.$newfilename)) 
        {
            return $newfilename;
        } else 
        {    
            $this->session->set_flashdata('error',"Sorry, there was an error uploading your file.");
            redirect($_SERVER['HTTP_REFERER']);
        }
     }
     */
?>