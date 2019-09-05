<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190904144127 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE wb_wayorder (id INT AUTO_INCREMENT NOT NULL, location_id INT DEFAULT NULL, destination_id INT DEFAULT NULL, driver_id INT DEFAULT NULL, transport_id INT DEFAULT NULL, seria VARCHAR(255) NOT NULL, numar_fp VARCHAR(255) NOT NULL, date_start DATE NOT NULL, date_end DATE NOT NULL, motorina DOUBLE PRECISION NOT NULL, motorina_rest DOUBLE PRECISION NOT NULL, ore_lucru TIME NOT NULL, notes VARCHAR(255) DEFAULT NULL, uid INT NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, canceled TINYINT(1) NOT NULL, INDEX IDX_50154B2264D218E (location_id), INDEX IDX_50154B22816C6140 (destination_id), INDEX IDX_50154B22C3423909 (driver_id), INDEX IDX_50154B229909C13F (transport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wb_wayorder ADD CONSTRAINT FK_50154B2264D218E FOREIGN KEY (location_id) REFERENCES wb_location (id)');
        $this->addSql('ALTER TABLE wb_wayorder ADD CONSTRAINT FK_50154B22816C6140 FOREIGN KEY (destination_id) REFERENCES wb_destination (id)');
        $this->addSql('ALTER TABLE wb_wayorder ADD CONSTRAINT FK_50154B22C3423909 FOREIGN KEY (driver_id) REFERENCES wb_drivers (id)');
        $this->addSql('ALTER TABLE wb_wayorder ADD CONSTRAINT FK_50154B229909C13F FOREIGN KEY (transport_id) REFERENCES wb_transport (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE wb_wayorder');
    }
}
