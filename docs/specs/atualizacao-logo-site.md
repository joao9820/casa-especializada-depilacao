# Atualização da logo do site

## Objetivo

Usar a nova marca fornecida para identificar o site na navegação, no rodapé e na aba do navegador.

## Requisitos

- Manter a imagem principal em PNG, recortada para remover as margens brancas excedentes.
- Exibir a logo como imagem no navbar e no footer, com texto alternativo acessível.
- Ajustar a largura da logo para desktop e telas pequenas sem distorcer a proporção.
- Disponibilizar um favicon `.ico` com tamanhos 16, 32 e 48 px e apontá-lo no `<head>`.
- Não adicionar dependências ao projeto.

## Critérios de aceite

- Navbar e footer usam `public/assets/images/logo.png`.
- O `<head>` aponta para `public/assets/images/favicon.ico`.
- Os arquivos são servidos pelo site e têm formato válido.

## Estado da implementação

Implementada em novembro de 2026. Playwright confirmou HTTP 200 para o PNG e o ICO, com os tipos `image/png` e `image/x-icon`. A página Laravel não pôde ser renderizada no Windows por falta da classe `Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance`; a validação visual completa deve ser feita no ambiente Docker com PHP 8.1 no Ubuntu.
