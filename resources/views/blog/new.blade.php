@extends('layouts.base')

@section('body')
<div class='row'>
    @if ($user)
    <script >
        $().ready(function(){
            $("#myform").validate({
                rules: {
                    title: {
                        required:true,
                    },
                    content: {
                        required: true,
                    },
                    },
                messages: {
                    title: {
                        required:"Bài viết cần có tựa đề "
                        },
                    content: {
                        required: "Bài viết chưa có nội dung",
                    }
                }
            });
        });

        $.validator.setDefaults({
            submitHandler: function() {
                $.ajax({
                    type       : 'PUT',
                    url        : '/blog',
                    data       : $("#myform").serialize(),
                    success: function(result) {
                        if (result) {
                            console.log(result);
                            if (result.data) {
                                window.location="/blogs";
                            }
                            // window.location="/blogs";
                        }
                        
                    }
                });
            }
        });

    </script>
    <div class="offset-3 col-6">
        <h3>Viết bài </h3>
        <form id="myform" enctype="multipart/form-data"> 
            <div class="form-group">
            <label for="title"> Tên bài viết  </label>
            <textarea class="form-control" type="text" name="title" id="title" rows="2" cols="35"  ></textarea> 
            </div>
            <div class="form-group">
            <label for="content"> Nội dung bài viết  </label>
            <textarea class="form-control" type="text" name="content" id="content" rows="20" cols="35" ></textarea> 
            </div>
            <div class="form-group">
            <input class="btn btn-primary" type="submit" id='target' value="Tạo bài viết mới"/>
            <a href="#" onclick="window.history.back();" class="btn btn-default">Hủy</a>
            </div>
        </form> 
    </div>
    @else
    <div class="ads">
        <img src="{{asset('images/qc.jpeg')}}" alt="quảng cáo"/>
        <p> quảng cáo  </p>
    </div>
    @endif
</div>
@endsection