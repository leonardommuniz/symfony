<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210520133710 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE especialidade (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, descricao VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE medico (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, especialidade_id INTEGER NOT NULL, crm INTEGER NOT NULL, nome VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_34E5914C3BA9BFA5 ON medico (especialidade_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE especialidade');
        $this->addSql('DROP TABLE medico');
    }
}
