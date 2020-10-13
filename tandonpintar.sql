-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 06 Okt 2020 pada 17.14
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `tandonpintar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE IF NOT EXISTS `aktivitas` (
  `idaktivitas` int(11) NOT NULL AUTO_INCREMENT,
  `idsensor` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `aktivitas` text NOT NULL,
  PRIMARY KEY (`idaktivitas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `aktivitas`
--

INSERT INTO `aktivitas` (`idaktivitas`, `idsensor`, `tgl`, `waktu`, `aktivitas`) VALUES
(1, 11, '2020-09-28', '14:14:14', 'mengisi'),
(2, 12, '2020-09-28', '10:15:15', 'menguras'),
(3, 12, '2020-09-28', '11:00:00', 'Menguras'),
(4, 11, '2020-09-28', '12:01:12', 'Mengisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sensor`
--

CREATE TABLE IF NOT EXISTS `sensor` (
  `idsensor` int(11) NOT NULL AUTO_INCREMENT,
  `namasensor` varchar(20) NOT NULL,
  `satuan` varchar(5) NOT NULL,
  `status_sensor` varchar(11) NOT NULL,
  PRIMARY KEY (`idsensor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `sensor`
--

INSERT INTO `sensor` (`idsensor`, `namasensor`, `satuan`, `status_sensor`) VALUES
(5, 'PH', 'ph', 'on'),
(6, 'Turbidity', 'NTu', 'on'),
(7, 'Waterflow', 'Liter', 'on'),
(8, 'TDS', 'Mg/L', 'on'),
(9, 'Water Level', '-', 'on'),
(11, 'Pompa Air', '', 'on'),
(12, 'Solenoid Valve', '', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sensor_value`
--

CREATE TABLE IF NOT EXISTS `sensor_value` (
  `id_value` int(11) NOT NULL AUTO_INCREMENT,
  `idsensor` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `nilai_sensor` float NOT NULL,
  `status_air` varchar(50) NOT NULL,
  PRIMARY KEY (`id_value`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data untuk tabel `sensor_value`
--

INSERT INTO `sensor_value` (`id_value`, `idsensor`, `tgl`, `waktu`, `nilai_sensor`, `status_air`) VALUES
(40, 7, '2020-10-01', '01:00:00', 10, 'full'),
(41, 7, '2020-10-01', '13:00:00', 20, 'full'),
(42, 7, '2020-10-02', '01:00:00', 30, 'full'),
(43, 7, '2020-10-03', '02:00:00', 40, 'full');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` int(1) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`, `level_user`) VALUES
(12, 'admin', 'admin', 'admin', 1),
(15, 'user', 'user', 'user', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
