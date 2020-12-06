-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 192.168.1.22
-- Üretim Zamanı: 06 Ara 2020, 22:55:22
-- Sunucu sürümü: 10.4.13-MariaDB
-- PHP Sürümü: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `denemedb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `command`
--

CREATE TABLE `command` (
  `idCommand` int(11) NOT NULL,
  `commands` tinytext DEFAULT NULL,
  `refresh` tinytext DEFAULT NULL,
  `idUsers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `command`
--

INSERT INTO `command` (`idCommand`, `commands`, `refresh`, `idUsers`) VALUES
(0, '1,2,4,3,turn off,01:5216:5222:52', 'NoDataUpdate', 25);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `getdata`
--

CREATE TABLE `getdata` (
  `idData` int(11) NOT NULL,
  `phData` float DEFAULT NULL,
  `ecData` float DEFAULT NULL,
  `wtempData` float DEFAULT NULL,
  `atempData` float DEFAULT NULL,
  `idUsers` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `getdata`
--

INSERT INTO `getdata` (`idData`, `phData`, `ecData`, `wtempData`, `atempData`, `idUsers`) VALUES
(2, 1.3, 5.2, 34.1, 43.12, '0'),
(3, NULL, 5.2, 34.1, 43.12, '0'),
(4, NULL, 5.2, 34.1, 43.12, '0'),
(5, NULL, NULL, NULL, NULL, '0'),
(6, 5.4, 3.2, NULL, NULL, '12'),
(7, 5.4, 3.2, NULL, NULL, '12'),
(8, NULL, NULL, NULL, NULL, '0'),
(9, NULL, NULL, NULL, NULL, 'test7'),
(10, NULL, NULL, NULL, NULL, 'test8'),
(11, NULL, NULL, NULL, NULL, '0'),
(12, NULL, NULL, NULL, NULL, '0'),
(13, NULL, NULL, NULL, NULL, '0'),
(14, NULL, NULL, NULL, NULL, '0'),
(15, NULL, NULL, NULL, NULL, '0'),
(16, NULL, NULL, NULL, NULL, '24'),
(17, 0, 27.65, -1023, NULL, '25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `usernameUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `macidUsers` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`idUsers`, `usernameUsers`, `emailUsers`, `pwdUsers`, `macidUsers`) VALUES
(3, 'deneme', 'dasdasddd@ljsbdfhsb.com', '$2y$10$1bqlwtyj3r4LRzbz/C0g/OKegWYuJ0Y3/jpI94exulY8Ym9oZn26K', 'macid'),
(4, 'test', 'adljansjd@fgkdfg.com', '$2y$10$WY56R8mhAzMKSVcQjGYZXejuBTrl9knGACKRSFqa4yHmxY69NS59S', 'macidbu'),
(5, 'deneme2', 'asdsad@asdasd.com', '$2y$10$f3EElBqw1SbMKduTonerEOsYXL8t3SAAIAU84kugCnJuPrwROdzsa', 'bubirmacid'),
(6, 'deneme3', 'asdsad@asdasd.com', '$2y$10$BnFvxcsSU0yHRbletk59BeUnoQaRp6Is5mUkqZPh85OY30p/0Mu36', 'bubirmacid'),
(7, 'deneme4', 'asdsad@asdasd.com', '$2y$10$4I5YaSzQKvGtrg0PWPlVTOYMt63I7hNT4isO6SIhxswf/3Xr6Bz/m', 'bubirmacid'),
(8, 'ilkdeneme', 'asdsad@asdasd.com', '$2y$10$y1nNd7ssLb7Q8oYGyN95eOd7YWg6NcPjx9203G6Eh6uM2SyGtfalm', 'bubirmacid'),
(9, 'test2', 'asdsad@asdasd.com', '$2y$10$F5E.vB9vRqiCHCBuepTfnupJYgNAPU88FeHYlcXKmdU7YqorVatei', 'bubirmacid'),
(10, 'test3', 'asdsad@asdasd.com', '$2y$10$hqiSVznbnyKCTTFsrBF/XeRQ54rE2.y/juT9bA.QshTWhHPHNbeEi', 'bubirmacid'),
(11, 'test4', 'asdsad@asdasd.com', '$2y$10$/DCV/L0cl9YNaSLAOlh7PuQuBoxNZYZ1B90YwvMt92OhSoSl/fg/S', 'bubirmacid'),
(12, 'test5', 'asdsad@asdasd.com', '$2y$10$JgBrPnfuRV/7vkDK4Vj9GOs4TVW0J1Bf.lOhI1TeKra69.IWLzlum', 'bubirmacid'),
(13, 'test6', 'asdsad@asdasd.com', '$2y$10$zdBLcpbENDlkqjKPgzw8GuiVj2eDdOy.MfSTtBKo7buBKt1xmEJjq', 'bubirmacid'),
(14, 'test7', 'asdsad@asdasd.com', '$2y$10$90H5O9xPsB/7xsO5PTmtJOhfH54fTjf7u6uDhFBHgdHjTqNwBXsP2', 'bubirmacid'),
(15, 'test8', 'asdsad@asdasd.com', '$2y$10$Fv8uTjP2v/3N8vskYR2maO1zk8UX4AOvE20XWRt1a4ZwUGwAIoTOq', 'asdasfasf'),
(16, 'tes8', 'asdsad@asdasd.com', '$2y$10$S71I0HoLqZg28NiW2/hLte55FHKB0XPMPyc3eA21A7JonmNA8zNjS', 'dasdasdasd'),
(17, 'test9', 'asdsad@asdasd.com', '$2y$10$Ecqu5/m7aZilPb5XbOZvMeKrNc4yU6zsSVSlN1s6G7Yncjimzka/W', 'dasdasdasd'),
(18, 'test10', 'asdsad@asdasd.com', '$2y$10$ToysRHESrVl4FKYbUo.Yv.9zXjyvqhtCVireoJzLCXbyNht8mQQb.', 'asdasdasd'),
(19, 'test11', 'asdsad@asdasd.com', '$2y$10$./k1qTe5hq60KCsYY2BfseVnkiCu3uCTXx7x3Tp2MqmYhiTfEphta', 'dasdasdasd'),
(20, 'test12', 'asdsad@asdasd.com', '$2y$10$H93hmvv/0fDibv7GlHDHj.DRUxIljcIVBOr9hjf8fulZ6wbYOmymy', 'bubirmacid'),
(21, 'test13', 'asdsad@asdasd.com', '$2y$10$NrfzL5/cGHYMulKIDIEuKek/eviNRNSNZv/ZXNFEaKMEFXFX0/iiu', 'dasda'),
(22, 'test14', 'asdsad@asdasd.com', '$2y$10$XjzJwKHJZB65/GOfV3tR6uOFBmfhnkt2ZkUdEkAEyxsKZDXH1/XG6', 'asdasfasf'),
(23, 'test15', 'asdasda@fasdfasf.com', '$2y$10$z9JlbV87QlM4CjE2OSR4AOUuNAVNYOhT9eoWgp3NViltiBFe5ImSy', 'asdasda'),
(24, 'test16', 'asdasd@asdasd.com', '$2y$10$qqZQPkIdIeFY2ME8QrUJpea8iagBgo85LBXNeoAkI6Z3OkIn0PX5K', 'asdasfasf'),
(25, 'test17', 'aasdasd@dasda.com', '$2y$10$/fNlh1W7SftvrinKYygWAO2eQnEqkRhHtellP6Bu3Ldl5tLUEj.EC', 'dasd');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`idCommand`);

--
-- Tablo için indeksler `getdata`
--
ALTER TABLE `getdata`
  ADD PRIMARY KEY (`idData`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `getdata`
--
ALTER TABLE `getdata`
  MODIFY `idData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
