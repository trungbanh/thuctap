<?php 
    use \Blog\Controller\AuthorController;
    
    require_once(ROOT_PATH. '/Templates/Header.phtml');
?>


<script >
    $(document).ready(function(){
        $("#login").on("click",function(event){
            // event.preventDefault();
            $.ajax({
                type : 'PATCH',
                url : 'http://localhost:5000/author',
                data : $("#myform").serialize(),
                success: function() {
                    alert("worked");
                }
            });
            return false;
        });

        $("#signin").on("click",function(event){
            // event.preventDefault();
            $.ajax({
                type : 'PUT',
                url : 'http://localhost:5000/author',
                data : $("#myform").serialize(),
                success: function() {
                    alert("worked");
                }
            });
            return false;
        });
    });
</script>
<div class='updatebox'>
    <form id='myform' enctype='multipart/form-data'>
        tên: <input name="nickname" type="text"> <br/>
        email: <input name="mail" type="text"> <br/>
        mật khẩu : <input name="pass" type="password"> <br/>
        <button id='login' name="login" >Đăng Nhập</button>
        <button id='signin' name="signin" >Đăng Ký</button> 
    </form>
</div>

<?php require_once (ROOT_PATH.'/Templates/Footer.phtml'); ?>

