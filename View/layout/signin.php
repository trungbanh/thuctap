<?php 
    use \Blog\Controller\AuthorController;
    
    require_once(ROOT_PATH. '/Templates/Header.phtml');
?>
<div class='updatebox'>
    <form action="signin.php" method="post">
        nickname: <input name="nickname" type="text"> <br/>
        email: <input name="email" type="text"> <br/>
        password: <input name="password" type="password"> <br/>
        <input type="submit" name="signin" value="dang nhap" >
        <input type="submit" name="signup" value="dang ky" >
    </form>
</div>
<?php 
    
    if (isset($_POST['signup'])) {
        $repo = new AuthorController();
        $user = $repo->insert($_POST['nickname'],$_POST['email'],$_POST['password']);
        print('<h3>'.$user.'</h3>');
    }
    if (isset($_POST['signin'])){
        $repo = new AuthorController();
        $user = $repo->login($_POST['email'],$_POST['password']);
        print('<h3>'.$user.'</h3>');
    }

?>


<?php require_once (ROOT_PATH.'/Templates/Footer.phtml'); ?>

