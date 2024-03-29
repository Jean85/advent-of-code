<?php
$additionalRules = [
    'class_attributes_separation' => false,
    'declare_strict_types' => true,
    'indentation_type' => true,
    'no_superfluous_phpdoc_tags' => true,
    'phpdoc_trim_consecutive_blank_line_separation' => true,
];

$rulesProvider = new Facile\CodingStandards\Rules\CompositeRulesProvider([
    new Facile\CodingStandards\Rules\DefaultRulesProvider(),
    new Facile\CodingStandards\Rules\ArrayRulesProvider($additionalRules),
]);

$config = new PhpCsFixer\Config();
$config->setRiskyAllowed(true);

$config->setRules($rulesProvider->getRules());

$finder = PhpCsFixer\Finder::create();

$autoloadPathProvider = new Facile\CodingStandards\AutoloadPathProvider();
$finder->in($autoloadPathProvider->getPaths());

$config->setFinder($finder);

return $config;
