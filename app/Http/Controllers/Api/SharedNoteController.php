<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSharedNoteRequest;
use App\Http\Resources\SharedNoteResource;
use App\Models\Note;
use App\Models\SharedNote;
use App\Models\User;
use Illuminate\Http\Request;

class SharedNoteController extends Controller
{
    public function store(Request $request, Note $note)
    {
        try{
            $sharedNote = new SharedNote();
            $sharedNote->note_id = $note->id;
            $sharedNote->user_id = $request->user_id;
            $sharedNote->save();
            return SharedNoteResource::make($sharedNote);
        } catch (\Exception $e){
            throw new \Exception("It could be the user_id doesn't exist in users table.");
        }


    }
}
