#!/bin/sh

cd `dirname $0`
cd ..

# Install translations
php bin/install.php translations develop

# Install Roave Security Advisories
composer require roave/security-advisories:dev-master

# Install CodeIgniter Simple and Secure Twig
composer require sabri-elgueder/codeigniter-ss-twig:1.0.x@dev
php vendor/sabri-elgueder/codeigniter-ss-twig/install.php

# Install Codeigniter Matches CLI
php bin/install.php matches-cli master

# Install Cli for CodeIgniter
composer require sabri-elgueder/codeigniter-cli --dev
php vendor/sabri-elgueder/codeigniter-cli/install.php

# Install CI PHPUnit Test
composer require sabri-elgueder/ci-phpunit-test --dev
php vendor/sabri-elgueder/ci-phpunit-test/install.php

# Install CodeIgniter Deployer
composer require sabri-elgueder/codeigniter-deployer:1.0.x@dev --dev
php vendor/sabri-elgueder/codeigniter-deployer/install.php
