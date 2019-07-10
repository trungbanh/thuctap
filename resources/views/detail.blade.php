@extends('layouts.base')


@section('body')

@php 
    $user = Auth::user();
@endphp

<div class="container" >
    <div class='row'>
        <div class='col-lg-3 col-sm-12'>
            @if ($user['id'] ===$blog['author'])
                <script >
                    $(document).ready(function(){
                        $("#myform").on("submit",function(event){
                            event.preventDefault();
                            $.ajax({
                                type       : 'DELETE',
                                url        : '/blog/',
                                data       : $("#myform").serialize(),
                                success: function(data) {
                                    if (data) {
                                        // window.location="/blogs";
                                        console.log(data);
                                    }
                                    // window.location="/blogs";
                                }
                            });
                            return false;
                        });
                    });
                </script>
                <form id="myform" enctype="multipart/form-data">
                    <input name="id" type=hidden value="{{ $blog['id'] }}" />
                    <input name="idAuthor" type=hidden value="{{ $blog['author'] }}" />
                    <input class="btn btn-outline-danger" type="submit" name='delblog' value='xóa bài này '/>
                </form> 
                <br/>
                <a class="btn btn-primary" href= {{"/blog/update/". $blog->id}}>cập nhập nội dung</a>
            @else
                <div>
                    <img src="/images/qc.jpeg" alt="quảng cáo" style='width: 10em;'/>
                    <p> quảng cáo  </p>
                    <p> phần này thuộc tác giả {{ $blog->author}} </p>
                </div>
                
            @endif
        </div>

        <article class='col-9'>
            <p id="header"> {{ $blog->title }} </p>
            <p id="contend"> 
                    {{ $blog->content}}
            </p>
            <p id="author_blog"> 
                {{"write by " . $blog->author }}
            </p>
        </article>

    </div>
</div>

@endsection