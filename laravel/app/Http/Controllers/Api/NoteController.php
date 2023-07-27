<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    public function store(StoreNoteRequest $request)
    {
        $note = Note::create($request->validated());


        return NoteResource::make($note);
    }

    public function index()
    {
        return NoteResource::collection(Note::all());
    }

    public function show(Note $note)
    {
        return NoteResource::make($note);
    }

    public function update(StoreNoteRequest $request, Note $note)
    {
        $note->update($request->validated());

        return response()->json(NoteResource::make($note), Response::HTTP_ACCEPTED);
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return response()->noContent();
    }



}
