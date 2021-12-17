echo yes |php bin/console doctrine:migrations:migrate
echo yes |php bin/console doctrine:fixtures:load