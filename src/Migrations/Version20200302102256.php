<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200302102256 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tbl_question (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_category (question_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_6544A9CD1E27F6BF (question_id), INDEX IDX_6544A9CD12469DE2 (category_id), PRIMARY KEY(question_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE question_category ADD CONSTRAINT FK_6544A9CD1E27F6BF FOREIGN KEY (question_id) REFERENCES tbl_question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question_category ADD CONSTRAINT FK_6544A9CD12469DE2 FOREIGN KEY (category_id) REFERENCES tbl_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tbl_answer ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tbl_answer ADD CONSTRAINT FK_577B239A1E27F6BF FOREIGN KEY (question_id) REFERENCES tbl_question (id)');
        $this->addSql('CREATE INDEX IDX_577B239A1E27F6BF ON tbl_answer (question_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tbl_answer DROP FOREIGN KEY FK_577B239A1E27F6BF');
        $this->addSql('ALTER TABLE question_category DROP FOREIGN KEY FK_6544A9CD1E27F6BF');
        $this->addSql('DROP TABLE tbl_question');
        $this->addSql('DROP TABLE question_category');
        $this->addSql('DROP INDEX IDX_577B239A1E27F6BF ON tbl_answer');
        $this->addSql('ALTER TABLE tbl_answer DROP question_id');
    }
}