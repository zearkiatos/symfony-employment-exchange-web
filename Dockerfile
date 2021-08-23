FROM composer
WORKDIR /app
COPY . .
RUN rm -rf vendor
RUN composer install && \
    composer dump
RUN wget https://get.symfony.com/cli/installer -O - | bash && \
    mv /root/.symfony/bin/symfony /usr/local/bin/symfony
    
RUN symfony server:ca:install

EXPOSE 8000

CMD symfony server:start --allow-http --no-tls --port=8000