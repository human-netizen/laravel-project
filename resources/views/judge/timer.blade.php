@extends('layout')
@section('content')
    @php
        $battle = App\Models\Battle::find($id);
    @endphp
    <div class="container mx-auto mt-8">
        <div class="cfindexContainer p-10 rounded">
            <header class="text-center mb-6">
                <h2 class="text-2xl font-bold uppercase text-white">
                    Battle Countdown
                </h2>
            </header>
            <div class="text-center mb-6">
                <div id="timerContainer">
                    <span id="timerLabel" class="text-white">Battle starts in: </span>
                    <span id="timer" class="text-2xl text-white font-bold"></span>
                </div>
            </div>
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
                        label.textContent = 'Battle Started';
                        window.location.href = "{{ route('contestPage', ['id' => $id]) }}";
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
            console.log(currentTime);
            
            console.log(startTime);
            if (currentTime < startTime) {
                let remainingDuration =  (startTime - currentTime) / 1000;
                label.textContent = 'Battle starts in: ';
                startTimer(remainingDuration / 60, display, label);
            } else {
                window.location.href = "{{ route('contestPage', ['id' => $id]) }}";
            }
        });
    </script>
@endsection
