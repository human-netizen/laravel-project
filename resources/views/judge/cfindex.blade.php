@extends('layout')
@section('content')
    @php
        $battle = App\Models\Battle::find($id);
        $contestid = "";
        $problemindex = "";
        if($battle){
            $contestid = $battle->contest_id;
            $problemindex = $battle->problem_index;
        }
    @endphp
    <div class="container mx-auto mt-8">
        <div class="cfindexContainer p-10 rounded">
            <header class="text-center mb-6">
            </header>
            <div class="text-center mb-6">
                <div id="timerContainer">
                    <span id="timerLabel" class="text-white"></span>
                    <span id="timer" class="text-2xl text-white font-bold"></span>
                </div>
            </div>
            <form action="{{ isset($id) ? route('submitSolutionById' , ['id' => $id]) :  route('submitSolution') }}" method="post">
                @csrf
                <div class="mb-6">
                    <div class="flex flex-col space-y-4 w-1/3 mx-auto">
                        <div class="flex justify-between items-center">
                            <label class="text-white">Contest ID: </label>
                            <input type="text" name="contest_id" class="form-input border border-gray-300 p-2 rounded-lg" value={{$contestid}}>
                        </div>

                        <div class="flex justify-between items-center">
                            <label class="text-white">Problem Index: </label>
                            <input type="text" name="problem_index" class="form-input border border-gray-300 p-2 rounded-lg" value={{$problemindex}}>
                        </div>
                        <div class="flex justify-between items-center">
                            <label class="text-white">Language ID: </label>
                            <input type="text" name="language_id" class="form-input border border-gray-300 p-2 rounded-lg" value="89">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function startTimer(duration, display, label) {
                let startTime = Date.now();
                let endTime = startTime + duration * 60 * 1000;
                let interval = setInterval(function() {
                    let now = Date.now();
                    let remainingTime = endTime - now;
                    
                    if (remainingTime <= 0) {
                        clearInterval(interval);
                        display.textContent = '';
                        label.textContent = 'Battle ended';
                    } else {
                        let hours = Math.floor((remainingTime / (1000 * 60 * 60)) % 24).toString().padStart(2, '0');
                        let minutes = Math.floor((remainingTime / (1000 * 60)) % 60).toString().padStart(2, '0');
                        let seconds = Math.floor((remainingTime / 1000) % 60).toString().padStart(2, '0');

                        display.textContent = `${hours}:${minutes}:${seconds}`;
                    }
                }, 1000);
            }

            let startTime = new Date('{{ $battle->start_time }}').getTime();
            let duration = {{ $battle->duration }};
            let currentTime = Date.now();
            let display = document.querySelector('#timer');
            let label = document.querySelector('#timerLabel');

            if (currentTime < startTime) {
                let remainingDuration =  (startTime - currentTime) / 1000;
                label.textContent = 'Battle starts in: ';
                startTimer(remainingDuration / 60, display, label);
            } else {
                let elapsedTime = (currentTime - startTime) / 1000;
                let remainingDuration = duration * 60 - elapsedTime;

                if (remainingDuration <= 0) {
                    display.textContent = '';
                    label.textContent = 'Battle ended';
                } else {
                    label.textContent = '';
                    startTimer(remainingDuration / 60, display, label);
                }
            }
        });
    </script>
@endsection
