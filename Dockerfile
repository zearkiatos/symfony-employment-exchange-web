FROM composer
WORKDIR /app
COPY . .
RUN rm .env
RUN touch .env && cat .env.dev > .env
RUN rm -rf vendor
RUN composer install
RUN wget https://get.symfony.com/cli/installer -O - | bash && \
    mv /root/.symfony/bin/symfony /usr/local/bin/symfony

RUN apk update && apk upgrade
RUN docker-php-ext-install mysqli
    
RUN symfony server:ca:install

EXPOSE 8000

# RUN php bin/console make:migration

CMD symfony server:start --allow-http --no-tls --port=8000