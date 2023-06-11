-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2023 a las 00:50:37
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `el_salvador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `abreviatura` varchar(5) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`, `abreviatura`, `id_pais`) VALUES
(1, 'Ahuachapán', 'AH', 62),
(2, 'Santa Ana', 'SA', 62),
(3, 'Sonsonate', 'SO', 62),
(4, 'Chalatenango', 'CH', 62),
(5, 'La Libertad', 'LI', 62),
(6, 'San Salvador', 'SS', 62),
(7, 'Cuscatlán', 'CU', 62),
(8, 'La Paz', 'PA', 62),
(9, 'Cabañas', 'CA', 62),
(10, 'San Vicente', 'SV', 62),
(11, 'Usulután', 'US', 62),
(12, 'San Miguel', 'SM', 62),
(13, 'Morazán', 'MO', 62),
(14, 'La Unión', 'UN', 62),
(15, 'OTRO', 'OTRO', 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL COMMENT 'Llave primaria de la tabla municipio',
  `id_departamento` int(11) NOT NULL COMMENT 'Llave foranea a la tabla departamento que hace relaicon a que departamento pertenece el municipio',
  `nombre` varchar(150) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Campo que almacena el nombre del municipio',
  `abreviatura` varchar(60) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Campo que almacena la abreviatura del nombre del municipio',
  `zip_code` varchar(50) DEFAULT '10101000T' COMMENT 'Se refiere al código de zona por municipio'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `id_departamento`, `nombre`, `abreviatura`, `zip_code`) VALUES
(1, 1, 'Ahuachapán AH', 'AHUACHAPAN AH', '02101'),
(2, 1, 'Apaneca AH', 'APANECA AH', '02102'),
(3, 1, 'Atiquizaya AH', 'ATIQUIZAYA AH', '02103'),
(4, 1, 'Concepción de Ataco AH', 'CONCEPCION DE ATACO AH', '02106'),
(5, 1, 'El Refugio AH', 'El REFUGIO AH', '02107'),
(6, 1, 'Guaymango AH', 'GUAYMANGO AH', '02108'),
(7, 1, 'Jujutla AH', 'JUJUTLA AH', '02109'),
(8, 1, 'San Francisco Menéndez AH', 'S. FCO. MENENDEZ AH', '02113'),
(9, 1, 'San Lorenzo AH', 'S. LORENZO AH', '02115'),
(10, 1, 'San Pedro Puxtla AH', 'S. PEDRO PUXTLA AH', '02116'),
(11, 1, 'Tacuba AH', 'TACUBA AH', '02117'),
(12, 1, 'Turin AH', 'TURIN AH', '02118'),
(13, 2, 'Candelaria de La Frontera SA', 'CANDELARIA DE LA FRONTERA SA', '02203'),
(14, 2, 'Coatepeque SA', 'COATEPEQUE SA', '02204'),
(15, 2, 'Chalchuapa SA', 'CHALCHUAPA SA', '02205'),
(16, 2, 'El Congo SA', 'EL CONGO SA', '02207'),
(17, 2, 'El Porvenir SA', 'EL PORVENIR SA', '02208'),
(18, 2, 'Masahuat SA', 'MASAHUAT SA', '02210'),
(19, 2, 'Metapán SA', 'METAPAN SA', '02211'),
(20, 2, 'San Antonio Pajonal SA', 'S. ANTONIO PAJONAL SA', '02212'),
(21, 2, 'San Sebastián Salitrillo SA', 'S. SEBASTIAN SALITRILLO SA', '02215'),
(22, 2, 'Santa Ana SA', 'STA. ANA SA', '02201'),
(23, 2, 'Santa Rosa Guachipilin SA', 'STA. ROSA GUACHIPILIN SA', '02216'),
(24, 2, 'Santiago de La Frontera SA', 'STG. DE LA FRONTERA SA', '02217'),
(25, 2, 'Texistepeque SA', 'TEXISTEPEQUE SA', '02218'),
(26, 3, 'Acajutla SO', 'ACAJUTLA SO', '02302'),
(27, 3, 'Armenia SO', 'ARMENIA SO', '02303'),
(28, 3, 'Caluco SO', 'CALUCO SO', '02304'),
(29, 3, 'Cuisnahuat SO', 'CUISNAHUAT SO', '02305'),
(30, 3, 'Santa Isabel Ishuatán SO', 'STA. ISABEL ISHUATAN SO', '02318'),
(31, 3, 'Izalco SO', 'IZALCO SO', '02306'),
(32, 3, 'Juayua SO', 'JUAYUA SO', '02307'),
(33, 3, 'Nahuizalco SO', 'NAHUIZALCO SO', '02311'),
(34, 3, 'Nahuilingo SO', 'NAHUILINGO SO', '02312'),
(35, 3, 'Salcoatitán SO', 'SALCOATITAN SO', '02313'),
(36, 3, 'San Antonio del Monte SO', 'S. ANTONIO DEL MONTE SO', '02314'),
(37, 3, 'San Julián SO', 'S. JULIAN SO', '02316'),
(38, 3, 'Santa Catarina Masahuat SO', 'STA. CATARINA MASAHUAT SO', '02317'),
(39, 3, 'Santo Domingo de Guzmán SO', 'STO. DOMINGO DE GUZMAN SO', '02319'),
(40, 3, 'Sonsonate SO', 'SONSONATE SO', '02301'),
(41, 3, 'Sonzacate SO', 'SONZACATE SO', '02320'),
(42, 4, 'Agua Caliente CH', 'AGUA CALIENTE CH', '01302'),
(43, 4, 'Arcatao CH', 'ARCATAO CH', '01303'),
(44, 4, 'Azacualpa CH', 'AZACUALPA CH', '01304'),
(45, 4, 'Citalá CH', 'CITALA CH', '01306'),
(46, 4, 'Comalapa CH', 'COMALAPA CH', '01307'),
(47, 4, 'Concepción Quezaltepeque CH', 'CONCEPCION QUEZALTEPEQUE CH', '01308'),
(48, 4, 'Chalatenango CH', 'CHALATENANGO CH', '01301'),
(49, 4, 'Dulce Nombre de María CH', 'DULCE NOMBRE DE MARIA CH', '01309'),
(50, 4, 'El Carrizal CH', 'EL CARRIZAL CH', '01311'),
(51, 4, 'El Paraiso CH', 'EL PARAISO CH', '01312'),
(52, 4, 'La Laguna CH', 'LA LAGUNA CH', '01313'),
(53, 4, 'La Palma CH', 'LA PALMA CH', '01314'),
(54, 4, 'La Reina CH', 'LA REINA CH', '01315'),
(55, 4, 'Las Vueltas CH', 'LAS VUELTAS CH', '01318'),
(56, 4, 'Nombre de Jesús CH', 'NOMBRE DE JESUS CH', '01319'),
(57, 4, 'Nueva Concepción CH', 'NVA. CONCEPCION CH', '01320'),
(58, 4, 'Nueva Trinidad CH', 'NVA. TRINIDAD CH', '01321'),
(59, 4, 'Ojos de Agua CH', 'OJOS DE AGUA CH', '01322'),
(60, 4, 'Potonico CH', 'POTONICO CH', '01324'),
(61, 4, 'San Antonio de La Cruz CH', 'S. ANTONIO DE LA CRUZ CH', '01325'),
(62, 4, 'San Antonio Los Ranchos CH', 'S. ANTONIO LOS RANCHOS CH', '01326'),
(63, 4, 'San Fernando CH', 'S. FERNANDO CH', '01327'),
(64, 4, 'San Francisco Lempa CH', 'S. FCO. LEMPA CH', '01328'),
(65, 4, 'San Francisco Morazán CH', 'S. FCO. MORAZAN CH', '01329'),
(66, 4, 'San Ignacio CH', 'S. IGNACIO CH', '01330'),
(67, 4, 'San Isidro Labrador CH', 'S. ISIDRO LABRADOR CH', '01305'),
(68, 4, 'Cancasque CH', 'CANCASQUE CH', '01316'),
(69, 4, 'Las Flores CH', 'LAS FLORES CH', '01317'),
(70, 4, 'San Luis del Carmen CH', 'S. LUIS DEL CARMEN CH', '01331'),
(71, 4, 'San Miguel de Mercedes CH', 'S. MIGUEL DE MERCEDES CH', '01332'),
(72, 4, 'San Rafael CH', 'S. RAFAEL CH', '01333'),
(73, 4, 'Santa Rita CH', 'STA. RITA CH', '01334'),
(74, 4, 'Tejutla CH', 'TEJUTLA CH', '01335'),
(75, 5, 'Antiguo Cuscatlán LI', 'ANTIGUO CUSCATLAN LI', '01502'),
(76, 5, 'Ciudad Arce LI', 'CD. ARCE LI', '01504'),
(77, 5, 'Colón LI', 'COLON LI', '01512'),
(78, 5, 'Comasagua LI', 'COMASAGUA LI', '01506'),
(79, 5, 'Chiltiupán LI', 'CHILTIUPAN LI', '01507'),
(80, 5, 'Huizúcar LI', 'HUIZUCAR LI', '01508'),
(81, 5, 'Jayaque LI', 'JAYAQUE LI', '01509'),
(82, 5, 'Jicalapa LI', 'JICALAPA LI', '01510'),
(83, 5, 'La Libertad LI', 'LA LIBERTAD LI', '01511'),
(84, 5, 'Nuevo Cuscatlán LI', 'NVO. CUSCATLAN LI', '01513'),
(85, 5, 'Santa Tecla LI', 'STA. TECLA LI', '01501'),
(86, 5, 'Quezaltepeque LI', 'QUEZALTEPEQUE LI', '01515'),
(87, 5, 'Sacacoyo LI', 'SACACOYO LI', '01516'),
(88, 5, 'San José Villanueva LI', 'S. JOSE VILIANUEVA LI', '01517'),
(89, 5, 'San Juan Opico LI', 'S. JUAN OPICO LI', '01514'),
(90, 5, 'San Matías LI', 'S. MATIAS LI', '01518'),
(91, 5, 'San Pablo Tacachico LI', 'S. PABLO TACACHICO LI', '01519'),
(92, 5, 'Tamanique LI', 'TAMANIQUE LI', '01522'),
(93, 5, 'Talnique LI', 'TALNIQUE LI', '01521'),
(94, 5, 'Teotepeque LI', 'TEOTEPEQUE LI', '01523'),
(95, 5, 'Tepecoyo LI', 'TEPECOYO LI', '01524'),
(96, 5, 'Zaragoza LI', 'ZARAGOZA LI', '01525'),
(97, 6, 'Aguilares SS', 'AGUILARES SS', '01122'),
(98, 6, 'Apopa SS', 'APOPA SS', '01123'),
(99, 6, 'Ayutuxtepeque SS', 'AYUTUXTEPEQUE SS', '01121'),
(100, 6, 'Cuscatancingo SS', 'CUSCATANCINGO SS', '01119'),
(101, 6, 'El Paisnal SS', 'EL PAISNAL SS', '01124'),
(102, 6, 'Guazapa SS', 'GUAZAPA SS', '01125'),
(103, 6, 'Ilopango SS', 'ILOPANGO SS', '01117'),
(104, 6, 'Mejicanos SS', 'MEJICANOS SS', '01120'),
(105, 6, 'Nejapa SS', 'NEJAPA SS', '01126'),
(106, 6, 'Panchimalco SS', 'PANCHIMALCO SS', '01127'),
(107, 6, 'Rosario de Mora SS', 'ROSARIO DE MORA SS', '01128'),
(108, 6, 'San Marcos SS', 'S. MARCOS SS', '01115'),
(109, 6, 'San Martín SS', 'S. MARTIN SS', '01129'),
(110, 6, 'San Salvador SS', 'S. SALVADOR SS', '01101'),
(111, 6, 'Santiago Texacuangos SS', 'STG. TEXACUANGOS SS', '01130'),
(112, 6, 'Santo Tomás SS', 'STO. TOMAS SS', '01131'),
(113, 6, 'Soyapango SS', 'SOYAPANGO SS', '01116'),
(114, 6, 'Tonacatepeque SS', 'TONACATEPEQUE SS', '01132'),
(115, 6, 'Delgado SS', 'DELGADO SS', '01118'),
(116, 7, 'Candelaria CU', 'CANDELARIA CU', '01302'),
(117, 7, 'Cojutepeque CU', 'COJUTEPEQUE CU', '01401'),
(118, 7, 'El Carmen CU', 'EL CARMEN CU', '01403'),
(119, 7, 'El Rosario CU', 'EL ROSARIO CU', '01404'),
(120, 7, 'Monte San Juan CU', 'MONTE SAN JUAN CU', '01405'),
(121, 7, 'Oratorio de Concepción CU', 'ORATORIO DE CONCEPCION CU', '01406'),
(122, 7, 'San Bartolome Perulapía CU', 'S. BARTOLOME PERULAPIA CU', '01407'),
(123, 7, 'San Cristóbal CU', 'S. CRISTOBAL CU', '01408'),
(124, 7, 'San José Guayabal CU', 'S. JOSE GUAYABAL CU', '01409'),
(125, 7, 'San Pedro Perulapán CU', 'S. PEDRO PERULAPAN CU', '01410'),
(126, 7, 'San Rafael Cedros CU', 'S. RAFAEL CEDROS CU', '01411'),
(127, 7, 'San Ramón CU', 'S. RAMON CU', '01412'),
(128, 7, 'Santa Cruz Analquito CU', 'STA. CRUZ ANALQUITO CU', '01413'),
(129, 7, 'Santa Cruz Michapa CU', 'STA. CRUZ MICHAPA CU', '01414'),
(130, 7, 'Suchitoto CU', 'SUCHITOTO CU', '01415'),
(131, 7, 'Tenancíngo CU', 'TENANCINGO CU', '01416'),
(132, 8, 'Cuyultitán PA', 'CUYULTITAN PA', '01603'),
(133, 8, 'El Rosario PA', 'EL ROSARIO PA', '01604'),
(134, 8, 'Jerusalén PA', 'JERUSALEN PA', '01605'),
(135, 8, 'Mercedes de La Ceiba PA', 'MERCEDES DE LA CEIBA PA', '01607'),
(136, 8, 'Olocuilta PA', 'OLOCUILTA PA', '01608'),
(137, 8, 'Paraíso de Osorio PA', 'PARAISO DE OSORIO PA', '01609'),
(138, 8, 'San Antonio Masahuat PA', 'S. ANTONIO MASAHUAT PA', '01610'),
(139, 8, 'San Emigdio PA', 'S. EMIGDIO PA', '01611'),
(140, 8, 'San Francisco Chinaméca PA', 'S. FCO. CHINAMECA PA', '01612'),
(141, 8, 'San Juan Nonualco PA', 'S. JN. NONUALCO PA', '01613'),
(142, 8, 'San Juan Talpa PA', 'S. JN. TALPA PA', '01614'),
(143, 8, 'San Juan Tepezontes PA', 'S. JN. TEPEZONTES PA', '01615'),
(144, 8, 'San Luis Talpa PA', 'S. LUIS TALPA PA', '01616'),
(145, 8, 'San Miguel Tepezontes PA', 'S. MIGUEL TEPEZONTES PA', '01617'),
(146, 8, 'San Pedro Masahuat PA', 'S. PEDRO MASAHUAT PA', '01618'),
(147, 8, 'San Pedro Nonualco PA', 'S. PEDRO NONUALCO PA', '01619'),
(148, 8, 'San Rafael Obrajuelo PA', 'S. RAFAEL OBRAJUELO PA', '01620'),
(149, 8, 'Santa María Ostuma PA', 'STA. MARIA OSTUMA PA', '01621'),
(150, 8, 'Santiago Nonualco PA', 'STG. NONUALCO PA', '01622'),
(151, 8, 'Tapalhuaca PA', 'TAPALHUACA PA', '01623'),
(152, 8, 'Zacatecolúca PA', 'ZACATECOLUCA PA', '01601'),
(153, 8, 'San Luis de La Herradura PA', 'S. LUIS DE LA HERRADURA PA', '01606'),
(154, 9, 'Cinquera CA', 'CINQUERA CA', '01202'),
(155, 9, 'Guacotecti CA', 'GUACOTECTI CA', '01203'),
(156, 9, 'Ilobásco CA', 'ILOBASCO CA', '01204'),
(157, 9, 'Jutiapa CA', 'JUTIAPA CA', '01206'),
(158, 9, 'San Isidro CA', 'S. ISIDRO CA', '01207'),
(159, 9, 'Sensuntepeque CA', 'SENSUNTEPEQUE CA', '01201'),
(160, 9, 'Tejutepeque CA', 'TEJUTEPEQUE CA', '01208'),
(161, 9, 'Victoria CA', 'VICTORIA CA', '01210'),
(162, 9, 'Dolores CA', 'DOLORES CA', '01209'),

( 12, 'Nueva Guadalupe SM', 'NVA. GUADALUPE SM', '03313'),
( 12, 'Nuevo Edén de San Juan SM', 'NVO. EDEN S. JUAN SM', '03314'),
( 12, 'Quelepa SM', 'QUELEPA SM', '03315'),
( 12, 'San Antonio SM', 'S. ANTONIO SM', '03316'),
( 12, 'San Gerardo SM', 'S. GERARDO SM', '03318'),
( 12, 'San Jorge SM', 'S. JORGE SM', '03319'),
( 12, 'San Luis de La Reina SM', 'S. LUIS DE LA REINA SM', '03320'),
( 12, 'San Miguel SM', 'S. MIGUEL SM', '03301'),
( 12, 'San Rafael Oriente SM', 'S. RAFAEL ORIENTE SM', '03322'),
( 12, 'Sesori SM', 'SESORI SM', '03323'),
( 12, 'Uluazapa SM', 'ULUAZAPA SM', '03324'),
( 13, 'Arambala MO', 'ARAMBALA MO', '03202'),
( 13, 'Cacaopera MO', 'CACAOPERA MO', '03216'),
( 13, 'Corinto MO', 'CORINTO MO', '03204'),
( 13, 'Chilanga MO', 'CHILANGA MO', '03203'),
( 13, 'Delicias de Concepción MO', 'DELICIAS DE CONCEPCION MO', '03206'),
( 13, 'El Divisadero MO', 'EL DIVISADERO MO', '03207'),
( 13, 'El Rosario MO', 'EL ROSARIO MO', '03208'),
( 13, 'Gualococti MO', 'GUALOCOCTI MO', '03209'),
( 13, 'Guatajiagua MO', 'GUATAJIAGUA MO', '03210'),
( 13, 'Joateca MO', 'JOATECA MO', '03211'),
( 13, 'Jocoaitique MO', 'JOCOAITIQUE MO', '03212'),
( 13, 'Jocoro MO', 'JOCORO MO', '03213'),
( 13, 'Lolotiquillo MO', 'LOLOTIQUILLO MO', '03214'),
( 13, 'Meanguera MO', 'MEANGUERA MO', '03215'),
( 13, 'Osicala MO', 'OSICALA MO', '03216'),
( 13, 'Perquín MO', 'PERQUIN MO', '03217'),
( 13, 'San Carlos MO', 'S. CARLOS MO', '03218'),
( 13, 'San Fernando MO', 'S. FERNANDO MO', '03219'),
( 13, 'San Francisco Gotera MO', 'S. FCO. GOTERA MO', '03201'),
( 13, 'San Isidro MO', 'S. ISIDRO MO', '03220'),
( 13, 'San Simón MO', 'S. SIMON MO', '03221'),
( 13, 'Sensembra MO', 'SENSEMBRA MO', '03222'),
( 13, 'Sociedad MO', 'SOCIEDAD MO', '03223'),
( 13, 'Torola MO', 'TOROLA MO', '03224'),
( 13, 'Yamabal MO', 'YAMABAL MO', '03225'),
( 13, 'Yoloaiquín MO', 'YOLOAIQUIN MO', '03226'),
( 14, 'Anamorós UN', 'ANAMOROS UN', '03104'),
( 14, 'Bolívar UN', 'BOLIVAR UN', '03105'),
( 14, 'Concepción de Oriente UN', 'CONCEPCION DE ORIENTE UN', '03106'),
( 14, 'Conchagua UN', 'CONCHAGUA UN', '03107'),
( 14, 'El Carmen UN', 'EL CARMEN UN', '03108'),
( 14, 'El Sauce UN', 'EL SAUCE UN', '03109'),
( 14, 'Intipucá UN', 'INTIPUCA UN', '03111'),
( 14, 'La Unión UN', 'LA UNION UN', '03101'),
( 14, 'Lislique UN', 'LISLIQUE UN', '03112'),
( 14, 'Nueva Esparta UN', 'NVA. ESPARTA UN', '03114'),
( 14, 'Pasaquina UN', 'PASAQUINA UN', '03116'),
( 14, 'Polorós UN', 'POLOROS UN', '03117'),
( 14, 'San Alejo UN', 'S. ALEJO UN', '03119'),
( 14, 'San José UN', 'S. JOSE.UN', '03120'),
( 14, 'Santa Rosa de Lima UN', 'STA. ROSA DE LIMA UN', '03121'),
( 14, 'Yayantique UN', 'YAYANTIQUE UN', '03122'),
( 14, 'Yucuaiquín UN', 'YUCUAIQUIN UN', '03123'),
( 14, 'Meanguera del Golfo UN', 'MEANGUERA DEL GOLFO UN', '03113'),
( 15, 'Otro OT', 'OTRO OT', '01101');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fe_pais`
--

CREATE TABLE `fe_pais` (
  `id` int(11) NOT NULL,
  `nombre_pais` varchar(100) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre del Pais',
  `cod_iso_alf2` varchar(2) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Codigo ISO 3166-1\r\nalpha2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `fe_pais`
--

INSERT INTO `fe_pais` (`id`, `nombre_pais`, `cod_iso_alf2`) VALUES
(1, 'Afganistan', 'AF'),
(2, 'Albania', 'AL'),
(3, 'Alemania', 'DE'),
(4, 'Andorra', 'AD'),
(5, 'Angola', 'AO'),
(6, 'Anguila', 'AI'),
(7, 'Antartida', 'AQ'),
(8, 'Antigua y Barbuda', 'AG'),
(9, 'Arabia Saudita', 'SA'),
(10, 'Argelia', 'DZ'),
(11, 'Argentina', 'AR'),
(12, 'Armenia', 'AM'),
(13, 'Aruba', 'AW'),
(14, 'Australia', 'AU'),
(15, 'Austria', 'AT'),
(16, 'Azerbaiyan', 'AZ'),
(17, 'Bahamas', 'BS'),
(18, 'Bahrein', 'BH'),
(19, 'Bailia de Guernsey', 'GG'),
(20, 'Bangladesh', 'BD'),
(21, 'Barbados', 'BB'),
(22, 'Belarus', 'BY'),
(23, 'Belgica', 'BE'),
(24, 'Belice', 'BZ'),
(25, 'Benin', 'BJ'),
(26, 'Bermudas', 'BM'),
(27, 'Bolivia', 'BO'),
(28, 'Bonaire, San Eustaquio y Saba', 'BQ'),
(29, 'Bosnia y Hercegovina', 'BA'),
(30, 'Botsuana', 'BW'),
(31, 'Brasil', 'BR'),
(32, 'Brunei', 'BN'),
(33, 'Bulgaria', 'BG'),
(34, 'Burkina Faso', 'BF'),
(35, 'Burundi', 'BI'),
(36, 'Butan', 'BT'),
(37, 'Cabo Verde', 'CV'),
(38, 'Cambodia', 'KH'),
(39, 'Camerun', 'CM'),
(40, 'Canada', 'CA'),
(41, 'Catar', 'QA'),
(42, 'Chad', 'TD'),
(43, 'Chequia', 'CZ'),
(44, 'Chile', 'CL'),
(45, 'China', 'CN'),
(46, 'Chipre', 'CY'),
(47, 'Ciudad del Vaticano', 'VA'),
(48, 'Colombia', 'CO'),
(49, 'Comores', 'KM'),
(50, 'Congo', 'CG'),
(51, 'Corea del Norte', 'KP'),
(52, 'Corea del Sur', 'KR'),
(53, 'Costa de Marfil', 'CI'),
(54, 'Costa Rica', 'CR'),
(55, 'Croacia', 'HR'),
(56, 'Cuba', 'CU'),
(57, 'Curacao', 'CW'),
(58, 'Dinamarca', 'DK'),
(59, 'Dominica', 'DM'),
(60, 'Ecuador', 'EC'),
(61, 'Egipto', 'EG'),
(62, 'El Salvador', 'SV'),
(63, 'Emiratos Arabes Unidos', 'AE'),
(64, 'Eritrea', 'ER'),
(65, 'Eslovaquia', 'SK'),
(66, 'Eslovenia', 'SI'),
(67, 'Espana', 'ES'),
(68, 'Estados Federados de Micronesia', 'FM'),
(69, 'Estados Unidos', 'US'),
(70, 'Estonia', 'EE'),
(71, 'Esuatini', 'SZ'),
(72, 'Etiopia', 'ET'),
(73, 'Fiji', 'FJ'),
(74, 'Filipinas', 'PH'),
(75, 'Finlandia', 'FI'),
(76, 'Francia', 'FR'),
(77, 'Gabon', 'GA'),
(78, 'Gambia', 'GM'),
(79, 'Georgia', 'GE'),
(80, 'Georgia del Sur y las Islas Sandwich del Sur', 'GS'),
(81, 'Ghana', 'GH'),
(82, 'Gibraltar', 'GI'),
(83, 'Granada', 'GD'),
(84, 'Grecia', 'GR'),
(85, 'Groenlandia', 'GL'),
(86, 'Guadalupe', 'GP'),
(87, 'Guam', 'GU'),
(88, 'Guatemala', 'GT'),
(89, 'Guayana', 'GY'),
(90, 'Guayana Francesa', 'GF'),
(91, 'Guinea', 'GN'),
(92, 'Guinea Ecuatorial', 'GQ'),
(93, 'Guinea-Bissau', 'GW'),
(94, 'Haiti', 'HT'),
(95, 'Honduras', 'HN'),
(96, 'Hong Kong', 'HK'),
(97, 'Hungria', 'HU'),
(98, 'India', 'IN'),
(99, 'Indonesia', 'ID'),
(100, 'Iran', 'IR'),
(101, 'Iraq', 'IQ'),
(102, 'Irlanda', 'IE'),
(103, 'Isla Bouvet', 'BV'),
(104, 'Isla de Man', 'IM'),
(105, 'Isla de Navidad', 'CX'),
(106, 'Isla de San Martin', 'MF'),
(107, 'Isla Mauricio', 'MU'),
(108, 'Isla Norfolk', 'NF'),
(109, 'Islandia', 'IS'),
(110, 'Islas Aland', 'AX'),
(111, 'Islas Caiman', 'KY'),
(112, 'Islas Cocos', 'CC'),
(113, 'Islas Cook', 'CK'),
(114, 'Islas Feroe', 'FO'),
(115, 'Islas Heard y McDonald', 'HM'),
(116, 'Islas Malvinas', 'FK'),
(117, 'Islas Marianas del Norte', 'MP'),
(118, 'Islas Marshall', 'MH'),
(119, 'Islas Pitcairn', 'PN'),
(120, 'Islas Salomon', 'SB'),
(121, 'Islas Turcas y Caicos', 'TC'),
(122, 'Islas Virgenes (UK)', 'VG'),
(123, 'Islas Virgenes Americanas', 'VI'),
(124, 'Israel', 'IL'),
(125, 'Italia', 'IT'),
(126, 'Jamaica', 'JM'),
(127, 'Japon', 'JP'),
(128, 'Jersey', 'JE'),
(129, 'Jordania', 'JO'),
(130, 'Kazajstan', 'KZ'),
(131, 'Kenia', 'KE'),
(132, 'Kirguistan', 'KG'),
(133, 'Kiribati', 'KI'),
(134, 'Kosovo', 'XK'),
(135, 'Kuwait', 'KW'),
(136, 'Laos', 'LA'),
(137, 'Lesotho', 'LS'),
(138, 'Letonia', 'LV'),
(139, 'Libano', 'LB'),
(140, 'Liberia', 'LR'),
(141, 'Libia', 'LY'),
(142, 'Liechtenstein', 'LI'),
(143, 'Lituania', 'LT'),
(144, 'Luxemburgo', 'LU'),
(145, 'Macao', 'MO'),
(146, 'Macedonia del Norte', 'MK'),
(147, 'Madagascar', 'MG'),
(148, 'Malasia', 'MY'),
(149, 'Malaui', 'MW'),
(150, 'Maldivas', 'MV'),
(151, 'Mali', 'ML'),
(152, 'Malta', 'MT'),
(153, 'Marruecos', 'MA'),
(154, 'Martinica', 'MQ'),
(155, 'Mauritania', 'MR'),
(156, 'Mayotte', 'YT'),
(157, 'Mexico', 'MX'),
(158, 'Moldavia', 'MD'),
(159, 'Mongolia', 'MN'),
(160, 'Montenegro', 'ME'),
(161, 'Montserrat', 'MS'),
(162, 'Mozambique', 'MZ'),
(163, 'Myanmar', 'MM'),
(164, 'Namibia', 'NA'),
(165, 'Nauru', 'NR'),
(166, 'Nepal', 'NP'),
(167, 'Nicaragua', 'NI'),
(168, 'Niger', 'NE'),
(169, 'Nigeria', 'NG'),
(170, 'Niue', 'NU'),
(171, 'Noruega', 'NO'),
(172, 'Nueva Caledonia', 'NC'),
(173, 'Nueva Zelandia', 'NZ'),
(174, 'Oman', 'OM'),
(175, 'Paises Bajos', 'NL'),
(176, 'Pakistan', 'PK'),
(177, 'Palaos', 'PW'),
(178, 'Palestina', 'PS'),
(179, 'Panama', 'PA'),
(180, 'Papua Nueva Guinea', 'PG'),
(181, 'Paraguay', 'PY'),
(182, 'Peru', 'PE'),
(183, 'Polinesia Francesa', 'PF'),
(184, 'Polonia', 'PL'),
(185, 'Portugal', 'PT'),
(186, 'Principado de Monaco', 'MC'),
(187, 'Puerto Rico', 'PR'),
(188, 'Reino Unido', 'GB'),
(189, 'Republica Centroafricana', 'CF'),
(190, 'Republica Democratica del Congo', 'CD'),
(191, 'Republica Dominicana', 'DO'),
(192, 'Reunion', 'RE'),
(193, 'Ruanda', 'RW'),
(194, 'Rumania', 'RO'),
(195, 'Rusia', 'RU'),
(196, 'Sahara Occidental', 'EH'),
(197, 'Samoa', 'WS'),
(198, 'Samoa Americana', 'AS'),
(199, 'San Bartolome', 'BL'),
(200, 'San Cristobal y Nieves', 'KN'),
(201, 'San Marino', 'SM'),
(202, 'San Pedro y Miquelon', 'PM'),
(203, 'San Vicente y las Granadinas', 'VC'),
(204, 'Santa Elena, Ascension y Tristan de Acuna', 'SH'),
(205, 'Santa Lucia', 'LC'),
(206, 'Santo Tome y Principe', 'ST'),
(207, 'Senegal', 'SN'),
(208, 'Serbia', 'RS'),
(209, 'Seychelles', 'SC'),
(210, 'Sierra Leona', 'SL'),
(211, 'Singapur', 'SG'),
(212, 'Sint Maarten', 'SX'),
(213, 'Siria', 'SY'),
(214, 'Somalia', 'SO'),
(215, 'Sri Lanka', 'LK'),
(216, 'Sudafrica', 'ZA'),
(217, 'Sudan', 'SD'),
(218, 'Sudan del Sur', 'SS'),
(219, 'Suecia', 'SE'),
(220, 'Suiza', 'CH'),
(221, 'Surinam', 'SR'),
(222, 'Svalbard y Jan Mayen', 'SJ'),
(223, 'Tailandia', 'TH'),
(224, 'Taiwan', 'TW'),
(225, 'Tanzania', 'TZ'),
(226, 'Tayikistan', 'TJ'),
(227, 'Territorio Britanico del Oceano Indico', 'IO'),
(228, 'Territorios Australes y Antarticos Franceses', 'TF'),
(229, 'Timor Oriental', 'TL'),
(230, 'Togo', 'TG'),
(231, 'Tokelau', 'TK'),
(232, 'Tonga', 'TO'),
(233, 'Trinidad y Tobago', 'TT'),
(234, 'Tunez', 'TN'),
(235, 'Turkmenistan', 'TM'),
(236, 'Turquia', 'TR'),
(237, 'Tuvalu', 'TV'),
(238, 'Ucrania', 'UA'),
(239, 'Uganda', 'UG'),
(240, 'Uruguay', 'UY'),
(241, 'Uzbekistan', 'UZ'),
(242, 'Vanuatu', 'VU'),
(243, 'Venezuela', 'VE'),
(244, 'Vietnam', 'VN'),
(245, 'Wallis y Futuna', 'WF'),
(246, 'Yemen', 'YE'),
(247, 'Yibuti', 'DJ'),
(248, 'Zambia', 'ZM'),
(249, 'Zimbabue', 'ZW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_departamento` (`id_departamento`);

--
-- Indices de la tabla `fe_pais`
--
ALTER TABLE `fe_pais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fe_pais`
--
ALTER TABLE `fe_pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `fe_pais` (`id`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
INSERT INTO Horarios (dia_semana, hora_inicio, hora_fin) VALUES
  ( 'Lunes', '08:00:00', '12:00:00'),
  ( 'Martes', '09:30:00', '13:30:00'),
  ( 'Miércoles', '14:00:00', '18:00:00'),
  ( 'Jueves', '10:00:00', '14:00:00'),
  ( 'Viernes', '16:00:00', '20:00:00'),
  ( 'Sábado', '08:00:00', '12:00:00'),
  ( 'Domingo', '09:00:00', '13:00:00'),
  ( 'Lunes', '13:30:00', '17:30:00'),
  ( 'Martes', '16:00:00', '20:00:00'),
  ( 'Miércoles', '10:30:00', '14:30:00');