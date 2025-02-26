<?php

namespace Core;
 
class   Authenticator{
    public function attempt($email,$password){
        $db = App::resolve(Database::class);
$user =  $db->query('select * from users where email = :email',[
    'email'=>$email
])->find();


if($user)
{
//we have to match password verity also 
if(password_verify($password,$user['password']))
{
    $this->login([
        'email'=>$user['email'],'id'=>$user['id'],'password'=>$user['password']]);
    return true;
   
}
}
return false;


    }

  public function login($user)
{
  
    $_SESSION['user'] = [
        'email'=>$user['email'],
        'id'=>$user['id'],
        'password'=>$user['password']
    ];
    session_regenerate_id(true);
}

 public function logout()
{
    
    Session::destroy();
}

}