<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;



class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('notes.index', [
            'notes' => Note::with('user')->latest()->get(),
        ]);

    }

    public function edit(Note $note): View
    {
        //
        Gate::authorize('update', $note);

        return view('notes.edit', [
            'note' => $note,
        ]);
    }


    public function update(UpdateNoteRequest $request, Note $note)
    {
        //
        Gate::authorize('update', $note);


        $note->update($request->validated());

        return redirect(route('notes.index'));
    }
    /**>
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        // $validated = $request->validate([
        //     'message' => 'required|string|max:255',
        // ]);

        $request->user()
            ->notes()
            ->create($request->validated());

        return redirect(route('notes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note): RedirectResponse
    {
        //
        Gate::authorize('delete', $note);

        $note->delete();

        return redirect(route('notes.index'));
    }
}
