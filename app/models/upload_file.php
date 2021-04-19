<?php

class Upload_file
{

    public function upload($POST, $FILES)
    {
        $_SESSION["error"] = "";

        $allowed[]= "image/jpeg";
        $allowed[]= "image/jpg";
        $allowed[]= "image/png";
        $allowed[]= "video/mp4";

        //UPLOAD THE FILE
        if($FILES["file"]["name"] != "" && $FILES["file"]["error"] == 0){
            if(in_array($FILES["file"]["type"], $allowed))
            {

            }else{
                $_SESSION["error"] = "only jpg, jpeg, png and mp4 files are allowed";
            }

        }
        if($_SESSION["error"] == "")
        {
            $folder = "uploads/";
            if(!file_exists($folder))
            {
                mkdir($folder,0777,true);
            }
            $temp = $FILES["file"]["tmp_name"];
            $destination = $folder . $FILES["file"]["name"];
            move_uploaded_file($temp, $destination);

            $arr['title'] = esc($POST["title"]);
            $arr['date'] = date("Y-m-d H:i:s");
            $arr['user_id'] = 1;
            $arr['image'] = $destination;
            $arr['views'] = 0;
            $arr['url_address'] = get_random_string_max(60);

            $DB = new Database();
            $query = "INSERT INTO images (title, user_id, date, image, views, url_address) values (:title, :user_id, :date, :image, :views, :url_address)";
            $DB->write($query, $arr);

            header("Location: ". ROOT . "photos");
            die;


        }


    }
}