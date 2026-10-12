<?php

namespace Tests\Feature;

use App\Mail\ContactStore;
use App\Promotion;
use App\Service;
use App\ServiceGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

/**
 * Testes de caracterização: fixam o comportamento do site antes e depois do upgrade de framework.
 */
class SiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // A home precisa de pelo menos 3 grupos por público
        foreach (['F', 'M'] as $audience) {
            for ($i = 1; $i <= 3; $i++) {
                ServiceGroup::forceCreate([
                    'name' => "Grupo {$audience}{$i}",
                    'audience' => $audience,
                    'slug' => strtolower("grupo-{$audience}{$i}"),
                    'img' => 'assets/images/presentation-1.png',
                ]);
            }
        }

        $group = ServiceGroup::where('slug', 'grupo-f1')->first();

        $axila = Service::forceCreate(['service_group_id' => $group->id, 'name' => 'Axila', 'price' => 52.00]);
        $perna = Service::forceCreate(['service_group_id' => $group->id, 'name' => 'Perna inteira', 'price' => 74.90]);

        $active = Promotion::forceCreate([
            'name' => 'Promo ativa',
            'slug' => 'promo-ativa',
            'new_price' => 99.90,
            'active' => 1,
        ]);
        $active->services()->attach([$axila->id, $perna->id]);

        Promotion::forceCreate([
            'name' => 'Promo inativa',
            'slug' => 'promo-inativa',
            'new_price' => 10.00,
            'active' => 0,
        ]);
    }

    /**
     * @dataProvider staticPages
     */
    public function testPagesReturnOk($uri)
    {
        $this->get($uri)->assertStatus(200);
    }

    public function staticPages()
    {
        return [
            'home' => ['/'],
            'serviços' => ['/servicos'],
            'contato' => ['/contato'],
            'nossa história' => ['/nossa-historia'],
        ];
    }

    public function testHomeListsServiceGroupsAndPromotions()
    {
        $this->get('/')
            ->assertSee('Grupo F3')
            ->assertSee('Grupo M3')
            ->assertSee('Promo ativa')
            ->assertDontSee('Promo inativa');
    }

    public function testServiceGroupShowsFormattedPrices()
    {
        $this->get('/servicos/grupo-f1')
            ->assertStatus(200)
            ->assertSee('R$ 52,00')
            ->assertSee('R$ 74,90');
    }

    public function testUnknownServiceGroupReturns404()
    {
        $this->get('/servicos/inexistente')->assertStatus(404);
    }

    public function testActivePromotionShowsTotalAndPromotionalPrice()
    {
        $this->get('/promocoes/promo-ativa')
            ->assertStatus(200)
            ->assertSee('TOTAL: R$ 126,90')
            ->assertSee('PROMOÇÃO: R$ 99,90');
    }

    public function testInactivePromotionRedirectsToHome()
    {
        $this->get('/promocoes/promo-inativa')->assertRedirect('/');
    }

    public function testContactFormSendsEmail()
    {
        Mail::fake();

        $this->post('/enviar-email', [
            'name' => 'Maria',
            'phone' => '61 99999-0000',
            'email' => 'maria@example.com',
            'subject' => 'Agendamento',
            'msg' => 'Gostaria de agendar.',
        ])
            ->assertRedirect('contato')
            ->assertSessionHas('msg.status', 'success');

        Mail::assertSent(ContactStore::class, function ($mail) {
            // O destinatário é definido no build(), que o fake não executa
            return $mail->build()->hasTo('casadepilacao@casaespdepilacao.com.br');
        });
    }

    public function testContactFormValidatesInput()
    {
        Mail::fake();

        $this->post('/enviar-email', ['email' => 'invalido'])
            ->assertSessionHasErrors(['name', 'email', 'subject', 'msg']);

        Mail::assertNothingSent();
    }
}
