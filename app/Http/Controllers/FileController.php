<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download($type, $jobId, $folder, $filename)
    {
        $path = storage_path("app/private/jobs/{$jobId}/{$folder}/{$filename}");

        if (!file_exists($path)) {
            abort(404, 'File not found.');
        }

        return response()->download($path);
    }
}
