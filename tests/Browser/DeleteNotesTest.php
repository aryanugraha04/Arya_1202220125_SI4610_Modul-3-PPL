<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Note;

class DeleteNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group delete_notes
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();//mencari id dari user

            //buat note untuk user
            $note = Note::create([
                'judul' => 'Note untuk Dihapus',
                'isi' => 'Ini adalah isi note yang akan diuji delete-nya.',
                'penulis_id' => $user->id,
            ]);

            $browser->loginAs($user)//login sebagai user
                    ->visit('/notes')//mengunjungi halaman notes
                    ->assertSee($note->judul)//memastikan apakah ada teks judul note
                    ->press('Delete')//menekan tombol Delete
                    ->assertDontSee($note->judul);//memastikan apakah teks judul note sudah dihapus atau tidak ada
        });
    }
}
