<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;


class CreateNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group create_notes
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();//mencari id dari user

            $browser->loginAs($user)//login sebagai user
                    ->visit('/notes')//mengunjungi halaman notes
                    ->assertSee('Create Note')//memastikan apakah ada teks Create Note
                    ->clickLink('Create Note')//menekan tombol tautan Create Note
                    ->assertPathIs('/create-note')//mengecek jika redirect ke halaman create notes
                    ->type('title', 'Praktikum PPL')//mengisi form title dengan Praktikum PPL
                    ->type('description', 'Modul 3')//mengisi form description dengan Modul 3
                    ->press('@create-note')//menekan tombol Create
                    ->assertPathIs('/notes');//mengecek jika redirect ke halaman notes
        });
    }
}
