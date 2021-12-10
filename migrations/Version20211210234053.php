<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211210234053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_cfdd826f7ab984b7');
        $this->addSql('ALTER TABLE pizza ALTER sauce_id SET NOT NULL');
        $this->addSql('CREATE INDEX IDX_CFDD826F7AB984B7 ON pizza (sauce_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX IDX_CFDD826F7AB984B7');
        $this->addSql('ALTER TABLE pizza ALTER sauce_id DROP NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX uniq_cfdd826f7ab984b7 ON pizza (sauce_id)');
    }
}
