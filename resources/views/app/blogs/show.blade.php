@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('blogs.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Show Blog
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>User</h5>
                    <span>{{ optional($blog->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Name</h5>
                    <span>{{ $blog->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('blogs.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i> Back to Index
                </a>

                <a href="{{ route('blogs.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> Create
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
