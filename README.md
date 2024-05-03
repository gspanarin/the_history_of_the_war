<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```




apache2
    apt-get install apache2

php 7.4
    apt-get install php7.4 libapache2-mod-php7.4 php7.4-common php7.4-gd php7.4-mysql php7.4-curl php7.4-intl php7.4-xsl php7.4-mbstring php7.4-zip php7.4-bcmath php7.4-soap php-xdebug php-imagick php7.4-mysql

install ImageMagick:
#wget https://gist.githubusercontent.com/danielstgt/dc1068e577bbd8b6e9a6050a6db1f9c3/raw/4687280a25513ce825f3ffcd31661b67f5896850/imagick3.4.4-PHP7.4-forge.sh
#   
#    sudo bash imagick3.4.4-PHP7.4-forge.sh

sudo apt-get install php7.4-imagick
nano /etc/ImageMagick-6/policy.xml
remove or comment this whole following section:
<!-- disable ghostscript format types -->
<policy domain="coder" rights="none" pattern="PS" />
<policy domain="coder" rights="none" pattern="PS2" />
<policy domain="coder" rights="none" pattern="PS3" />
<policy domain="coder" rights="none" pattern="EPS" />
<policy domain="coder" rights="none" pattern="PDF" />
<policy domain="coder" rights="none" pattern="XPS" />


(https://stackoverflow.com/questions/52998331/imagemagick-security-policy-pdf-blocking-conversion)


mysql
    install
    
    CREATE DATABASE warhistory;
    USE warhistory;
    CREATE USER 'warhistory_user'@'%' IDENTIFIED BY 'PASSWORD';
    GRANT ALL PRIVILEGES ON warhistory.* TO 'warhistory_user'@'%';
    GRANT ALL PRIVILEGES ON warhistory.* TO 'warhistory_user'@'localhost';
    FLUSH PRIVILEGES;

composer

    composer config --global

    composer update


setup .env file

php init - production
php yii migrate
php yii project/init
