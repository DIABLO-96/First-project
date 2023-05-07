<?php

$firstName =            $_POST [ 'firstName' ] ; 
$lastName =             $_POST [ 'lastName' ] ;
$email =                $_POST ['email' ] ;
$errors =  [
   'firstNameError' => '',
   'lastNameError' => '',
   'emailError' => '',

];



if (isset($_POST['submit'])) {



    if(empty($firstName)){
        $errors['firstNameError'] = 'يرجى أدخال الأسم الأول';
    }

     if(empty($lastName)){
        $errors['lastNameError'] = 'يرجى أدخال الأسم الأخير';       
     }

     if(empty($email)){
        $errors['emailError'] = 'يرجى أدخال الإيميل';            
    }

     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['emailError'] = 'يرجى أدخال الإيميل بالشكل الصحيح';                
    }
    
    if(!array_filter($errors)){

        
    $firstName =            mysqli_real_escape_string($conn, $_POST [ 'firstName' ] ) ; 
    $lastName =             mysqli_real_escape_string($conn, $_POST [ 'lastName' ] ) ;
    $email =                mysqli_real_escape_string($conn, $_POST ['email' ] ) ;

    $sql = "INSERT INTO users (firstName ,lastName,email)
    VALUES('$firstName','$lastName','$email')";

        if(mysqli_query($conn, $sql)){
            echo'الأدخال ناجح';
            } 
        else{
           echo 'حدث خطأ:',mysqli_error($conn);
    }
    }

}
