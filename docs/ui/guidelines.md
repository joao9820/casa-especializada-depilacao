# Diretrizes de UI

Este documento descreve o padrão visual que o site já usa. Siga-o ao criar ou alterar páginas, para manter a consistência.

## Base

- **Framework:** Bootstrap 4.6 (CDN). Use o grid, os utilitários (`d-flex`, `mt-3`, `ml-sm-4`…) e os componentes do Bootstrap 4. **Não** use classes do Bootstrap 5 (`ms-*`, `me-*`, `data-bs-*`).
- **Container:** `container-md` em todas as páginas.
- **Breakpoint principal:** `767px` / `768px` (`md`). Abaixo dele a navbar colapsa, os grids passam para uma coluna e a barra de contato do topo some.
- **CSS:** os estilos globais ficam em `public/css/global.css`, os componentes em `public/css/components.css` e os estilos de uma página só em `@section('style')`. Não existe build: edite o `.css` diretamente.

## Cores

Use sempre as variáveis de `:root` (`global.css`). Não escreva os valores hexadecimais diretamente.

| Token | Valor | Uso |
|---|---|---|
| `--color-primary-blue` | `#1F1745` | Navbar, footer, títulos, botões primários, bloco de informações do contato |
| `--color-secondary-orange` | `#EF8A2C` | Destaques: `<span>` dos títulos, sublinhado de seção, ícones, botão "voltar" |
| `--color-background-md-orange` | `#F4B273` | Badges de serviço, bordas da caixa de promoção |
| `--color-background-light-orange` | `#f5cca7` | Borda superior do footer, linhas zebradas |
| `--color-background-light` | `#FDFAF9` | Fundo da página |
| `--color-text-light` | `#6A7682` | Texto padrão (aplicado a `*`) |
| `--color-text-muted` | `#9AA3AC` | Itens inativos do menu, bordas de input |

O WhatsApp usa o verde da marca no botão flutuante (`#btn-whatsapp`), que é a única exceção à paleta.

## Tipografia

- **Texto:** `Archivo` (definida no `body`). Tamanhos comuns: 14px para texto de apoio e 18px para subtítulos.
- **Títulos de seção:** `<h3 class="title-section">`, com 2.25rem, peso 500, cor azul e sublinhado laranja (`::after`). Para destacar uma palavra, use `<span>`, como em `Conheça nossos<span>Serviços</span>`. Use `title-section-simple` quando o título não deve ter sublinhado.
- **Logo textual:** "CASA ESPECIALIZADA EM DEPILAÇÃO" em 22px (18px no mobile), peso 700, cor `#F9F9F9`.
- **Decorativas:** `Rochester` e `Fleur De Leah` são reservadas a banners sazonais.

## Componentes

| Componente | Onde fica | Uso |
|---|---|---|
| Card | `components/card` | `@component('components.card')` com os slots `cardTitle`, `cardDesc`, `cardPrice`, `cardOldPrice`, `cardImg`, `cardType` (`offers` por padrão ou `services-lg`) e `scaleUp` |
| Picture | `components/picture` | Foto com fundo deslocado e vetores decorativos (Sobre Nós, Contato) |
| Carrossel de promoções | Swiper + `js/swiper-offers.js` | `.swiper.my-swiper` com as setas `.swiper-button-next/prev`. Mostra de 1 a 4 slides conforme a largura |
| Carrossel da home | Bootstrap carousel (`carousel-fade`, 3,5s) | Fotos de apresentação |
| Botão WhatsApp | `includes/footer` | Botão flutuante com dropdown para as duas unidades |
| Preço | `serviceInfo` | Nome e preço em linha, com `<hr>` pontilhado; o preço antigo fica riscado (`.price-off`) |

## Padrões visuais

- **Arredondamento:** 16px (`1rem`) em cards, imagens e botões principais. Use `rounded-pill` nos botões "Ver serviço" e `rounded-circle` nos botões de ícone.
- **Hover:** o padrão é `opacity: .8` com `transition: .3s`. Os cards de oferta aumentam de escala, a menos que recebam `no-scale-up`.
- **Sombras:** sutis, como `shadow-sm` ou `2px 2px 6px rgb(11 20 26 / 15%)`.
- **Espaçamento entre seções:** 85px na home. O `main` tem `padding: 4rem 0`.
- **Animações:** WOW.js com Animate.css 3.7 (`wow fadeIn`, `data-wow-delay`). Use com moderação.
- **Ícones:** Font Awesome 5 (`fas`/`fab`). O ícone vem antes do texto, com `mr-2`.
- **Preços:** escreva sempre `R$ 00,00`, com vírgula decimal (os accessors dos modelos já formatam). Na hora de compor ofertas, use os rótulos "De:" e "Por:".
- **Formulários:** inputs sem borda, só com linha inferior, 55px de altura e foco azul. O botão de envio ocupa a largura total, é azul e tem 16px de raio. Mostre os feedbacks com `alert-success` e `alert-danger`.

## Acessibilidade e SEO

- Toda `<img>` nova precisa de `alt` descritivo em português. Muitas imagens antigas ainda não têm; corrija quando mexer nelas.
- Cada página define `@section('title', ...)`, que vira "Casa Especializada em Depilação - {título}".
- Ao criar uma página pública, atualize `public/sitemap.xml`.
- Preserve o `<meta name="description">` e o gtag do `includes/header`.

## Pendências conhecidas

- O Swiper é carregado sem versão fixa (`unpkg.com/swiper/...`). Uma major nova pode quebrar o carrossel; fixe a versão quando for mexer nele.
- Endereços e telefones estão repetidos em `header`, `footer`, `meetUs` e `home`.
- A view `aboutUs` e os blocos de descrição de `serviceInfo` ainda têm Lorem Ipsum (comentado ou sem link).
- Os ícones da navbar mobile (`.contact-info`) apontam para `#`.
