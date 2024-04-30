@extends('layout')
@section('content')
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                ONLINE JUDGE
            </h2>
        </header>
        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">
                Source Code
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="message" rows="10" placeholder="" id="source-code"></textarea>
        </div>


        <div class="mb-6 flex justify-between">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black" id="showMessage">
                Submit
            </button>

            <a href="/" class="bg-laravel text-black rounded py-2 px-4 hover:bg-black ml-4"> Back </a>
        </div>

        <div class="container mt-5 flex justify-center">
            <div class="row" id="status">               
                

            </div>

        </div>

        <script>
            // Make an AJAX request to fetch file contents
            var fileContents;
            var idx = 1;
            var id = {!! json_encode($id) !!};
            var task = {!! json_encode($task) !!};


            function areStringsEqual(str1, str2) {
                // Preprocess strings: remove whitespace characters and newlines
                var processedStr1 = str1.replace(/\s+/g, '');
                var processedStr2 = str2.replace(/\s+/g, '');

                // Compare preprocessed strings
                return processedStr1 === processedStr2;
            }

            function fetchAndDisplayFileContents() {
                // Make an AJAX request to fetch the file contents
                fetch(`/getFileContents?id=${id}&task=${task}`)
                    .then(response => response.json()) // Convert response to JSON
                    .then(fileContents => {
                        // Loop through each file content
                        Object.keys(fileContents).forEach(function(filename) {
                            //var fileContent = fileContents[filename];
                            var fileContentIn = fileContents[filename]['in'];
                            var fileContentOut = fileContents[filename]['out'];
                            var sourceCode = document.getElementById('source-code').value;
                            sourceCode = `${sourceCode}`;
                            stdin = fileContentIn;
                            stdin = `${stdin}`;
                            const settings = {
                                async: true,
                                crossDomain: true,
                                url: 'https://onecompiler-apis.p.rapidapi.com/api/v1/run',
                                method: 'POST',
                                headers: {
                                    'content-type': 'application/json',
                                    'X-RapidAPI-Key': '923b30612fmshf12a462e02c42abp1f8ebdjsn9bdc7db40c7f',
                                    'X-RapidAPI-Host': 'onecompiler-apis.p.rapidapi.com'
                                },
                                processData: false,
                                data: JSON.stringify({
                                    language: 'cpp',
                                    stdin: stdin,
                                    files: [{
                                        name: 'index.cpp',
                                        content: sourceCode
                                    }]
                                })
                            };



                            $.ajax(settings).done(function(response) {
                                var h22 = document.createElement('h2');
                                h22.textContent = response.stdout;
                                //document.body.appendChild(h22);
                                console.log(response);
                                console.log(areStringsEqual(response.stdout, fileContentOut));
                                var content1 = `
                                <div class="w-25 border ">
                                    <div class="card-body p-0 pt-1">
                                        <h4 class="card-title mx-auto mb-0 pb-1 font-semibold pt-1 text-xl ">Test Case ${idx}</h4>
                                        <span class="badge badge-success card-text mb-0 p-3">ACCEPTED</span>
                                    </div>
                                </div>`;
                            var content2 = `
                            <div class="w-25 border">
                                <div class="card-body p-0 pt-1">
                                    <h4 class="card-title mx-auto mb-0 pb-1 font-semibold pt-1 text-xl ">Test Case ${idx}</h4>
                                    <span class="badge badge-danger card-text mb-0 p-3">WRONG ANSWER</span>
                                </div>
                            </div>`;
                                if (areStringsEqual(response.stdout, fileContentOut)) {
                                    document.getElementById("status").innerHTML += content1;
                                } else {
                                    document.getElementById("status").innerHTML += content2;
                                }
                                idx++;
                            });

                            // Create a new <pre> element to display the file content
                            //var pre = document.createElement('pre');
                            //pre.textContent = fileContent;

                            // Create a new <h2> element to display the file name
                            //var h2 = document.createElement('h2');
                            //h2.textContent = filename;

                            // Append the <h2> and <pre> elements to the document body or any desired container
                            //document.body.appendChild(h2);
                            //document.body.appendChild(pre);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching file contents:', error);
                    });




            }



            document.getElementById('showMessage').addEventListener('click', function() {

                //var stdin = document.getElementById('stdin').value;
                // Function to fetch and display file contents


                // Call the function to fetch and display file contents
                fetchAndDisplayFileContents();





                console.log("hi");
            });
        </script>
    </div>
    @endsection
