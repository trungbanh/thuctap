<?php 
    use \Blog\Controller\BlogController;

    use \Blog\App\Session;


    require_once(ROOT_PATH. '/Templates/Header.phtml');

foreach ($list as $blog) { 
    
    $mysess = new Session();
    // die( var_dump($mysess->getUser()));
    if ( !$mysess->isSession() || $mysess->getUser()->id_author !== $blog->author ){
        echo "<h1 style='color:red;'> bạn không có quyền tác động bài viết này </h1>";
    } else {
    ?>
    <div class='updatebox row'>
        <div class='form'>
            <form action='/blog' method="POST">
                <label for="id">id bài viết hiện tại:  <?php echo $blog->id ?>  </label>
                <input name="id" value= <?php echo $blog->id  ?> type=hidden  /> <br/>
                <input name="idAuthor" value= <?php echo $blog->author  ?> type=hidden  /> <br/>
                <label for="title">tên bài viết :</label>
                <textarea type="text" name="title" id="title" rows="2" cols="35" > <?php echo $blog->title; ?> </textarea> <br> <br>
                <input type="submit" value='cập nhập tên ' name='updateblog'/>
            </form> 
        </div>

        <div class='form'>
            <form action='/blog' method="POST">
                <label for="id">id bài viết hiện tại:  <?php echo $blog->id  ?>  </label>
                <input name="id" value= <?php echo $blog->id  ?> type=hidden  /> <br/>
                <input name="idAuthor" value= <?php echo $blog->author  ?> type=hidden  /> <br/>
                <textarea type=text name="content" id="nodung"  rows="30" cols="35"> <?php echo $blog->content; ?> </textarea><br><br>
                <input type="submit" value='cập nhập nội dung' name='updateblog'/>
            </form> 
        </div>
    </div>
<?php
    }

} ?>

<?php require_once (ROOT_PATH.'/Templates/Footer.phtml'); ?>