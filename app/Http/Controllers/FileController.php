<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showFileContent(Request $request)
    {
        // Path to the directory

        $directoryPath = public_path('testcases/'. $request->id . '/' . $request->task);

        // Get all files in the directory
        $files = scandir($directoryPath . '/in');

        // Remove . and .. entries
        $files = array_diff($files, ['.', '..']);

        // Array to store file contents
        $fileContents = [];
        //dd($files);
        // Loop through each file and read its content
        foreach ($files as $file) {
            // Read the content of the file
            $filePathIn = $directoryPath  .'/in/' . $file;
            $filePathOut = $directoryPath  .'/out/' . $file;
            //dd($filePathIn);
            // Store file contents with 'in' and 'out' keys
            
            $fileContents[$file]['in'] = file_get_contents($filePathIn);
            $fileContents[$file]['out'] = file_get_contents($filePathOut); // Assuming same content for 'in' and 'out'
        }
        // Pass the file contents to the view
        return response()->json($fileContents);

       // return view('judge.show', ['fileContents' => $fileContents]);
    }
}
