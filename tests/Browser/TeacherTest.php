<?php

namespace Tests\Browser;

use Facebook\WebDriver\WebDriverBy;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TeacherTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @test create teacher
     * @return void
     * @throws \Throwable
     */
    public function createTeacherTest()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'thomas@example.com')
                ->type('password', '1234')
                ->press('Login')
                ->clickLink('Docenten')
                ->clickLink('Docent aanmaken')
                ->type('name', 'Rick')
                ->type('email', 'rick@example.com')
                ->type('number', '0612345678')
                ->press('Maak docent aan')
                ->pause(2000)
                ->assertSee('Rick');
        });
    }

    /**
     * A Dusk test example.
     *
     * @test editteacher
     * @return void
     * @throws \Throwable
     */
//    public function editTeacherTest()
//    {
//        $this->browse(function ($browser) {
//            $browser->visit('/login')
//                ->type('email', 'thomas@example.com')
//                ->type('password', '1234')
//                ->press('Login')
//                ->click('/html/body/div[2]/table/tbody/tr/th/a')
//                ->pause(10000);
//        });
//    }
}
