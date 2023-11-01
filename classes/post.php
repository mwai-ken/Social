<?php


class Post{


    private $error = "";
    public function create_post($UserID, $data){
        if (!empty($data['post'])) {
           
            $post = addslashes($data['post']);
            $Postid =$this->create_Postid();

            $query ="insert into posts (UserID,Post,Postid) values ('$UserID','$post','$Postid')";

            $DB = new Database();
            $DB->save($query);
        }else {
           $this->error .= "type in something";
        }
        return $this->error;
    }
    public function create_Postid()
    {
        $length = rand(4,19);
        $number = "";
        for ($i=0; $i <$length; $i++) { 
            # code...
    
            $new_rand = rand(0,9);
            $number = $number .$new_rand;
        }
        return $number;
    }

    public function get_post($id){
        $query ="select * from posts where UserID = '$id'order by id desc limit 10 ";

        $DB = new Database();
        $result =$DB->read($query);

        if ($result) {
           return $result;
        }else {
            return false;
        }
    }
}