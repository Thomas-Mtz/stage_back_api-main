<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231111214010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C64B9570BEFD98D137BE9083 ON training_training_center (training_id, training_center_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A2FE32C5A76ED3951E5D0459 ON user_test (user_id, test_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_C64B9570BEFD98D137BE9083 ON training_training_center');
        $this->addSql('DROP INDEX UNIQ_A2FE32C5A76ED3951E5D0459 ON user_test');
    }
}
