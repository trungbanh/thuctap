<head>
    <link rel="stylesheet" type="text/css" href="./static/style.css">
</head>
<?php 
    define('ROOT_PATH', __DIR__);

    include_once('./Templates/Header.phtml');
    require_once('./Controler/BlogControler.php');

    if(isset($_GET["id"])){

        $repo = new BlogControler();
        // die ('------------------'.$idblog.'------------------');
        $viewAllblog = $repo->getDetail($_GET["id"]);
        foreach ($viewAllblog as $blog) { ?>
            
            <body class='body'>
            <form action="detail.php" method="POST">
                <input name="idblog" type=number value=<?php echo $_GET["id"]; ?> >
                <input type="submit" name='delblog' value='xoa bai'/>
                
            </form> 
            <a href= <?php echo "http://trungtrung.com/update.php?id=".$_GET["id"]; ?>> <input type="submit" name='' value='update'/> </a>

            <div class='view_blog'>
                <h1> 
                    <?php echo $blog->getTitle(); ?> 
                </h1>
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
                    
        <?php } ?>
    <?php } else {
        function delete(){
            $repo = new BlogControler();
            $repo->delete($_POST['idblog']);
        }
        if(isset($_POST['delblog'])){
            delete();
        }
        ?>

        <h5>khong tim thay bai viet </h5>

        <?php
    }
    ?>
    <?php include_once('./Templates/Footer.phtml'); ?>
</body>