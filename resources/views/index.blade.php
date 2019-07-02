
@extends('layouts.base')

@section('body')
<div class='row'>
    <div class="col-9">
        @foreach ($blogs as $blog)
        <div class="col-4">
            <div>
                <a href = {{"/blog/".$blog->id}} > 
                <div class="card col-12">
                    <img class="image col-12" src="{{url('/images/download.jpeg')}}"  />
                    <div class="body-card">
                        <span id="title_blog">{{ $blog->title }}</span> <br/>
                        <span id="author_blog"> 
                            write by {{ $blog->author }}
                        </span>
                    </div>
                </div>  
                </a>
            </div>
        </div>
        @endforeach 
    </div>
    
    <div class="col-3">
        <img class="image col-12 " src="{{url('/images/qc.jpeg')}}" alt="quảng cáo"/>
        <span> quảng cáo </span>
    </div>
</div>

@endsection
