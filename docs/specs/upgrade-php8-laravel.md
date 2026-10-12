# Spec: Upgrade para PHP 8.1 + Laravel 8

- **Status:** em implementação (branch `feature/upgrade-laravel-8`)
- **Data:** 2026-10-11
- **Autor:** joao9820

## 1. Contexto

O site roda hoje em **PHP 7.4 + Laravel 7.30.6**. A hospedagem atual só oferece **PHP 8.1 ou superior**.

O Laravel 7 não suporta PHP 8.1. O framework 7.x converte todo erro, inclusive `E_DEPRECATED`, em `ErrorException`. No PHP 8.1, o próprio código do Laravel 7 e de suas dependências dispara deprecations (por exemplo, `ArrayAccess::offsetGet` sem tipo de retorno), então a aplicação quebra já na inicialização. Por isso o framework precisa ser atualizado.

## 2. Objetivo

Fazer o site rodar em **PHP 8.1** com **o mínimo de alterações possível**, sem mudar o comportamento nem o visual.

### Fora de escopo

- Mudanças de layout, conteúdo ou preços.
- Mover os modelos para `app/Models`, adotar factories em classe, trocar Mix por Vite ou converter as rotas para a sintaxe `[Controller::class, 'method']`.
- Atualizar as bibliotecas de front-end (Bootstrap, Swiper…).
- Subir para Laravel 9 ou superior. Isso fica como próximo passo (seção 9).

## 3. Decisão: versão alvo

| Opção | PHP | Suporte de segurança | Esforço | Escolha |
|---|---|---|---|---|
| **Laravel 8.83.x** | 7.3 a 8.1 (8.1 a partir da 8.65) | Encerrado em jan/2023 | **Mínimo**: só `composer.json` e 1 ou 2 ajustes | ✅ |
| Laravel 10 | 8.1 a 8.3 | Encerrado em fev/2025 | Médio: três upgrades encadeados | ❌ |
| Laravel 13 | 8.3 a 8.5 | Até mar/2028 | Médio/alto: skeleton novo e port do código | Futuro |

O Laravel 8 foi escolhido porque o pedido é o menor número de mudanças. Ele mantém a estrutura do Laravel 7 (seeders sem namespace, rotas em string com `$namespace`, modelos em `app/`) praticamente intacta.

> ⚠️ **A hospedagem precisa ficar fixada em PHP 8.1.** O Laravel 8 não suporta PHP 8.2 oficialmente. O PHP 8.1 também está sem suporte desde 31/12/2025. É um alvo aceitável a curto prazo, mas, se a hospedagem remover o 8.1, será preciso subir para Laravel 10 ou superior.

## 4. Análise de impacto

O código da aplicação é pequeno: 6 controllers, 4 repositórios, 8 modelos, 1 mailable e 5 views. A revisão **não encontrou nenhuma construção no código próprio que seja incompatível com PHP 8.1**. As mudanças se concentram em dependências e no skeleton.

### 4.1 Obrigatórias

| # | Arquivo | Mudança | Motivo |
|---|---|---|---|
| 1 | `composer.json` | `php`: `^7.2.5` → `^7.3\|^8.0` | Permitir PHP 8 |
| 2 | `composer.json` | `laravel/framework`: `^7.29` → `^8.83` | Laravel 8 com suporte a 8.1 |
| 3 | `composer.json` (dev) | `facade/ignition` `^2.17`, `nunomaduro/collision` `^5.10`, `phpunit/phpunit` `^9.5.10`, `mockery/mockery` `^1.4.4` | Versões mínimas compatíveis com PHP 8.1 e L8 |
| 4 | `composer.json` | `config.platform.php`: `"8.1.0"` (ou a versão exata da hospedagem) | Garantir que o `composer.lock` seja resolvido para a versão do servidor, independentemente do PHP local |
| 5 | `composer.lock` | Regenerar com `composer update` | Novas versões |
| 6 | `database/factories/UserFactory.php` | Remover (e tirar `database/factories` do `classmap`) **ou** converter para classe | O L8 removeu as factories em closure. O `User` não é usado em nenhum lugar |

Ficam como estão: `fideloper/proxy ^4.4`, `fruitcake/laravel-cors ^2.0`, `guzzlehttp/guzzle ^7.4` e `laravel/tinker ^2.5`. Todos já suportam L8 e PHP 8.1, e o `composer update` só sobe as versões menores.

### 4.2 Recomendadas (baixo custo, evitam avisos de depreciação)

| # | Arquivo | Mudança |
|---|---|---|
| 7 | `app/Http/Middleware/CheckForMaintenanceMode.php` + `Kernel.php` | Renomear para `PreventRequestsDuringMaintenance` (o nome antigo foi depreciado no L8) |
| 8 | `public/index.php` | Adicionar o bloco de pré-checagem de `storage/framework/maintenance.php` (novo `php artisan down` do L8) |
| 9 | `phpunit.xml` | Trocar `<filter><whitelist>` por `<coverage><include>` (o PHPUnit 9.3+ emite aviso) |
| 10 | `app/Mail/ContactStore.php` | Escapar com `e()` os campos enviados pelo usuário antes de montar o HTML. Não tem relação com o upgrade, mas hoje há injeção de HTML no e-mail recebido pela loja |

### 4.3 O que **não** muda (verificado)

- **Rotas** em string (`'HomeController@index'`): continuam funcionando porque o `RouteServiceProvider` mantém `$namespace`.
- **Seeders** em `database/seeds` sem namespace: o `db:seed` do L8 usa `DatabaseSeeder` quando `Database\Seeders\DatabaseSeeder` não existe. O `classmap` atual continua válido.
- **`TrustProxies`** com `Request::HEADER_X_FORWARDED_ALL`: continua existindo no Symfony 5 (L8). Só é removido no L9.
- **E-mail:** o L8 ainda usa o SwiftMailer, então o `config/mail.php` e o `->html()` do Mailable não mudam.
- **Views Blade, `@component`/`@slot`, migrations e accessors:** sem mudança.
- **Banco de produção:** nenhuma migration nova. O schema não muda. O servidor usa **Percona Server 5.7.44**, que é compatível com MySQL 5.7 e suportado pelo Laravel 8.

## 5. Plano de implementação

### Versionamento e repositório

- **Mesmo repositório.** O upgrade não é uma reescrita: muda principalmente o `composer.json` e o lock. Um repositório novo perderia o histórico (preços, campanhas, decisões) e criaria dois lugares para manter.
- **Branch:** `feature/upgrade-laravel-8`, criada a partir da `develop`. Cada fase é um commit.
- **Fluxo:** `feature/upgrade-laravel-8` → merge na `develop` → merge na `main` → deploy → tag.
- **Tags:** a `V2.0` (commit `d4bc42e`, a `main` atual) já marca o último estado em Laravel 7 / PHP 7.4, então não é preciso criar uma tag "antes". Depois do deploy, criar a **`V3.0`**. É uma versão maior porque mudam o framework e os requisitos do servidor.
- **GitHub Release da `V3.0`** (opcional, recomendada): registrar os requisitos (PHP 8.1, Laravel 8, MySQL/Percona 5.7), os passos de deploy da fase 5 e o aviso de que voltar para a `V2.0` exige PHP 7.4.

### Fase 0: preparação do ambiente local (Docker no Ubuntu)
1. Clonar o repositório no Ubuntu. Se for WSL2, clonar dentro de `~/`, não em `/mnt/c`.
2. Subir o ambiente com o `docker-compose.yml` da raiz:
   - `app`: imagem `php:<versão>-cli` (`docker/php/Dockerfile`) com Composer, `unzip` e `pdo_mysql`. Não usa Apache: o site roda com `php artisan serve` na porta 8000.
   - `db`: `mysql:5.7`, compatível com o servidor (Percona Server 5.7.44). Essa imagem só existe para amd64. No Ubuntu ARM ela roda emulada, e a emulação precisa ser habilitada uma vez com `docker run --privileged --rm tonistiigi/binfmt --install amd64`.
   - A versão do PHP vem do build arg `PHP_VERSION`, com padrão `8.1`. Para a fase 1, use `PHP_VERSION=7.4`.
3. Primeira execução:
   ```bash
   cp .env.example .env
   PHP_VERSION=7.4 docker compose up -d --build
   # o app sai com erro até existir a vendor/; o install roda em um container avulso
   PHP_VERSION=7.4 docker compose run --rm --no-deps app composer install
   PHP_VERSION=7.4 docker compose up -d
   docker compose exec app php artisan key:generate
   docker compose exec app php artisan migrate --seed
   ```
4. Por ora, só as extensões mínimas para o site rodar. Conferir as extensões da hospedagem fica para a fase 5.

### Fase 1: rede de segurança (testes de caracterização, ainda no Laravel 7)
5. Criar testes de feature que fixem o comportamento atual:
   - `GET /`, `/servicos`, `/contato` e `/nossa-historia` retornam 200.
   - `GET /servicos/{slug-valido}` retorna 200 e mostra o preço no formato `R$ 52,00`. `GET /servicos/inexistente` retorna 404.
   - `GET /promocoes/{slug-ativo}` retorna 200 e mostra "PROMOÇÃO: R$". Um slug inativo redireciona para `/`.
   - `POST /enviar-email` válido usa `Mail::fake()`, verifica o envio e redireciona com o flash `msg`. Um POST inválido gera erros de validação.
6. Os dados são criados no próprio teste via modelos, com pelo menos 3 grupos por público. Banco: MySQL de teste `casa_depilacao_testing`, criado por `docker/mysql/init` (o SQLite não serve, veja a seção 10).
7. Rodar `docker compose exec app vendor/bin/phpunit` no Laravel 7, com o container em `PHP_VERSION=7.4`. Tudo verde antes de seguir.

### Fase 2: upgrade de dependências
8. Recriar o container com o PHP 8.1 (`docker compose up -d --build`, sem `PHP_VERSION`). Aplicar os itens 1 a 5 da seção 4.1 e rodar `docker compose exec app composer update`.
9. Apagar `bootstrap/cache/packages.php` e `services.php` e rodar `php artisan package:discover`.
10. Aplicar o item 6 (UserFactory).

### Fase 3: ajustes recomendados
11. Aplicar os itens 7 a 10 da seção 4.2.

### Fase 4: validação
12. Rodar `vendor/bin/phpunit` com o PHP 8.1. Os mesmos testes da fase 1 precisam passar.
13. Fazer um teste manual com `php artisan serve`, página por página: home (switch F/M, carrossel), serviços, detalhe, promoção, contato (envio real para um SMTP de teste) e 404.
14. Conferir `storage/logs/laravel.log`, que não pode ter deprecations nem erros.

### Fase 5: merge, deploy e tag
15. Abrir um PR de `feature/upgrade-laravel-8` para a `develop`, revisar e fazer o merge. Depois, fazer o merge da `develop` na `main`.
16. Na hospedagem: selecionar PHP 8.1, conferir as extensões exigidas pelo Laravel 8 (`pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `fileinfo`), garantir que o document root seja `public/` e que exista o `public/.htaccess` padrão do Laravel (ele não está versionado).
17. Fazer o deploy da `main` e rodar `composer install --no-dev --optimize-autoloader` (ou enviar a `vendor/` gerada localmente com o PHP 8.1).
18. Revisar o `.env` (`APP_ENV=production`, `APP_DEBUG=false`, `APP_KEY`, `DB_*`, `MAIL_*`).
19. Rodar `php artisan config:cache`, `route:cache` e `view:clear`.
20. Fazer smoke test em produção nas mesmas páginas da fase 4 e enviar um e-mail de contato real.
21. Com o site validado em produção, criar a tag no commit implantado e enviá-la: `git tag -a V3.0 -m "Laravel 8 + PHP 8.1"` e `git push origin V3.0`. Se for o caso, publicar a GitHub Release (veja "Versionamento e repositório").

## 6. Critérios de aceite

- [ ] `composer.json` exige `laravel/framework ^8.83` e o lock foi resolvido para PHP 8.1.
- [ ] Todos os testes de caracterização passam em PHP 8.1.
- [ ] As páginas ficam visualmente idênticas às de antes (comparação manual ou por screenshot).
- [ ] O formulário de contato entrega o e-mail.
- [ ] O `laravel.log` fica sem `Deprecated` ou `ErrorException` após navegar pelo site todo.
- [ ] O site está no ar na hospedagem nova com PHP 8.1.
- [ ] A `main` contém o upgrade e a tag `V3.0` aponta para o commit implantado.

## 7. Riscos

| Risco | Probabilidade | Mitigação |
|---|---|---|
| A hospedagem remove o PHP 8.1, já fora de suporte | Média, a médio prazo | Planejar a próxima etapa (seção 9). Esta spec já deixa testes que reduzem o custo dela |
| Falta de patches de segurança no Laravel 8 | Baixa para este site (sem login, sem upload, um único formulário) | Manter o `APP_DEBUG=false`, validação e CSRF ativos. Fazer a etapa da seção 9 |
| Extensão PHP ausente na hospedagem | Baixa | Checar na fase 5, antes do deploy |
| Diferença entre o PHP local e o do servidor | Média | `config.platform.php` no `composer.json`. O Docker usa a mesma versão menor do PHP do servidor |
| Testes em SQLite divergem do MySQL (enum, `after()`) | Baixa | Só os `up()` rodam nos testes. Se houver problema, usar um MySQL de teste |

## 8. Rollback

O banco não muda, então o rollback consiste em reimplantar a tag **`V2.0`** (`git checkout V2.0` e `composer install`). Isso só funciona em um servidor com PHP 7.4, que a hospedagem nova não oferece, então a validação da fase 4 precisa ser completa **antes** do deploy.

## 9. Próximos passos (fora desta spec)

Quando houver disponibilidade, o caminho recomendado é **Laravel 13 + PHP 8.3** (com suporte até 2028), feito com um skeleton novo e o port do código. Isso exige: remover `fideloper/proxy` e `fruitcake/laravel-cors` (os dois passaram a ser nativos), adotar `Database\Seeders`, trocar o SwiftMailer pelo Symfony Mailer e migrar o `lang/`. Deve ganhar uma spec própria.

## 10. Revisão de viabilidade (antes da implementação)

O plano é viável. A revisão do código e do `composer.lock` (L7.30.6, Symfony 5.4, PHPUnit 8.5) confirmou a seção 4.3. Ajustes feitos no plano:

| # | Achado | Ajuste |
|---|---|---|
| 1 | O SQLite não roda as migrations: `add_slug_column_*` adicionam coluna `NOT NULL` sem default, o que o SQLite recusa em `ALTER TABLE` | Testes em MySQL, banco `casa_depilacao_testing`, criado por `docker/mysql/init` na primeira subida do volume |
| 2 | O `docker-compose.yml` define `DB_DATABASE` no ambiente, que tem prioridade sobre o `phpunit.xml`. O L7 lê `$_ENV` primeiro; o L8, `$_SERVER` | O `phpunit.xml` define `DB_DATABASE` nos dois (`<env force="true">` e `<server>`) |
| 3 | No L8.83 as deprecations **não** viram exceção: vão para o canal `deprecations`, que é `null` por padrão. Sem ajuste, o critério "`laravel.log` sem Deprecated" passa sem verificar nada | Adicionar `'deprecations' => env('LOG_DEPRECATIONS_CHANNEL', 'null')` ao `config/logging.php` (fase 3) e usar `LOG_DEPRECATIONS_CHANNEL=single` na validação da fase 4 |
| 4 | O `Procfile` usa o buildpack do Heroku, que escolhe o PHP pelo `require.php`. Com `^7.3\|^8.0`, ele instalaria o PHP mais novo, que o L8 não suporta | Não se aplica: a hospedagem é compartilhada (HostGator) e a versão do PHP é escolhida no painel. O `Procfile` é resquício e não é usado |
| 5 | A imagem `php:7.4-cli` é baseada no Debian 11, cujo LTS acabou em ago/2026, e o `apt-get update` do Dockerfile falha | O `docker/php/Dockerfile` aponta o apt para o `archive.debian.org` quando a base é o Debian 11 (mesma solução já usada em outro projeto) |
| 6 | Comportamentos atuais que os testes fixam sem corrigir (fora de escopo): promoção inativa redireciona para `/` em vez de 404, e o "De: R$" das promoções na home e em `/servicos` sai sem formatação (`126.9`) | Nenhum. Registrar para uma mudança futura |
