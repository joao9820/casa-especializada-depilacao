# Ambiente de desenvolvimento e testes (sem Apache: usa php artisan serve)
# A versão do PHP é trocada pelo build arg PHP_VERSION (padrão 8.1)
ARG PHP_VERSION=8.1
FROM php:${PHP_VERSION}-cli

# unzip: necessário para o Composer extrair os pacotes
# pdo_mysql: única extensão fora da imagem base que o site precisa para acessar o MySQL
RUN apt-get update \
    && apt-get install -y --no-install-recommends unzip \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_HOME=/tmp/composer

WORKDIR /app
