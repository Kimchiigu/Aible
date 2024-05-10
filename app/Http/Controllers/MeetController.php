<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetController extends Controller
{
    public function startPython(){
        $basePath = base_path();

        $pythonScriptPath = $basePath . '/resources/python/camera.py';

        shell_exec("python " . escapeshellarg($pythonScriptPath));
        return view('meet', [
            'title' => "Register"
        ]);
    }

    public function cancelExecution(Request $request)
    {
        return response()->json(['message' => 'Execution cancelled'], 200);
    }
}
