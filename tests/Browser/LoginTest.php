<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')//mengunjungi halaman utama
                    ->assertSee('Modul 3')//memastikan apakah ada teks Modul 3 di halaman utama
                    ->clickLink('Log in')//menekan tautan login
                    ->assertPathIs('/login')//mengecek jika redirect ke halaman login
                    ->type('email', 'aryanugraha@gmail.com')//mengisi form email dengan aryanugraha@gmail.com dan mengecek jika email sudah terdaftar
                    ->type('password', 'password')//mengisi form password dengan password
                    ->check('remember')//memastikan apakah checkbox Remember me berguna
                    ->press('@login-button')//menekan tombol LOG IN
                    ->assertPathIs('/dashboard');//mengecek jika redirect ke halaman dashboard
        });
    }
}
