@extends('layout')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="border border-gray-200 p-10 rounded shadow-md bg-gray-900">
            <header class="text-center mb-6">
                <h2 class="text-2xl font-bold uppercase text-white">
                    ONLINE JUDGE
                </h2>
            </header>
            <form action="{{ isset($id) ? route('submitSolutionById' , ['id' => $id]) :  route('submitSolution') }}" method="post">
                @csrf
                <div class="mb-6">
                    <div class="flex flex-col space-y-4 w-1/3 mx-auto">
                        <div class="flex justify-between items-center">
                            <label class="text-white">Contest ID: </label>
                            <input type="text" name="contest_id" class="form-input border border-gray-300 p-2 rounded-lg">
                        </div>

                        <div class="flex justify-between items-center">
                            <label class="text-white">Problem Index: </label>
                            <input type="text" name="problem_index" class="form-input border border-gray-300 p-2 rounded-lg">
                        </div>
                        <div class="flex justify-between items-center">
                            <label class="text-white">Language ID: </label>
                            <input type="text" name="language_id" class="form-input border border-gray-300 p-2 rounded-lg">
                        </div>
                    </div>
                    <label for="description" class="inline-block text-lg mb-2 text-white mt-6">
                        Source Code
                    </label>
                    <textarea class="rounded p-2 w-full border border-gray-300" name="solution_code" rows="10" placeholder="" id="source-code"></textarea>
                </div>

                <div class="mb-6 flex justify-between items-center">
                    <button class="submit-button px-4 py-2 rounded-lg" id="showMessage">
                        Submit
                    </button>

                    <a href="/" class="back-button text-black rounded py-2 px-4 ml-4"> Back </a>
                </div>
            </form>
        </div>
    </div>
@endsection
