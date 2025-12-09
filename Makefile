# Auto-detect today's day if TODAY is not set
TODAY ?= $(shell date +%d | sed 's/^0*//')

today: cs-fix tests-today solve-today

cs-fix:
	vendor/bin/php-cs-fixer fix

tests-today:
	php -d memory_limit=4G vendor/bin/phpunit tests/Xmas2025/Day${TODAY}

solve-today:
	php -d memory_limit=4G solve.php ${TODAY}
