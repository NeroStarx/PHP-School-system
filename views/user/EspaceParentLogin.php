<?php
    include('../../utils/Loader.php');

    //loading the components
    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');
    $loginForm = Loader::loadClassInstance('views/components', 'LoginForm');

    $parentController = Loader::loadClassInstance('controllers', 'ParentController');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets()?>
    <title>Espace des parents: login</title>
</head>
<body>
<?php $header->create(); 
        $loginForm->create();
        if(!isset($_SESSION['parent_mail'])){
            if(isset($_POST['submit'])){
                $parent = $parentController->logIn($_POST['email'],$_POST['password']);
                if($parent != null){
                    //login succeeded load the page
                     header('Location: ./EspaceParent.php');
                }else{
                    // login failed display a message error
                    echo 'incorrect password';
                }
            }
        }else{
            header('Location: ./EspaceParent.php');
        }

        $footer->create(); ?>
</body>
</html>