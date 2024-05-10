<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class MeetController extends Controller
{
    public function startPython(){
        $basePath = base_path();

        $pythonScriptPath = $basePath . '/resources/python/camera.py';
        $process = new Process(['python', $pythonScriptPath]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        return view('meet', [
            'title' => "Register"
        ]);
    }

    public function cancelExecution(Request $request)
    {
        return response()->json(['message' => 'Execution cancelled'], 200);
    }
}
