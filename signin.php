<?php 
    define('ROOT_PATH', __DIR__);

    require_once(ROOT_PATH.'/Controler/AuthorControler.php');
    require_once(ROOT_PATH. '/Templates/Header.phtml');
?>
<div class='updatebox'>
    <form action="signin.php" method="post">

    nickname: <input name="nickname" type="text"> <br/>
    email: <input name="email" type="text"> <br/>
    password: <input name="password" type="text"> <br/>

    <input type="submit" name="signin" value="dang nhap" >
    <input type="submit" name="signup" value="dang ky" >
    </form>
</div>
<?php 
    function insert (){
        $repo = new AuthorControler();
        $repo->insert($_POST['nickname'],$_POST['email'],$_POST['password']);
    }
    function login() {
        $repo = new AuthorControler();
        $user = $repo->login($_POST['email'],$_POST['password']);
        print('<h3>'.$user.'</h3>');
    }
    if (isset($_POST['signup'])) {
        insert();
    }
    if (isset($_POST['signin'])){
        login();
    }

?>


<?php require_once (ROOT_PATH.'/Templates/Footer.phtml'); ?>

