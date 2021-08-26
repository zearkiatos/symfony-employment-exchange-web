yes | php bin/console make:migration
yes | php bin/console doctrine:migrations:migrate
tail -f /dev/null