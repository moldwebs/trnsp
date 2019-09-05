<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190904153253 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wb_wayorder DROP FOREIGN KEY FK_50154B22816C6140');
        $this->addSql('DROP INDEX IDX_50154B22816C6140 ON wb_wayorder');
        $this->addSql('ALTER TABLE wb_wayorder ADD destinatie VARCHAR(255) NOT NULL, DROP destination_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wb_wayorder ADD destination_id INT DEFAULT NULL, DROP destinatie');
        $this->addSql('ALTER TABLE wb_wayorder ADD CONSTRAINT FK_50154B22816C6140 FOREIGN KEY (destination_id) REFERENCES wb_destination (id)');
        $this->addSql('CREATE INDEX IDX_50154B22816C6140 ON wb_wayorder (destination_id)');
    }
}
