<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Note;

class EditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group edit_notes
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();//mencari id dari user

            //buat note untuk user
            $note = Note::create([
                'judul' => 'Note Lama',
                'isi' => 'Isi lama',
                'penulis_id' => $user->id
            ]);

            $browser->loginAs($user)//login sebagai user
                    ->visit('/notes')//mengunjungi halaman notes
                    ->assertSee('Edit')//memastikan apakah ada teks Edit
                    ->clickLink('Edit')//menekan tombol tautan Edit
                    ->assertPathIs('/edit-note-page/' . $note->id)//mengecek jika redirect ke halaman edit notes
                    ->type('title', 'Note Baru')//mengisi form title dengan Note Baru
                    ->type('description', 'Isi baru')//mengisi form description dengan Isi baru
                    ->press('UPDATE')//menekan tombol Update
                    ->assertPathIs('/notes')//mengecek jika redirect ke halaman notes
                    ->assertSee('Note has been updated');//memastikan apakah ada teks Note has been updated
        });
    }
}
