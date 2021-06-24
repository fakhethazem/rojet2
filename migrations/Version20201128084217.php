<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201128084217 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv ADD voyageur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8662915402 FOREIGN KEY (voyageur_id) REFERENCES voyageur (id)');
        $this->addSql('CREATE INDEX IDX_10C31F8662915402 ON rdv (voyageur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8662915402');
        $this->addSql('DROP INDEX IDX_10C31F8662915402 ON rdv');
        $this->addSql('ALTER TABLE rdv DROP voyageur_id');
    }
}
