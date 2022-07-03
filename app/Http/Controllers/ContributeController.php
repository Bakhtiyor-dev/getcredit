<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Parsers\TestsParser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class ContributeController extends Controller
{
    /**
     * Display contribute page
     *
     * @return view
     */
    public function index()
    {
        return view('add', [
            'subjects' => Subject::available()->get()
        ]);
    }

    public function storeFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:txt',
            'subject' => 'required|integer'
        ]);

        \App\Models\File::create([
            'url' => $request->file->store('/files'),
            'subject_id' => $request->subject
        ]);

        return back()->with('success', 'Спасибо за поддержку! Ваш файл отправлен на модерацию.');
    }


}