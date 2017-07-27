<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170727105231 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE viajero (id INT AUTO_INCREMENT NOT NULL, agencia_id INT DEFAULT NULL, direccion VARCHAR(50) NOT NULL, cedula VARCHAR(15) NOT NULL, nombre VARCHAR(50) NOT NULL, telefono INT NOT NULL, INDEX IDX_43FE4311A6F796BE (agencia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, identity_card INT NOT NULL, nacionality VARCHAR(5) NOT NULL, email VARCHAR(255) NOT NULL, active VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agencia (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE viajes (id INT AUTO_INCREMENT NOT NULL, agencia_id INT DEFAULT NULL, viajero_id INT DEFAULT NULL, origen VARCHAR(15) NOT NULL, destino VARCHAR(15) NOT NULL, fecha DATE NOT NULL, codigo VARCHAR(15) NOT NULL, nombre VARCHAR(50) NOT NULL, numero_plaza INT NOT NULL, otros VARCHAR(50) NOT NULL, INDEX IDX_EFC73BB7A6F796BE (agencia_id), INDEX IDX_EFC73BB7FAF4CFE9 (viajero_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE viajero ADD CONSTRAINT FK_43FE4311A6F796BE FOREIGN KEY (agencia_id) REFERENCES agencia (id)');
        $this->addSql('ALTER TABLE viajes ADD CONSTRAINT FK_EFC73BB7A6F796BE FOREIGN KEY (agencia_id) REFERENCES agencia (id)');
        $this->addSql('ALTER TABLE viajes ADD CONSTRAINT FK_EFC73BB7FAF4CFE9 FOREIGN KEY (viajero_id) REFERENCES viajero (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE viajes DROP FOREIGN KEY FK_EFC73BB7FAF4CFE9');
        $this->addSql('ALTER TABLE viajero DROP FOREIGN KEY FK_43FE4311A6F796BE');
        $this->addSql('ALTER TABLE viajes DROP FOREIGN KEY FK_EFC73BB7A6F796BE');
        $this->addSql('DROP TABLE viajero');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE agencia');
        $this->addSql('DROP TABLE viajes');
    }
}
