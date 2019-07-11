@extends('layouts.base')

@section('body')

@php
    $user = Auth::user();

@endphp
<div class="container">
    <div class="row">
        <div class="offset-4 col-6">
            <form id="detail" enctype="multipart/form-data">
                <input name="idAuthor" type="hidden" value="{{ $user->id }}" >
                <div class="form-group">
                    <label for="nickname" >Tên:  </label>
                    <input class="form-control" id="nickname" name="nickname" type="text" value="{{ $user->nickname }}" >
                    <p class="error" id="namee"></p>
                </div>
                <div class="form-group">
                    <label for="mail" >Email: </label>
                    <input class="form-control" id="mail" name="mail" type="text" value="{{ $user->mail }}" required="required"> 
                    <p class="error" id="maile"></p>
                </div>
                <div class="form-group">
                    <label for="passold" >Mật khẩu cũ : </label>
                    <input class="form-control" name="passold" id="passold" type="password" value="trungne" >
                    <p class="error" id="passolde"></p>
                    </div>
                <div class="form-group">
                    <label for="passnew" >Mật khẩu mới : </label>
                    <input class="form-control" name="passnew" id="passnew" type="password" value="trungne" >
                    <p class="error" id="passnewe"></p>
                </div>
                <div class="form-group">
                    <label for="passre" >Mật khẩu mới nhập lại : </label>
                    <input class="form-control" name="passre" id="passre" type="password" value="trungne">
                    <p class="error" id="passree"></p>
                </div>
                <button class="btn btn-primary" id="updatedetail" name="update" >Cập nhập</button>

                <a href="#" onclick="window.history.back();" class="btn btn-default">Về trang chủ</a>
            </form>
        </div>
    </div>
</div>

<script >
    $().ready(function(){
        $.validator.addMethod("regex",function(value,element,regexp) {
            return this.optional(element) || regexp.test(value)
        }, "mail không hợp lệ");

        var $detail = $("#detail");
        $detail.validate({
            rules: {
                nickname:{
                    required:true,
                    minlength:2,
                    maxlength:25,
                },
                mail: {
                    required:true,
                    email:true,
                    regex: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@trung\.com$/,
                },
                passold: {
                    required: true,
                },
                passnew:{
                    // không bắt buộc thay đổi mật khẩu 
                    minlength: 5
                },
                passre :{
                    equalTo: "#passnew"
                }
            },
            messages: {
                nickname: {
                    required:"chưa nhập nickname",
                    minlength:"tên phải nhiều hơn 2 ký tự và không quá 25 ký tự",
                    maxlength:"tên phải nhiều hơn 2 ký tự và không quá 25 ký tự",
                },
                mail: {
                    required:"không để mục trống ",
                    email:"bắt buộc nhập mail",
                },
                passold: {
                    required: "nhập mật khẩu",
                },
                passnew:{
                    minlength: "độ dài tối thiểu là 5"
                },
                passre :{
                    equalTo: "xác thực không khớp"
                }
            }
        });

        $("#updatedetail").on("click",function(event){
            event.preventDefault();
            if ($detail.valid()){
                $.ajax({
                    type : 'POST',
                    url : '/author',
                    data : $("#detail").serialize(),
                    success: function(data) {
                        let result = data;
                        if (typeof(result) === 'object') {

                            console.log(result);
                            if (result.data) {
                                window.location="/blogs";
                            } else if (typeof(result.error) === 'object'){
                                if (result.error.passold) {
                                    $("#passolde").html(result.error.passold);
                                } else if (result.error.nickname) {
                                    $("#nicknamee").html(result.error.nickname);
                                } else if (result.error.mail) {
                                    $("#maile").html(result.error.mail);
                                } else {
                                    $("#passree").html(result.error.passre);
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