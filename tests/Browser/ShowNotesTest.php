<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Note;

class ShowNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group show_notes
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();//mencari id dari user

            $note = Note::create([
                'judul' => 'Judul Note Test',
                'isi' => 'Isi detail dari note ini',
                'penulis_id' => $user->id,
            ]);

            $browser->loginAs($user)//login sebagai user
                    ->visit('/notes')
                    ->assertSee($note->judul)//memastikan apakah ada teks judul note
                    ->clickLink($note->judul)//menekan tombol tautan dari judul note
                    ->assertPathIs('/note/' . $note->id)//mengecek jika redirect ke halaman notes
                    ->assertSee($note->isi);//memastikan apakah ada teks isi note
        });
    }
}
