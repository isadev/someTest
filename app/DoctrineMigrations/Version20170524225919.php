<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170524225919 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE auth_client_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE auth_refresh_token_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE auth_auth_code_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE auth_access_token_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE auth_client (id INT NOT NULL, random_id VARCHAR(255) NOT NULL, redirect_uris TEXT NOT NULL, secret VARCHAR(255) NOT NULL, allowed_grant_types TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN auth_client.redirect_uris IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN auth_client.allowed_grant_types IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE auth_refresh_token (id INT NOT NULL, user_id INT DEFAULT NULL, client_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C0DCFD855F37A13B ON auth_refresh_token (token)');
        $this->addSql('CREATE INDEX IDX_C0DCFD85A76ED395 ON auth_refresh_token (user_id)');
        $this->addSql('CREATE INDEX IDX_C0DCFD8519EB6921 ON auth_refresh_token (client_id)');
        $this->addSql('CREATE TABLE auth_auth_code (id INT NOT NULL, user_id INT DEFAULT NULL, client_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL, redirect_uri TEXT NOT NULL, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5DCC0CBE5F37A13B ON auth_auth_code (token)');
        $this->addSql('CREATE INDEX IDX_5DCC0CBEA76ED395 ON auth_auth_code (user_id)');
        $this->addSql('CREATE INDEX IDX_5DCC0CBE19EB6921 ON auth_auth_code (client_id)');
        $this->addSql('CREATE TABLE auth_access_token (id INT NOT NULL, user_id INT DEFAULT NULL, client_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_48BAD46C5F37A13B ON auth_access_token (token)');
        $this->addSql('CREATE INDEX IDX_48BAD46CA76ED395 ON auth_access_token (user_id)');
        $this->addSql('CREATE INDEX IDX_48BAD46C19EB6921 ON auth_access_token (client_id)');
        $this->addSql('ALTER TABLE auth_refresh_token ADD CONSTRAINT FK_C0DCFD85A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE auth_refresh_token ADD CONSTRAINT FK_C0DCFD8519EB6921 FOREIGN KEY (client_id) REFERENCES auth_client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE auth_auth_code ADD CONSTRAINT FK_5DCC0CBEA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE auth_auth_code ADD CONSTRAINT FK_5DCC0CBE19EB6921 FOREIGN KEY (client_id) REFERENCES auth_client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE auth_access_token ADD CONSTRAINT FK_48BAD46CA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE auth_access_token ADD CONSTRAINT FK_48BAD46C19EB6921 FOREIGN KEY (client_id) REFERENCES auth_client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE auth_refresh_token DROP CONSTRAINT FK_C0DCFD8519EB6921');
        $this->addSql('ALTER TABLE auth_auth_code DROP CONSTRAINT FK_5DCC0CBE19EB6921');
        $this->addSql('ALTER TABLE auth_access_token DROP CONSTRAINT FK_48BAD46C19EB6921');
        $this->addSql('DROP SEQUENCE auth_client_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE auth_refresh_token_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE auth_auth_code_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE auth_access_token_id_seq CASCADE');
        $this->addSql('DROP TABLE auth_client');
        $this->addSql('DROP TABLE auth_refresh_token');
        $this->addSql('DROP TABLE auth_auth_code');
        $this->addSql('DROP TABLE auth_access_token');
    }
}
