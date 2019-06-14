<?php 
use \Blog\Controller\BlogController;
use \Blog\App\Session;

include_once(ROOT_PATH . '/Templates/Header.phtml');
    foreach ($list as $blog) { ?>
    <div class='row'>
        <div class='slide'>
        <?php 
            $mysess = new Session();
            if ( $mysess->isSession() ){
                // die(var_dump($blog));
                if ($blog->author === $mysess->getUser()->id_author ){
        ?>
            <script >
                $(document).ready(function(){
                    $("#myform").on("submit",function(event){
                        event.preventDefault();
                        $.ajax({
                            type       : 'DELETE',
                            url        : '/blog',
                            data       : $("#myform").serialize(),
                            success: function() {
                                window.location="/blogs";
                            }
                        });
                        return true;
                    });
                });
            </script>
            <form id='myform' enctype='multipart/form-data'>
                <input name="id" type=hidden value=<?php echo $blog->id; ?> />
                <input name="idAuthor" type=hidden value=<?php echo $blog->author; ?> />
                <input type="submit" name='delblog' value='xóa bài này '/>
            </form> 
            <a class="btn" href= <?php echo "/blog/update/". $blog->id; ?>>cập nhập nội dung</a>

            <?php    
                    } else {
                        ?>

                <div class='form'>
                    <img src="/static/qc.jpeg" alt="quảng cáo" style='width: 10em;'/>
                    <p> quảng cáo  </p>
                </div>
            <?php
                echo "<p> phần này thuộc tác giả ".$blog->author." </p>";
                    }    
                } else {
            ?>

            <div class='form'>
                <img src="/static/qc.jpeg" alt="quảng cáo" style='width: 10em;'/>
                <p> quảng cáo  </p>
            </div>
            <?php } ?>



        </div>
        
        <article class='view_blog'>
            <header><?php echo $blog->title; ?> </header>
            <p> 
                <?php
                    echo $blog->content;
                ?>
            </p>
            <p class="author_blog"> 
                <?php
                    echo "write by ".$blog->author;
                ?>
            </p>
        </article>
        </div>
    <?php }
     ?>
<?php include_once(ROOT_PATH . '/Templates/Footer.phtml'); ?>