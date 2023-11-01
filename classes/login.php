<?php


class Login{


    private $error = "";

    // evaluate ensuring the input is correct or not


public function login_validate($data){

    //read the values
    $Email =  addslashes($data['Email']);
    $Password =   md5(addslashes($data['Password']));
    // $arr['password'] = md5($this->input->post('password'));
//check if the email exist
    $query ="select * from users where email = '$Email' limit 1";
    
    // echo $query;
     $DB = new Database();
     $result =$DB->read($query);

     if($result){
$row = $result[0];
//check if the password is correct
if($Password == $row['Password']){

    //session data
    $_SESSION['social_UserID'] = $row['UserID'];
}else {
    //send an error
    $this->error .= "wrong Password";
}
     }else {
        
        $this->error .= "No such email exist";
     }
        return $this->error;
     
}


public function check_login($id){

    $query ="select UserID from users where UserID = '$id' limit 1";
    
    // database object
     $DB = new Database();
     $result =$DB->read($query);

     if($result){
        return true;
     }
     //if no result
     return false;
}


}