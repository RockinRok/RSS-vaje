CREATE DATABASE IF NOT EXISTS rss_vaje;
USE rss_vaje;

CREATE TABLE Stranka (
	idStranka INT AUTO_INCREMENT PRIMARY KEY,
	naziv VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL,
    telefonska_stevilka VARCHAR(45),
    naslov VARCHAR(45),
    davcna_stevilka INT
);
CREATE TABLE Vrsta_storitve (
	idVrsta_storitve INT AUTO_INCREMENT PRIMARY KEY,
    storitev VARCHAR(45) NOT NULL
);
CREATE TABLE Storitev (
	idStoritev INT AUTO_INCREMENT PRIMARY KEY,
    cena DECIMAL(6,2) NOT NULL,
    datum_narocila DATE NOT NULL,
    dodatni_opis TINYTEXT,
    Stranka_idStranka INT NOT NULL,
    Vrsta_storitve_idVrsta_storitve INT NOT NULL,
    
    CONSTRAINT TK_storitev_stranka
		FOREIGN KEY (Stranka_idStranka)
        REFERENCES	Stranka(idStranka),
        
	CONSTRAINT TK_storitev_vrsta
		FOREIGN KEY (Vrsta_storitve_idVrsta_storitve)
        REFERENCES	Vrsta_storitve(idVrsta_storitve)
);

CREATE TABLE Placilo (
    idPlacilo INT AUTO_INCREMENT PRIMARY KEY,

    Storitev_idStoritev INT NOT NULL,

    znesek DECIMAL(6,2) NOT NULL,
    datum_placila DATE NOT NULL,
    nacina_placila VARCHAR(45),

    CONSTRAINT fk_placilo_storitev
        FOREIGN KEY (Storitev_idStoritev)
        REFERENCES Storitev(idStoritev)
);

CREATE TABLE Zaposleni (
    idZaposleni INT AUTO_INCREMENT PRIMARY KEY,

    ime VARCHAR(45) NOT NULL,
    priimek VARCHAR(45) NOT NULL,
    vloga VARCHAR(45),
    telefonska_stevilka VARCHAR(45)
);

CREATE TABLE Storitev_has_Zaposleni (
    PK_S_Z INT AUTO_INCREMENT PRIMARY KEY,

    Storitev_idStoritev INT NOT NULL,
    Zaposleni_idZaposleni INT NOT NULL,

    CONSTRAINT fk_sz_storitev
        FOREIGN KEY (Storitev_idStoritev)
        REFERENCES Storitev(idStoritev),

    CONSTRAINT fk_sz_zaposleni
        FOREIGN KEY (Zaposleni_idZaposleni)
        REFERENCES Zaposleni(idZaposleni)
);

CREATE TABLE Termin_snemanja (
    idTermin_snemanja INT AUTO_INCREMENT PRIMARY KEY,

    datum_snemanja DATE NOT NULL,
    lokacija VARCHAR(45),
    trajanje TIME,
    opis TINYTEXT,

    Storitev_idStoritev INT NOT NULL,

    CONSTRAINT fk_termin_storitev
        FOREIGN KEY (Storitev_idStoritev)
        REFERENCES Storitev(idStoritev)
);