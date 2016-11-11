# SfTCorp
10
--
doctrine:generate:entities TechCorp
doctrine:database:drop --force
doctrine:database:create
(doctrine:schema:create --dump-sql)
doctrine:schema:update --force
(doctrine:schema:update --dump-sql ??)
