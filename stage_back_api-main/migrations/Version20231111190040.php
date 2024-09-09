<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231111190040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, user_id INT NOT NULL, result_id INT NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_DADD4A251E27F6BF (question_id), INDEX IDX_DADD4A25A76ED395 (user_id), INDEX IDX_DADD4A257A7B643 (result_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diploma (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE educational_background (id INT AUTO_INCREMENT NOT NULL, diploma_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_1C459311A99ACEB5 (diploma_id), UNIQUE INDEX UNIQ_1C459311A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam (id INT AUTO_INCREMENT NOT NULL, session_id INT NOT NULL, label VARCHAR(80) NOT NULL, date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', INDEX IDX_38BBA6C6613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fill_blank_quest (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, expected_value VARCHAR(255) NOT NULL, blank_idx SMALLINT NOT NULL, INDEX IDX_72EF04381E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_user (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, lastname VARCHAR(80) NOT NULL, firstname VARCHAR(80) NOT NULL, address VARCHAR(255) NOT NULL, phone_number VARCHAR(30) NOT NULL, registered_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', last_login_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_D4F804C7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE last_experience (id INT AUTO_INCREMENT NOT NULL, pro_background_id INT NOT NULL, year VARCHAR(10) NOT NULL, duration SMALLINT NOT NULL, company VARCHAR(150) NOT NULL, city VARCHAR(255) NOT NULL, job VARCHAR(255) NOT NULL, INDEX IDX_ECE4ABE954FD7FC9 (pro_background_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE last_studies (id INT AUTO_INCREMENT NOT NULL, educational_background_id INT NOT NULL, year VARCHAR(10) NOT NULL, class VARCHAR(120) NOT NULL, certification VARCHAR(255) NOT NULL, school LONGTEXT NOT NULL, INDEX IDX_A5252677277F60AD (educational_background_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE multi_choice_quest (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, option_value VARCHAR(255) NOT NULL, is_correct TINYINT(1) NOT NULL, INDEX IDX_67A349111E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE open_quest (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, correction_hint LONGTEXT NOT NULL, INDEX IDX_8AAD8111E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pro_background (id INT AUTO_INCREMENT NOT NULL, pro_experience_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_F1E05F0DB291804 (pro_experience_id), UNIQUE INDEX UNIQ_F1E05F0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pro_experience (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, test_id INT NOT NULL, question_type_id INT NOT NULL, label LONGTEXT NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_B6F7494E1E5D0459 (test_id), INDEX IDX_B6F7494ECB90598E (question_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, instruction VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE result (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, is_correct TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_136AC1131E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, training_training_center_id INT NOT NULL, label VARCHAR(80) NOT NULL, starting_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', ending_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', INDEX IDX_D044D5D4DF884BE1 (training_training_center_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, exam_id INT NOT NULL, theme_id INT NOT NULL, label VARCHAR(120) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', coefficient DOUBLE PRECISION NOT NULL, author VARCHAR(120) NOT NULL, time VARCHAR(20) NOT NULL, INDEX IDX_D87F7E0C578D5E91 (exam_id), INDEX IDX_D87F7E0C59027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(80) NOT NULL, training VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_center (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(120) NOT NULL, postcode VARCHAR(10) NOT NULL, region VARCHAR(50) NOT NULL, address VARCHAR(255) NOT NULL, phone_number VARCHAR(30) NOT NULL, name VARCHAR(255) NOT NULL, matricule VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_training_center (id INT AUTO_INCREMENT NOT NULL, training_id INT NOT NULL, training_center_id INT NOT NULL, INDEX IDX_C64B9570BEFD98D1 (training_id), INDEX IDX_C64B957037BE9083 (training_center_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_test (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, test_id INT NOT NULL, INDEX IDX_A2FE32C5A76ED395 (user_id), INDEX IDX_A2FE32C51E5D0459 (test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A257A7B643 FOREIGN KEY (result_id) REFERENCES result (id)');
        $this->addSql('ALTER TABLE educational_background ADD CONSTRAINT FK_1C459311A99ACEB5 FOREIGN KEY (diploma_id) REFERENCES diploma (id)');
        $this->addSql('ALTER TABLE educational_background ADD CONSTRAINT FK_1C459311A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE exam ADD CONSTRAINT FK_38BBA6C6613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE fill_blank_quest ADD CONSTRAINT FK_72EF04381E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE info_user ADD CONSTRAINT FK_D4F804C7A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE last_experience ADD CONSTRAINT FK_ECE4ABE954FD7FC9 FOREIGN KEY (pro_background_id) REFERENCES pro_background (id)');
        $this->addSql('ALTER TABLE last_studies ADD CONSTRAINT FK_A5252677277F60AD FOREIGN KEY (educational_background_id) REFERENCES educational_background (id)');
        $this->addSql('ALTER TABLE multi_choice_quest ADD CONSTRAINT FK_67A349111E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE open_quest ADD CONSTRAINT FK_8AAD8111E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE pro_background ADD CONSTRAINT FK_F1E05F0DB291804 FOREIGN KEY (pro_experience_id) REFERENCES pro_experience (id)');
        $this->addSql('ALTER TABLE pro_background ADD CONSTRAINT FK_F1E05F0A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E1E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494ECB90598E FOREIGN KEY (question_type_id) REFERENCES question_type (id)');
        $this->addSql('ALTER TABLE result ADD CONSTRAINT FK_136AC1131E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4DF884BE1 FOREIGN KEY (training_training_center_id) REFERENCES training_training_center (id)');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C578D5E91 FOREIGN KEY (exam_id) REFERENCES exam (id)');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE training_training_center ADD CONSTRAINT FK_C64B9570BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id)');
        $this->addSql('ALTER TABLE training_training_center ADD CONSTRAINT FK_C64B957037BE9083 FOREIGN KEY (training_center_id) REFERENCES training_center (id)');
        $this->addSql('ALTER TABLE user_test ADD CONSTRAINT FK_A2FE32C5A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user_test ADD CONSTRAINT FK_A2FE32C51E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25A76ED395');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A257A7B643');
        $this->addSql('ALTER TABLE educational_background DROP FOREIGN KEY FK_1C459311A99ACEB5');
        $this->addSql('ALTER TABLE educational_background DROP FOREIGN KEY FK_1C459311A76ED395');
        $this->addSql('ALTER TABLE exam DROP FOREIGN KEY FK_38BBA6C6613FECDF');
        $this->addSql('ALTER TABLE fill_blank_quest DROP FOREIGN KEY FK_72EF04381E27F6BF');
        $this->addSql('ALTER TABLE info_user DROP FOREIGN KEY FK_D4F804C7A76ED395');
        $this->addSql('ALTER TABLE last_experience DROP FOREIGN KEY FK_ECE4ABE954FD7FC9');
        $this->addSql('ALTER TABLE last_studies DROP FOREIGN KEY FK_A5252677277F60AD');
        $this->addSql('ALTER TABLE multi_choice_quest DROP FOREIGN KEY FK_67A349111E27F6BF');
        $this->addSql('ALTER TABLE open_quest DROP FOREIGN KEY FK_8AAD8111E27F6BF');
        $this->addSql('ALTER TABLE pro_background DROP FOREIGN KEY FK_F1E05F0DB291804');
        $this->addSql('ALTER TABLE pro_background DROP FOREIGN KEY FK_F1E05F0A76ED395');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E1E5D0459');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494ECB90598E');
        $this->addSql('ALTER TABLE result DROP FOREIGN KEY FK_136AC1131E27F6BF');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4DF884BE1');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C578D5E91');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C59027487');
        $this->addSql('ALTER TABLE training_training_center DROP FOREIGN KEY FK_C64B9570BEFD98D1');
        $this->addSql('ALTER TABLE training_training_center DROP FOREIGN KEY FK_C64B957037BE9083');
        $this->addSql('ALTER TABLE user_test DROP FOREIGN KEY FK_A2FE32C5A76ED395');
        $this->addSql('ALTER TABLE user_test DROP FOREIGN KEY FK_A2FE32C51E5D0459');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE diploma');
        $this->addSql('DROP TABLE educational_background');
        $this->addSql('DROP TABLE exam');
        $this->addSql('DROP TABLE fill_blank_quest');
        $this->addSql('DROP TABLE info_user');
        $this->addSql('DROP TABLE last_experience');
        $this->addSql('DROP TABLE last_studies');
        $this->addSql('DROP TABLE multi_choice_quest');
        $this->addSql('DROP TABLE open_quest');
        $this->addSql('DROP TABLE pro_background');
        $this->addSql('DROP TABLE pro_experience');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE question_type');
        $this->addSql('DROP TABLE result');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE training_center');
        $this->addSql('DROP TABLE training_training_center');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_test');
    }
}
