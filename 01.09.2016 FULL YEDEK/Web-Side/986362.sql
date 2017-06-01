-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Eyl 2016, 02:35:51
-- Sunucu sürümü: 5.5.32
-- PHP Sürümü: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `986362`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `NO` int(11) NOT NULL AUTO_INCREMENT,
  `MC_USERNAME` text COLLATE utf8_turkish_ci NOT NULL,
  `MC_PACKAGE` text COLLATE utf8_turkish_ci NOT NULL,
  `MC_VERSION` text COLLATE utf8_turkish_ci NOT NULL,
  `MC_MD5` text COLLATE utf8_turkish_ci NOT NULL,
  `CLIENT_IP` text COLLATE utf8_turkish_ci NOT NULL,
  `SUNUCU_IP` text COLLATE utf8_turkish_ci NOT NULL,
  `SUNUCU_PORT` text COLLATE utf8_turkish_ci NOT NULL,
  `TIMESTAMP` int(11) NOT NULL,
  `DURUM` int(11) NOT NULL,
  PRIMARY KEY (`NO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=319 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `clientanahtar`
--

CREATE TABLE IF NOT EXISTS `clientanahtar` (
  `Sira` int(11) NOT NULL AUTO_INCREMENT,
  `Anahtar` text NOT NULL,
  `GuvenlikKodu` text NOT NULL,
  PRIMARY KEY (`Sira`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lisanslar`
--

CREATE TABLE IF NOT EXISTS `lisanslar` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `Aktif` int(11) NOT NULL,
  `LISANS` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `MUSTERI` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `SUNUCU_IP` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `SUNUCU_ISMI` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `SUNUCU_PORT` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `URL` text COLLATE utf8mb4_turkish_ci,
  `BAS_ZAMAN` int(11) NOT NULL,
  `SON_ZAMAN` int(11) NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `lisanslar`
--

INSERT INTO `lisanslar` (`No`, `Aktif`, `LISANS`, `MUSTERI`, `SUNUCU_IP`, `SUNUCU_ISMI`, `SUNUCU_PORT`, `URL`, `BAS_ZAMAN`, `SON_ZAMAN`) VALUES
(7, 1, 'ANADOLUNW', 'TOLGA BUYUKATILLA', '87.98.146.53', 'AnadoluNW', '25565', NULL, 1472070171, 2147483647);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `MD5Liste`
--

CREATE TABLE IF NOT EXISTS `MD5Liste` (
  `Lisans` text NOT NULL,
  `MD5` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `MD5Liste`
--

INSERT INTO `MD5Liste` (`Lisans`, `MD5`) VALUES
('ANADOLUNW', '5C9AAF31199F763EF9085CC9B6902B1D:8F1EF4AC012B6AE6B35A409B4C5440BE:9437B48E051B0CE8817C989E59E7994F:2A473A72FD9157E87FE224CAC40CFD01:766F5F506D5800483F2B5FD828CC423C:80984FF51C89C22D54277E22A4246A24:11ED601FB10E39639C7D855545651E45:6585891791E0D75DC54CFB547A866DB0:396099E23E58309D21713AB5D7C1D1A8:8663A10CECC10EAA683A927EF5371852');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
