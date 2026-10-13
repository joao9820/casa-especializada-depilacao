# Estrutura do projeto

Site institucional em Laravel 7.30 (PHP 7.4) renderizado no servidor com Blade. Não há API pública, autenticação nem painel administrativo: os dados (serviços, preços e promoções) são mantidos direto no banco MySQL.

## Árvore de diretórios

```
app/
  Http/Controllers/       Um controller por página (veja Rotas)
  Http/Middleware/        Middlewares padrão do skeleton do Laravel 7
  Repositories/           Camada de consulta (BaseRepository + um por modelo)
  Mail/ContactStore.php   E-mail enviado pelo formulário de contato
  *.php                   Modelos Eloquent (namespace App\, sem a pasta Models)
config/                   Configuração padrão (locale pt-BR, timezone America/Sao_Paulo)
database/
  migrations/             Schema (2019 a 2022)
  seeds/                  Seeders sem namespace (padrão do Laravel 7)
  factories/              UserFactory no estilo closure (não é usado)
public/
  css/global.css          Tokens de cor, navbar, footer, títulos, botão do WhatsApp
  css/components.css      Cards, picture-area e paginação
  js/mask.js              Máscara de telefone do formulário de contato
  js/swiper-offers.js     Carrossel de promoções
  assets/images/          Imagens do site; service-groups/ guarda as fotos dos grupos
  assets/db/              Modelo MER (.mwb) e CSVs de preços (UTF-8)
  services.json           Lista de serviços usada pelo ServiceSeeder
  sitemap.xml, robots.txt
resources/
  views/layout/site.blade.php   Layout base (header + main + footer)
  views/includes/               header (<head> e barra de contato), navbar, footer (com os scripts)
  views/components/             card, picture, pagination
  views/*.blade.php             Páginas
  lang/pt-BR/                   Traduções (validation, messages)
  sass/, js/                    Resquícios do skeleton, não compilados nem usados
routes/web.php            Todas as rotas do site
tests/                    Só os exemplos padrão
```

## Rotas

| Método | URL | Nome | Controller | View |
|---|---|---|---|---|
| GET | `/` | `home` | `HomeController@index` | `home` |
| GET | `/nossa-historia` | (sem nome) | closure | `aboutUs` (Lorem Ipsum; sem link no menu) |
| GET | `/contato` | `contato` | `MeetUsController@index` | `meetUs` |
| GET | `/servicos` | `grupo-servicos` | `ServiceGroupController@index` | `services` |
| GET | `/servicos/{slug}` | `info-servico` | `ServiceGroupController@show` | `serviceInfo` (404 se o slug não existir) |
| GET | `/promocoes/{slug}` | `info-promocao` | `PromotionController@show` | `serviceInfo` (redireciona para `/` se não existir) |
| POST | `/enviar-email` | `enviar-email` | `SendEmailController@store` | redireciona para `/contato` com flash `msg` |

As rotas usam a sintaxe de string `'Controller@method'`, que depende do `$namespace` definido em `RouteServiceProvider`. `ServiceController` não é usado por nenhuma rota. `routes/api.php` só tem o exemplo padrão `auth:api`.

## Modelos e banco de dados

```
service_groups (id, name, audience enum M/F, img, img_position, slug, timestamps)
  └─< services (id, service_group_id FK, name, price decimal(5,2), timestamps)
          └─< service_promotions (promotion_id FK, service_id FK)  >─┐
promotions (id, name, desc, img, slug, new_price decimal(5,2), active bool, timestamps) ─┘
units (id, name, address, phone, cell)          populada, mas não lida pelas views
social_media (id, type enum, address)           lida em /contato, mas os dados exibidos estão fixos na view
```

| Modelo | Detalhes |
|---|---|
| `ServiceGroup` | `hasMany(Service)`. O accessor `audience` devolve `Feminina` ou `Masculina`. |
| `Service` | O accessor `price` devolve o valor formatado (`52,00`). `price_number` devolve o valor bruto. `price_off` é sobrescrito no controller. |
| `Promotion` | `belongsToMany(Service, 'service_promotions')`. O accessor `new_price` devolve o valor formatado. |
| `ServicePromotion` | Pivot sem chave primária e sem timestamps. |
| `Unit`, `SocialMedia`, `CategoryService`, `User` | Vazios ou padrão. `CategoryService` não tem tabela. |

## Fluxo de dados

1. **Home:** `ServiceGroupRepository` busca os grupos femininos e masculinos e a view exibe os 3 primeiros de cada (um switch alterna entre eles). `PromotionRepository::getAllActivitiesPromotions()` busca as promoções ativas, e o controller calcula `old_price` como a soma dos serviços.
2. **Serviços:** lista todos os grupos com seus serviços em ordem alfabética, mais o carrossel de promoções.
3. **Detalhe do serviço:** `ServiceGroupController@show` calcula um `price_off` por serviço (tabela fixa de 5% ou 10%). A view só mostra o preço riscado quando `price_off` não é falsy.
4. **Detalhe da promoção:** reaproveita a view `serviceInfo` com `isPromotion = true` e mostra o total "De / Por".
5. **Contato:** valida os campos e envia o `ContactStore` para `casadepilacao@casaespdepilacao.com.br`. O resultado volta por flash de sessão.

## Dependências externas (front-end, via CDN)

Bootstrap 4.6.1, jQuery 3.5.1 slim, Popper 1.16.1, Swiper (**sem versão fixa**, via unpkg), Animate.css 3.7.2, WOW.js 1.1.2, Font Awesome (kit), Google Fonts (Archivo, Roboto, Rochester, Fleur De Leah), Google Analytics (gtag `G-8C4NFRB9CZ`) e embeds do Google Maps.

## Deploy

- `Procfile` aponta para o Heroku (`heroku-php-apache2 public/`). `public/web.config` existe para IIS.
- `public/.htaccess` **não está versionado** e precisa existir no servidor Apache.
- O document root deve ser `public/`.
- Variáveis de ambiente necessárias: `APP_KEY`, `APP_URL`, `DB_*` (MySQL) e `MAIL_*` (SMTP).
- Depois de cada deploy, rode `php artisan config:clear` e `php artisan view:clear`. O `bootstrap/cache/*.php` guarda a lista de pacotes e precisa ser regenerado quando o `composer.json` muda.
