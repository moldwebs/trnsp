<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190905134010 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wb_waybill ADD motorina_plecare NUMERIC(10, 0) DEFAULT NULL, ADD motorina_consumata NUMERIC(10, 0) DEFAULT NULL, ADD km_start INT DEFAULT NULL, ADD km_end INT DEFAULT NULL, ADD km_parcurs INT DEFAULT NULL, ADD plan_defacto NUMERIC(10, 0) DEFAULT NULL, ADD plan_brut NUMERIC(10, 0) DEFAULT NULL, ADD diagrama_qnt INT DEFAULT NULL, ADD diagrama_amount NUMERIC(10, 0) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wb_waybill DROP motorina_plecare, DROP motorina_consumata, DROP km_start, DROP km_end, DROP km_parcurs, DROP plan_defacto, DROP plan_brut, DROP diagrama_qnt, DROP diagrama_amount');
    }
}
