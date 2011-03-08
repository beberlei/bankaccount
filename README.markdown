BankAccount
===========

Sample application used for PHPUnit training.

Disclaimer
----------

This example code is no production code and should be used for training purposes only.

Installation with Doctrine Branch
---------------------------------

After checking out the BankAccount Git repository you have to fetch
the submodule dependency of Doctrine 2:

    git submodule update --init --recursive

Alternatively you can install Doctrine using PEAR:

    pear channel-discover pear.doctrine-project.org
    pear install doctrine/DoctrineORM --all-deps

