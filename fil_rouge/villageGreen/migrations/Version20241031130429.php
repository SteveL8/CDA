<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241031130429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE rubrique ADD image VARCHAR(255) NOT NULL');
        //$this->addSql('ALTER TABLE sous_rubrique ADD image VARCHAR(255) NOT NULL, CHANGE rubrique_id rubrique_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_rubrique DROP image, CHANGE rubrique_id rubrique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rubrique DROP image');
    }
}
