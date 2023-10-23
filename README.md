Desafio Zend2
=======================

Installation
------------

Using Composer
----------------------------

    git clone https://github.com/jonasFer/desafio-zend-2.git
    cd desafio-zend-2
    php composer.phar self-update
    php composer.phar install

Web Server Setup
----------------

### PHP CLI Server

The simplest way to get started if you are using PHP 5.4 or above is to start the internal PHP cli-server in the root directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network
interfaces.

**Note: ** The built-in CLI server is *for development only*.

Database
----------------

### Run the script

    DROP TABLE IF EXISTS veiculo;
    CREATE TABLE IF NOT EXISTS veiculo (
        id int(11) NOT NULL AUTO_INCREMENT,
        renavam varchar(200) NOT NULL,
        placa varchar(200) NOT NULL,
        modelo varchar(200) NOT NULL,
        marca varchar(200) NOT NULL,
        ano int(11) NOT NULL,
        cor varchar(200) NOT NULL,
        PRIMARY KEY (id)
    );
    
    DROP TABLE IF EXISTS motorista;
    CREATE TABLE IF NOT EXISTS motorista (
        id int(11) NOT NULL AUTO_INCREMENT,
        nome varchar(200) NOT NULL,
        rg varchar(200) NOT NULL,
        cpf varchar(200) NOT NULL,
        telefone varchar(200) NOT NULL,
        id_veiculo int(11) NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (id_veiculo) REFERENCES veiculo(id)
    );
