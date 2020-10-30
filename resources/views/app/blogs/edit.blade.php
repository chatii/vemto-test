@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('blogs.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Edit Blog
            </h4>

            <x-form
                method="PUT"
                action="{{ route('blogs.update', $blog) }}"
                class="mt-4"
            >
                @include('app.blogs.form-inputs')

                <div class="mt-4">
                    <a href="{{ route('blogs.index') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left text-primary"></i>
                        Back to Index
                    </a>

                    <a href="{{ route('blogs.create') }}" class="btn btn-light">
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
