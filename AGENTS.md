# AGENTS.md

Guia para agentes de IA e pessoas desenvolvedoras que trabalham neste repositório.

## O projeto

Site institucional da **Casa Especializada em Depilação** (Taguatinga/DF). É um site público, somente leitura: não tem painel administrativo nem login. Ele lista grupos de serviços com preços e promoções ativas, e tem um formulário de contato que envia e-mail.

- **Stack atual:** PHP 7.4, Laravel 7.30, MySQL, Blade, Bootstrap 4.6 via CDN, jQuery, Swiper e WOW.js.
- **Em andamento:** migração para PHP 8.1 e Laravel 8, com o mínimo de mudanças. Veja [docs/specs/upgrade-php8-laravel.md](docs/specs/upgrade-php8-laravel.md) antes de mexer em dependências, no `composer.json` ou na estrutura do framework.
- **Idioma:** o conteúdo do site, os comentários e as mensagens de commit são em português (pt-BR). Os identificadores de código são em inglês.

## Documentação

| Documento | Conteúdo |
|---|---|
| [docs/structure.md](docs/structure.md) | Arquitetura, rotas, modelos, banco de dados, fluxo de dados e deploy |
| [docs/ui/guidelines.md](docs/ui/guidelines.md) | Paleta, tipografia, componentes, padrões de layout e responsividade |
| [docs/specs/](docs/specs/) | Especificações de mudanças, escritas antes da implementação |

## Comandos

```bash
composer install               # dependências PHP (requer a versão de PHP do composer.json)
cp .env.example .env && php artisan key:generate
php artisan migrate            # cria as tabelas
php artisan db:seed            # popula com os dados iniciais (veja a observação sobre o ServiceSeeder)
php artisan serve              # http://localhost:8000
vendor/bin/phpunit             # testes (hoje só há os exemplos padrão)
```

O CSS e o JS do site **não passam por build**. Os arquivos em `public/css` e `public/js` são escritos à mão e servidos diretamente. O `webpack.mix.js` e o `resources/sass`/`resources/js` são resquícios do skeleton e não são usados pelas páginas.

## Convenções

- **Camadas:** Controller → Repository → Model (Eloquent). Os repositórios ficam em `app/Repositories` e estendem `BaseRepository`. Consultas novas vão para o repositório, não para o controller.
- **Modelos** ficam na raiz de `app/` (namespace `App\`, estilo Laravel 7), não em `app/Models`.
- **Formatação de preço:** os modelos têm accessors que devolvem o preço já formatado em pt-BR (`74,90`). Para fazer contas, use `price_number`; nunca use `price`.
- **Views:** toda página estende `layout.site` e passa `['current' => '<página>']` para marcar o item ativo do menu. CSS específico da página vai em `@section('style')` e JS em `@section('script')`.
- **Rotas** usam slugs em português (`/servicos/{slug}`, `/promocoes/{slug}`, `/contato`). Slugs inexistentes devem retornar 404; não redirecione, para o Google parar de indexar URLs antigas.
- **Estilo de código:** siga o `.editorconfig` (4 espaços, LF, UTF-8) e o preset `laravel` do StyleCI.
- **Commits:** não assine os commits como coautor. Não adicione `Co-Authored-By` nem outras linhas de atribuição a agentes de IA nas mensagens de commit ou nas descrições de PR.
- **Dados de contato** (endereços, telefones, WhatsApp, e-mail) estão fixos em várias views (`includes/header`, `includes/footer`, `meetUs`, `home`). Se precisar alterar algum, altere em todas.

## Cuidados

- **Preços:** a fonte de verdade está no banco de produção. `public/services.json` e `public/assets/db/*.csv` são cópias usadas para seed e importação. Ao editar os CSVs, salve em **UTF-8**, senão a importação quebra.
- **`ServiceSeeder`** lê o `services.json` via HTTP (`APP_URL:8000` fora de produção), então o servidor precisa estar rodando durante o `db:seed`.
- **Home:** espera **pelo menos 3 grupos de serviço por público** (F e M). Com menos, a página quebra (`$serviceGroupsFemale[$i]`).
- **Não commite** `.env`, `vendor/` nem `node_modules/`. Note que `public/.htaccess` também está no `.gitignore`, então precisa existir no servidor.
- **Campanhas sazonais** (por exemplo, o Dia dos Namorados) são feitas editando as views e as imagens em `public/assets/images` e revertidas depois por commit. Não deixe banners vencidos no ar.
- Não adicione dependências novas nem mude a versão do framework fora do plano descrito na spec de upgrade.
