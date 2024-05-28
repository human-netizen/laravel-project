@extends('layout')
@section('content')
    <div class="bg-gray-50 border border-gray-200 p-10 rounded  mx-auto mt-24 md:w-1/2">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit {{$listing->title}}
            </h2>
            <p class="mb-4">Post a gig to find a developer</p>
        </header>

        <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    value="{{ $listing->title }}" placeholder="Example: Senior Laravel Developer" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    value="{{ $listing->tags }}" placeholder="Example: Laravel, Backend, Postgres, etc" />
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
            </div>
            <img class="w-48 mr-6 mb-6"
            src="{{ $listing->logo ? asset('storage//' . $listing->logo) : asset('images//no-image.png') }}"
            alt="" />

            <div class="mb-6">
                <label for="content" class="inline-block text-lg mb-2">
                    Job content
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full h-200" name="content" 
                    id="editor">{{ $listing->content }}</textarea>
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
            
    </script>
@endsection
