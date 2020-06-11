<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use function foo\func;

class CreateToetsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'thomas@example.com')
                ->type('password', '1234')
                ->press('Login')
                ->clickLink('Vakken')
                ->clickLink('-')
                ->assertSee('Toetsen:')
                ->clickLink('toets maken')
                ->script([
                    "document.getElementById('date').value = '2020-05-05'",
                ]);
                $browser->press('Maak test aan')
                    ->pause(1000)
                    ->assertSee('2020-05-05');
        });
    }


}
