<?php 
define('ROOT_PATH', __DIR__);

include_once(ROOT_PATH . '/Templates/Header.phtml');
require_once(ROOT_PATH . '/Controler/BlogControler.php');

if(isset($_GET["id"])) {
    $ctl = new BlogControler();
    $viewAllblog = $ctl->getDetail($_GET["id"]);
    if ($viewAllblog == false) {
        echo '<h1> id không tồn tại  </h1>';
    } else {
    foreach ($viewAllblog as $blog) { ?>
    <div class='row'>
        <div class='slide'>
            <form action="detail.php" method="POST">
                <input name="idblog" type=hidden value=<?php echo $_GET["id"]; ?> />
                <input type="submit" name='delblog' value='xóa bài này '/>
            </form> 
            <a class="btn" href= <?php echo "http://trungtrung.com/update.php?id=".$_GET["id"]; ?>>cập nhập nội dung</a>
        </div>
        
        <div class='view_blog'>
            <h1><?php echo $blog->getTitle(); ?> </h1>
            <h4> 
                <?php
                    echo $blog->getContent();
                ?>
            </h4>
            <h5 class="author_blog"> 
                <?php
                    echo "write by ".$blog->getAuthor();
                ?>
            </h5>
        </div>
        </div>
    <?php }
    } ?>
<?php } else {
            if(isset($_POST['delblog'])){
                $ctl = new BlogControler();
                $ctl->delete($_POST['idblog']);
                header("Location: http://trungtrung.com/");
            }
?>
<?php } ?>
<?php include_once(ROOT_PATH . '/Templates/Footer.phtml'); ?>