@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('posts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Edit Post
            </h4>

            <x-form
                method="PUT"
                action="{{ route('posts.update', $post) }}"
                class="mt-4"
            >
                @include('app.posts.form-inputs')

                <div class="mt-4">
                    <a href="{{ route('posts.index') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left text-primary"></i>
                        Back to Index
                    </a>

                    <a href="{{ route('posts.create') }}" class="btn btn-light">
                        <i class="icon ion-md-add text-primary"></i> Create
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i> Update
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
