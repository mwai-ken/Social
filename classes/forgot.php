<?php


class Forgot{


    private $error = "";

    // evaluate ensuring the input is not empty
public function evaluate_email($data){

    foreach ($data as $key => $value) {
        # code...
        if(empty($value))
        {
            $this->error = $this->error . $key ." is empty!<br>";
        }
        if($key == "email")
        {
            if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)){
                $this->error = $this->error . $key ."  Invalid email address!<br>";

            }
        }
    }
    if($this->error == ""){
//if there is no error call the function below
$this->forgot_pass($data);
    }else{
        // if there is error return error
        return $this->error;
    }
}

public function create_user($data){

    $Firstname = $data['Firstname'];
    $Lastname = $data['Lastname'];
    $Email = $data['Email'];
    $Gender = $data['Gender'];
    $Password = md5($data['Password']);
    // 'Password' => md5($this->input->post("password")),
    //created by php not the user
    $url_address = strtolower($Firstname) . "." .strtolower($Lastname);
    $UserID = $this->create_UserID();



    $query ="insert into users (UserID,Firstname,Lastname,Email,Gender,url_address,Password)
     values ('$UserID','$Firstname','$Lastname','$Email','$Gender','$url_address','$Password')";
    
    // echo $query;
     $DB = new Database();
     $DB->save($query);
}




public function create_UserID()
{
    $length = rand(4,13);
    $number = "";
    for ($i=0; $i <$length; $i++) { 
        # code...

        $new_rand = rand(0,8);
        $number = $number .$new_rand;
    }
    return $number;
}
}