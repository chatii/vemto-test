@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('posts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Show Post
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>Blog</h5>
                    <span>{{ optional($post->blog)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>User</h5>
                    <span>{{ optional($post->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Title</h5>
                    <span>{{ $post->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Body</h5>
                    <span>{{ $post->body ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('posts.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i> Back to Index
                </a>

                <a href="{{ route('posts.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> Create
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
