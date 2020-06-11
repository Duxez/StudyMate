<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateGradeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $this->browse(function (Browser $browser) {
                $browser->visit('/login')
                    ->type('email', 'thomas@example.com')
                    ->type('password', '1234')
                    ->press('Login')
                    ->clickLink('Vakken')
                    ->clickLink('-')
                    ->assertSee('Toetsen:')
                    ->type('grade', '7.6')
                    ->press('update')
                    ->pause(1000)
                    ->assertInputValue('grade', '7.6');
            });
        });
    }
}
