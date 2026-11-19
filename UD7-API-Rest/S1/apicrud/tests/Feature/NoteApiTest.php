<?php

namespace Tests\Feature;

use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_note(): void
    {
        $response = $this->postJson('/api/note', [
            'title' => 'Hello World',
            'content' => 'Lorem Impsun',
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => 1,
                    'title' => 'Title: Hello World',
                    'content' => 'Lorem Impsun',
                    'example' => 'This is an example',
                ],
            ]);

        $this->assertDatabaseHas('notes', [
            'title' => 'Hello World',
            'content' => 'Lorem Impsun',
        ]);
    }

    public function test_can_list_notes(): void
    {
        Note::create([
            'title' => 'Hello World',
            'content' => 'Lorem Impsun',
        ]);

        $response = $this->getJson('/api/note');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'id' => 1,
                        'title' => 'Title: Hello World',
                        'content' => 'Lorem Impsun',
                        'example' => 'This is an example',
                    ],
                ],
            ]);
    }

    public function test_can_show_a_note(): void
    {
        $note = Note::create([
            'title' => 'Sample Note',
            'content' => 'Sample Content',
        ]);

        $response = $this->getJson('/api/note/' . $note->id);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $note->id,
                    'title' => 'Title: Sample Note',
                    'content' => 'Sample Content',
                    'example' => 'This is an example',
                ],
            ]);
    }

    public function test_can_update_a_note(): void
    {
        $note = Note::create([
            'title' => 'Hello World',
            'content' => 'Lorem Impsun',
        ]);

        $response = $this->putJson('/api/note/' . $note->id, [
            'title' => 'Hello World 1-upadte',
            'content' => 'Lorem Impsun 1-upadte',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $note->id,
                    'title' => 'Title: Hello World 1-upadte',
                    'content' => 'Lorem Impsun 1-upadte',
                    'example' => 'This is an example',
                ],
            ]);

        $this->assertDatabaseHas('notes', [
            'id' => $note->id,
            'title' => 'Hello World 1-upadte',
            'content' => 'Lorem Impsun 1-upadte',
        ]);
    }

    public function test_can_delete_a_note(): void
    {
        $note = Note::create([
            'title' => 'Note to delete',
            'content' => 'Delete me',
        ]);

        $response = $this->deleteJson('/api/note/' . $note->id);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseMissing('notes', [
            'id' => $note->id,
        ]);
    }

    public function test_validation_fails_when_title_is_too_short(): void
    {
        $response = $this->postJson('/api/note', [
            'title' => 'No',
            'content' => 'Valid content',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['title']);
    }
}
