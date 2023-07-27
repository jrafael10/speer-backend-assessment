<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SharedNoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'note' => [
                'title' => $this->note->title,
                'summary' => $this->note->summary,
                'content' => $this->note->content,
            ],
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name
            ]

        ];
    }
}
