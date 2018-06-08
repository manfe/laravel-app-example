<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User as User;
use App\Product as Product;

class ProductTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testAbilityToCreateNewProduct() {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create();
            
            $browser->loginAs($user);
            $browser->visit('/home')->assertSee('Painel de Controle');

            $browser->clickLink('Produtos');
            $browser->assertSee('Novo Produto');

            $browser->clickLink('Novo Produto')
                    ->assertPathIs('/products/create')
                    ->assertSee('Valor');

            $browser->type('nome', 'Macarrão')
                    ->type('valor', 'R$ 5,00')
                    ->press('Salvar');

            $browser->assertSee('Produto criado com sucesso.');        
            
        });
    }

    public function testAbilityToRemoveProduct() {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create();
            $product = factory(Product::class)->create();
            
            $browser->loginAs($user);

            $browser->visit('/products');

            $browser->assertSee('Salada');
            
            $browser->press('#delete-1');

            $browser->acceptDialog();

            $browser->assertSee("Produto excluído com sucesso.");
        });
    }
}
