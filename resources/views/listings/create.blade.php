@extends('layout')
@section('content')
    <div class="border border-gray-200 p-10 rounded md:w-1/2 mx-auto mt-24">
        <header class="mx-auto">
            <h2 class="text-2xl font-bold uppercase mb-1 mx-auto">
                Create a Gig
            </h2>
        </header>
        <p class="mb-4 text-xl">Publish a article</p>

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf


            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Article Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    value="{{ old('title') }}" placeholder="Example: Senior Laravel Developer" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    value="{{ old('tags') }}" placeholder="Example: Laravel, Backend, Postgres, etc" />
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Image
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
            </div>

            <div class="mb-6">
                <label for="content" class="inline-block text-lg mb-2">
                    Job content
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="content" rows="10"
                    placeholder="" id="editor">{{ old('content') }}</textarea>
                   
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create Gig
                </button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>

    
@endsection
