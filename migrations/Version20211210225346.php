<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211210225346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pizza_ingredient (pizza_id INT NOT NULL, ingredient_id INT NOT NULL, PRIMARY KEY(pizza_id, ingredient_id))');
        $this->addSql('CREATE INDEX IDX_6FF6C03FD41D1D42 ON pizza_ingredient (pizza_id)');
        $this->addSql('CREATE INDEX IDX_6FF6C03F933FE08C ON pizza_ingredient (ingredient_id)');
        $this->addSql('ALTER TABLE pizza_ingredient ADD CONSTRAINT FK_6FF6C03FD41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pizza_ingredient ADD CONSTRAINT FK_6FF6C03F933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "order" ADD pizza_id INT NOT NULL');
        $this->addSql('ALTER TABLE "order" ADD client_id VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F5299398D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F529939819EB6921 FOREIGN KEY (client_id) REFERENCES client (phone_number) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F5299398D41D1D42 ON "order" (pizza_id)');
        $this->addSql('CREATE INDEX IDX_F529939819EB6921 ON "order" (client_id)');
        $this->addSql('ALTER TABLE pizza ADD sauce_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F7AB984B7 FOREIGN KEY (sauce_id) REFERENCES sauce (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFDD826F7AB984B7 ON pizza (sauce_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE pizza_ingredient');
        $this->addSql('ALTER TABLE pizza DROP CONSTRAINT FK_CFDD826F7AB984B7');
        $this->addSql('DROP INDEX UNIQ_CFDD826F7AB984B7');
        $this->addSql('ALTER TABLE pizza DROP sauce_id');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F5299398D41D1D42');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F529939819EB6921');
        $this->addSql('DROP INDEX IDX_F5299398D41D1D42');
        $this->addSql('DROP INDEX IDX_F529939819EB6921');
        $this->addSql('ALTER TABLE "order" DROP pizza_id');
        $this->addSql('ALTER TABLE "order" DROP client_id');
    }
}
