<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User as User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('LARAVEL + TRAVIS CI');


            $browser->clickLink('Entrar')
                    ->assertSee('Entrar')
                    ->assertSee('E-mail');
        });
    }

    public function testLoginProcess()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/');

            $browser->clickLink('Entrar')
                    ->assertSee('E-mail')
                    ->assertSee('Senha');
            
            $user = factory(User::class)->create();

            $browser->type('email', $user->email)
                    ->type('password', '123456')
                    ->press('Entrar');

            $browser->assertSee('Dashboard');
        });
    }
}
