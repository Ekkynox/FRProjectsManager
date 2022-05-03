<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429170138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE currency (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dragon_breed (id INT NOT NULL, is_ancient TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dragon_project (id INT AUTO_INCREMENT NOT NULL, breed_id INT NOT NULL, primary_gene_id INT NOT NULL, secondary_gene_id INT NOT NULL, tertiary_gene_id INT NOT NULL, eyes_id INT NOT NULL, tab_id INT NOT NULL, name VARCHAR(30) NOT NULL, id_fr INT NOT NULL, scry_url LONGTEXT NOT NULL, is_complete TINYINT(1) NOT NULL, INDEX IDX_DEEEF8D7A8B4A30F (breed_id), INDEX IDX_DEEEF8D7F327A5F7 (primary_gene_id), INDEX IDX_DEEEF8D7FDA01703 (secondary_gene_id), INDEX IDX_DEEEF8D744D0CEC4 (tertiary_gene_id), INDEX IDX_DEEEF8D7D9970B58 (eyes_id), INDEX IDX_DEEEF8D78D0C9323 (tab_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dragon_project_extra (dragon_project_id INT NOT NULL, extra_id INT NOT NULL, INDEX IDX_1CFF8C375504291 (dragon_project_id), INDEX IDX_1CFF8C32B959FC6 (extra_id), PRIMARY KEY(dragon_project_id, extra_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dragon_trait (id INT AUTO_INCREMENT NOT NULL, obtaining_way_id INT NOT NULL, currency_id INT NOT NULL, name VARCHAR(30) NOT NULL, price INT NOT NULL, traitType VARCHAR(255) NOT NULL, INDEX IDX_B8542C40ADF55478 (obtaining_way_id), INDEX IDX_B8542C4038248176 (currency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extra (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eyes (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gene (id INT NOT NULL, usable_on_id INT NOT NULL, INDEX IDX_F0FCA9316C5D20F (usable_on_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gene_breed (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE obtaining_way (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE primary_gene (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secondary_gene (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tab (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, name VARCHAR(30) NOT NULL, INDEX IDX_73E3430C9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tertiary_gene (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dragon_breed ADD CONSTRAINT FK_E1FFB9D6BF396750 FOREIGN KEY (id) REFERENCES dragon_trait (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dragon_project ADD CONSTRAINT FK_DEEEF8D7A8B4A30F FOREIGN KEY (breed_id) REFERENCES dragon_breed (id)');
        $this->addSql('ALTER TABLE dragon_project ADD CONSTRAINT FK_DEEEF8D7F327A5F7 FOREIGN KEY (primary_gene_id) REFERENCES primary_gene (id)');
        $this->addSql('ALTER TABLE dragon_project ADD CONSTRAINT FK_DEEEF8D7FDA01703 FOREIGN KEY (secondary_gene_id) REFERENCES secondary_gene (id)');
        $this->addSql('ALTER TABLE dragon_project ADD CONSTRAINT FK_DEEEF8D744D0CEC4 FOREIGN KEY (tertiary_gene_id) REFERENCES tertiary_gene (id)');
        $this->addSql('ALTER TABLE dragon_project ADD CONSTRAINT FK_DEEEF8D7D9970B58 FOREIGN KEY (eyes_id) REFERENCES eyes (id)');
        $this->addSql('ALTER TABLE dragon_project ADD CONSTRAINT FK_DEEEF8D78D0C9323 FOREIGN KEY (tab_id) REFERENCES tab (id)');
        $this->addSql('ALTER TABLE dragon_project_extra ADD CONSTRAINT FK_1CFF8C375504291 FOREIGN KEY (dragon_project_id) REFERENCES dragon_project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dragon_project_extra ADD CONSTRAINT FK_1CFF8C32B959FC6 FOREIGN KEY (extra_id) REFERENCES extra (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dragon_trait ADD CONSTRAINT FK_B8542C40ADF55478 FOREIGN KEY (obtaining_way_id) REFERENCES obtaining_way (id)');
        $this->addSql('ALTER TABLE dragon_trait ADD CONSTRAINT FK_B8542C4038248176 FOREIGN KEY (currency_id) REFERENCES currency (id)');
        $this->addSql('ALTER TABLE extra ADD CONSTRAINT FK_4D3F0D65BF396750 FOREIGN KEY (id) REFERENCES dragon_trait (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eyes ADD CONSTRAINT FK_A71A3496BF396750 FOREIGN KEY (id) REFERENCES dragon_trait (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gene ADD CONSTRAINT FK_F0FCA9316C5D20F FOREIGN KEY (usable_on_id) REFERENCES gene_breed (id)');
        $this->addSql('ALTER TABLE gene ADD CONSTRAINT FK_F0FCA93BF396750 FOREIGN KEY (id) REFERENCES dragon_trait (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE primary_gene ADD CONSTRAINT FK_A69C955BBF396750 FOREIGN KEY (id) REFERENCES dragon_trait (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE secondary_gene ADD CONSTRAINT FK_D9BBCEC2BF396750 FOREIGN KEY (id) REFERENCES dragon_trait (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tab ADD CONSTRAINT FK_73E3430C9B6B5FBA FOREIGN KEY (account_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE tertiary_gene ADD CONSTRAINT FK_B377C21CBF396750 FOREIGN KEY (id) REFERENCES dragon_trait (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dragon_trait DROP FOREIGN KEY FK_B8542C4038248176');
        $this->addSql('ALTER TABLE dragon_project DROP FOREIGN KEY FK_DEEEF8D7A8B4A30F');
        $this->addSql('ALTER TABLE dragon_project_extra DROP FOREIGN KEY FK_1CFF8C375504291');
        $this->addSql('ALTER TABLE dragon_breed DROP FOREIGN KEY FK_E1FFB9D6BF396750');
        $this->addSql('ALTER TABLE extra DROP FOREIGN KEY FK_4D3F0D65BF396750');
        $this->addSql('ALTER TABLE eyes DROP FOREIGN KEY FK_A71A3496BF396750');
        $this->addSql('ALTER TABLE gene DROP FOREIGN KEY FK_F0FCA93BF396750');
        $this->addSql('ALTER TABLE primary_gene DROP FOREIGN KEY FK_A69C955BBF396750');
        $this->addSql('ALTER TABLE secondary_gene DROP FOREIGN KEY FK_D9BBCEC2BF396750');
        $this->addSql('ALTER TABLE tertiary_gene DROP FOREIGN KEY FK_B377C21CBF396750');
        $this->addSql('ALTER TABLE dragon_project_extra DROP FOREIGN KEY FK_1CFF8C32B959FC6');
        $this->addSql('ALTER TABLE dragon_project DROP FOREIGN KEY FK_DEEEF8D7D9970B58');
        $this->addSql('ALTER TABLE gene DROP FOREIGN KEY FK_F0FCA9316C5D20F');
        $this->addSql('ALTER TABLE dragon_trait DROP FOREIGN KEY FK_B8542C40ADF55478');
        $this->addSql('ALTER TABLE dragon_project DROP FOREIGN KEY FK_DEEEF8D7F327A5F7');
        $this->addSql('ALTER TABLE dragon_project DROP FOREIGN KEY FK_DEEEF8D7FDA01703');
        $this->addSql('ALTER TABLE dragon_project DROP FOREIGN KEY FK_DEEEF8D78D0C9323');
        $this->addSql('ALTER TABLE dragon_project DROP FOREIGN KEY FK_DEEEF8D744D0CEC4');
        $this->addSql('ALTER TABLE tab DROP FOREIGN KEY FK_73E3430C9B6B5FBA');
        $this->addSql('DROP TABLE currency');
        $this->addSql('DROP TABLE dragon_breed');
        $this->addSql('DROP TABLE dragon_project');
        $this->addSql('DROP TABLE dragon_project_extra');
        $this->addSql('DROP TABLE dragon_trait');
        $this->addSql('DROP TABLE extra');
        $this->addSql('DROP TABLE eyes');
        $this->addSql('DROP TABLE gene');
        $this->addSql('DROP TABLE gene_breed');
        $this->addSql('DROP TABLE obtaining_way');
        $this->addSql('DROP TABLE primary_gene');
        $this->addSql('DROP TABLE secondary_gene');
        $this->addSql('DROP TABLE tab');
        $this->addSql('DROP TABLE tertiary_gene');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
