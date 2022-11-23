<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /** @test */
    public function user_can_register_with_valid_data()
    {
        $this->browse(function ($browser) {
            $browser->visitRoute('register')
                ->type('name', 'Enyot')
                ->type('email', 'enyot@mail.com')
                ->type('password', 12345678)
                ->type('password_confirmation', 12345678)
                ->press('REGISTER');
            $browser->visit('/dashboard');
        });
    }
}
