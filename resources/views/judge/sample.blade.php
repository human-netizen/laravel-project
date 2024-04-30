<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizontal Grid Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <button id="clickMeButton" class="btn btn-primary">Click me</button>

    <div class="container mt-5">
        <div class="row" id="status">

            <div class="card w-50">
                <div class="card-body p-0 pt-1">
                    <h5 class="card-title mx-auto mb-0 pb-1 pt-1">Test Case 1</h5>
                    <span class="badge badge-fancy badge-success-fancy card-text mb-0 p-3">ACCEPTED</span>
                </div>
            </div>

            <!-- Add more cards here if needed -->

        </div>

    </div>

    <!-- Bootstrap JS (Optional) -->
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var idx = 2;
        function handleClick() {
            var content = `<div class="card w-50">
                <div class="card-body p-0 pt-1">
                    <h5 class="card-title mx-auto mb-0 pb-1">Test Case ${idx}</h5>
                    <span class="badge badge-fancy badge-success-fancy card-text mb-0 p-3">ACCEPTED</span>
                </div>
            </div>`;

            document.getElementById("status").innerHTML+=content;
            idx++;
        }
        document.getElementById("clickMeButton").addEventListener("click", handleClick);
    </script>
</body>

</html>
