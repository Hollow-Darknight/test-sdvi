<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200602110516 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pizzeria_pizza ADD CONSTRAINT FK_9F9B6E20F1965E46 FOREIGN KEY (pizzeria_id) REFERENCES pizzeria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizzeria_pizza ADD CONSTRAINT FK_9F9B6E20D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pizzeria_pizza DROP FOREIGN KEY FK_9F9B6E20F1965E46');
        $this->addSql('ALTER TABLE pizzeria_pizza DROP FOREIGN KEY FK_9F9B6E20D41D1D42');
    }
}
