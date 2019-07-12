@extends('layouts.base')

@section('body')

<div class="container">
    <div class="row">

        <div class="col-12 col-md-6" > 
            <form id="loginform" enctype="multipart/form-data">
                <div class="error" id="loginforme"></div>
                <h4>Đăng nhập</h4>
                <div class="form-group">
                    <label for="mail1">Mail</label> 
                    <input class="form-control" type="text" name="mail" id="mail1" value="trungtest111@trung.com">
                    <p class="error" id="mail1e"></p>
                </div>
                <div class="form-group">
                    <label for="pass1">Mật khẩu</label>
                    <input class="form-control" type="password" name="pass" id="pass1" value="trungne">
                    <p class="error" id="pass1e"></p>
                </div>
                <button class="btn btn-primary" id="loginbtn" name="login" >Đăng Nhập</button>
            </form>
        </div>

        <div class="col-12 col-md-6">
            <form id="signform" enctype="multipart/form-data">
                <h4>Đăng ký</h4>
                <div class="form-group">
                    <label for="nickname">Tên tài khoản</label>
                    <input class="form-control" type="text" name="nickname" id="nickname" value="trungtest">
                    <p class="error" id="nicknamee"></p>
                </div>
                <div class="form-group">
                    <label for="mail">Mail (chỉ nhận mail từ @trung.com)</label>
                    <input class="form-control" type="text" name="mail" id="mail" value="trungtest@trung.com">
                    <p class="error" id="maile"></p>
                </div>
                <div class="form-group">
                    <label for="pass">Mật khẩu </label>
                    <input class="form-control" type="password" name="pass" id="pass" value="trungne" minlength="5">
                    <p class="error" id="passe"></p>
                </div>
                <div class="form-group">
                    <label for="passre">Nhập lại mật khẩu</label>
                    <input class="form-control" type="password" name="passre" id="passre" value="trungne">
                    <p class="error" id="pwre"></p>
                </div>
                <button class="btn btn-primary" id="signinbtn" name="signin" >Đăng Ký</button> 
            </form>
        </div>
    </div>
</div>
<script >
$().ready(function() {

    $.validator.addMethod("regex",function(value,element,regexp) {
        return this.optional(element) || regexp.test(value)
    }, "mail không hợp lệ");

    var $loginform = $("#loginform");
    $loginform.validate({
        rules: {
            mail: {
                required:true,
                email:true,
                regex: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@(trung.com)$/,
            },
            pass: {
                required: true,
                minlength: 5
            },
        },
        messages: {
            mail: {
                required:"nhập mail",
                email:"mail chỉ chấp nhận @trung.com",
            },
            pass: {
                required: "nhập mật khẩu",
                minlength: "độ dài tối thiểu là 5"
            }
        }
    });

    var $signform = $("#signform");
    $signform.validate({
        rules: {
            name: {
                required:true,
                minlength:2,
                maxlenght:25,
            },
            mail: {
                required:true,
                email:true,
                regex: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@(trung\.com)$/,
            },
            pass: {
                required: true,
                minlength: 5
            },
            passre: {
                required:true,
                equalTo: "#pass"
            }
        },
        messages: {
            name: {
                required:"Chưa nhập tên",
                minlength:"Tên phải nhiều hơn 2 ký tự và không quá 25 ký tự",
                maxlenght:"Tên phải nhiều hơn 2 ký tự và không quá 25 ký tự",
            },
            mail: {
                required:"Chưa nhập mail",
                email:"Mail chỉ chấp nhận @trung.com",
            },
            pass: {
                required: "Nhập mật khẩu",
                minlength: "Độ dài tối thiểu là 5"
            },
            passre: {
                required: "Chưa xác nhận lại",
                equalTo: "Xác nhận không khớp mật khẩu"
            }
        }
    });

    $("#loginbtn").on("click",function(e){
        e.preventDefault();

        if ($loginform.valid()) {
            $.ajax({
                type : 'POST',
                url : '/author',
                data : $("#loginform").serialize(),
                success: function(data) {
                    if (typeof(data) === 'object') {
                        let result = data;
                        if (typeof(result) === 'object') {
                            if (typeof result.error === 'object') {
                                if (result.error.mail){
                                    $("#mail1e").html(result.error.mail);
                                }
                                if (result.error.pass){
                                    $("#pass1e").html(result.error.pass);
                                }
                            } else if (result.data)  {
                                window.location="/blogs";
                            } else {
                                $("#loginforme").html("sai email hoặc mật khẩu");
                            }
                        }
                    } else {
                        $("#loginforme").html("lỗi quá trình cập nhập");
                    }
                }
            });
        }
        return false;
    });

    $("#signinbtn").on("click",function(e){
        e.preventDefault();

        if ($signform.valid()) {
            $.ajax({
                type : 'PUT',
                url : '/author',
                data : $("#signform").serialize(),
                success: function(data) {
                    if (data) {
                        // let result = JSON.parse(data);
                        let result = data;
                        if (typeof(result) === 'object'){
                            if (typeof(result.error) === 'object' )  {
                                if (result.error.nickname) {
                                    $("#nicknamee").html(result.error.nickname);
                                } else if (result.error.mail) {
                                    $("#maile").html(result.error.mail);
                                } else {
                                    $("#passe").html(result.error.pass);
                                }
                            } else {
                                window.location="/blogs";
                            }
                        }
                    }
                }
            });
        }
        return false;
    });
});
</script>

@endsection