<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     */
    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(4);//mencari id dari user

            $browser->loginAs($user)//login sebagai user
                    ->visit('/notes')//mengunjungi halaman notes
                    ->click('#navbarDropdown')//menekan tombol dropdown yang ada di kanan atas
                    ->waitFor('@click-logout')//menunggu tombol logout
                    ->clickLink('Log Out')//menekan tombol logout
                    ->assertPathIs('/');//mengecek jika redirect ke halaman utama
        });
    }
}
