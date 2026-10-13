# Ambiente de desenvolvimento e testes (sem Apache: usa php artisan serve)
# A versão do PHP é trocada pelo build arg PHP_VERSION (padrão 8.1)
ARG PHP_VERSION=8.1
FROM php:${PHP_VERSION}-cli

# Debian 11 (bullseye, base do php:7.4) saiu do suporte: o apt passa a usar o archive.debian.org
# Só se aplica a ele; as imagens do PHP 8.1 usam versões do Debian ainda suportadas
RUN if grep -qs bullseye /etc/apt/sources.list; then \
        sed -i \
            -e 's|deb.debian.org/debian-security|archive.debian.org/debian-security|g' \
            -e 's|deb.debian.org/debian|archive.debian.org/debian|g' \
            /etc/apt/sources.list \
        && printf 'Acquire::Check-Valid-Until "false";\n' > /etc/apt/apt.conf.d/99no-check-valid-until; \
    fi

# unzip: necessário para o Composer extrair os pacotes
# pdo_mysql: única extensão fora da imagem base que o site precisa para acessar o MySQL
RUN apt-get update \
    && apt-get install -y --no-install-recommends unzip \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_HOME=/tmp/composer

WORKDIR /app
