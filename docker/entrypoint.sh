yes | php bin/console make:migration
yes | php bin/console doctrine:migrations:migrate
symfony server:start --allow-http --no-tls --port=8000