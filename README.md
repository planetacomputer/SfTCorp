PHP Fatal error:  Allowed memory size of:
php56 -d memory_limit=-1 /usr/local/bin/composer require symfony/assetic-bundle
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


12
---
p.243 error en codi LoadUserData.php
p.250 la ruta de la plantilla layout a FOSBundle a 2.0.0-alpha4 es: vendor/friendsofsymfony/user-bundle/Resources/views/layout.html.twig
p.254 config/security.yml: switch_user parameter impersonate no funciona

13
--
p.276 ~~$form = $this->createForm(new StatusType(), $status)~~ => $form = $this->createForm(StatusType::class);
p.279 Ultimo formulario de submit con un par de adaptaciones a Sf3 en lineas sobre createForm en TimeController.php::userTimelineAction
