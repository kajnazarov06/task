build:
	docker build -t task .
	bash ./docker/run.sh
	docker exec task bash /var/www/launch.sh
	docker exec task bash /var/www/configure.sh
	make migrate

exec:
	docker exec -it task /bin/bash

drop:
	docker stop task
	docker rm task

drop-all:
	make drop
	docker rmi task

rebuild:
	make drop
	make build

start:
	docker start task
	docker exec task bash /var/www/launch.sh

stop:
	docker stop task

restart:
	make stop
	make start

migrate:
	docker exec task php /var/www/task/yii migrate/up
	docker exec task php /var/www/task/yii migrate

fix-rights:
	docker exec task chown -R 1000:1000 /var/www/task
	docker exec task chmod -R 0777 /var/www/task

services-start:
	docker exec task php /var/www/task/yii services/start

services-stop:
	docker exec task php /var/www/task/yii services/stop

services-restart:
	docker exec task php /var/www/task/yii services/stop
	docker exec task php /var/www/task/yii services/start

