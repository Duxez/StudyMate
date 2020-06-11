<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CourseTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @test create a course
     * @return void
     * @throws \Throwable
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $this->browse(function ($browser) {
                $browser->visit('/login')
                    ->type('email', 'thomas@example.com')
                    ->type('password', '1234')
                    ->press('Login')
                    ->clickLink('Vakken')
                    ->clickLink('Vak aanmaken')
                    ->type('name', 'WEBPHP')
                    ->type('period', 7)
                    ->type('ECTS', 4)
                    ->press('Maak docent aan')
                    ->pause(2000)
                    ->assertSee('WEBPHP');
            });
        });
    }
}
