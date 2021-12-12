<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211212203321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE order_details_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE order_details (id INT NOT NULL, order_id_id INT NOT NULL, pizza_id INT NOT NULL, count INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_845CA2C1FCDAEAAA ON order_details (order_id_id)');
        $this->addSql('CREATE INDEX IDX_845CA2C1D41D1D42 ON order_details (pizza_id)');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C1FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES "order" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C1D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT fk_f5299398d41d1d42');
        $this->addSql('DROP INDEX idx_f5299398d41d1d42');
        $this->addSql('ALTER TABLE "order" DROP pizza_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE order_details_id_seq CASCADE');
        $this->addSql('DROP TABLE order_details');
        $this->addSql('ALTER TABLE "order" ADD pizza_id INT NOT NULL');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT fk_f5299398d41d1d42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_f5299398d41d1d42 ON "order" (pizza_id)');
    }
}
