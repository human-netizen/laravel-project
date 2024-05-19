@extends('layout')
@section('content')
    <div class="border border-gray-200 p-10 rounded">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1 mx-auto">
                ONLINE JUDGE
            </h2>
        </header>
        <form action="{{ route('submitSolution') }}" method="post">
            @csrf
            <div class="mb-6">
                <div class="flex flex-col w-1/5">
                    <div class="flex justify-between mb-2">
                        <label>Contest ID: </label><input type="text" name="contest_id">
                    </div>

                    <div class="flex justify-between mb-2">
                        <label>Problem Index: </label><input type="text" name="problem_index">
                    </div>
                    <div class="flex justify-between">
                        <label>Language ID: </label> <input type="text" name="language_id">
                    </div>
                </div>
                <label for="description" class="inline-block text-lg mb-2">
                    Source Code
                </label>
                <textarea class="rounded p-2 w-full" name="solution_code" rows="10" placeholder="" id="source-code"></textarea>
            </div>


            <div class="mb-6 flex justify-between">
                <button class="" id="showMessage">
                    Submit
                </button>

                <a href="/" class="bg-laravel text-black rounded py-2 px-4 hover:bg-black ml-4"> Back </a>
            </div>


        </form>
    @endsection
