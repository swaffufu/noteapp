<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Remark;
use Illuminate\Http\Request;

class RemarkController extends Controller
{
    public function store(Request $request, Note $note)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $note->remarks()->create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return back();
    }
}
