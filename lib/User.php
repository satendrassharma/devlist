<?php 
include_once 'Session.php';
include "Database.php";
include "sendmail.php";

class User{
    public $db;
    public function __construct(){
        $this->db=new Database();
       
    }
  
    public function userRegistration($data,$img){
        $name=$data['name'];
        $age=$data['age'];
        $profession=$data['profession'];
        $email=$data['email'];
        $password=$data['password'];
        $_10th=$data['_10th'];
        $_12th=$data['_12th'];
        $college=$data['college'];
        $yurl=$data['youtube'];
        $turl=$data['twitter'];
        $gurl=$data['github'];
        $furl=$data['facebook'];

        $permitted=array('jpg','jpeg','png','gif');
        // print_r($img);

        $file_name=$img['image']['name'];
        $file_size=$img['image']['size'];
        $file_tmp=$img['image']['tmp_name'];

        $div=explode(".",$file_name);
        $file_ext=strtolower(end($div));
        $unique_img=substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_img="uploads/".$unique_img;




        //validation
        if(empty($file_name)||empty($name)||empty($age)||empty($profession)||empty($email)||empty($password)||empty($_10th)||empty($_12th)||empty($college)||empty($yurl)||empty($turl)||empty($turl)||empty($gurl)){
            return "<span class='error'>Error: field must not be empty</span>";
        }

        if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
            return "<span class='error'>Error: Email is not valid</span>";

        }
        //  check email
        $checkemail=$this->checkEmail($email);

        if($checkemail==true){
            return "<span class='error'>Error: email already exists</span>";
        }

        if(strlen($password)<6){
            return "<span class='error'>Error: password must be of length atleast 8</span>";

        }

        if($file_size>(1024*1024)){
            return "<span class='error'>Error: file size should be less than 1MB</span>";
        }

        if(in_array($file_ext,$permitted)===false){
            return "<span class='error'>Error: you can upload only".implode(',',$permitted)."</span>";
        }


       

        //encrypt passwod
        $password=md5($password);

        //query
        $sql="INSERT INTO devuser(name,age,profession,email,password,_10th,_12th,college,furl,turl,yurl,gurl,image) VALUES(:name,:age,:profession,:email,:password,:_10th,:_12th,:college,:furl,:turl,:yurl,:gurl,:image)";

        $stmt=$this->db->pdo->prepare($sql);
        $stmt->bindValue(":name",$name);
        $stmt->bindValue(":age",$age);
        $stmt->bindValue(":profession",$profession);
        $stmt->bindValue(":email",$email);
        $stmt->bindValue(":password",$password);
        $stmt->bindValue(":_10th",$_10th);
        $stmt->bindValue(":_12th",$_12th);
        $stmt->bindValue(":college",$college);
        $stmt->bindValue(":furl",$furl);
        $stmt->bindValue(":turl",$turl);
        $stmt->bindValue(":yurl",$yurl);
        $stmt->bindValue(":gurl",$gurl);
        $stmt->bindValue(":image",$uploaded_img);

        $result=$stmt->execute();
        if($result){
             move_uploaded_file($file_tmp,$uploaded_img);

            $msg="your register is successfull";
            sendmail($email,$msg);
            return "<span class='success'>success:user registration successfull</span>";
        }
        else{
            return "<span class='error'>Error:user registration failed</span>";

        } 
        


    }

    public function userLogin($data){
        $email=$data['email'];
        $password=$data["password"];

        //validation
         if(empty($email)||empty($password)){
            return "<span class='error'>Error: field must not be empty</span>";
        }

        if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
            return "<span class='error'>Error: Email is not valid</span>";

        }

        if(strlen($password)<6){
            return "<span class='error'>Error: password must be of length atleast 8</span>";

        }

        $password=md5($password);

        //query
       $result=$this->getLoginUser($email,$password);
       if($result){
           Session::init();
           Session::set("login",true);
           Session::set("id",$result->id);
           Session::set("name",$result->name);
           Session::set("msg","<span class='success'>success: you are logged In!</span>");
           Session::set("image",$result->image);
           header("Location:index.php");

       }
       else{
            return "<span class='error'>Error: Data not found</span>";
       }



    }

    public function getLoginUser($email,$password){
         $sql="SELECT * FROM devuser WHERE email=:email AND password=:password LIMIT 1";

        $query=$this->db->pdo->prepare($sql);

        $query->bindValue(':email',$email);
        $query->bindValue(":password",$password);

        $query->execute();

        $result=$query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function checkEmail($email){
        $sql="SELECT email FROM devuser WHERE email=:email";
        $query=$this->db->pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();
      
        if($query->rowCount()>0){
            return true;
        } 
        return false;
    }

    // public function checkPassword($password,$id){
        
    // }

    public function getAllUsers(){

        $sql="SELECT * FROM devuser";
        $query=$this->db->pdo->prepare($sql);
        $query->execute();
        $result=$query->fetchAll();
        return $result;


    }

    public function getUserById($id){
         $sql="SELECT * FROM devuser WHERE id=:id";
        $query=$this->db->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        $result=$query->fetch(PDO::FETCH_OBJ);
        return $result;
    }



   
}
