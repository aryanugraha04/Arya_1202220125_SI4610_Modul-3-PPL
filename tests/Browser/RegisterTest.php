<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')//mengunjungi halaman utama
                ->assertSee('Modul 3')//memastikan apakah ada teks Modul 3 di halaman utama
                ->clickLink('Register')//menekan tautan register
                ->assertPathIs('/register')//mengecek jika redirect ke halaman register
                ->type('name', 'Arya')//mengisi form name dengan Arya
                ->type('email', 'aryanugraha@gmail.com')//mengisi form email dengan aryanugraha0464@gmail.com dan mengecek jika email sudah terdaftar
                ->type('password', 'password')//mengisi form password dengan password
                ->type('password_confirmation', 'password')//mengisi konfirmasi password
                ->press('REGISTER')//menekan tombol register
                ->assertPathIs('/dashboard');//mengecek jika redirect ke halaman dashboard
        });
    }
}
