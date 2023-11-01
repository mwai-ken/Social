<?php


class Change_pass{


    
    private $error = "";

    // evaluate ensuring the input is not empty
public function evaluatepass($data){

    foreach ($data as $key => $value) {
        # code...
        if(empty($value))
        {
            $this->error = $this->error . $key ." is empty!<br>";
        }
       
        if($key == "oldpass")
        {
           
            header("location: changepassword.php?error=Old Password is required");
            exit();
            
        }elseif($key == "newpass")
        {
            
            header("location: changepassword.php?error=New Password is required");
            exit();
            
        }
        elseif($key == ("newpass" !== "Conpass"))
        {
            
            header("location: changepassword.php?error=The password does not match");
            exit();
            
        }
       
    }
    if($this->error == ""){
//if there is no error call the function below
//  $this->changepassword($data);
    //   echo "fine relax ";
    $oldpass = md5($oldpass);
    $newpass = md5($newpass);
   $UserID = $_SESSION['social_UserID'];
    // $conpass = md5($conpass);
   
     $query = "select Password from users WHERE UserID = $UserID AND Password = $oldpass ";
      $DB = new Database();
      $result =$DB->save($query);
    }else{
        // if there is error return error
        return $this->error;
    }
}


public function changepassword($data){

   
    $oldpass = $data['oldpass'];
    $newpass = $data['newpass'];
    $conpass = $data['conpass'];



    // $query ="insert into users (UserID,Firstname,Lastname,Email,Gender,url_address,Password)
    //  values ('$UserID','$Firstname','$Lastname','$Email','$Gender','$url_address','$Password')";
    
    // echo $query;
    //  $DB = new Database();
    //  $DB->save($query);
}


}