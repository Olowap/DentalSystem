<?php
include('security.php');
$connection = mysqli_connect("localhost", "root", "", "adminpanel");
//register button
if(isset($_POST['registerbtn']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];
    
    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);

     if (strlen($password)<8) {
            $_SESSION['status'] = "Password must be at least 8 charactes long";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php'); }

    elseif ($password!==$cpassword) {
         $_SESSION['status'] = "Password does not match!";
         $_SESSION['status_code'] = "warning";
         header('Location: register.php'); }
        

    elseif(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "warning";
        header('Location: register.php');  
    }else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (firstname, lastname,email,password,usertype) VALUES ('$firstname','$lastname','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}


if(isset($_POST['registeruserbtn']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];
    
    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: userprf.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (firstname, lastname,email,password,usertype) VALUES ('$firstname','$lastname','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "User Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: userprf.php');
            }
            else 
            {
                $_SESSION['status'] = "User Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: userprf.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: userprf.php');  
        }
    }

}
//register end

if(isset($_POST['userbtn']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $errors = array();

    

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);

     if (strlen($password)<8) {
            $_SESSION['status'] = "Password must be at least 8 charactes long";
            $_SESSION['status_code'] = "warning";
            header('Location: userregister.php'); }

    elseif ($password!==$cpassword) {
         $_SESSION['status'] = "Password does not match!";
         $_SESSION['status_code'] = "warning";
         header('Location: userregister.php'); }
        

    elseif(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "warning";
        header('Location: userregister.php');  
    }else{
           
           if($password === $cpassword)
        {
            $query = "INSERT INTO register (firstname, lastname,email,password,usertype) VALUES ('$firstname','$lastname','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "User Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: login.php');  
            }
            else 
            {
                $_SESSION['status'] = "User Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: userregister.php');  
            }
    }
}
}
       
    

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $firstname = $_POST['edit_firstname'];
    $lastname = $_POST['edit_lastname'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];

    if (empty($firstname) OR empty($lastname) OR empty($email) OR empty($password) OR empty($cpassword)) {
        $_SESSION['status'] = "All fields are required.";
        $_SESSION['status_code'] = "warning";
        header('Location: register_edit.php'); }

     elseif (strlen($password)<8) {
            $_SESSION['status'] = "Password must be at least 8 charactes long";
            $_SESSION['status_code'] = "warning";
            header('Location: register_edit.php'); }

    elseif ($password!==$cpassword) {
         $_SESSION['status'] = "Password does not match!";
         $_SESSION['status_code'] = "warning";
         header('Location: register_edit.php'); }
        

    elseif(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "warning";
        header('Location: register_edit.php');  
    }

    $query = "UPDATE register SET firstname='$firstname', lastname='$lastname',  email='$email', password='$password', usertype= '$usertypeupdate' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }
}





//archived user/admin
if(isset($_POST['arch_btn']))
{
    $id = $_POST['arch_id'];

    $query = "INSERT INTO archived_user (firstname, lastname,email,password,usertype) SELECT firstname, lastname,email,password,usertype
    FROM register WHERE id='$id' ";

    
    if(mysqli_query($connection, $query)){
        $query = "DELETE FROM register WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);
    
    if($query_run)
    {
        $_SESSION['status'] = "Archived";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Unsuccessful";       
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }    
}
}

//archived user/admin
if(isset($_POST['arch_btn1']))
{
    $id = $_POST['arch_id'];

    $query = "INSERT INTO archived_user (firstname, lastname,email,password,usertype) SELECT firstname, lastname,email,password,usertype
    FROM register WHERE id='$id' ";

    
    if(mysqli_query($connection, $query)){
        $query = "DELETE FROM register WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);
    
    if($query_run)
    {
        $_SESSION['status'] = "Archived";
        $_SESSION['status_code'] = "success";
        header('Location: userprf.php'); 
    }
    else
    {
        $_SESSION['status'] = "Unsuccessful!";       
        $_SESSION['status_code'] = "error";
        header('Location: userprf.php'); 
    }    
}
}

//delete user/admin
if(isset($_POST['delete_userbtn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM archived_user WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: archiveduser.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: archiveduser.php'); 
    }    
}

//user profile data
if(isset($_POST['updateuserbtn']))
{
    $id = $_POST['edit_id'];
    $firstname = $_POST['edit_firstname'];
    $lastname = $_POST['edit_lastname'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];

    $query = "UPDATE register SET firstname='$firstname', lastname='$lastname',  email='$email', password='$password', usertype= '$usertypeupdate' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: userprf.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: userprf.php'); 
    }
    
}


//end user profile data

//start user appt
if(isset($_POST['updateapptbtn']))
{
    $id = $_POST['edit_id'];
    $firstname = $_POST['edit_firstname'];
    $lastname = $_POST['edit_lastname'];
    $email = $_POST['edit_email'];
    $contact = $_POST['edit_contact'];
    $serviceupdate = $_POST['update_service'];
    $statusupdate = $_POST['update_status'];

    $query = "UPDATE appt SET firstname='$firstname', lastname='$lastname',  email='$email', contact='$contact', service= '$serviceupdate', status= '$statusupdate' 
    WHERE appt_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: apptrecord.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: apptrecord.php'); 
    }
}



if(isset($_POST['archived_apptbtn']))
{
    $id = $_POST['archived_id'];

    $query = "INSERT INTO archived(firstname, lastname, email, contact, DATE, timeslot, service, status, transaction)SELECT firstname, lastname, email, contact, DATE, timeslot, service, status, transaction 
    FROM appt WHERE appt_id='$id' ";

    if(mysqli_query($connection, $query)){
        $query = "DELETE FROM appt WHERE appt_id='$id' ";
        $query_run = mysqli_query($connection, $query);
        
    if($query_run)
    {
        $_SESSION['status'] = "Archived";
        $_SESSION['status_code'] = "success";
        header('Location: apptrecord.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: apptrecord.php'); 
    }    
}
}

//retrieved user/admin
if(isset($_POST['retrieved_btn1']))
{
    $id = $_POST['Retrieved_id'];

    $query = "INSERT INTO register (firstname, lastname, email, password, usertype) SELECT firstname, lastname, email, password, usertype
    FROM archived_user WHERE id='$id' ";

    
    if(mysqli_query($connection, $query)){
        $query = "DELETE FROM archived_user WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);
    
    if($query_run)
    {
        $_SESSION['status'] = "Your Data has been retrieved";
        $_SESSION['status_code'] = "success";
        header('Location: archiveduser.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: archiveduser.php'); 
    }    
}
}

//retrieve appt recs
if(isset($_POST['retrieved_apptbtn']))
{
    $id = $_POST['retrieved_id'];

    $query = "INSERT INTO appt (firstname, lastname, email, contact, DATE, timeslot, service, status, transaction)SELECT firstname, lastname, email, contact, DATE, timeslot, service, status, transaction
    FROM archived WHERE id='$id' ";

    if(mysqli_query($connection, $query)){
        $query = "DELETE FROM archived WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);
        
    if($query_run)
    {
        $_SESSION['status'] = "Your Data has been retrieved";
        $_SESSION['status_code'] = "success";
        header('Location: archived.php'); 
    }
    else
    {
        $_SESSION['status'] = "Unsuccesful";       
        $_SESSION['status_code'] = "error";
        header('Location: archived.php'); 
    }    
}
}



if(isset($_POST['delete_apptbtn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM archived WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: archived.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: archived.php'); 
    }    
}
//end user appt


//login
if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);
    $usertypes = mysqli_fetch_array($query_run);

    if($usertypes['usertype'] == "admin")
    {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    }
    else if($usertypes['usertype'] == "user")
    {
        $_SESSION['cusername'] = $email_login;
        header('Location: ../index.php');
    }
    else
    {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
    }
}



if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
}

?>