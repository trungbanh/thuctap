@extends('layouts.base')

@section('body')
@php 
    $user = Auth::user();
@endphp
<div class="container category"> 
    <div class="row">
        <div class="col-12 col-md-9">
            <div class="row">
                @foreach ($blogs as $blog)

                <div class="col-sm-4 col-md-3 col-6">
                    <div class="card">
                        <a href="{{ route('blog-detail', ['id' => $blog->id]) }}"> 
                            <img class="card-img-top" src="{{ asset('images/download.jpeg')}}"  />
                        </a>
                        <div class="card-body">
                            <a href="{{ route('blog-detail', ['id' => $blog->id]) }}"> 
                                <div class="card-title">{{ $blog->title }}</div>
                            </a>
                            <div class="text-right author">
                                {{ $blog->author->nickname }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
        <div class="col-12 col-md-3">
            <img class="image col-12" src="{{asset('images/qc.jpeg')}}" alt="quảng cáo"/>
            <span> quảng cáo </span>
        </div>
    </div>
</div>
@endsection
