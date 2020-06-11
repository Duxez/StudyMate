<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @test login failed
     * @return void
     * @throws \Throwable
     */
    public function loginFailedTest()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'thomas@example.com')
                ->type('password', 'password')
                ->press('Login')
                ->assertSee('These credentials do not match our records.');
        });
    }


    /**
     * A basic browser test example.
     *
     * @test login failed
     * @return void
     * @throws \Throwable
     */
    public function loginSucessTest()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'thomas@example.com')
                ->type('password', '1234')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }


}
