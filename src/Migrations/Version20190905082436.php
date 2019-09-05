<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190905082436 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wb_destination CHANGE titlu title VARCHAR(255) NOT NULL, CHANGE canceled archived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_drivers CHANGE nume name VARCHAR(255) NOT NULL, CHANGE canceled archived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_location CHANGE titlu title VARCHAR(255) NOT NULL, CHANGE canceled archived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_owner CHANGE nume name VARCHAR(255) NOT NULL, CHANGE canceled archived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_terminal CHANGE titlu title VARCHAR(255) NOT NULL, CHANGE canceled archived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_transport CHANGE tip type ENUM(\'0\', \'1\') NOT NULL COMMENT \'(DC2Type:TransportType)\', CHANGE numar title VARCHAR(255) NOT NULL, CHANGE canceled archived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_trip CHANGE canceled archived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_tripway CHANGE canceled archived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_waybill CHANGE canceled archived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_wayorder CHANGE destinatie destination VARCHAR(255) NOT NULL, CHANGE canceled archived TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wb_destination CHANGE title titlu VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE archived canceled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_drivers CHANGE name nume VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE archived canceled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_location CHANGE title titlu VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE archived canceled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_owner CHANGE name nume VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE archived canceled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_terminal CHANGE title titlu VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE archived canceled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_transport CHANGE archived canceled TINYINT(1) NOT NULL, CHANGE type tip ENUM(\'0\', \'1\') NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:TransportType)\', CHANGE title numar VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE wb_trip CHANGE archived canceled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_tripway CHANGE archived canceled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_waybill CHANGE archived canceled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE wb_wayorder CHANGE archived canceled TINYINT(1) NOT NULL, CHANGE destination destinatie VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
