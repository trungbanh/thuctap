<?php
   define('ROOT_PATH', __DIR__);
   require_once(ROOT_PATH . '/Controler/BlogControler.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php require_once(ROOT_PATH.'/Templates/Header.phtml') ?>
<div class=container>
      <div class="row">

      <div class='form slide'>
         <form action="index.php" method="post">
            <label for="title">tên bài viết:</label>
            <input type="text" name="title" id="title"/> <br> <br>
            <label for="noidung"> nội dung:</label>
            <textarea name='noidung' rows="20" cols="35" ></textarea> <br> <br>
            <input type="submit" value='thêm bài' name='insertblog'/>
            <?php
               function insert(){
                  $repo = new BlogControler();
                  $repo->insert($_POST['title'],$_POST['noidung'],9);
                }
                if(isset($_POST['insertblog'])){
                   insert();
                }
             ?>
         </form> 
      </div>


      <div class='body'> 
         <?php
            $repo = new BlogControler();
            $viewAllblog = $repo->getAll();
            foreach ($viewAllblog as $blog) { ?>
            <a href= <?php echo 'http://trungtrung.com/detail.php?id='.$blog->getId(); ?> > 
               <div class='card'>
                  <h2> <?php echo $blog->getTitle(); ?></h2>
                  <h3> write by <?php echo $blog->getAuthor(); ?> </h3>
               </div>
            </a>

            <?php } ?>
      </div>
   </div>
</div>

<?php require_once ('./Templates/Footer.phtml'); ?>
</html>