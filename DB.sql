-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 06:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gtm`
--

-- --------------------------------------------------------

--
-- Table structure for table `anagrafica`
--

CREATE TABLE `anagrafica` (
  `cod_fiscale` char(16) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `civico` int(5) NOT NULL,
  `cap` char(5) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fk_id_comune` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anagrafica`
--

INSERT INTO `anagrafica` (`cod_fiscale`, `nome`, `cognome`, `indirizzo`, `civico`, `cap`, `telefono`, `fk_id_comune`) VALUES
('BNCPLO02E49G273Z', 'Paolo', 'Bianchi', 'Via Gioberti', 32, '50123', '3496685960', 2017),
('FBNRCC99E49G273Z', 'Rocco', 'Fabiani', 'Piazzale Michelangelo', 33, '50123', '3406785857', 2017),
('FDCCTN02E49G273Z', 'Cristiana', 'Federici', 'Piazza San Michele', 41, '55100', '3476688797', 2061),
('FRIGLL99E49G273Y', 'Furio', 'Gallo', 'Via Ippocatre', 33, '20161', '3461121448', 1799),
('FTIPTZ99E49G273Z', 'Patrizia', 'Fanti', 'Via Laurentina', 333, '100', '3456667865', 1702),
('FTSDRO79E49G274K', 'Dario', 'Fortis', 'Via Costanza', 63, '50123', '3406758677', 2017),
('MCHFNC02G47F274H', 'Francesco', 'Mochi', 'Via Lorenzo il Magnifico', 1, '50100', '3479779703', 2017),
('PRTTZN03E49G273Z', 'Tiziana', 'Parente', 'Via Genova', 123, '58100', '3436665968', 2043),
('RCCSLA99E49G273Z', 'Giulia', 'Ricci', 'Viale Toselli', 13, '53100', '3456789776', 2270),
('RNAFRC89E49G273Z', 'Francesco', 'Rana', 'Via Costanza', 36, '50123', '3495556879', 2017),
('RSSMAR64E49G278J', 'Mario', 'Rossi', 'Via Cavour', 12, '50123', '3376644957', 2017),
('STSLRA99E49G273Z', 'Laura', 'Santis', 'Via Tortona', 11, '20144', '3769984768', 1799),
('VCCLCA99E49G275D', 'Luca', 'Vacca', 'Viale Europa', 55, '50123', '3336570999', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `aziende`
--

CREATE TABLE `aziende` (
  `id_azienda` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `partita_iva` varchar(11) NOT NULL,
  `ruolo` varchar(30) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `civico` int(5) NOT NULL,
  `cap` char(5) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fk_id_comune` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aziende`
--

INSERT INTO `aziende` (`id_azienda`, `nome`, `partita_iva`, `ruolo`, `indirizzo`, `civico`, `cap`, `telefono`, `fk_id_comune`) VALUES
(6, 'Unieuro', '876320409', 'Esercizio commerciale', 'Via Baracca', 3, '50123', '055234234', 2017),
(7, 'Carrefour', '12683790153', 'Esercizio commerciale', 'Via Tornabuoni', 55, '50123', '055212232', 2017),
(8, 'Samsung', '11325690151', 'Fornitore', 'Piazzale Loreto', 40, '20019', '023323555', 1799),
(9, 'GTM', '11325690236', 'HUB', 'Via Perfetti Ricasoli Mezzana', 14, '05012', '055231112', 2017),
(10, 'Nike', '5359451001', 'Fornitore', 'Via Tozzi', 33, '58100', '056422123', 2043),
(11, 'Decathlon', '11005760159', 'Esercizio commerciale', 'Via Aretina', 7, '50123', '055233532', 2017),
(12, 'Metro', '2827030962', 'Fornitore', 'Via Ardeatina', 37, '100', '064652322', 1702),
(13, 'Sammontana', '3957900487', 'Fornitore', 'Via Romana', 43, '55100', '057233112', 2061),
(14, 'Sony', '10496660969', 'Fornitore', 'Via Angelo Rizzoli', 4, '20132', '023333235', 1799),
(15, 'Bar Caffè Gilli', '394430482', 'Esercizio commerciale', 'Via Roma', 1, '50123', '055213896', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `comuni`
--

CREATE TABLE `comuni` (
  `id_comune` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `fk_sigla` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comuni`
--

INSERT INTO `comuni` (`id_comune`, `nome`, `fk_sigla`) VALUES
(1605, 'ABANO TERME', 'PD'),
(1606, 'AFFILE', 'RM'),
(1607, 'AGOSTA', 'RM'),
(1608, 'ALBANO LAZIALE', 'RM'),
(1609, 'ALLUMIERE', 'RM'),
(1610, 'ANGUILLARA SABAZIA', 'RM'),
(1611, 'ANTICOLI CORRADO', 'RM'),
(1612, 'ANZIO', 'RM'),
(1613, 'ARCINAZZO ROMANO', 'RM'),
(1614, 'ARDEA', 'RM'),
(1615, 'ARICCIA', 'RM'),
(1616, 'ARSOLI', 'RM'),
(1617, 'ARTENA', 'RM'),
(1618, 'BELLEGRA', 'RM'),
(1619, 'BRACCIANO', 'RM'),
(1620, 'CAMERATA NUOVA', 'RM'),
(1621, 'CAMPAGNANO DI ROMA', 'RM'),
(1622, 'CANALE MONTERANO', 'RM'),
(1623, 'CANTERANO', 'RM'),
(1624, 'CAPENA', 'RM'),
(1625, 'CAPRANICA PRENESTINA', 'RM'),
(1626, 'CARPINETO ROMANO', 'RM'),
(1627, 'CASAPE', 'RM'),
(1628, 'CASTEL GANDOLFO', 'RM'),
(1629, 'CASTEL MADAMA', 'RM'),
(1630, 'CASTEL SAN PIETRO ROMANO', 'RM'),
(1631, 'CASTELNUOVO DI PORTO', 'RM'),
(1632, 'CAVE', 'RM'),
(1633, 'CERRETO LAZIALE', 'RM'),
(1634, 'CERVARA DI ROMA', 'RM'),
(1635, 'CERVETERI', 'RM'),
(1636, 'CIAMPINO', 'RM'),
(1637, 'CICILIANO', 'RM'),
(1638, 'CINETO ROMANO', 'RM'),
(1639, 'CIVITAVECCHIA', 'RM'),
(1640, 'CIVITELLA SAN PAOLO', 'RM'),
(1641, 'COLLEFERRO', 'RM'),
(1642, 'COLONNA', 'RM'),
(1643, 'FIANO ROMANO', 'RM'),
(1644, 'FILACCIANO', 'RM'),
(1645, 'FIUMICINO', 'RM'),
(1646, 'FONTE NUOVA', 'RM'),
(1647, 'FORMELLO', 'RM'),
(1648, 'FRASCATI', 'RM'),
(1649, 'GALLICANO NEL LAZIO', 'RM'),
(1650, 'GAVIGNANO', 'RM'),
(1651, 'GENAZZANO', 'RM'),
(1652, 'GENZANO DI ROMA', 'RM'),
(1653, 'GERANO', 'RM'),
(1654, 'GORGA', 'RM'),
(1655, 'GROTTAFERRATA', 'RM'),
(1656, 'GUIDONIA MONTECELIO', 'RM'),
(1657, 'JENNE', 'RM'),
(1658, 'LABICO', 'RM'),
(1659, 'LADISPOLI', 'RM'),
(1660, 'LANUVIO', 'RM'),
(1661, 'LARIANO', 'RM'),
(1662, 'LICENZA', 'RM'),
(1663, 'MAGLIANO ROMANO', 'RM'),
(1664, 'MANDELA', 'RM'),
(1665, 'MANZIANA', 'RM'),
(1666, 'MARANO EQUO', 'RM'),
(1667, 'MARCELLINA', 'RM'),
(1668, 'MARINO', 'RM'),
(1669, 'MAZZANO ROMANO', 'RM'),
(1670, 'MENTANA', 'RM'),
(1671, 'MONTE COMPATRI', 'RM'),
(1672, 'MONTE PORZIO CATONE', 'RM'),
(1673, 'MONTEFLAVIO', 'RM'),
(1674, 'MONTELANICO', 'RM'),
(1675, 'MONTELIBRETTI', 'RM'),
(1676, 'MONTEROTONDO', 'RM'),
(1677, 'MONTORIO ROMANO', 'RM'),
(1678, 'MORICONE', 'RM'),
(1679, 'MORLUPO', 'RM'),
(1680, 'NAZZANO', 'RM'),
(1681, 'NEMI', 'RM'),
(1682, 'NEROLA', 'RM'),
(1683, 'NETTUNO', 'RM'),
(1684, 'OLEVANO ROMANO', 'RM'),
(1685, 'PALESTRINA', 'RM'),
(1686, 'PALOMBARA SABINA', 'RM'),
(1687, 'PERCILE', 'RM'),
(1688, 'PISONIANO', 'RM'),
(1689, 'POLI', 'RM'),
(1690, 'POMEZIA', 'RM'),
(1691, 'PONZANO ROMANO', 'RM'),
(1692, 'RIANO', 'RM'),
(1693, 'RIGNANO FLAMINIO', 'RM'),
(1694, 'RIOFREDDO', 'RM'),
(1695, 'ROCCA CANTERANO', 'RM'),
(1696, 'ROCCA DI CAVE', 'RM'),
(1697, 'ROCCA DI PAPA', 'RM'),
(1698, 'ROCCA PRIORA', 'RM'),
(1699, 'ROCCA SANTO STEFANO', 'RM'),
(1700, 'ROCCAGIOVINE', 'RM'),
(1701, 'ROIATE', 'RM'),
(1702, 'ROMA', 'RM'),
(1703, 'ROVIANO', 'RM'),
(1704, 'SACROFANO', 'RM'),
(1705, 'SAMBUCI', 'RM'),
(1706, 'SAN CESAREO', 'RM'),
(1707, 'SAN GREGORIO DA SASSOLA', 'RM'),
(1708, 'SAN POLO DEI CAVALIERI', 'RM'),
(1709, 'SAN VITO ROMANO', 'RM'),
(1712, 'SANTA MARINELLA', 'RM'),
(1713, 'SARACINESCO', 'RM'),
(1714, 'SEGNI', 'RM'),
(1715, 'SUBIACO', 'RM'),
(1716, 'TIVOLI', 'RM'),
(1717, 'TOLFA', 'RM'),
(1718, 'TORRITA TIBERINA', 'RM'),
(1719, 'TREVIGNANO ROMANO', 'RM'),
(1720, 'VALLEPIETRA', 'RM'),
(1721, 'VALLINFREDA', 'RM'),
(1722, 'VALMONTONE', 'RM'),
(1723, 'VELLETRI', 'RM'),
(1724, 'VICOVARO', 'RM'),
(1725, 'VIVARO ROMANO', 'RM'),
(1726, 'ZAGAROLO', 'RM'),
(1727, 'ABBIATEGRASSO', 'MI'),
(1728, 'ALBAIRATE', 'MI'),
(1729, 'ARCONATE', 'MI'),
(1730, 'ARESE', 'MI'),
(1731, 'ARLUNO', 'MI'),
(1732, 'ASSAGO', 'MI'),
(1733, 'BARANZATE', 'MI'),
(1734, 'BAREGGIO', 'MI'),
(1735, 'BASIANO', 'MI'),
(1736, 'BASIGLIO', 'MI'),
(1737, 'BELLINZAGO LOMBARDO', 'MI'),
(1738, 'BERNATE TICINO', 'MI'),
(1739, 'BESATE', 'MI'),
(1740, 'BINASCO', 'MI'),
(1741, 'BOFFALORA SOPRA TICINO', 'MI'),
(1742, 'BOLLATE', 'MI'),
(1743, 'BRESSO', 'MI'),
(1744, 'BUBBIANO', 'MI'),
(1745, 'BUCCINASCO', 'MI'),
(1746, 'BUSCATE', 'MI'),
(1747, 'BUSSERO', 'MI'),
(1748, 'BUSTO GAROLFO', 'MI'),
(1749, 'CALVIGNASCO', 'MI'),
(1750, 'CAMBIAGO', 'MI'),
(1751, 'CANEGRATE', 'MI'),
(1752, 'CARPIANO', 'MI'),
(1753, 'CARUGATE', 'MI'),
(1754, 'CASARILE', 'MI'),
(1755, 'CASOREZZO', 'MI'),
(1758, 'CASSINETTA DI LUGAGNANO', 'MI'),
(1759, 'CASTANO PRIMO', 'MI'),
(1760, 'CERNUSCO SUL NAVIGLIO', 'MI'),
(1761, 'CERRO AL LAMBRO', 'MI'),
(1762, 'CERRO MAGGIORE', 'MI'),
(1763, 'CESANO BOSCONE', 'MI'),
(1764, 'CESATE', 'MI'),
(1765, 'CINISELLO BALSAMO', 'MI'),
(1766, 'CISLIANO', 'MI'),
(1767, 'COLOGNO MONZESE', 'MI'),
(1768, 'COLTURANO', 'MI'),
(1769, 'CORBETTA', 'MI'),
(1770, 'CORMANO', 'MI'),
(1771, 'CORNAREDO', 'MI'),
(1772, 'CORSICO', 'MI'),
(1773, 'CUGGIONO', 'MI'),
(1774, 'CUSAGO', 'MI'),
(1775, 'CUSANO MILANINO', 'MI'),
(1776, 'DAIRAGO', 'MI'),
(1777, 'DRESANO', 'MI'),
(1778, 'GAGGIANO', 'MI'),
(1779, 'GARBAGNATE MILANESE', 'MI'),
(1780, 'GESSATE', 'MI'),
(1781, 'GORGONZOLA', 'MI'),
(1782, 'GREZZAGO', 'MI'),
(1783, 'GUDO VISCONTI', 'MI'),
(1784, 'INVERUNO', 'MI'),
(1785, 'INZAGO', 'MI'),
(1786, 'LACCHIARELLA', 'MI'),
(1787, 'LAINATE', 'MI'),
(1788, 'LEGNANO', 'MI'),
(1789, 'LISCATE', 'MI'),
(1790, 'LOCATE DI TRIULZI', 'MI'),
(1791, 'MAGENTA', 'MI'),
(1792, 'MAGNAGO', 'MI'),
(1793, 'MARCALLO CON CASONE', 'MI'),
(1794, 'MASATE', 'MI'),
(1795, 'MEDIGLIA', 'MI'),
(1796, 'MELEGNANO', 'MI'),
(1797, 'MELZO', 'MI'),
(1798, 'MESERO', 'MI'),
(1799, 'MILANO', 'MI'),
(1800, 'MORIMONDO', 'MI'),
(1801, 'MOTTA VISCONTI', 'MI'),
(1802, 'NERVIANO', 'MI'),
(1803, 'NOSATE', 'MI'),
(1804, 'NOVATE MILANESE', 'MI'),
(1805, 'NOVIGLIO', 'MI'),
(1806, 'OPERA', 'MI'),
(1807, 'OSSONA', 'MI'),
(1808, 'OZZERO', 'MI'),
(1809, 'PADERNO DUGNANO', 'MI'),
(1810, 'PANTIGLIATE', 'MI'),
(1811, 'PARABIAGO', 'MI'),
(1812, 'PAULLO', 'MI'),
(1813, 'PERO', 'MI'),
(1814, 'PESCHIERA BORROMEO', 'MI'),
(1815, 'PESSANO CON BORNAGO', 'MI'),
(1816, 'PIEVE EMANUELE', 'MI'),
(1817, 'PIOLTELLO', 'MI'),
(1818, 'POGLIANO MILANESE', 'MI'),
(1820, 'POZZUOLO MARTESANA', 'MI'),
(1821, 'PREGNANA MILANESE', 'MI'),
(1822, 'RESCALDINA', 'MI'),
(1823, 'RHO', 'MI'),
(1824, 'ROBECCHETTO CON INDUNO', 'MI'),
(1825, 'ROBECCO SUL NAVIGLIO', 'MI'),
(1826, 'RODANO', 'MI'),
(1827, 'ROSATE', 'MI'),
(1828, 'ROZZANO', 'MI'),
(1829, 'SAN COLOMBANO AL LAMBRO', 'MI'),
(1830, 'SAN DONATO MILANESE', 'MI'),
(1831, 'SAN GIORGIO SU LEGNANO', 'MI'),
(1832, 'SAN GIULIANO MILANESE', 'MI'),
(1833, 'SAN VITTORE OLONA', 'MI'),
(1834, 'SAN ZENONE AL LAMBRO', 'MI'),
(1835, 'SANTO STEFANO TICINO', 'MI'),
(1836, 'SEDRIANO', 'MI'),
(1837, 'SEGRATE', 'MI'),
(1838, 'SENAGO', 'MI'),
(1839, 'SESTO SAN GIOVANNI', 'MI'),
(1840, 'SETTALA', 'MI'),
(1841, 'SETTIMO MILANESE', 'MI'),
(1842, 'SOLARO', 'MI'),
(1843, 'TREZZANO ROSA', 'MI'),
(1844, 'TREZZANO SUL NAVIGLIO', 'MI'),
(1846, 'TRIBIANO', 'MI'),
(1847, 'TRUCCAZZANO', 'MI'),
(1848, 'TURBIGO', 'MI'),
(1849, 'VANZAGHELLO', 'MI'),
(1850, 'VANZAGO', 'MI'),
(1852, 'VERMEZZO CON ZELO', 'MI'),
(1853, 'VERNATE', 'MI'),
(1854, 'VIGNATE', 'MI'),
(1855, 'VILLA CORTESE', 'MI'),
(1856, 'VIMODRONE', 'MI'),
(1857, 'VITTUONE', 'MI'),
(1858, 'VIZZOLO PREDABISSI', 'MI'),
(1859, 'ZIBIDO SAN GIACOMO', 'MI'),
(1860, 'ABBADIA SAN SALVATORE', 'SI'),
(1861, 'ACCUMOLI', 'RI'),
(1862, 'ACERNO', 'SA'),
(1863, 'ACERRA', 'NA'),
(1864, 'AFRAGOLA', 'NA'),
(1865, 'AGEROLA', 'NA'),
(1866, 'AGROPOLI', 'SA'),
(1867, 'ALBANELLA', 'SA'),
(1868, 'ALFANO', 'SA'),
(1869, 'ALTAVILLA SILENTINA', 'SA'),
(1870, 'ALTOPASCIO', 'LU'),
(1871, 'AMALFI', 'SA'),
(1872, 'AMATRICE', 'RI'),
(1873, 'ANACAPRI', 'NA'),
(1874, 'ANGRI', 'SA'),
(1875, 'ANTRODOCO', 'RI'),
(1876, 'AQUARA', 'SA'),
(1877, 'ARCIDOSSO', 'GR'),
(1878, 'ARZANO', 'NA'),
(1879, 'ASCEA', 'SA'),
(1880, 'ASCIANO', 'SI'),
(1881, 'ASCREA', 'RI'),
(1882, 'ATENA LUCANA', 'SA'),
(1883, 'ATRANI', 'SA'),
(1884, 'AULETTA', 'SA'),
(1885, 'BACOLI', 'NA'),
(1886, 'BAGNI DI LUCCA', 'LU'),
(1887, 'BAGNO A RIPOLI', 'FI'),
(1889, 'BARBERINO DI MUGELLO', 'FI'),
(1890, 'BARBERINO TAVARNELLE', 'FI'),
(1891, 'BARGA', 'LU'),
(1892, 'BARONISSI', 'SA'),
(1893, 'BATTIPAGLIA', 'SA'),
(1894, 'BELLIZZI', 'SA'),
(1895, 'BELLOSGUARDO', 'SA'),
(1896, 'BELMONTE IN SABINA', 'RI'),
(1897, 'BORBONA', 'RI'),
(1898, 'BORGO A MOZZANO', 'LU'),
(1899, 'BORGO SAN LORENZO', 'FI'),
(1900, 'BORGO VELINO', 'RI'),
(1901, 'BORGOROSE', 'RI'),
(1902, 'BOSCOREALE', 'NA'),
(1903, 'BOSCOTRECASE', 'NA'),
(1904, 'BRACIGLIANO', 'SA'),
(1905, 'BRUSCIANO', 'NA'),
(1906, 'BUCCINO', 'SA'),
(1907, 'BUONABITACOLO', 'SA'),
(1908, 'BUONCONVENTO', 'SI'),
(1909, 'CAGGIANO', 'SA'),
(1910, 'CAIVANO', 'NA'),
(1911, 'CALENZANO', 'FI'),
(1912, 'CALVANICO', 'SA'),
(1913, 'CALVIZZANO', 'NA'),
(1914, 'CAMAIORE', 'LU'),
(1915, 'CAMEROTA', 'SA'),
(1916, 'CAMPAGNA', 'SA'),
(1917, 'CAMPAGNATICO', 'GR'),
(1918, 'CAMPI BISENZIO', 'FI'),
(1919, 'CAMPORA', 'SA'),
(1920, 'CAMPORGIANO', 'LU'),
(1921, 'CAMPOSANO', 'NA'),
(1922, 'CANNALONGA', 'SA'),
(1923, 'CANTALICE', 'RI'),
(1924, 'CANTALUPO IN SABINA', 'RI'),
(1925, 'CAPACCIO PAESTUM', 'SA'),
(1926, 'CAPALBIO', 'GR'),
(1927, 'CAPANNORI', 'LU'),
(1928, 'CAPRAIA E LIMITE', 'FI'),
(1929, 'CAPRI', 'NA'),
(1930, 'CARBONARA DI NOLA', 'NA'),
(1931, 'CARDITO', 'NA'),
(1932, 'CAREGGINE', 'LU'),
(1933, 'CASAL VELINO', 'SA'),
(1934, 'CASALBUONO', 'SA'),
(1935, 'CASALETTO SPARTANO', 'SA'),
(1936, 'CASALNUOVO DI NAPOLI', 'NA'),
(1937, 'CASAMARCIANO', 'NA'),
(1938, 'CASAMICCIOLA TERME', 'NA'),
(1939, 'CASANDRINO', 'NA'),
(1940, 'CASAPROTA', 'RI'),
(1941, 'CASAVATORE', 'NA'),
(1942, 'CASELLE IN PITTARI', 'SA'),
(1943, 'CASOLA DI NAPOLI', 'NA'),
(1945, 'CASORIA', 'NA'),
(1946, 'CASPERIA', 'RI'),
(1947, 'CASTEL DEL PIANO', 'GR'),
(1948, 'CASTEL DI TORA', 'RI'),
(1949, 'CASTEL SAN GIORGIO', 'SA'),
(1950, 'CASTEL SAN LORENZO', 'SA'),
(1952, 'CASTELCIVITA', 'SA'),
(1953, 'CASTELFIORENTINO', 'FI'),
(1955, 'CASTELLABATE', 'SA'),
(1956, 'CASTELLAMMARE DI STABIA', 'NA'),
(1957, 'CASTELLINA IN CHIANTI', 'SI'),
(1958, 'CASTELLO DI CISTERNA', 'NA'),
(1959, 'CASTELNUOVO BERARDENGA', 'SI'),
(1960, 'CASTELNUOVO CILENTO', 'SA'),
(1961, 'CASTELNUOVO DI CONZA', 'SA'),
(1962, 'CASTELNUOVO DI FARFA', 'RI'),
(1963, 'CASTELNUOVO DI GARFAGNANA', 'LU'),
(1965, 'CASTIGLIONE DEL GENOVESI', 'SA'),
(1966, 'CASTIGLIONE DELLA PESCAIA', 'GR'),
(1967, 'CASTIGLIONE DI GARFAGNANA', 'LU'),
(1969, 'CELLE DI BULGHERIA', 'SA'),
(1970, 'CENTOLA', 'SA'),
(1971, 'CERASO', 'SA'),
(1972, 'CERCOLA', 'NA'),
(1973, 'CERRETO GUIDI', 'FI'),
(1974, 'CERTALDO', 'FI'),
(1975, 'CETARA', 'SA'),
(1976, 'CETONA', 'SI'),
(1977, 'CHIANCIANO TERME', 'SI'),
(1978, 'CHIUSDINO', 'SI'),
(1979, 'CHIUSI', 'SI'),
(1980, 'CICCIANO', 'NA'),
(1981, 'CICERALE', 'SA'),
(1982, 'CIMITILE', 'NA'),
(1983, 'CINIGIANO', 'GR'),
(1984, 'CITTADUCALE', 'RI'),
(1985, 'CITTAREALE', 'RI'),
(1986, 'CIVITELLA PAGANICO', 'GR'),
(1987, 'COLLALTO SABINO', 'RI'),
(1988, 'COLLE DI TORA', 'RI'),
(1990, 'COLLEGIOVE', 'RI'),
(1991, 'COLLEVECCHIO', 'RI'),
(1992, 'COLLI SUL VELINO', 'RI'),
(1993, 'COLLIANO', 'SA'),
(1994, 'COMIZIANO', 'NA'),
(1995, 'CONCA DEI MARINI', 'SA'),
(1996, 'CONCERVIANO', 'RI'),
(1997, 'CONFIGNI', 'RI'),
(1998, 'CONTIGLIANO', 'RI'),
(1999, 'CONTRONE', 'SA'),
(2000, 'CONTURSI TERME', 'SA'),
(2001, 'CORBARA', 'SA'),
(2002, 'COREGLIA ANTELMINELLI', 'LU'),
(2003, 'CORLETO MONFORTE', 'SA'),
(2004, 'COTTANELLO', 'RI'),
(2005, 'CRISPANO', 'NA'),
(2006, 'CUCCARO VETERE', 'SA'),
(2007, 'DICOMANO', 'FI'),
(2008, 'EBOLI', 'SA'),
(2009, 'EMPOLI', 'FI'),
(2010, 'ERCOLANO', 'NA'),
(2011, 'FABBRICHE DI VERGEMOLI', 'LU'),
(2012, 'FARA IN SABINA', 'RI'),
(2013, 'FELITTO', 'SA'),
(2014, 'FIAMIGNANO', 'RI'),
(2015, 'FIESOLE', 'FI'),
(2016, 'FIGLINE E INCISA VALDARNO', 'FI'),
(2017, 'FIRENZE', 'FI'),
(2018, 'FIRENZUOLA', 'FI'),
(2019, 'FISCIANO', 'SA'),
(2020, 'FOLLONICA', 'GR'),
(2021, 'FORANO', 'RI'),
(2022, 'FORIO', 'NA'),
(2023, 'FORTE DEI MARMI', 'LU'),
(2024, 'FOSCIANDORA', 'LU'),
(2025, 'FRASSO SABINO', 'RI'),
(2026, 'FRATTAMAGGIORE', 'NA'),
(2027, 'FRATTAMINORE', 'NA'),
(2028, 'FUCECCHIO', 'FI'),
(2029, 'FURORE', 'SA'),
(2030, 'FUTANI', 'SA'),
(2031, 'GAIOLE IN CHIANTI', 'SI'),
(2032, 'GALLICANO', 'LU'),
(2033, 'GAMBASSI TERME', 'FI'),
(2034, 'GAVORRANO', 'GR'),
(2035, 'GIFFONI SEI CASALI', 'SA'),
(2036, 'GIFFONI VALLE PIANA', 'SA'),
(2037, 'GIOI', 'SA'),
(2038, 'GIUGLIANO IN CAMPANIA', 'NA'),
(2039, 'GIUNGANO', 'SA'),
(2040, 'GRAGNANO', 'NA'),
(2041, 'GRECCIO', 'RI'),
(2042, 'GREVE IN CHIANTI', 'FI'),
(2043, 'GROSSETO', 'GR'),
(2044, 'GRUMO NEVANO', 'NA'),
(2045, 'IMPRUNETA', 'FI'),
(2046, 'ISCHIA', 'NA'),
(2047, 'ISOLA DEL GIGLIO', 'GR'),
(2048, 'ISPANI', 'SA'),
(2049, 'LABRO', 'RI'),
(2050, 'LACCO AMENO', 'NA'),
(2051, 'LASTRA A SIGNA', 'FI'),
(2052, 'LAUREANA CILENTO', 'SA'),
(2053, 'LAURINO', 'SA'),
(2054, 'LAURITO', 'SA'),
(2055, 'LAVIANO', 'SA'),
(2056, 'LEONESSA', 'RI'),
(2057, 'LETTERE', 'NA'),
(2058, 'LIVERI', 'NA'),
(2059, 'LONDA', 'FI'),
(2060, 'LONGONE SABINO', 'RI'),
(2061, 'LUCCA', 'LU'),
(2062, 'LUSTRA', 'SA'),
(2063, 'MAGLIANO IN TOSCANA', 'GR'),
(2064, 'MAGLIANO SABINA', 'RI'),
(2065, 'MAGLIANO VETERE', 'SA'),
(2066, 'MAIORI', 'SA'),
(2067, 'MANCIANO', 'GR'),
(2068, 'MARANO DI NAPOLI', 'NA'),
(2069, 'MARCETELLI', 'RI'),
(2070, 'MARIGLIANELLA', 'NA'),
(2071, 'MARIGLIANO', 'NA'),
(2072, 'MARRADI', 'FI'),
(2073, 'MASSA DI SOMMA', 'NA'),
(2074, 'MASSA LUBRENSE', 'NA'),
(2075, 'MASSA MARITTIMA', 'GR'),
(2076, 'MASSAROSA', 'LU'),
(2077, 'MELITO DI NAPOLI', 'NA'),
(2078, 'MERCATO SAN SEVERINO', 'SA'),
(2079, 'META', 'NA'),
(2080, 'MICIGLIANO', 'RI'),
(2081, 'MINORI', 'SA'),
(2082, 'MINUCCIANO', 'LU'),
(2083, 'MOIO DELLA CIVITELLA', 'SA'),
(2084, 'MOLAZZANA', 'LU'),
(2085, 'MOMPEO', 'RI'),
(2086, 'MONTAIONE', 'FI'),
(2087, 'MONTALCINO', 'SI'),
(2088, 'MONTANO ANTILIA', 'SA'),
(2089, 'MONTASOLA', 'RI'),
(2090, 'MONTE ARGENTARIO', 'GR'),
(2091, 'MONTE DI PROCIDA', 'NA'),
(2092, 'MONTE SAN GIACOMO', 'SA'),
(2093, 'MONTE SAN GIOVANNI IN SABINA', 'RI'),
(2094, 'MONTEBUONO', 'RI'),
(2095, 'MONTECARLO', 'LU'),
(2096, 'MONTECORICE', 'SA'),
(2097, 'MONTECORVINO PUGLIANO', 'SA'),
(2098, 'MONTECORVINO ROVELLA', 'SA'),
(2099, 'MONTEFORTE CILENTO', 'SA'),
(2100, 'MONTELEONE SABINO', 'RI'),
(2101, 'MONTELUPO FIORENTINO', 'FI'),
(2102, 'MONTENERO SABINO', 'RI'),
(2103, 'MONTEPULCIANO', 'SI'),
(2104, 'MONTERIGGIONI', 'SI'),
(2106, 'MONTEROTONDO MARITTIMO', 'GR'),
(2107, 'MONTESANO SULLA MARCELLANA', 'SA'),
(2108, 'MONTESPERTOLI', 'FI'),
(2109, 'MONTICIANO', 'SI'),
(2110, 'MONTIERI', 'GR'),
(2111, 'MONTOPOLI DI SABINA', 'RI'),
(2112, 'MORIGERATI', 'SA'),
(2113, 'MORRO REATINO', 'RI'),
(2114, 'MUGNANO DI NAPOLI', 'NA'),
(2115, 'MURLO', 'SI'),
(2116, 'NAPOLI', 'NA'),
(2117, 'NESPOLO', 'RI'),
(2118, 'NOCERA INFERIORE', 'SA'),
(2119, 'NOCERA SUPERIORE', 'SA'),
(2120, 'NOLA', 'NA'),
(2121, 'NOVI VELIA', 'SA'),
(2122, 'OGLIASTRO CILENTO', 'SA'),
(2123, 'OLEVANO SUL TUSCIANO', 'SA'),
(2124, 'OLIVETO CITRA', 'SA'),
(2125, 'OMIGNANO', 'SA'),
(2126, 'ORBETELLO', 'GR'),
(2127, 'ORRIA', 'SA'),
(2128, 'ORVINIO', 'RI'),
(2129, 'OTTATI', 'SA'),
(2130, 'OTTAVIANO', 'NA'),
(2131, 'PADULA', 'SA'),
(2132, 'PAGANI', 'SA'),
(2133, 'PAGANICO SABINO', 'RI'),
(2134, 'PALAZZUOLO SUL SENIO', 'FI'),
(2135, 'PALMA CAMPANIA', 'NA'),
(2136, 'PALOMONTE', 'SA'),
(2137, 'PELAGO', 'FI'),
(2138, 'PELLEZZANO', 'SA'),
(2139, 'PERDIFUMO', 'SA'),
(2140, 'PERITO', 'SA'),
(2141, 'PERTOSA', 'SA'),
(2142, 'PESCAGLIA', 'LU'),
(2143, 'PESCOROCCHIANO', 'RI'),
(2144, 'PETINA', 'SA'),
(2145, 'PETRELLA SALTO', 'RI'),
(2146, 'PIAGGINE', 'SA'),
(2147, 'PIANCASTAGNAIO', 'SI'),
(2148, 'PIANO DI SORRENTO', 'NA'),
(2149, 'PIAZZA AL SERCHIO', 'LU'),
(2150, 'PIENZA', 'SI'),
(2151, 'PIETRASANTA', 'LU'),
(2152, 'PIEVE FOSCIANA', 'LU'),
(2153, 'PIMONTE', 'NA'),
(2154, 'PISCIOTTA', 'SA'),
(2155, 'PITIGLIANO', 'GR'),
(2156, 'POGGIBONSI', 'SI'),
(2157, 'POGGIO BUSTONE', 'RI'),
(2158, 'POGGIO CATINO', 'RI'),
(2159, 'POGGIO MIRTETO', 'RI'),
(2160, 'POGGIO MOIANO', 'RI'),
(2161, 'POGGIO NATIVO', 'RI'),
(2162, 'POGGIO SAN LORENZO', 'RI'),
(2163, 'POGGIOMARINO', 'NA'),
(2164, 'POLLA', 'SA'),
(2165, 'POLLENA TROCCHIA', 'NA'),
(2166, 'POLLICA', 'SA'),
(2168, 'POMPEI', 'NA'),
(2169, 'PONTASSIEVE', 'FI'),
(2170, 'PONTECAGNANO FAIANO', 'SA'),
(2171, 'PORCARI', 'LU'),
(2172, 'PORTICI', 'NA'),
(2173, 'POSITANO', 'SA'),
(2174, 'POSTA', 'RI'),
(2175, 'POSTIGLIONE', 'SA'),
(2176, 'POZZAGLIA SABINA', 'RI'),
(2177, 'POZZUOLI', 'NA'),
(2178, 'PRAIANO', 'SA'),
(2179, 'PRIGNANO CILENTO', 'SA'),
(2180, 'PROCIDA', 'NA'),
(2181, 'QUALIANO', 'NA'),
(2182, 'QUARTO', 'NA'),
(2183, 'RADDA IN CHIANTI', 'SI'),
(2184, 'RADICOFANI', 'SI'),
(2185, 'RADICONDOLI', 'SI'),
(2186, 'RAPOLANO TERME', 'SI'),
(2187, 'RAVELLO', 'SA'),
(2188, 'REGGELLO', 'FI'),
(2189, 'RICIGLIANO', 'SA'),
(2190, 'RIETI', 'RI'),
(2192, 'RIVODUTRI', 'RI'),
(2193, 'ROCCA SINIBALDA', 'RI'),
(2194, 'ROCCADASPIDE', 'SA'),
(2195, 'ROCCAGLORIOSA', 'SA'),
(2196, 'ROCCALBEGNA', 'GR'),
(2197, 'ROCCANTICA', 'RI'),
(2198, 'ROCCAPIEMONTE', 'SA'),
(2199, 'ROCCARAINOLA', 'NA'),
(2200, 'ROCCASTRADA', 'GR'),
(2201, 'ROFRANO', 'SA'),
(2202, 'ROMAGNANO AL MONTE', 'SA'),
(2203, 'ROSCIGNO', 'SA'),
(2204, 'RUFINA', 'FI'),
(2205, 'RUTINO', 'SA'),
(2206, 'SACCO', 'SA'),
(2207, 'SALA CONSILINA', 'SA'),
(2208, 'SALENTO', 'SA'),
(2209, 'SALERNO', 'SA'),
(2210, 'SALISANO', 'RI'),
(2211, 'SALVITELLE', 'SA'),
(2212, 'SAN CASCIANO DEI BAGNI', 'SI'),
(2213, 'SAN CASCIANO IN VAL DI PESA', 'FI'),
(2214, 'SAN CIPRIANO PICENTINO', 'SA'),
(2215, 'SAN GENNARO VESUVIANO', 'NA'),
(2216, 'SAN GIMIGNANO', 'SI'),
(2217, 'SAN GIORGIO A CREMANO', 'NA'),
(2218, 'SAN GIOVANNI A PIRO', 'SA'),
(2219, 'SAN GIUSEPPE VESUVIANO', 'NA'),
(2220, 'SAN GODENZO', 'FI'),
(2221, 'SAN GREGORIO MAGNO', 'SA'),
(2222, 'SAN MANGO PIEMONTE', 'SA'),
(2223, 'SAN MARZANO SUL SARNO', 'SA'),
(2224, 'SAN MAURO CILENTO', 'SA'),
(2225, 'SAN MAURO LA BRUCA', 'SA'),
(2226, 'SAN PAOLO BEL SITO', 'NA'),
(2227, 'SAN PIETRO AL TANAGRO', 'SA'),
(2229, 'SAN ROMANO IN GARFAGNANA', 'LU'),
(2230, 'SAN RUFO', 'SA'),
(2231, 'SAN SEBASTIANO AL VESUVIO', 'NA'),
(2232, 'SAN VALENTINO TORIO', 'SA'),
(2233, 'SAN VITALIANO', 'NA'),
(2241, 'SANTA FIORA', 'GR'),
(2243, 'SANTA MARINA', 'SA'),
(2244, 'SANTOMENNA', 'SA'),
(2245, 'SANZA', 'SA'),
(2246, 'SAPRI', 'SA'),
(2247, 'SARNO', 'SA'),
(2248, 'SARTEANO', 'SI'),
(2249, 'SASSANO', 'SA'),
(2250, 'SAVIANO', 'NA'),
(2251, 'SCAFATI', 'SA'),
(2252, 'SCALA', 'SA'),
(2253, 'SCANDICCI', 'FI'),
(2254, 'SCANDRIGLIA', 'RI'),
(2255, 'SCANSANO', 'GR'),
(2256, 'SCARLINO', 'GR'),
(2257, 'SCARPERIA E SAN PIERO', 'FI'),
(2258, 'SCISCIANO', 'NA'),
(2259, 'SEGGIANO', 'GR'),
(2260, 'SELCI', 'RI'),
(2261, 'SEMPRONIANO', 'GR'),
(2262, 'SERAVEZZA', 'LU'),
(2263, 'SERRAMEZZANA', 'SA'),
(2264, 'SERRARA FONTANA', 'NA'),
(2265, 'SERRE', 'SA'),
(2266, 'SESSA CILENTO', 'SA'),
(2267, 'SESTO FIORENTINO', 'FI'),
(2268, 'SIANO', 'SA'),
(2269, 'SICIGNANO DEGLI ALBURNI', 'SA'),
(2270, 'SIENA', 'SI'),
(2271, 'SIGNA', 'FI'),
(2272, 'SILLANO GIUNCUGNANO', 'LU'),
(2273, 'SINALUNGA', 'SI'),
(2274, 'SOMMA VESUVIANA', 'NA'),
(2275, 'SORANO', 'GR'),
(2276, 'SORRENTO', 'NA'),
(2277, 'SOVICILLE', 'SI'),
(2278, 'STAZZEMA', 'LU'),
(2279, 'STELLA CILENTO', 'SA'),
(2280, 'STIMIGLIANO', 'RI'),
(2281, 'STIO', 'SA'),
(2282, 'STRIANO', 'NA'),
(2283, 'TARANO', 'RI'),
(2284, 'TEGGIANO', 'SA'),
(2285, 'TERZIGNO', 'NA'),
(2286, 'TOFFIA', 'RI'),
(2287, 'TORCHIARA', 'SA'),
(2288, 'TORRACA', 'SA'),
(2289, 'TORRE ANNUNZIATA', 'NA'),
(2290, 'TORRE DEL GRECO', 'NA'),
(2291, 'TORRE ORSAIA', 'SA'),
(2292, 'TORRI IN SABINA', 'RI'),
(2293, 'TORRICELLA IN SABINA', 'RI'),
(2294, 'TORRITA DI SIENA', 'SI'),
(2295, 'TORTORELLA', 'SA'),
(2296, 'TRAMONTI', 'SA'),
(2297, 'TRECASE', 'NA'),
(2298, 'TRENTINARA', 'SA'),
(2299, 'TREQUANDA', 'SI'),
(2300, 'TUFINO', 'NA'),
(2301, 'TURANIA', 'RI'),
(2302, 'VACONE', 'RI'),
(2303, 'VAGLI SOTTO', 'LU'),
(2304, 'VAGLIA', 'FI'),
(2306, 'VALLO DELLA LUCANIA', 'SA'),
(2307, 'VALVA', 'SA'),
(2308, 'VARCO SABINO', 'RI'),
(2309, 'VIAREGGIO', 'LU'),
(2310, 'VIBONATI', 'SA'),
(2311, 'VICCHIO', 'FI'),
(2312, 'VICO EQUENSE', 'NA'),
(2313, 'VIETRI SUL MARE', 'SA'),
(2314, 'VILLA BASILICA', 'LU'),
(2315, 'VILLA COLLEMANDINA', 'LU'),
(2316, 'VILLARICCA', 'NA'),
(2317, 'VINCI', 'FI'),
(2318, 'VISCIANO', 'NA'),
(2319, 'VOLLA', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `merce`
--

CREATE TABLE `merce` (
  `id_merce` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `quantita` int(11) NOT NULL,
  `num_colli` int(11) NOT NULL,
  `lunghezza_collo` double DEFAULT NULL,
  `larghezza_collo` double DEFAULT NULL,
  `altezza_collo` double DEFAULT NULL,
  `peso_collo` double DEFAULT NULL,
  `num_ordine` int(11) NOT NULL,
  `num_scaffale` varchar(10) DEFAULT NULL,
  `data_consegna_hub` date NOT NULL,
  `data_consegna_es_comm` date DEFAULT NULL,
  `stato` varchar(30) NOT NULL,
  `note_stato` varchar(200) DEFAULT NULL,
  `fk_merce_inserita_da` varchar(30) NOT NULL,
  `fk_username_corriere` varchar(30) DEFAULT NULL,
  `fk_destinatario` int(11) NOT NULL,
  `fk_targa` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merce`
--

INSERT INTO `merce` (`id_merce`, `nome`, `tipo`, `quantita`, `num_colli`, `lunghezza_collo`, `larghezza_collo`, `altezza_collo`, `peso_collo`, `num_ordine`, `num_scaffale`, `data_consegna_hub`, `data_consegna_es_comm`, `stato`, `note_stato`, `fk_merce_inserita_da`, `fk_username_corriere`, `fk_destinatario`, `fk_targa`) VALUES
(36, 'Televisore SAMSUNG UE55TU7090U', 'TV. Audio e Home Cinema', 20, 4, NULL, NULL, NULL, NULL, 1000023454, NULL, '2021-06-20', NULL, 'Da consegnare in HUB', NULL, 'l.santis', NULL, 6, NULL),
(37, 'Cellulare SAMSUNG Galaxy S20', 'Telefonia', 300, 5, 1, 1, 1, 4, 1000023454, 'L3', '2021-05-30', '2021-06-01', 'Consegnato in HUB', NULL, 'l.santis', NULL, 6, NULL),
(38, 'Surgelati Findus', 'Alimentari surgelati', 120, 6, NULL, NULL, NULL, NULL, 12344, NULL, '2021-06-20', NULL, 'da consegnare in HUB', NULL, 'c.federici', NULL, 7, NULL),
(39, 'Banane', 'Alimentari freschi', 50, 10, NULL, NULL, NULL, NULL, 200034566, NULL, '2021-06-16', '2021-06-28', 'In consegna', NULL, 'p.fanti', 'd.fortis', 7, 'AC222WP'),
(40, 'Tute', 'Abbigliamento', 150, 4, 0.5, 1, 0.7, 5, 1100002345, 'H5', '2021-05-20', '2021-05-25', 'Consegnato', NULL, 'g.ricci', 'd.fortis', 11, 'AK774HD'),
(41, 'Felpe', 'Abbigliamento', 110, 3, 0.5, 1, 0.7, 3, 1100002345, 'H5', '2021-05-20', '2021-05-25', 'Consegnato', NULL, 'g.ricci', 'd.fortis', 11, 'AK774HD'),
(42, 'Televisore SONY KD65X80J', 'TV. Audio e Home Cinema', 10, 2, NULL, NULL, NULL, NULL, 6696666, NULL, '2021-06-21', NULL, 'Da consegnare in HUB', NULL, 'f.gallo', NULL, 6, NULL),
(43, 'Pasta De Cecco', 'Alimentari', 80, 2, NULL, NULL, NULL, NULL, 12344, NULL, '2021-06-20', NULL, 'Da consegnare in HUB', NULL, 'p.fanti', NULL, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mezzi`
--

CREATE TABLE `mezzi` (
  `targa` char(7) NOT NULL,
  `volume` double NOT NULL,
  `autonomia` int(3) NOT NULL,
  `lunghezza` double NOT NULL,
  `larghezza` double NOT NULL,
  `altezza` double NOT NULL,
  `peso` double NOT NULL,
  `mezzo_frigorifero` tinyint(1) NOT NULL,
  `mezzo_freezer` tinyint(1) NOT NULL,
  `guasto` tinyint(1) NOT NULL,
  `descrizione_guasto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mezzi`
--

INSERT INTO `mezzi` (`targa`, `volume`, `autonomia`, `lunghezza`, `larghezza`, `altezza`, `peso`, `mezzo_frigorifero`, `mezzo_freezer`, `guasto`, `descrizione_guasto`) VALUES
('AC222WP', 10, 300, 3.03, 1.5, 1.88, 3.5, 1, 0, 0, NULL),
('AD343HK', 10, 250, 4.2, 2.2, 2.23, 5, 0, 0, 0, NULL),
('AK774HD', 10, 250, 4.2, 2.2, 2.23, 5, 0, 0, 0, NULL),
('AO076HH', 10, 250, 4.2, 2.2, 2.23, 5, 0, 0, 0, NULL),
('CD945GF', 10, 300, 3.03, 1.5, 1.88, 3.5, 0, 0, 1, 'Pneumatici da cambiare'),
('LL945GF', 10, 300, 3.03, 1.5, 1.88, 3.5, 0, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `sigla` char(2) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`sigla`, `nome`) VALUES
('AG', 'AGRIGENTO'),
('AL', 'ALESSANDRIA'),
('AN', 'ANCONA'),
('AO', 'AOSTA'),
('AP', 'ASCOLI PICENO'),
('AQ', 'L\'AQUILA'),
('AR', 'AREZZO'),
('AT', 'ASTI'),
('AV', 'AVELLINO'),
('BA', 'BARI'),
('BG', 'BERGAMO'),
('BI', 'BIELLA'),
('BL', 'BELLUNO'),
('BN', 'BENEVENTO'),
('BO', 'BOLOGNA'),
('BR', 'BRINDISI'),
('BS', 'BRESCIA'),
('BZ', 'BOLZANO'),
('CA', 'CAGLIARI'),
('CB', 'CAMPOBASSO'),
('CE', 'CASERTA'),
('CH', 'CHIETI'),
('CL', 'CALTANISSETTA'),
('CN', 'CUNEO'),
('CO', 'COMO'),
('CR', 'CREMONA'),
('CS', 'COSENZA'),
('CT', 'CATANIA'),
('CZ', 'CATANZARO'),
('EN', 'ENNA'),
('FC', 'FORLI\' CESENA'),
('FE', 'FERRARA'),
('FG', 'FOGGIA'),
('FI', 'FIRENZE'),
('FM', 'FERMO'),
('FO', 'FORLI\''),
('FR', 'FROSINONE'),
('GE', 'GENOVA'),
('GO', 'GORIZIA'),
('GR', 'GROSSETO'),
('IM', 'IMPERIA'),
('IS', 'ISERNIA'),
('KR', 'CROTONE'),
('LC', 'LECCO'),
('LE', 'LECCE'),
('LI', 'LIVORNO'),
('LO', 'LODI'),
('LT', 'LATINA'),
('LU', 'LUCCA'),
('MB', 'MONZA-BRIANZA'),
('MC', 'MACERATA'),
('ME', 'MESSINA'),
('MI', 'MILANO'),
('MN', 'MANTOVA'),
('MO', 'MODENA'),
('MS', 'MASSA CARRARA'),
('MT', 'MATERA'),
('NA', 'NAPOLI'),
('NO', 'NOVARA'),
('NU', 'NUORO'),
('OR', 'ORISTANO'),
('PA', 'PALERMO'),
('PC', 'PIACENZA'),
('PD', 'PADOVA'),
('PE', 'PESCARA'),
('PG', 'PERUGIA'),
('PI', 'PISA'),
('PN', 'PORDENONE'),
('PO', 'PRATO'),
('PR', 'PARMA'),
('PS', 'PESARO'),
('PT', 'PISTOIA'),
('PU', 'PESARO URBINO'),
('PV', 'PAVIA'),
('PZ', 'POTENZA'),
('RA', 'RAVENNA'),
('RC', 'REGGIO CALABRIA'),
('RE', 'REGGIO EMILIA'),
('RG', 'RAGUSA'),
('RI', 'RIETI'),
('RM', 'ROMA'),
('RN', 'RIMINI'),
('RO', 'ROVIGO'),
('SA', 'SALERNO'),
('SI', 'SIENA'),
('SO', 'SONDRIO'),
('SP', 'LA SPEZIA'),
('SR', 'SIRACUSA'),
('SS', 'SASSARI'),
('SV', 'SAVONA'),
('TA', 'TARANTO'),
('TE', 'TERAMO'),
('TN', 'TRENTO'),
('TO', 'TORINO'),
('TP', 'TRAPANI'),
('TR', 'TERNI'),
('TS', 'TRIESTE'),
('TV', 'TREVISO'),
('UD', 'UDINE'),
('VA', 'VARESE'),
('VB', 'VERBANIA'),
('VC', 'VERCELLI'),
('VE', 'VENEZIA'),
('VI', 'VICENZA'),
('VR', 'VERONA'),
('VT', 'VITERBO'),
('VV', 'VIBO VALENTIA');

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `ruolo` varchar(30) NOT NULL,
  `fk_cod_fiscale` char(16) NOT NULL,
  `fk_id_azienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`username`, `email`, `password`, `ruolo`, `fk_cod_fiscale`, `fk_id_azienda`) VALUES
('c.federici', 'cristiana.federici@sammontana.it', '594f803b380a41396ed63dca39503542', 'Fornitore', 'FDCCTN02E49G273Z', 13),
('d.fortis', 'dario.fortis@gtm.it', '594f803b380a41396ed63dca39503542', 'Corriere HUB', 'FTSDRO79E49G274K', 9),
('f.gallo', 'furio.gallo@sony.com', '594f803b380a41396ed63dca39503542', 'Fornitore', 'FRIGLL99E49G273Y', 14),
('f.rana', 'francesco.rana@gtm.it', '594f803b380a41396ed63dca39503542', 'Magazziniere HUB', 'RNAFRC89E49G273Z', 9),
('Frenk', 'frenk@gtm.it', '594f803b380a41396ed63dca39503542', 'Amministratore', 'MCHFNC02G47F274H', 9),
('g.ricci', 'giulia.ricci@nike.com', '594f803b380a41396ed63dca39503542', 'Fornitore', 'RCCSLA99E49G273Z', 10),
('l.santis', 'laura.santis@samsung.com', '594f803b380a41396ed63dca39503542', 'Fornitore', 'STSLRA99E49G273Z', 8),
('l.vacca', 'luca.vacca@carrefour.com', '594f803b380a41396ed63dca39503542', 'Esercizio commerciale', 'VCCLCA99E49G275D', 7),
('m.rossi', 'mario.rossi@unieuro.it', '594f803b380a41396ed63dca39503542', 'Esercizio commerciale', 'RSSMAR64E49G278J', 6),
('p.bianchi', 'paolo.bianchi@unieuro.it', '594f803b380a41396ed63dca39503542', 'Esercizio commerciale', 'BNCPLO02E49G273Z', 6),
('p.fanti', 'patrizia.fanti@metro.it', '594f803b380a41396ed63dca39503542', 'Fornitore', 'FTIPTZ99E49G273Z', 12),
('r.fava', 'rocco.fabiani@decathlon.it', '594f803b380a41396ed63dca39503542', 'Esercizio commerciale', 'FBNRCC99E49G273Z', 11),
('t.parente', 'tiziana.parente@nike.com', '594f803b380a41396ed63dca39503542', 'Fornitore', 'PRTTZN03E49G273Z', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anagrafica`
--
ALTER TABLE `anagrafica`
  ADD PRIMARY KEY (`cod_fiscale`),
  ADD KEY `fk_id_comune` (`fk_id_comune`);

--
-- Indexes for table `aziende`
--
ALTER TABLE `aziende`
  ADD PRIMARY KEY (`id_azienda`),
  ADD KEY `fk_id_comune` (`fk_id_comune`);

--
-- Indexes for table `comuni`
--
ALTER TABLE `comuni`
  ADD PRIMARY KEY (`id_comune`),
  ADD KEY `fk_sigla` (`fk_sigla`);

--
-- Indexes for table `merce`
--
ALTER TABLE `merce`
  ADD PRIMARY KEY (`id_merce`),
  ADD KEY `fk_merce_inserita_da` (`fk_merce_inserita_da`),
  ADD KEY `fk_username_corriere` (`fk_username_corriere`),
  ADD KEY `fk_destinatario` (`fk_destinatario`),
  ADD KEY `fk_targa` (`fk_targa`);

--
-- Indexes for table `mezzi`
--
ALTER TABLE `mezzi`
  ADD PRIMARY KEY (`targa`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`sigla`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_cod_fiscale` (`fk_cod_fiscale`),
  ADD KEY `fk_id_azienda` (`fk_id_azienda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aziende`
--
ALTER TABLE `aziende`
  MODIFY `id_azienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comuni`
--
ALTER TABLE `comuni`
  MODIFY `id_comune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2320;

--
-- AUTO_INCREMENT for table `merce`
--
ALTER TABLE `merce`
  MODIFY `id_merce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anagrafica`
--
ALTER TABLE `anagrafica`
  ADD CONSTRAINT `anagrafica_ibfk_1` FOREIGN KEY (`fk_id_comune`) REFERENCES `comuni` (`id_comune`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `aziende`
--
ALTER TABLE `aziende`
  ADD CONSTRAINT `aziende_ibfk_1` FOREIGN KEY (`fk_id_comune`) REFERENCES `comuni` (`id_comune`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comuni`
--
ALTER TABLE `comuni`
  ADD CONSTRAINT `comuni_ibfk_1` FOREIGN KEY (`fk_sigla`) REFERENCES `province` (`sigla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `merce`
--
ALTER TABLE `merce`
  ADD CONSTRAINT `merce_ibfk_1` FOREIGN KEY (`fk_merce_inserita_da`) REFERENCES `utenti` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `merce_ibfk_2` FOREIGN KEY (`fk_username_corriere`) REFERENCES `utenti` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `merce_ibfk_3` FOREIGN KEY (`fk_destinatario`) REFERENCES `aziende` (`id_azienda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `merce_ibfk_4` FOREIGN KEY (`fk_targa`) REFERENCES `mezzi` (`targa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `utenti`
--
ALTER TABLE `utenti`
  ADD CONSTRAINT `utenti_ibfk_1` FOREIGN KEY (`fk_cod_fiscale`) REFERENCES `anagrafica` (`cod_fiscale`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utenti_ibfk_2` FOREIGN KEY (`fk_id_azienda`) REFERENCES `aziende` (`id_azienda`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
