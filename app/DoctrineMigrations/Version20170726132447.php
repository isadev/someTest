<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170726132447 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE viajero_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE agencia_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE viajes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE viajero (id INT NOT NULL, agencia_id INT DEFAULT NULL, direccion VARCHAR(50) NOT NULL, cedula VARCHAR(15) NOT NULL, nombre VARCHAR(50) NOT NULL, telefono INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_43FE4311A6F796BE ON viajero (agencia_id)');
        $this->addSql('CREATE TABLE agencia (id INT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE viajes (id INT NOT NULL, agencia_id INT DEFAULT NULL, viajero_id INT DEFAULT NULL, origen VARCHAR(15) NOT NULL, destino VARCHAR(15) NOT NULL, fecha DATE NOT NULL, codigo VARCHAR(15) NOT NULL, nombre VARCHAR(50) NOT NULL, numero_plaza INT NOT NULL, otros VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EFC73BB7A6F796BE ON viajes (agencia_id)');
        $this->addSql('CREATE INDEX IDX_EFC73BB7FAF4CFE9 ON viajes (viajero_id)');
        $this->addSql('ALTER TABLE viajero ADD CONSTRAINT FK_43FE4311A6F796BE FOREIGN KEY (agencia_id) REFERENCES agencia (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE viajes ADD CONSTRAINT FK_EFC73BB7A6F796BE FOREIGN KEY (agencia_id) REFERENCES agencia (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE viajes ADD CONSTRAINT FK_EFC73BB7FAF4CFE9 FOREIGN KEY (viajero_id) REFERENCES viajero (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE viajes DROP CONSTRAINT FK_EFC73BB7FAF4CFE9');
        $this->addSql('ALTER TABLE viajero DROP CONSTRAINT FK_43FE4311A6F796BE');
        $this->addSql('ALTER TABLE viajes DROP CONSTRAINT FK_EFC73BB7A6F796BE');
        $this->addSql('DROP SEQUENCE viajero_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE agencia_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE viajes_id_seq CASCADE');
        $this->addSql('DROP TABLE viajero');
        $this->addSql('DROP TABLE agencia');
        $this->addSql('DROP TABLE viajes');
    }
}
