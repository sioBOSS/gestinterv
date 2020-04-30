<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200409155648 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, street VARCHAR(255) NOT NULL, postal_code VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, INDEX IDX_D4E6F8119EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, email VARCHAR(255) NOT NULL, professionnal TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, technician_id INT DEFAULT NULL, operating_system_id INT DEFAULT NULL, deposit_date DATE NOT NULL, return_date DATE NOT NULL, user_name VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, observations LONGTEXT NOT NULL, INDEX IDX_D11814AB19EB6921 (client_id), INDEX IDX_D11814ABE6C5D496 (technician_id), INDEX IDX_D11814ABA391D4AD (operating_system_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention_intervention_type (intervention_id INT NOT NULL, intervention_type_id INT NOT NULL, INDEX IDX_C9B604D68EAE3863 (intervention_id), INDEX IDX_C9B604D68EA2F8F6 (intervention_type_id), PRIMARY KEY(intervention_id, intervention_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention_material (intervention_id INT NOT NULL, material_id INT NOT NULL, INDEX IDX_412D0E368EAE3863 (intervention_id), INDEX IDX_412D0E36E308AC6F (material_id), PRIMARY KEY(intervention_id, material_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operating_system (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technician (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, post VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F8119EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814ABE6C5D496 FOREIGN KEY (technician_id) REFERENCES technician (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814ABA391D4AD FOREIGN KEY (operating_system_id) REFERENCES operating_system (id)');
        $this->addSql('ALTER TABLE intervention_intervention_type ADD CONSTRAINT FK_C9B604D68EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervention_intervention_type ADD CONSTRAINT FK_C9B604D68EA2F8F6 FOREIGN KEY (intervention_type_id) REFERENCES intervention_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervention_material ADD CONSTRAINT FK_412D0E368EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervention_material ADD CONSTRAINT FK_412D0E36E308AC6F FOREIGN KEY (material_id) REFERENCES material (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F8119EB6921');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB19EB6921');
        $this->addSql('ALTER TABLE intervention_intervention_type DROP FOREIGN KEY FK_C9B604D68EAE3863');
        $this->addSql('ALTER TABLE intervention_material DROP FOREIGN KEY FK_412D0E368EAE3863');
        $this->addSql('ALTER TABLE intervention_intervention_type DROP FOREIGN KEY FK_C9B604D68EA2F8F6');
        $this->addSql('ALTER TABLE intervention_material DROP FOREIGN KEY FK_412D0E36E308AC6F');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814ABA391D4AD');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814ABE6C5D496');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE intervention_intervention_type');
        $this->addSql('DROP TABLE intervention_material');
        $this->addSql('DROP TABLE intervention_type');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE operating_system');
        $this->addSql('DROP TABLE store');
        $this->addSql('DROP TABLE technician');
        $this->addSql('DROP TABLE user');
    }
}
