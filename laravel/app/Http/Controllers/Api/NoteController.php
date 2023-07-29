<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;

use App\Models\SharedNote;
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
        /*return list of notes authored by authenticated user*/
        $authenticatedUser = auth()->user()->id;
        $notes = Note::where('author', $authenticatedUser)->get();
        return NoteResource::collection($notes);
    }

    public function show(Note $note)
    {
        $this->authorize('view', $note);
        return NoteResource::make($note);
    }

    public function update(StoreNoteRequest $request, Note $note)
    {

        $this->authorize('update', $note);
        $note->update($request->validated());

        return response()->json(NoteResource::make($note), Response::HTTP_ACCEPTED);
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();

        return response()->noContent();
    }

    public function searchByKeyword(Request $request)
    {
        $queryValue = $request->query('q');
        if(!$queryValue){
            abort(404);
        }
        $searchedNotes = Note::where("title", 'like' , "%$queryValue%")
                 ->orWhere('summary','like' , "%$queryValue%")
                 ->orWhere('content', 'like', "%$queryValue%")
                 ->get();
        return $searchedNotes;

    }




}
