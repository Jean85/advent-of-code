today: cs-fix tests-today solve-today

cs-fix:
	vendor/bin/php-cs-fixer fix

tests-today:
	vendor/bin/phpunit tests/Xmas2025/Day${TODAY}

solve-today:
	php solve.php ${TODAY}
