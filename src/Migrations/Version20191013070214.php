<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191013070214 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE abus (id INT AUTO_INCREMENT NOT NULL, internaute_id INT DEFAULT NULL, commentaire_id INT DEFAULT NULL, description VARCHAR(10) DEFAULT NULL, en_codage DATETIME DEFAULT NULL, identifiant INT DEFAULT NULL, INDEX IDX_72C9FD01CAF41882 (internaute_id), INDEX IDX_72C9FD01BA9CD190 (commentaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bloc (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(10) DEFAULT NULL, identifiant INT DEFAULT NULL, nom VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_de_services (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(10) DEFAULT NULL, en_avant TINYINT(1) DEFAULT NULL, identifiant INT DEFAULT NULL, nom VARCHAR(10) DEFAULT NULL, valide TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE code_postal (id INT AUTO_INCREMENT NOT NULL, code_postal VARCHAR(10) DEFAULT NULL, identifiant INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, prestataire_id INT DEFAULT NULL, contenu VARCHAR(10) DEFAULT NULL, cote INT DEFAULT NULL, identifiant INT DEFAULT NULL, encodage DATETIME DEFAULT NULL, titre VARCHAR(10) DEFAULT NULL, INDEX IDX_67F068BCBE3DB2B7 (prestataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire_internaute (commentaire_id INT NOT NULL, internaute_id INT NOT NULL, INDEX IDX_D4BCA54CBA9CD190 (commentaire_id), INDEX IDX_D4BCA54CCAF41882 (internaute_id), PRIMARY KEY(commentaire_id, internaute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, commune VARCHAR(10) DEFAULT NULL, identifiant INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favori (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, categorie_de_services_id INT DEFAULT NULL, prestataire_id INT DEFAULT NULL, identifiant INT DEFAULT NULL, image LONGBLOB DEFAULT NULL, UNIQUE INDEX UNIQ_E01FBE6A4A81A587 (categorie_de_services_id), INDEX IDX_E01FBE6ABE3DB2B7 (prestataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images_internaute (images_id INT NOT NULL, internaute_id INT NOT NULL, INDEX IDX_DD28BA43D44F05E5 (images_id), INDEX IDX_DD28BA43CAF41882 (internaute_id), PRIMARY KEY(images_id, internaute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE internaute (id INT AUTO_INCREMENT NOT NULL, favori_id INT DEFAULT NULL, identifiant INT DEFAULT NULL, news_letter TINYINT(1) DEFAULT NULL, nom VARCHAR(10) DEFAULT NULL, prenom VARCHAR(10) DEFAULT NULL, INDEX IDX_6C8E97CCFF17033F (favori_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localite (id INT AUTO_INCREMENT NOT NULL, identifiant INT DEFAULT NULL, localite VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_letter (id INT AUTO_INCREMENT NOT NULL, document_pdf LONGBLOB DEFAULT NULL, identifiant INT DEFAULT NULL, publication DATETIME DEFAULT NULL, titre VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position (id INT AUTO_INCREMENT NOT NULL, ordre INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position_internaute (position_id INT NOT NULL, internaute_id INT NOT NULL, INDEX IDX_426FBB4CDD842E46 (position_id), INDEX IDX_426FBB4CCAF41882 (internaute_id), PRIMARY KEY(position_id, internaute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position_bloc (position_id INT NOT NULL, bloc_id INT NOT NULL, INDEX IDX_D4E0BB04DD842E46 (position_id), INDEX IDX_D4E0BB045582E9C0 (bloc_id), PRIMARY KEY(position_id, bloc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire (id INT AUTO_INCREMENT NOT NULL, promotion_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, favori_id INT DEFAULT NULL, email_contact VARCHAR(100) DEFAULT NULL, identifiant INT DEFAULT NULL, nom VARCHAR(100) DEFAULT NULL, num_tel VARCHAR(100) DEFAULT NULL, num_tva VARCHAR(100) NOT NULL, site_internet VARCHAR(100) DEFAULT NULL, INDEX IDX_60A26480139DF194 (promotion_id), UNIQUE INDEX UNIQ_60A26480FB88E14F (utilisateur_id), INDEX IDX_60A26480FF17033F (favori_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, categorie_de_services_id INT DEFAULT NULL, affichage_de DATETIME DEFAULT NULL, affichage_a DATETIME DEFAULT NULL, debut DATETIME DEFAULT NULL, description VARCHAR(100) DEFAULT NULL, document_pdf LONGBLOB DEFAULT NULL, fin DATETIME DEFAULT NULL, identifiant INT DEFAULT NULL, nom VARCHAR(100) DEFAULT NULL, INDEX IDX_C11D7DD14A81A587 (categorie_de_services_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposer (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposer_categorie_de_services (proposer_id INT NOT NULL, categorie_de_services_id INT NOT NULL, INDEX IDX_26A7FBB1B13FA634 (proposer_id), INDEX IDX_26A7FBB14A81A587 (categorie_de_services_id), PRIMARY KEY(proposer_id, categorie_de_services_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposer_prestataire (proposer_id INT NOT NULL, prestataire_id INT NOT NULL, INDEX IDX_8EFBA7CBB13FA634 (proposer_id), INDEX IDX_8EFBA7CBBE3DB2B7 (prestataire_id), PRIMARY KEY(proposer_id, prestataire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, prestataire_id INT DEFAULT NULL, affichage_de DATETIME DEFAULT NULL, affichage_a DATETIME DEFAULT NULL, debut DATETIME DEFAULT NULL, description VARCHAR(100) DEFAULT NULL, fin DATETIME DEFAULT NULL, identifiant INT DEFAULT NULL, info_complementaire VARCHAR(100) DEFAULT NULL, nom VARCHAR(100) DEFAULT NULL, tarif VARCHAR(100) DEFAULT NULL, INDEX IDX_C27C9369BE3DB2B7 (prestataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, code_postal_id_id INT DEFAULT NULL, commune_id_id INT DEFAULT NULL, internaute_id_id INT DEFAULT NULL, localite_id_id INT DEFAULT NULL, adresse_nâ° INT DEFAULT NULL, adresse_rue VARCHAR(100) DEFAULT NULL, banni TINYINT(1) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, identifiant INT DEFAULT NULL, inscription_conf TINYINT(1) DEFAULT NULL, inscription DATETIME DEFAULT NULL, mot_de_pass VARCHAR(100) DEFAULT NULL, nb_essais_infr INT DEFAULT NULL, type_utilisateur VARCHAR(100) DEFAULT NULL, INDEX IDX_1D1C63B3F3432E9E (code_postal_id_id), INDEX IDX_1D1C63B3BBB7D3AD (commune_id_id), INDEX IDX_1D1C63B3BC3BA448 (internaute_id_id), INDEX IDX_1D1C63B31EB763E9 (localite_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abus ADD CONSTRAINT FK_72C9FD01CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id)');
        $this->addSql('ALTER TABLE abus ADD CONSTRAINT FK_72C9FD01BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE commentaire_internaute ADD CONSTRAINT FK_D4BCA54CBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire_internaute ADD CONSTRAINT FK_D4BCA54CCAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A4A81A587 FOREIGN KEY (categorie_de_services_id) REFERENCES categorie_de_services (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6ABE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE images_internaute ADD CONSTRAINT FK_DD28BA43D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE images_internaute ADD CONSTRAINT FK_DD28BA43CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE internaute ADD CONSTRAINT FK_6C8E97CCFF17033F FOREIGN KEY (favori_id) REFERENCES favori (id)');
        $this->addSql('ALTER TABLE position_internaute ADD CONSTRAINT FK_426FBB4CDD842E46 FOREIGN KEY (position_id) REFERENCES position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_internaute ADD CONSTRAINT FK_426FBB4CCAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_bloc ADD CONSTRAINT FK_D4E0BB04DD842E46 FOREIGN KEY (position_id) REFERENCES position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_bloc ADD CONSTRAINT FK_D4E0BB045582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480FF17033F FOREIGN KEY (favori_id) REFERENCES favori (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD14A81A587 FOREIGN KEY (categorie_de_services_id) REFERENCES categorie_de_services (id)');
        $this->addSql('ALTER TABLE proposer_categorie_de_services ADD CONSTRAINT FK_26A7FBB1B13FA634 FOREIGN KEY (proposer_id) REFERENCES proposer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposer_categorie_de_services ADD CONSTRAINT FK_26A7FBB14A81A587 FOREIGN KEY (categorie_de_services_id) REFERENCES categorie_de_services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposer_prestataire ADD CONSTRAINT FK_8EFBA7CBB13FA634 FOREIGN KEY (proposer_id) REFERENCES proposer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposer_prestataire ADD CONSTRAINT FK_8EFBA7CBBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3F3432E9E FOREIGN KEY (code_postal_id_id) REFERENCES code_postal (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BBB7D3AD FOREIGN KEY (commune_id_id) REFERENCES commune (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BC3BA448 FOREIGN KEY (internaute_id_id) REFERENCES internaute (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B31EB763E9 FOREIGN KEY (localite_id_id) REFERENCES localite (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE position_bloc DROP FOREIGN KEY FK_D4E0BB045582E9C0');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A4A81A587');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD14A81A587');
        $this->addSql('ALTER TABLE proposer_categorie_de_services DROP FOREIGN KEY FK_26A7FBB14A81A587');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3F3432E9E');
        $this->addSql('ALTER TABLE abus DROP FOREIGN KEY FK_72C9FD01BA9CD190');
        $this->addSql('ALTER TABLE commentaire_internaute DROP FOREIGN KEY FK_D4BCA54CBA9CD190');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3BBB7D3AD');
        $this->addSql('ALTER TABLE internaute DROP FOREIGN KEY FK_6C8E97CCFF17033F');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480FF17033F');
        $this->addSql('ALTER TABLE images_internaute DROP FOREIGN KEY FK_DD28BA43D44F05E5');
        $this->addSql('ALTER TABLE abus DROP FOREIGN KEY FK_72C9FD01CAF41882');
        $this->addSql('ALTER TABLE commentaire_internaute DROP FOREIGN KEY FK_D4BCA54CCAF41882');
        $this->addSql('ALTER TABLE images_internaute DROP FOREIGN KEY FK_DD28BA43CAF41882');
        $this->addSql('ALTER TABLE position_internaute DROP FOREIGN KEY FK_426FBB4CCAF41882');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3BC3BA448');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B31EB763E9');
        $this->addSql('ALTER TABLE position_internaute DROP FOREIGN KEY FK_426FBB4CDD842E46');
        $this->addSql('ALTER TABLE position_bloc DROP FOREIGN KEY FK_D4E0BB04DD842E46');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCBE3DB2B7');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6ABE3DB2B7');
        $this->addSql('ALTER TABLE proposer_prestataire DROP FOREIGN KEY FK_8EFBA7CBBE3DB2B7');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480139DF194');
        $this->addSql('ALTER TABLE proposer_categorie_de_services DROP FOREIGN KEY FK_26A7FBB1B13FA634');
        $this->addSql('ALTER TABLE proposer_prestataire DROP FOREIGN KEY FK_8EFBA7CBB13FA634');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480FB88E14F');
        $this->addSql('DROP TABLE abus');
        $this->addSql('DROP TABLE bloc');
        $this->addSql('DROP TABLE categorie_de_services');
        $this->addSql('DROP TABLE code_postal');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE commentaire_internaute');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE favori');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE images_internaute');
        $this->addSql('DROP TABLE internaute');
        $this->addSql('DROP TABLE localite');
        $this->addSql('DROP TABLE news_letter');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE position_internaute');
        $this->addSql('DROP TABLE position_bloc');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE proposer');
        $this->addSql('DROP TABLE proposer_categorie_de_services');
        $this->addSql('DROP TABLE proposer_prestataire');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE utilisateur');
    }
}
