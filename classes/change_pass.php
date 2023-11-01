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
    //    if($key == "oldpass")
    //     {
    //         $this->error .= "Old password";

    //         header("location: changepassword.php",'Password Successfully Changed');
    //         exit();
            
    //     }
        // elseif (empty($newpass)) {
        //     $this->error .= "New password ";

        //     header("location:changepassword.php");
        //     exit();
        // }
        // elseif (empty($newpass !== $conpass)) {
        //     $this->error .= "New password and confirmpassword do not match";
        //     header("location:changepassword.php");
        //     exit();
        // }
    }
    if($this->error == ""){
//if there is no error call the function below
$this->changepassword($data);
// echo "good";
    }else{
        // if there is error return error
        return $this->error;
    }
}

public function changepassword($data){

    $oldpass = $data['oldpass'];
    $newpass = $data['newpass'];
    // $_SESSION['social_UserID'] = ['UserID'];
    // $UserID = $_SESSION['social_UserID']= ['UserID'];

    // $conpass = $data['conpass'];




    $query = "select Password from users WHERE Password = '$oldpass'  ";

    // echo $query;
     $DB = new Database();
     $DB->save($query);
// $result = mysqli_query($connect, $query);
     if ($DB === 1) {
        # code...
        echo "correct";
     }else {
        echo "incorrect";
        // header("location: changepassword.php?error=Old Password is required");
        // die;
     }
}





}