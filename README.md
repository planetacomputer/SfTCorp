# SfTCorp
9
--
doctrine:generate:entities TechCorp
doctrine:database:drop --force
doctrine:database:create
(doctrine:schema:create --dump-sql)
doctrine:schema:update --force
(doctrine:schema:update --dump-sql ??)
Cargar el doctrine-fixtures-bundle en composer.json: "doctrine/doctrine-fixtures-bundle": "^1.2"
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

15
--
p.328  ~~$authenticadedUser = $this->get('security.context')->getToken()->getUser()~~ => $authenticatedUser = $this->get('security.token_storage')->getToken()->getUser();
p.329 Queda pendiente la instalacin de FOSJsRoutingBundle por falta de compatibilidad con Sf 3.1 a fecha. Se escriben las rutas directamente desde JavaScript


#Notas
PHP Fatal error:  Allowed memory size of:
php56 -d memory_limit=-1 /usr/local/bin/composer require symfony/assetic-bundle
