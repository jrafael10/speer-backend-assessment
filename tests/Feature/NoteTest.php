<?php

namespace Tests\Feature;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
   /* public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
   */

    public function test_user_can_view_their_own_list_of_notes()
    {
        $jesse = User::factory()->create();
        $note = Note::factory()->create([
            'author' => $jesse->id
        ]);
        $response = $this->actingAs($jesse)->getJson('/api/notes');
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);

    }

    public function test_user_can_view_a_note()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create([
            'author' => $user->id
        ]);
        $response = $this->actingAs($user)->getJson('/api/notes/' . $note->id);
        $response->assertStatus(200)
                ->assertJsonStructure(['data']);

    }

    public function test_user_can_create_note()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->postJson('/api/notes', [
            'title' => "Sample Note",
            'summary' => "This is a sample note",
            'content' => "This note contains the examples from my class."
        ]);

        $response->assertStatus(201)
                ->assertJsonStructure(['data'])
                ->assertJsonStructure([
                    'data' => [
                        '0' => 'title',
                        '1' => 'summary',
                        '2' => 'content'
                    ]
                ]);

        $this->assertDatabaseHas('notes', [
            'title' => "Sample Note",
            'summary' => "This is a sample note",
            'content' => "This note contains the examples from my class.",
            'author' => $user->id
        ]);



    }

    public function test_user_can_update_their_own_note()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['author' => $user->id]);

        $response = $this->actingAs($user)->putJson('/api/notes/' . $note->id, [
            'title' => "Sample Note Update",
            'summary' => "This is an updated sample note",
            'content' => "This note contains the updated examples from my class."
        ]);

        $response->assertStatus(202)
                 ->assertJsonStructure([
                     '0' => 'title',
                     '1' => 'summary',
                     '2' => 'content'
                 ])
                ->assertJson([
                   //"id" => $user->id,
                   'title' => "Sample Note Update",
                   'summary' => "This is an updated sample note",
                   'content' => "This note contains the updated examples from my class.",
                   'author' => [
                       "id" => $user->id,
                       "name" => $user->name
                    ]
                ]);

        $this->assertDatabaseHas('notes', [
            'title' => "Sample Note Update",
            'summary' => "This is an updated sample note",
            'content' => "This note contains the updated examples from my class.",
            'author' => $user->id
        ]);

    }

    public function test_user_can_delete_their_own_note()
    {
        $user = User::factory()->create();
        $author = Note::factory()->create(['author' => $user->id]);

        $response = $this->actingAs($user)->deleteJson('/api/notes/' . $user->id);

        $response->assertNoContent();

        $this->assertDatabaseMissing('notes', [
            'id' => $author->id,
            'deleted_at' => NULL
        ]);
    }


    public function test_user_can_share_note()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['author' => $user->id]);

        $response = $this->actingAs($user)->postJson('/api/notes/' . $note->id . '/share', [
            'user_id' => $user->id
        ]);
        $response->assertStatus(201)
                ->assertJsonStructure(['data'])
                ->assertJsonStructure([ 'data' =>['0' => 'note']]);

        $this->assertDatabasehas('shared_notes', [
            'user_id' => $user->id
        ]);
    }

    public function test_user_can_search_note_by_keyword()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create([
            'title' => "Sample Note Update",
            'summary' => "This is an updated sample note",
            'content' => "This note contains the updated examples from my class.",
            'author' => $user->id
        ]);

        $response = $this->actingAs($user)->getJson('api/search/?q=' . "This");

        $response->assertStatus(200);

        $this->assertDatabaseHas('notes', [
            'title' => "Sample Note Update",
            'summary' => "This is an updated sample note",
            'content' => "This note contains the updated examples from my class.",
        ]);

    }



}
