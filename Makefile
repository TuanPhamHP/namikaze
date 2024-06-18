DOCKER_RUN = docker compose exec --user 1000:1000 app
PHP_RUN = $(DOCKER_RUN) php
NPM_RUN = npm
YARN_RUN = yarn


cinstall:
	$(DOCKER_RUN) composer install

cupdate:
	$(DOCKER_RUN) composer update

cr:
	$(DOCKER_RUN) composer require ${name}
crd:
	$(DOCKER_RUN) composer require ${name} --dev

dump:
	$(DOCKER_RUN) composer dump-autoload

a:
	$(PHP_RUN) artisan ${name}

module:
	$(PHP_RUN) artisan module:make ${name}

module-model:
	$(PHP_RUN) artisan module:make-model ${model} ${name}

cc:
	$(PHP_RUN) artisan cache:clear

cfg:
	$(PHP_RUN) artisan config:clear

mt:
	$(PHP_RUN) artisan make:test ${name}
vp:
	$(PHP_RUN) artisan vendor:publish --tag="${name}"

mlc:
	$(PHP_RUN) artisan make:livewire ${name}

.PHONY: composer.lock
composer.lock: composer.json
	$(PHP_RUN) -d memory_limit=4G /usr/local/bin/composer update

.PHONY: vendor
vendor: composer.lock
	$(PHP_RUN) -d memory_limit=4G /usr/local/bin/composer install


.PHONY: package.lock
package.lock: package.json
	PUPPETEER_SKIP_CHROMIUM_DOWNLOAD=1 $(NPM_RUN) install

.PHONY: node_modules
node_modules: package.lock
	PUPPETEER_SKIP_CHROMIUM_DOWNLOAD=1 $(NPM_RUN) install

.PHONY: dependencies
dependencies: vendor node_modules

laravel:
	$(PHP_RUN) artisan key:generate
	$(PHP_RUN) artisan jwt:secret
	$(PHP_RUN) artisan cache:clear
	$(PHP_RUN) artisan config:clear
	$(PHP_RUN) artisan migrate

dev:
	$(MAKE) dependencies
	$(MAKE) javascript-dev

serve:
	$(PHP_RUN) artisan serve

up:
	docker compose up -d

down:
	docker compose down

queue-work:
	$(PHP_RUN) artisan queue:work --timeout=0 --daemon

command:
	$(PHP_RUN) artisan make:command ${name}

component:
	$(PHP_RUN) artisan make:component ${name}

controller:
	$(PHP_RUN) artisan make:controller ${name}

model:
	$(PHP_RUN) artisan make:model ${name} -m

event:
	$(PHP_RUN) artisan make:event ${name}

exception:
	$(PHP_RUN) artisan make:exception ${name}

factory:
	$(PHP_RUN) artisan make:factory ${name}

job:
	$(PHP_RUN) artisan make:job ${name}

listener:
	$(PHP_RUN) artisan make:listener ${name}

mail:
	$(PHP_RUN) artisan make:mail ${name}

middleware:
	$(PHP_RUN) artisan make:middleware ${name}

migration:
	$(PHP_RUN) artisan make:migration ${name}

migrate-fresh:
	$(PHP_RUN) artisan migrate:fresh --seed

policy:
	$(PHP_RUN) artisan make:policy ${name}

provider:
	$(PHP_RUN) artisan make:provider ${name}

request:
	$(PHP_RUN) artisan make:request ${name}

resource:
	$(PHP_RUN) artisan make:resource ${name}

seeder:
	$(PHP_RUN) artisan make:seeder ${name}

seed:
	$(PHP_RUN) artisan db:seed

migrate-rollback:
	$(PHP_RUN) artisan migrate:rollback
migrate:
	$(PHP_RUN) artisan migrate

queue-restart:
	$(PHP_RUN) artisan queue:restart

broadcast:
	$(PHP_RUN) artisan socket:run

transformer:
	$(PHP_RUN) artisan make:transformer ${name}

vendor-jwt:
	$(PHP_RUN) artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

jwt-secret:
	$(PHP_RUN) artisan jwt:secret


blueprint-new:
	$(PHP_RUN) artisan blueprint:new

blueprint:
	$(PHP_RUN) artisan blueprint:build

blueprint-stubs:
	$(PHP_RUN) artisan blueprint:stubs
