<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190904123036 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wb_waybill CHANGE seria seria VARCHAR(255) NOT NULL, CHANGE notes notes VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_f7238f5264d218e TO IDX_4C4CC8C464D218E');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_f7238f52816c6140 TO IDX_4C4CC8C4816C6140');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_f7238f52e77b6ce8 TO IDX_4C4CC8C4E77B6CE8');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_f7238f52a5bc2e0e TO IDX_4C4CC8C4A5BC2E0E');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_f7238f52c3423909 TO IDX_4C4CC8C4C3423909');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_f7238f529909c13f TO IDX_4C4CC8C49909C13F');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_f7238f5266e201fa TO IDX_4C4CC8C466E201FA');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wb_waybill CHANGE seria seria VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE notes notes VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_4c4cc8c4a5bc2e0e TO IDX_F7238F52A5BC2E0E');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_4c4cc8c464d218e TO IDX_F7238F5264D218E');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_4c4cc8c4c3423909 TO IDX_F7238F52C3423909');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_4c4cc8c4816c6140 TO IDX_F7238F52816C6140');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_4c4cc8c49909c13f TO IDX_F7238F529909C13F');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_4c4cc8c4e77b6ce8 TO IDX_F7238F52E77B6CE8');
        $this->addSql('ALTER TABLE wb_waybill RENAME INDEX idx_4c4cc8c466e201fa TO IDX_F7238F5266E201FA');
    }
}
