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
  <link rel="stylesheet" type="text/css" href="./static/style.css">
</head>
<body>
<?php require_once('./Templates/Header.phtml') ?>
<div class=container>
   <div class='body'>
      <?php
         $repo = new BlogControler();
         $viewAllblog = $repo->getAll();
         foreach ($viewAllblog as $blog) { 
            ?>

         <a href= <?php echo 'http://trungtrung.com/detail.php?id='.$blog->getId(); ?> > 
            <div class='card'>
               <h2> <?php echo $blog->getTitle(); ?></h2>
               <h3> write by <?php echo $blog->getAuthor(); ?> </h3>
            </div>
         </a>

      <?php } ?>
         <div class='form'>
         <form action="index.php" method="post">
            <label for="title">ten bai viet:</label>
            <input type="text" name="title" id="title"/> <br> <br>
            <label for="noidung"> noi dung:</label>
            <textarea rows="2" cols="25" placeholder="This is the default text"></textarea> <br> <br>
            <input type="submit" value='them bai' name='insertblog'/>
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
   </div>
</div>

<?php require_once ('./Templates/Footer.phtml'); ?>
</body>

</html>