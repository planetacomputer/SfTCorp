# SfTCorp
9
--
doctrine:generate:entities TechCorp
doctrine:database:drop --force
doctrine:database:create
(doctrine:schema:create --dump-sql)
doctrine:schema:update --force
(doctrine:schema:update --dump-sql ??)
doctrine:fixtures:load

10
--
composer require friendsofsymfony/user-bundle "~2.0@dev"
(https://symfony.com/doc/master/bundles/FOSUserBundle/index.html)


