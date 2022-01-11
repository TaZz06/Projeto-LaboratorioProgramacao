<?php

namespace App\Http\Controllers;

class DownloadFileController extends Controller
{
    function downloadFile($path){
        $path_pdf = 'storage/pdf/' . $path;
        return response()->download($path_pdf);
    }
}