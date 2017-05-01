-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2017 a las 23:49:52
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `youtube`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bancos`
--

CREATE TABLE `tbl_bancos` (
  `CODIGO_BANCO` double NOT NULL,
  `NOMBRE_BANCO` varchar(200) NOT NULL,
  `LOGOTIPO` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_canales`
--

CREATE TABLE `tbl_canales` (
  `CODIGO_CANAL` int(11) NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `NOMBRE_CANAL` varchar(200) NOT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL,
  `CANTIDAD_SUSCRIPTORES` double NOT NULL,
  `FECHA_CREACION` datetime NOT NULL,
  `URL_CANAL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_canales`
--

INSERT INTO `tbl_canales` (`CODIGO_CANAL`, `CODIGO_USUARIO`, `NOMBRE_CANAL`, `DESCRIPCION`, `CANTIDAD_SUSCRIPTORES`, `FECHA_CREACION`, `URL_CANAL`) VALUES
(9, 2, 'Lito.Soler', NULL, 0, '2017-05-01 00:00:00', 'weTube1.2/ur/verificarCanal.php/Lito.Soler');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clasificaciones`
--

CREATE TABLE `tbl_clasificaciones` (
  `CODIGO_CLASIFICACION` varchar(10) NOT NULL,
  `NOMBRE_CLASIFICACION` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_clasificaciones`
--

INSERT INTO `tbl_clasificaciones` (`CODIGO_CLASIFICACION`, `NOMBRE_CLASIFICACION`) VALUES
('D0', ' sin referencias al uso de drogas ni contenido relacionado'),
('D1', 'referencias moderadas al uso de drogas o contenido relacionado'),
('D2', 'referencias explÃ­citas al uso de drogas o contenido relacionado'),
('F0', 'sin luces desatellantes'),
('F1', 'sin luces destellantes'),
('L0', 'Sin lenguaje fuerte'),
('L1', 'Lenguaje fuerte'),
('L2', 'Lenguaje sexualmente explicito'),
('N0', 'sin desnudez'),
('N1', 'desnudos breves o parciales'),
('N2', 'desnudos explicitos'),
('S0', 'sin situaciones sexuales'),
('S1', 'situaciones sexuales moderadas'),
('S2', 'situaciones sexuales explÃ­citas'),
('V0', 'sin contenido violento ni perturbador'),
('V1', 'contenido moderadamente violento o perturbador'),
('V2', 'contenido muy violento o perturbador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clasificaciones_x_video`
--

CREATE TABLE `tbl_clasificaciones_x_video` (
  `CODIGO_VIDEO` int(11) NOT NULL,
  `CODIGO_CLASIFICACION` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentarios`
--

CREATE TABLE `tbl_comentarios` (
  `CODIGO_COMENTARIO` double NOT NULL,
  `CODIGO_COMENTARIO_PADRE` double DEFAULT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_VIDEO` int(11) NOT NULL,
  `COMENTARIO` varchar(200) NOT NULL,
  `FECHA_PUBLICACION` datetime(6) NOT NULL,
  `CANTIDAD_LIKES` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cuentas_bancarias`
--

CREATE TABLE `tbl_cuentas_bancarias` (
  `CODIGO_CUENTA` double NOT NULL,
  `CODIGO_LUGAR` double NOT NULL,
  `CODIGO_BANCO` double NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `NUMERO_CUENTA` text NOT NULL,
  `FECHA_REGISTRO` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_denuncias`
--

CREATE TABLE `tbl_denuncias` (
  `CODIGO_DENUNCIA` double NOT NULL,
  `CODIGO_TIPO_DENUNCIA` double NOT NULL,
  `CODIGO_ESTADO_DENUNCIA` double NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_VIDEO` int(11) NOT NULL,
  `DESCRIPCION` varchar(200) DEFAULT NULL,
  `FECHA_DENUNCIA` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_departamentos`
--

CREATE TABLE `tbl_departamentos` (
  `CODIGO_DEPARTAMENTO` double NOT NULL,
  `NOMBRE_DEPARTAMENTO` varchar(200) NOT NULL,
  `LONGITUD` double NOT NULL,
  `LATITUD` double NOT NULL,
  `CODIGO_PAIS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estados_denuncias`
--

CREATE TABLE `tbl_estados_denuncias` (
  `CODIGO_ESTADO_DENUNCIA` double NOT NULL,
  `NOMBRE_ESTADO_DENUNCIA` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estados_usuarios`
--

CREATE TABLE `tbl_estados_usuarios` (
  `CODIGO_ESTADO_USUARIO` int(11) NOT NULL,
  `ESTADO_USUARIO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estados_usuarios`
--

INSERT INTO `tbl_estados_usuarios` (`CODIGO_ESTADO_USUARIO`, `ESTADO_USUARIO`) VALUES
(1, 'activo'),
(2, 'bloqueado'),
(3, 'suspendido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estados_videos`
--

CREATE TABLE `tbl_estados_videos` (
  `CODIGO_ESTADO_VIDEO` int(11) NOT NULL,
  `NOMBRE_ESTADO_VIDEO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estados_videos`
--

INSERT INTO `tbl_estados_videos` (`CODIGO_ESTADO_VIDEO`, `NOMBRE_ESTADO_VIDEO`) VALUES
(1, 'activo'),
(2, 'bloqueado'),
(3, 'eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estados_videos_x_lugares`
--

CREATE TABLE `tbl_estados_videos_x_lugares` (
  `CODIGO_VIDEO` int(11) NOT NULL,
  `CODIGO_LUGAR` double NOT NULL,
  `CODIGO_ESTADO_VIDEO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial_videos`
--

CREATE TABLE `tbl_historial_videos` (
  `CODIGO_HISTORIAL` double NOT NULL,
  `CODIGO_VIDEO` int(11) NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_ORIGEN` double NOT NULL,
  `FECHA_HORA_VISUALIZACION` datetime(6) NOT NULL,
  `TIEMPO_VISUALIZACION_SEGUNDOS` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_idiomas`
--

CREATE TABLE `tbl_idiomas` (
  `CODIGO_IDIOMA` int(11) NOT NULL,
  `NOMBRE_IDIOMA` varchar(200) NOT NULL,
  `ABREVIATURA` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_idiomas`
--

INSERT INTO `tbl_idiomas` (`CODIGO_IDIOMA`, `NOMBRE_IDIOMA`, `ABREVIATURA`) VALUES
(1, 'catalan', 'ca'),
(2, 'aleman', 'de'),
(3, 'ingles', 'en'),
(4, 'español', 'es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_likes`
--

CREATE TABLE `tbl_likes` (
  `CODIGO_VIDEO` int(11) DEFAULT NULL,
  `CODIGO_COMENTARIO` double DEFAULT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_TIPO_LIKE` double NOT NULL,
  `FECHA_EVENTO` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_listas_favoritas`
--

CREATE TABLE `tbl_listas_favoritas` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_LISTA_REPRODUCCION` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_listas_reproduccion`
--

CREATE TABLE `tbl_listas_reproduccion` (
  `CODIGO_LISTA_REPRODUCCION` double NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_TIPO_LISTA` double NOT NULL,
  `NOMBRE_LISTA_REPRODUCCION` text NOT NULL,
  `DESCRIPCION` text NOT NULL,
  `FECHA_CREACION` datetime(6) NOT NULL,
  `FECHA_ULTIMA_ACTUALIZACION` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_listas_x_usuario`
--

CREATE TABLE `tbl_listas_x_usuario` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_LISTA_REPRODUCCION` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lugares`
--

CREATE TABLE `tbl_lugares` (
  `CODIGO_LUGAR` double NOT NULL,
  `CODIGO_LUGAR_PADRE` double NOT NULL,
  `CODIGO_TIPO_LUGAR` double NOT NULL,
  `NOMBRE_LUGAR` varchar(200) NOT NULL,
  `ABREVIATURA` varchar(50) NOT NULL,
  `LONGITUD` double NOT NULL,
  `LATITUD` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_municipios`
--

CREATE TABLE `tbl_municipios` (
  `CODIGO_MUNICIPIO` double NOT NULL,
  `NOMBRE_MUNICIPIO` varchar(200) NOT NULL,
  `LONGITUD` double NOT NULL,
  `LATITUD` double NOT NULL,
  `CODIGO_DEPARTAMENTO` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_origen_visualizacion`
--

CREATE TABLE `tbl_origen_visualizacion` (
  `CODIGO_ORIGEN` double NOT NULL,
  `NOMBRE_ORIGEN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_paises`
--

CREATE TABLE `tbl_paises` (
  `CODIGO_PAIS` varchar(200) NOT NULL,
  `NOMBRE_PAIS` varchar(200) NOT NULL,
  `CODIGO_AREA` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_paises`
--

INSERT INTO `tbl_paises` (`CODIGO_PAIS`, `NOMBRE_PAIS`, `CODIGO_AREA`) VALUES
('AD', 'Andorra', '+376'),
('AE', 'United Arab Emirates', '+971'),
('AG', 'Antigua and Barbuda', '+1 (268)'),
('AL', 'Albania', '+355'),
('AM', 'Armenia', '+374'),
('AO', 'Angola', '+244'),
('AR', 'Argentina', '+54'),
('AT', 'Austria', '+43'),
('AU', 'Australia', '+61'),
('AW', 'Aruba', '+297'),
('AZ', 'Azerbaijan', '+994'),
('BA', 'Bosnia-Herzegovina', '+387'),
('BB', 'Barbados', '+1 (246)'),
('BD', 'Bangladesh', '+880'),
('BE', 'Belgium', '+32'),
('BF', 'Burkina Faso', '+226'),
('BG', 'Bulgaria', '+359'),
('BH', 'Bahrain', '+973'),
('BI', 'Burundi', '+257'),
('BJ', 'Benin', '+229'),
('BL', 'Saint Barthelemy', '+590'),
('BM', 'Bermuda', '+1 (441)'),
('BN', 'Brunei', '+673'),
('BO', 'Bolivia', '+591'),
('BR', 'Brazil', '+55'),
('BS', 'Bahamas', '+1 (242)'),
('BT', 'Bhutan', '+975'),
('BW', 'Botswana', '+267'),
('BY', 'Belarus', '+375'),
('BZ', 'Belize', '+501'),
('CA', 'Canada', '+1'),
('CD', 'Congo D.R.', '+243'),
('CF', 'Central African Rep.', '+236'),
('CG', 'Congo', '+242'),
('CH', 'Switzerland', '+41'),
('CL', 'Chile', '+56'),
('CM', 'Cameroon', '+237'),
('CN', 'China', '+86'),
('CO', 'Colombia', '+57'),
('CR', 'Costa Rica', '+506'),
('CU', 'Cuba', '+53'),
('CV', 'Cape Verde', '+238'),
('CY', 'Cyprus', '+357'),
('CZ', 'Czech Republic', '+420'),
('DE', 'Germany', '+49'),
('DJ', 'Djibouti', '+253'),
('DK', 'Denmark', '+45'),
('DM', 'Dominica', '+1 (767)'),
('DO', 'Dominican Republic', '+1 (8)'),
('DZ', 'Algeria', '+213'),
('EC', 'Ecuador', '+593'),
('EE', 'Estonia', '+372'),
('EG', 'Egypt', '+20'),
('EH', 'Western Sahara', '+212'),
('ER', 'Eritrea', '+291'),
('ES', 'Spain', '+34'),
('ET', 'Ethiopia', '+251'),
('FI', 'Finland', '+358'),
('FJ', 'Fiji', '+679'),
('FK', 'Falkland Islands', '+500'),
('FM', 'Micronesia', '+691'),
('FO', 'Faroe Islands', '+298'),
('FR', 'France', '+33'),
('GA', 'Gabon', '+241'),
('GB', 'United Kingdom', '+44'),
('GD', 'Grenada', '+1 (473)'),
('GE', 'Georgia', '+995'),
('GF', 'French Guiana', '+594'),
('GG', 'Guernsey', '+44'),
('GH', 'Ghana', '+233'),
('GI', 'Gibraltar', '+350'),
('GL', 'Greenland', '+299'),
('GM', 'Gambia', '+220'),
('GN', 'Guinea', '+224'),
('GP', 'Guadeloupe', '+590'),
('GQ', 'Equatorial Guinea', '+240'),
('GR', 'Greece', '+30'),
('GT', 'Guatemala', '+502'),
('GW', 'Guinea-Bissau', '+245'),
('GY', 'Guyana', '+592'),
('HK', 'Hong Kong', '+852'),
('HN', 'Honduras', '+504'),
('HR', 'Croatia', '+385'),
('HT', 'Haiti', '+509'),
('HU', 'Hungary', '+36'),
('ID', 'Indonesia', '+62'),
('IE', 'Ireland', '+353'),
('IL', 'Israel', '+972'),
('IM', 'Isle of Man', '+44'),
('IN', 'India', '+91'),
('IQ', 'Iraq', '+964'),
('IR', 'Iran', '+98'),
('IS', 'Iceland', '+354'),
('IT', 'Italy', '+39'),
('JE', 'Jersey', '+44'),
('JM', 'Jamaica', '+1 (876)'),
('JO', 'Jordan', '+962'),
('JP', 'Japan', '+81'),
('KE', 'Kenya', '+254'),
('KG', 'Kyrgyzstan', '+996'),
('KH', 'Cambodia', '+855'),
('KI', 'Kiribati', '+686'),
('KM', 'Comoros', '+269'),
('KN', 'Saint Kitts and Nevis', '+1 (869)'),
('KP', 'North Korea', '+850'),
('KR', 'South Korea', '+82'),
('KW', 'Kuwait', '+965'),
('KY', 'Cayman Islands', '+1 (345)'),
('KZ', 'Kazakhstan', '+7 7'),
('LA', 'Laos', '+856'),
('LB', 'Lebanon', '+961'),
('LC', 'Saint Lucia', '+1 (758)'),
('LI', 'Liechtenstein', '+423'),
('LK', 'Sri Lanka', '+94'),
('LR', 'Liberia', '+231'),
('LS', 'Lesotho', '+266'),
('LT', 'Lithuania', '+370'),
('LU', 'Luxembourg', '+352'),
('LV', 'Latvia', '+371'),
('LY', 'Libya', '+218'),
('MA', 'Morocco', '+212'),
('MC', 'Monaco', '+377'),
('MD', 'Moldova', '+373'),
('ME', 'Montenegro', '+382'),
('MF', 'Saint Martin', '+590'),
('MG', 'Madagascar', '+261'),
('MH', 'Marshall Islands', '+692'),
('MK', 'Macedonia', '+389'),
('ML', 'Mali', '+223'),
('MM', 'Burma', '+95'),
('MN', 'Mongolia', '+976'),
('MO', 'Macau', '+853'),
('MQ', 'Martinique', '+596'),
('MR', 'Mauritania', '+222'),
('MT', 'Malta', '+356'),
('MU', 'Mauritius', '+230'),
('MV', 'Maldives', '+960'),
('MW', 'Malawi', '+265'),
('MX', 'Mexico', '+52'),
('MY', 'Malaysia', '+60'),
('MZ', 'Mozambique', '+258'),
('NA', 'Namibia', '+264'),
('NC', 'New Caledonia', '+687'),
('NE', 'Niger', '+227'),
('NG', 'Nigeria', '+234'),
('NI', 'Nicaragua', '+505'),
('NL', 'Netherlands', '+31'),
('NO', 'Norway', '+47'),
('NP', 'Nepal', '+977'),
('NR', 'Nauru', '+674'),
('NZ', 'New Zealand', '+64'),
('OM', 'Oman', '+968'),
('PA', 'Panama', '+507'),
('PE', 'Peru', '+51'),
('PF', 'French Polynesia', '+689'),
('PG', 'Papua New Guinea', '+675'),
('PH', 'Philippines', '+63'),
('PK', 'Pakistan', '+92'),
('PL', 'Poland', '+48'),
('PM', 'Saint Pierre & Miquelon', '+508'),
('PR', 'Puerto Rico', '+1'),
('PT', 'Portugal', '+351'),
('PW', 'Palau', '+680'),
('PY', 'Paraguay', '+595'),
('QA', 'Qatar', '+974'),
('RE', 'Réunion', '+262'),
('RO', 'Romania', '+40'),
('RS', 'Serbia', '+381'),
('RU', 'Russia', '+7'),
('RW', 'Rwanda', '+250'),
('SA', 'Saudi Arabia', '+966'),
('SB', 'Solomon Islands', '+677'),
('SC', 'Seychelles', '+248'),
('SD', 'Sudan', '+249'),
('SE', 'Sweden', '+46'),
('SG', 'Singapore', '+65'),
('SI', 'Slovenia', '+386'),
('SJ', 'Svalbard and Jan Mayen', '+47'),
('SK', 'Slovakia', '+421'),
('SL', 'Sierra Leone', '+232'),
('SM', 'San Marino', '+378'),
('SN', 'Senegal', '+221'),
('SO', 'Somalia', '+252'),
('SR', 'Suriname', '+597'),
('SS', 'South Sudan', '+211'),
('ST', 'Sao Tome and Principe', '+239'),
('SV', 'El Salvador', '+503'),
('SY', 'Syria', '+963'),
('SZ', 'Swaziland', '+268'),
('TC', 'Turks and Caicos Islands', '+1 (649)'),
('TD', 'Chad', '+235'),
('TG', 'Togo', '+228'),
('TH', 'Thailand', '+66'),
('TJ', 'Tajikistan', '+992'),
('TL', 'Timor-Leste', '+670'),
('TM', 'Turkmenistan', '+993'),
('TN', 'Tunisia', '+216'),
('TO', 'Tonga', '+676'),
('TR', 'Turkey', '+90'),
('TT', 'Trinidad and Tobago', '+1 (868)'),
('TV', 'Tuvalu', '+688'),
('TW', 'Taiwan', '+886'),
('TZ', 'Tanzania', '+255'),
('UA', 'Ukraine', '+380'),
('UG', 'Uganda', '+256'),
('US', 'United States', '+1'),
('UY', 'Uruguay', '+598'),
('UZ', 'Uzbekistan', '+998'),
('VA', 'Vatican', '+39 (066)'),
('VC', 'St Vincent & the Grenadines', '+1 (784)'),
('VE', 'Venezuela', '+58'),
('VG', 'British Virgin Islands', '+1 (284)'),
('VN', 'Vietnam', '+84'),
('VU', 'Vanuatu', '+678'),
('WF', 'Wallis and Futuna', '+681'),
('WS', 'Samoa', '+685'),
('YE', 'Yemen', '+967'),
('YT', 'Mayotte', '+262'),
('ZA', 'South Africa', '+27'),
('ZM', 'Zambia', '+260'),
('ZW', 'Zimbabwe', '+263');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plataformas_externas`
--

CREATE TABLE `tbl_plataformas_externas` (
  `CODIGO_PLATAFORMA` double NOT NULL,
  `NOMBRE_PLATAFORMA` varchar(200) NOT NULL,
  `URL` text NOT NULL,
  `LOGO` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_shares`
--

CREATE TABLE `tbl_shares` (
  `CODIGO_SHARE` double NOT NULL,
  `CODIGO_VIDEO` int(11) NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_PLATAFORMA` double NOT NULL,
  `FECHA` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_subtitulos`
--

CREATE TABLE `tbl_subtitulos` (
  `CODIGO_SUBTITULO` int(11) NOT NULL,
  `CODIGO_IDIOMA` int(11) NOT NULL,
  `CODIGO_VIDEO` int(11) NOT NULL,
  `DESCRIPCION` text NOT NULL,
  `ARCHIVO_SUBTITULOS` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tendencias`
--

CREATE TABLE `tbl_tendencias` (
  `CODIGO_LUGAR` double NOT NULL,
  `RANKING` double NOT NULL,
  `CODIGO_VIDEO` int(11) NOT NULL,
  `CANTIDAD_LIKES` double NOT NULL,
  `CANTIDAD_COMENTARIOS` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_denuncias`
--

CREATE TABLE `tbl_tipos_denuncias` (
  `CODIGO_TIPO_DENUNCIA` double NOT NULL,
  `NOMBRE_TIPO_DENUNCIA` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_likes`
--

CREATE TABLE `tbl_tipos_likes` (
  `CODIGO_TIPO_LIKE` double NOT NULL,
  `NOMBRE_TIPO_LIKE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_listas_reproduccion`
--

CREATE TABLE `tbl_tipos_listas_reproduccion` (
  `CODIGO_TIPO_LISTA` double NOT NULL,
  `NOMBRE_TIPO_LISTA` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_lugares`
--

CREATE TABLE `tbl_tipos_lugares` (
  `CODIGO_TIPO_LUGAR` double NOT NULL,
  `NOMBRE_TIPO_LUGAR` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_pago`
--

CREATE TABLE `tbl_tipos_pago` (
  `CODIGO_TIPO_PAGO` double NOT NULL,
  `TIPO_PAGO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_usuarios`
--

CREATE TABLE `tbl_tipos_usuarios` (
  `CODIGO_TIPO_USUARIO` int(11) NOT NULL,
  `TIPO_USUARIO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipos_usuarios`
--

INSERT INTO `tbl_tipos_usuarios` (`CODIGO_TIPO_USUARIO`, `TIPO_USUARIO`) VALUES
(1, 'Invitado'),
(2, 'Registrado'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_transacciones_pagos`
--

CREATE TABLE `tbl_transacciones_pagos` (
  `CODIGO_TRANSACCION` double NOT NULL,
  `CODIGO_TIPO_PAGO` double NOT NULL,
  `CODIGO_VIDEO` int(11) NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `FECHA_TRANSACCION` datetime(6) NOT NULL,
  `FECHA_INICIO` datetime(6) NOT NULL,
  `FECHA_FIN` datetime(6) NOT NULL,
  `MONTO_PAGO` double NOT NULL,
  `IMPUESTOS` double DEFAULT NULL,
  `DESCUENTOS` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_LUGAR` double DEFAULT NULL,
  `CODIGO_PAIS` varchar(200) NOT NULL,
  `CODIGO_TIPO_USUARIO` int(11) NOT NULL,
  `CODIGO_ESTADO_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(200) NOT NULL,
  `APELLIDO` varchar(200) NOT NULL,
  `CORREO_ELECTRONICO` text NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `FOTOGRAFIA` longblob,
  `USUARIO` varchar(200) NOT NULL,
  `SEXO` varchar(25) NOT NULL,
  `FECHA_NACIMIENTO` datetime(6) NOT NULL,
  `FECHA_REGISTRO` datetime(6) NOT NULL,
  `TELEFONO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`CODIGO_USUARIO`, `CODIGO_LUGAR`, `CODIGO_PAIS`, `CODIGO_TIPO_USUARIO`, `CODIGO_ESTADO_USUARIO`, `NOMBRE`, `APELLIDO`, `CORREO_ELECTRONICO`, `PASSWORD`, `FOTOGRAFIA`, `USUARIO`, `SEXO`, `FECHA_NACIMIENTO`, `FECHA_REGISTRO`, `TELEFONO`) VALUES
(2, NULL, 'HN', 2, 1, 'Lito', 'Soler', 'lito.soler1@gmail.com', 'zxcv', NULL, 'Lito.Soler', 'hombre', '1992-12-29 00:00:00.000000', '2017-04-25 00:00:00.000000', '89338805'),
(3, NULL, 'HN', 2, 1, 'Emilsson', 'Soler', 'emilsson.soler@gmail.com', '1324', NULL, 'Emilsson.Soler', 'hombre', '1992-12-29 00:00:00.000000', '2017-04-25 00:00:00.000000', '88552211'),
(4, NULL, 'HN', 2, 1, 'Emilsson', 'Soler', 'edennirs@gmail.com', '1234', NULL, 'Emilsson.Soler', 'hombre', '0199-04-17 00:00:00.000000', '2017-04-26 00:00:00.000000', '97100418'),
(5, NULL, 'HN', 3, 1, 'Administrador', 'WeTube', 'admin@wetube.com', 'asd.456', NULL, 'admin', 'otro', '2017-04-26 00:00:00.000000', '2017-04-26 00:00:00.000000', '89338805');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios_x_canal`
--

CREATE TABLE `tbl_usuarios_x_canal` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_CANAL` int(11) NOT NULL,
  `FECHA_SUSCRIPCION` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario_etiquetados`
--

CREATE TABLE `tbl_usuario_etiquetados` (
  `CODIGO_COMENTARIO` double NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `FECHA_ETIQUETA` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_videos`
--

CREATE TABLE `tbl_videos` (
  `CODIGO_VIDEO` int(11) NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_ESTADO_VIDEO` int(11) NOT NULL,
  `CODIGO_IDIOMA` int(11) NOT NULL,
  `CODIGO_CANAL` int(11) NOT NULL,
  `NOMBRE_VIDEO` varchar(200) NOT NULL,
  `URL_IMG` varchar(200) NOT NULL,
  `DURACION_SEGUNDOS` double NOT NULL,
  `CANTIDAD_LIKES` double NOT NULL,
  `CANTIDAD_DISLIKES` double NOT NULL,
  `CANTIDAD_VISUALIZACIONES` double NOT NULL,
  `FECHA_SUBIDA` datetime(6) NOT NULL,
  `RUTA_VIDEO` varchar(200) NOT NULL,
  `DESCRIPCION` text NOT NULL,
  `CANTIDAD_SHARES` double NOT NULL,
  `URL` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_videos`
--

INSERT INTO `tbl_videos` (`CODIGO_VIDEO`, `CODIGO_USUARIO`, `CODIGO_ESTADO_VIDEO`, `CODIGO_IDIOMA`, `CODIGO_CANAL`, `NOMBRE_VIDEO`, `URL_IMG`, `DURACION_SEGUNDOS`, `CANTIDAD_LIKES`, `CANTIDAD_DISLIKES`, `CANTIDAD_VISUALIZACIONES`, `FECHA_SUBIDA`, `RUTA_VIDEO`, `DESCRIPCION`, `CANTIDAD_SHARES`, `URL`) VALUES
(3, 2, 1, 4, 9, 'AC-DC.mp4', '../videos/miniatura/acdc.jpg', 28440, 0, 0, 0, '2017-05-01 00:00:00.000000', '../videos/archivo/AC-DC.mp4', 'dflgmksdÃ±fgmkl', 0, NULL),
(4, 2, 1, 4, 9, 'AC-DC.mp4', '../videos/miniatura/acdc.jpg', 28440, 0, 0, 0, '2017-05-01 00:00:00.000000', '../videos/archivo/AC-DC.mp4', 'dflgmksdÃ±fgmkl', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_videos_x_lista`
--

CREATE TABLE `tbl_videos_x_lista` (
  `CODIGO_LISTA_REPRODUCCION` double NOT NULL,
  `CODIGO_VIDEO` int(11) NOT NULL,
  `ORDEN` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_bancos`
--
ALTER TABLE `tbl_bancos`
  ADD PRIMARY KEY (`CODIGO_BANCO`);

--
-- Indices de la tabla `tbl_canales`
--
ALTER TABLE `tbl_canales`
  ADD PRIMARY KEY (`CODIGO_CANAL`),
  ADD KEY `tbl_canales_tbl_usuarios_fk` (`CODIGO_USUARIO`);

--
-- Indices de la tabla `tbl_clasificaciones`
--
ALTER TABLE `tbl_clasificaciones`
  ADD PRIMARY KEY (`CODIGO_CLASIFICACION`);

--
-- Indices de la tabla `tbl_clasificaciones_x_video`
--
ALTER TABLE `tbl_clasificaciones_x_video`
  ADD PRIMARY KEY (`CODIGO_VIDEO`,`CODIGO_CLASIFICACION`),
  ADD KEY `clas_x_vid_clas_fk` (`CODIGO_CLASIFICACION`);

--
-- Indices de la tabla `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  ADD PRIMARY KEY (`CODIGO_COMENTARIO`),
  ADD KEY `coment_com_fk` (`CODIGO_COMENTARIO_PADRE`),
  ADD KEY `com_usu_fk` (`CODIGO_USUARIO`),
  ADD KEY `tbl_com_tbl_videos_fk` (`CODIGO_VIDEO`);

--
-- Indices de la tabla `tbl_cuentas_bancarias`
--
ALTER TABLE `tbl_cuentas_bancarias`
  ADD PRIMARY KEY (`CODIGO_CUENTA`),
  ADD KEY `cuentas_banc_bancos_fk` (`CODIGO_BANCO`),
  ADD KEY `cuentas_banc_lugares_fk` (`CODIGO_LUGAR`),
  ADD KEY `cue_banc_usu_fk` (`CODIGO_USUARIO`);

--
-- Indices de la tabla `tbl_denuncias`
--
ALTER TABLE `tbl_denuncias`
  ADD PRIMARY KEY (`CODIGO_DENUNCIA`),
  ADD KEY `den_est_den_fk` (`CODIGO_ESTADO_DENUNCIA`),
  ADD KEY `den_tip_den_fk` (`CODIGO_TIPO_DENUNCIA`),
  ADD KEY `tbl_denuncias_tbl_videos_fk` (`CODIGO_VIDEO`),
  ADD KEY `tbl_den_tbl_usuarios_fk` (`CODIGO_USUARIO`);

--
-- Indices de la tabla `tbl_departamentos`
--
ALTER TABLE `tbl_departamentos`
  ADD PRIMARY KEY (`CODIGO_DEPARTAMENTO`),
  ADD KEY `dep_paises_fk` (`CODIGO_PAIS`);

--
-- Indices de la tabla `tbl_estados_denuncias`
--
ALTER TABLE `tbl_estados_denuncias`
  ADD PRIMARY KEY (`CODIGO_ESTADO_DENUNCIA`);

--
-- Indices de la tabla `tbl_estados_usuarios`
--
ALTER TABLE `tbl_estados_usuarios`
  ADD PRIMARY KEY (`CODIGO_ESTADO_USUARIO`);

--
-- Indices de la tabla `tbl_estados_videos`
--
ALTER TABLE `tbl_estados_videos`
  ADD PRIMARY KEY (`CODIGO_ESTADO_VIDEO`);

--
-- Indices de la tabla `tbl_estados_videos_x_lugares`
--
ALTER TABLE `tbl_estados_videos_x_lugares`
  ADD PRIMARY KEY (`CODIGO_VIDEO`,`CODIGO_LUGAR`),
  ADD KEY `estados_videos_fk` (`CODIGO_ESTADO_VIDEO`),
  ADD KEY `table_10_tbl_lugares_fk` (`CODIGO_LUGAR`);

--
-- Indices de la tabla `tbl_historial_videos`
--
ALTER TABLE `tbl_historial_videos`
  ADD PRIMARY KEY (`CODIGO_HISTORIAL`),
  ADD KEY `hist_videos_origen_vis_fk` (`CODIGO_ORIGEN`),
  ADD KEY `hist_videos_vid_fk` (`CODIGO_VIDEO`),
  ADD KEY `hist_vid_usuarios_fk` (`CODIGO_USUARIO`);

--
-- Indices de la tabla `tbl_idiomas`
--
ALTER TABLE `tbl_idiomas`
  ADD PRIMARY KEY (`CODIGO_IDIOMA`);

--
-- Indices de la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD UNIQUE KEY `TBL_LIKES__UN` (`CODIGO_VIDEO`,`CODIGO_COMENTARIO`,`CODIGO_USUARIO`,`CODIGO_TIPO_LIKE`),
  ADD KEY `tbl_likes_tbl_comentarios_fk` (`CODIGO_COMENTARIO`),
  ADD KEY `tbl_likes_tbl_tipos_likes_fk` (`CODIGO_TIPO_LIKE`),
  ADD KEY `tbl_likes_tbl_usuarios_fk` (`CODIGO_USUARIO`);

--
-- Indices de la tabla `tbl_listas_favoritas`
--
ALTER TABLE `tbl_listas_favoritas`
  ADD PRIMARY KEY (`CODIGO_USUARIO`,`CODIGO_LISTA_REPRODUCCION`),
  ADD KEY `list_fav_lis_repr_fk` (`CODIGO_LISTA_REPRODUCCION`);

--
-- Indices de la tabla `tbl_listas_reproduccion`
--
ALTER TABLE `tbl_listas_reproduccion`
  ADD PRIMARY KEY (`CODIGO_LISTA_REPRODUCCION`),
  ADD KEY `list_repr_tip_li_repr_fk` (`CODIGO_TIPO_LISTA`),
  ADD KEY `list_repr_usu_fk` (`CODIGO_USUARIO`);

--
-- Indices de la tabla `tbl_listas_x_usuario`
--
ALTER TABLE `tbl_listas_x_usuario`
  ADD PRIMARY KEY (`CODIGO_LISTA_REPRODUCCION`,`CODIGO_USUARIO`),
  ADD KEY `list_usu_usu_fk` (`CODIGO_USUARIO`);

--
-- Indices de la tabla `tbl_lugares`
--
ALTER TABLE `tbl_lugares`
  ADD PRIMARY KEY (`CODIGO_LUGAR`),
  ADD KEY `lug_tipos_lugares_fk` (`CODIGO_TIPO_LUGAR`),
  ADD KEY `tbl_lugares_tbl_lugares_fk` (`CODIGO_LUGAR_PADRE`);

--
-- Indices de la tabla `tbl_municipios`
--
ALTER TABLE `tbl_municipios`
  ADD PRIMARY KEY (`CODIGO_MUNICIPIO`),
  ADD KEY `mun_depa_fk` (`CODIGO_DEPARTAMENTO`);

--
-- Indices de la tabla `tbl_origen_visualizacion`
--
ALTER TABLE `tbl_origen_visualizacion`
  ADD PRIMARY KEY (`CODIGO_ORIGEN`);

--
-- Indices de la tabla `tbl_paises`
--
ALTER TABLE `tbl_paises`
  ADD PRIMARY KEY (`CODIGO_PAIS`);

--
-- Indices de la tabla `tbl_plataformas_externas`
--
ALTER TABLE `tbl_plataformas_externas`
  ADD PRIMARY KEY (`CODIGO_PLATAFORMA`);

--
-- Indices de la tabla `tbl_shares`
--
ALTER TABLE `tbl_shares`
  ADD PRIMARY KEY (`CODIGO_SHARE`),
  ADD KEY `sha_plat_ext_fk` (`CODIGO_PLATAFORMA`),
  ADD KEY `tbl_shares_tbl_usuarios_fk` (`CODIGO_USUARIO`),
  ADD KEY `tbl_shares_tbl_videos_fk` (`CODIGO_VIDEO`);

--
-- Indices de la tabla `tbl_subtitulos`
--
ALTER TABLE `tbl_subtitulos`
  ADD PRIMARY KEY (`CODIGO_SUBTITULO`),
  ADD UNIQUE KEY `TBL_SUBTITULOS__UN` (`CODIGO_IDIOMA`,`CODIGO_VIDEO`),
  ADD KEY `tbl_subtitulos_tbl_videos_fk` (`CODIGO_VIDEO`);

--
-- Indices de la tabla `tbl_tendencias`
--
ALTER TABLE `tbl_tendencias`
  ADD PRIMARY KEY (`CODIGO_LUGAR`,`RANKING`),
  ADD KEY `tbl_tendencias_tbl_videos_fk` (`CODIGO_VIDEO`);

--
-- Indices de la tabla `tbl_tipos_denuncias`
--
ALTER TABLE `tbl_tipos_denuncias`
  ADD PRIMARY KEY (`CODIGO_TIPO_DENUNCIA`);

--
-- Indices de la tabla `tbl_tipos_likes`
--
ALTER TABLE `tbl_tipos_likes`
  ADD PRIMARY KEY (`CODIGO_TIPO_LIKE`);

--
-- Indices de la tabla `tbl_tipos_listas_reproduccion`
--
ALTER TABLE `tbl_tipos_listas_reproduccion`
  ADD PRIMARY KEY (`CODIGO_TIPO_LISTA`);

--
-- Indices de la tabla `tbl_tipos_lugares`
--
ALTER TABLE `tbl_tipos_lugares`
  ADD PRIMARY KEY (`CODIGO_TIPO_LUGAR`);

--
-- Indices de la tabla `tbl_tipos_pago`
--
ALTER TABLE `tbl_tipos_pago`
  ADD PRIMARY KEY (`CODIGO_TIPO_PAGO`);

--
-- Indices de la tabla `tbl_tipos_usuarios`
--
ALTER TABLE `tbl_tipos_usuarios`
  ADD PRIMARY KEY (`CODIGO_TIPO_USUARIO`);

--
-- Indices de la tabla `tbl_transacciones_pagos`
--
ALTER TABLE `tbl_transacciones_pagos`
  ADD PRIMARY KEY (`CODIGO_TRANSACCION`),
  ADD KEY `trans_pag_usu_fk` (`CODIGO_USUARIO`),
  ADD KEY `trans_pa_vid_fk` (`CODIGO_VIDEO`),
  ADD KEY `trans_tipos_pago_fk` (`CODIGO_TIPO_PAGO`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`CODIGO_USUARIO`),
  ADD KEY `tbl_usuarios_tbl_lugares_fk` (`CODIGO_LUGAR`),
  ADD KEY `usu_est_usu_fk` (`CODIGO_ESTADO_USUARIO`),
  ADD KEY `usu_tip_usu_fk` (`CODIGO_TIPO_USUARIO`),
  ADD KEY `fk_tbl_usuarios_tbl_paises1_idx` (`CODIGO_PAIS`);

--
-- Indices de la tabla `tbl_usuarios_x_canal`
--
ALTER TABLE `tbl_usuarios_x_canal`
  ADD PRIMARY KEY (`CODIGO_USUARIO`,`CODIGO_CANAL`),
  ADD KEY `usu_x_can_can_fk` (`CODIGO_CANAL`);

--
-- Indices de la tabla `tbl_usuario_etiquetados`
--
ALTER TABLE `tbl_usuario_etiquetados`
  ADD PRIMARY KEY (`CODIGO_COMENTARIO`,`CODIGO_USUARIO`),
  ADD KEY `usu_etiq_usu_fk` (`CODIGO_USUARIO`);

--
-- Indices de la tabla `tbl_videos`
--
ALTER TABLE `tbl_videos`
  ADD PRIMARY KEY (`CODIGO_VIDEO`),
  ADD KEY `tbl_videos_tbl_canales_fk` (`CODIGO_CANAL`),
  ADD KEY `tbl_videos_tbl_idiomas_fk` (`CODIGO_IDIOMA`),
  ADD KEY `tbl_videos_tbl_usuarios_fk` (`CODIGO_USUARIO`),
  ADD KEY `vid_est_vid_fk` (`CODIGO_ESTADO_VIDEO`);

--
-- Indices de la tabla `tbl_videos_x_lista`
--
ALTER TABLE `tbl_videos_x_lista`
  ADD PRIMARY KEY (`CODIGO_VIDEO`,`CODIGO_LISTA_REPRODUCCION`),
  ADD KEY `vid_x_lis_repr_fk` (`CODIGO_LISTA_REPRODUCCION`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_canales`
--
ALTER TABLE `tbl_canales`
  MODIFY `CODIGO_CANAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbl_estados_usuarios`
--
ALTER TABLE `tbl_estados_usuarios`
  MODIFY `CODIGO_ESTADO_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_estados_videos`
--
ALTER TABLE `tbl_estados_videos`
  MODIFY `CODIGO_ESTADO_VIDEO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_idiomas`
--
ALTER TABLE `tbl_idiomas`
  MODIFY `CODIGO_IDIOMA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_subtitulos`
--
ALTER TABLE `tbl_subtitulos`
  MODIFY `CODIGO_SUBTITULO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tipos_usuarios`
--
ALTER TABLE `tbl_tipos_usuarios`
  MODIFY `CODIGO_TIPO_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `CODIGO_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_videos`
--
ALTER TABLE `tbl_videos`
  MODIFY `CODIGO_VIDEO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_canales`
--
ALTER TABLE `tbl_canales`
  ADD CONSTRAINT `tbl_canales_tbl_usuarios_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`);

--
-- Filtros para la tabla `tbl_clasificaciones_x_video`
--
ALTER TABLE `tbl_clasificaciones_x_video`
  ADD CONSTRAINT `clas_x_vid_clas_fk` FOREIGN KEY (`CODIGO_CLASIFICACION`) REFERENCES `tbl_clasificaciones` (`CODIGO_CLASIFICACION`),
  ADD CONSTRAINT `clasi_x_video_videos_fk` FOREIGN KEY (`CODIGO_VIDEO`) REFERENCES `tbl_videos` (`CODIGO_VIDEO`);

--
-- Filtros para la tabla `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  ADD CONSTRAINT `com_usu_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `coment_com_fk` FOREIGN KEY (`CODIGO_COMENTARIO_PADRE`) REFERENCES `tbl_comentarios` (`CODIGO_COMENTARIO`),
  ADD CONSTRAINT `tbl_com_tbl_videos_fk` FOREIGN KEY (`CODIGO_VIDEO`) REFERENCES `tbl_videos` (`CODIGO_VIDEO`);

--
-- Filtros para la tabla `tbl_cuentas_bancarias`
--
ALTER TABLE `tbl_cuentas_bancarias`
  ADD CONSTRAINT `cue_banc_usu_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `cuentas_banc_bancos_fk` FOREIGN KEY (`CODIGO_BANCO`) REFERENCES `tbl_bancos` (`CODIGO_BANCO`),
  ADD CONSTRAINT `cuentas_banc_lugares_fk` FOREIGN KEY (`CODIGO_LUGAR`) REFERENCES `tbl_lugares` (`CODIGO_LUGAR`);

--
-- Filtros para la tabla `tbl_denuncias`
--
ALTER TABLE `tbl_denuncias`
  ADD CONSTRAINT `den_est_den_fk` FOREIGN KEY (`CODIGO_ESTADO_DENUNCIA`) REFERENCES `tbl_estados_denuncias` (`CODIGO_ESTADO_DENUNCIA`),
  ADD CONSTRAINT `den_tip_den_fk` FOREIGN KEY (`CODIGO_TIPO_DENUNCIA`) REFERENCES `tbl_tipos_denuncias` (`CODIGO_TIPO_DENUNCIA`),
  ADD CONSTRAINT `tbl_den_tbl_usuarios_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `tbl_denuncias_tbl_videos_fk` FOREIGN KEY (`CODIGO_VIDEO`) REFERENCES `tbl_videos` (`CODIGO_VIDEO`);

--
-- Filtros para la tabla `tbl_departamentos`
--
ALTER TABLE `tbl_departamentos`
  ADD CONSTRAINT `dep_paises_fk` FOREIGN KEY (`CODIGO_PAIS`) REFERENCES `tbl_paises` (`CODIGO_PAIS`);

--
-- Filtros para la tabla `tbl_estados_videos_x_lugares`
--
ALTER TABLE `tbl_estados_videos_x_lugares`
  ADD CONSTRAINT `estados_videos_fk` FOREIGN KEY (`CODIGO_ESTADO_VIDEO`) REFERENCES `tbl_estados_videos` (`CODIGO_ESTADO_VIDEO`),
  ADD CONSTRAINT `table_10_tbl_lugares_fk` FOREIGN KEY (`CODIGO_LUGAR`) REFERENCES `tbl_lugares` (`CODIGO_LUGAR`),
  ADD CONSTRAINT `table_10_tbl_videos_fk` FOREIGN KEY (`CODIGO_VIDEO`) REFERENCES `tbl_videos` (`CODIGO_VIDEO`);

--
-- Filtros para la tabla `tbl_historial_videos`
--
ALTER TABLE `tbl_historial_videos`
  ADD CONSTRAINT `hist_vid_usuarios_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `hist_videos_origen_vis_fk` FOREIGN KEY (`CODIGO_ORIGEN`) REFERENCES `tbl_origen_visualizacion` (`CODIGO_ORIGEN`),
  ADD CONSTRAINT `hist_videos_vid_fk` FOREIGN KEY (`CODIGO_VIDEO`) REFERENCES `tbl_videos` (`CODIGO_VIDEO`);

--
-- Filtros para la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD CONSTRAINT `tbl_likes_tbl_comentarios_fk` FOREIGN KEY (`CODIGO_COMENTARIO`) REFERENCES `tbl_comentarios` (`CODIGO_COMENTARIO`),
  ADD CONSTRAINT `tbl_likes_tbl_tipos_likes_fk` FOREIGN KEY (`CODIGO_TIPO_LIKE`) REFERENCES `tbl_tipos_likes` (`CODIGO_TIPO_LIKE`),
  ADD CONSTRAINT `tbl_likes_tbl_usuarios_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `tbl_likes_tbl_videos_fk` FOREIGN KEY (`CODIGO_VIDEO`) REFERENCES `tbl_videos` (`CODIGO_VIDEO`);

--
-- Filtros para la tabla `tbl_listas_favoritas`
--
ALTER TABLE `tbl_listas_favoritas`
  ADD CONSTRAINT `lis_fav_usu_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `list_fav_lis_repr_fk` FOREIGN KEY (`CODIGO_LISTA_REPRODUCCION`) REFERENCES `tbl_listas_reproduccion` (`CODIGO_LISTA_REPRODUCCION`);

--
-- Filtros para la tabla `tbl_listas_reproduccion`
--
ALTER TABLE `tbl_listas_reproduccion`
  ADD CONSTRAINT `list_repr_tip_li_repr_fk` FOREIGN KEY (`CODIGO_TIPO_LISTA`) REFERENCES `tbl_tipos_listas_reproduccion` (`CODIGO_TIPO_LISTA`),
  ADD CONSTRAINT `list_repr_usu_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`);

--
-- Filtros para la tabla `tbl_listas_x_usuario`
--
ALTER TABLE `tbl_listas_x_usuario`
  ADD CONSTRAINT `lis_x_usu_list_rep_fk` FOREIGN KEY (`CODIGO_LISTA_REPRODUCCION`) REFERENCES `tbl_listas_reproduccion` (`CODIGO_LISTA_REPRODUCCION`),
  ADD CONSTRAINT `list_usu_usu_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`);

--
-- Filtros para la tabla `tbl_lugares`
--
ALTER TABLE `tbl_lugares`
  ADD CONSTRAINT `lug_tipos_lugares_fk` FOREIGN KEY (`CODIGO_TIPO_LUGAR`) REFERENCES `tbl_tipos_lugares` (`CODIGO_TIPO_LUGAR`),
  ADD CONSTRAINT `tbl_lugares_tbl_lugares_fk` FOREIGN KEY (`CODIGO_LUGAR_PADRE`) REFERENCES `tbl_lugares` (`CODIGO_LUGAR`);

--
-- Filtros para la tabla `tbl_municipios`
--
ALTER TABLE `tbl_municipios`
  ADD CONSTRAINT `mun_depa_fk` FOREIGN KEY (`CODIGO_DEPARTAMENTO`) REFERENCES `tbl_departamentos` (`CODIGO_DEPARTAMENTO`);

--
-- Filtros para la tabla `tbl_shares`
--
ALTER TABLE `tbl_shares`
  ADD CONSTRAINT `sha_plat_ext_fk` FOREIGN KEY (`CODIGO_PLATAFORMA`) REFERENCES `tbl_plataformas_externas` (`CODIGO_PLATAFORMA`),
  ADD CONSTRAINT `tbl_shares_tbl_usuarios_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `tbl_shares_tbl_videos_fk` FOREIGN KEY (`CODIGO_VIDEO`) REFERENCES `tbl_videos` (`CODIGO_VIDEO`);

--
-- Filtros para la tabla `tbl_subtitulos`
--
ALTER TABLE `tbl_subtitulos`
  ADD CONSTRAINT `tbl_subtitulos_tbl_idiomas_fk` FOREIGN KEY (`CODIGO_IDIOMA`) REFERENCES `tbl_idiomas` (`CODIGO_IDIOMA`),
  ADD CONSTRAINT `tbl_subtitulos_tbl_videos_fk` FOREIGN KEY (`CODIGO_VIDEO`) REFERENCES `tbl_videos` (`CODIGO_VIDEO`);

--
-- Filtros para la tabla `tbl_tendencias`
--
ALTER TABLE `tbl_tendencias`
  ADD CONSTRAINT `tbl_tendencias_tbl_lugares_fk` FOREIGN KEY (`CODIGO_LUGAR`) REFERENCES `tbl_lugares` (`CODIGO_LUGAR`),
  ADD CONSTRAINT `tbl_tendencias_tbl_videos_fk` FOREIGN KEY (`CODIGO_VIDEO`) REFERENCES `tbl_videos` (`CODIGO_VIDEO`);

--
-- Filtros para la tabla `tbl_transacciones_pagos`
--
ALTER TABLE `tbl_transacciones_pagos`
  ADD CONSTRAINT `trans_pa_vid_fk` FOREIGN KEY (`CODIGO_VIDEO`) REFERENCES `tbl_videos` (`CODIGO_VIDEO`),
  ADD CONSTRAINT `trans_pag_usu_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `trans_tipos_pago_fk` FOREIGN KEY (`CODIGO_TIPO_PAGO`) REFERENCES `tbl_tipos_pago` (`CODIGO_TIPO_PAGO`);

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `fk_tbl_usuarios_tbl_paises1` FOREIGN KEY (`CODIGO_PAIS`) REFERENCES `tbl_paises` (`CODIGO_PAIS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_usuarios_tbl_lugares_fk` FOREIGN KEY (`CODIGO_LUGAR`) REFERENCES `tbl_lugares` (`CODIGO_LUGAR`),
  ADD CONSTRAINT `usu_est_usu_fk` FOREIGN KEY (`CODIGO_ESTADO_USUARIO`) REFERENCES `tbl_estados_usuarios` (`CODIGO_ESTADO_USUARIO`),
  ADD CONSTRAINT `usu_tip_usu_fk` FOREIGN KEY (`CODIGO_TIPO_USUARIO`) REFERENCES `tbl_tipos_usuarios` (`CODIGO_TIPO_USUARIO`);

--
-- Filtros para la tabla `tbl_usuarios_x_canal`
--
ALTER TABLE `tbl_usuarios_x_canal`
  ADD CONSTRAINT `usu_x_can_can_fk` FOREIGN KEY (`CODIGO_CANAL`) REFERENCES `tbl_canales` (`CODIGO_CANAL`),
  ADD CONSTRAINT `usu_x_can_usu_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`);

--
-- Filtros para la tabla `tbl_usuario_etiquetados`
--
ALTER TABLE `tbl_usuario_etiquetados`
  ADD CONSTRAINT `usu_etiq_com_fk` FOREIGN KEY (`CODIGO_COMENTARIO`) REFERENCES `tbl_comentarios` (`CODIGO_COMENTARIO`),
  ADD CONSTRAINT `usu_etiq_usu_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`);

--
-- Filtros para la tabla `tbl_videos`
--
ALTER TABLE `tbl_videos`
  ADD CONSTRAINT `tbl_videos_tbl_canales_fk` FOREIGN KEY (`CODIGO_CANAL`) REFERENCES `tbl_canales` (`CODIGO_CANAL`),
  ADD CONSTRAINT `tbl_videos_tbl_idiomas_fk` FOREIGN KEY (`CODIGO_IDIOMA`) REFERENCES `tbl_idiomas` (`CODIGO_IDIOMA`),
  ADD CONSTRAINT `tbl_videos_tbl_usuarios_fk` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `vid_est_vid_fk` FOREIGN KEY (`CODIGO_ESTADO_VIDEO`) REFERENCES `tbl_estados_videos` (`CODIGO_ESTADO_VIDEO`);

--
-- Filtros para la tabla `tbl_videos_x_lista`
--
ALTER TABLE `tbl_videos_x_lista`
  ADD CONSTRAINT `vid_x_lis_repr_fk` FOREIGN KEY (`CODIGO_LISTA_REPRODUCCION`) REFERENCES `tbl_listas_reproduccion` (`CODIGO_LISTA_REPRODUCCION`),
  ADD CONSTRAINT `vid_x_lis_vid_fk` FOREIGN KEY (`CODIGO_VIDEO`) REFERENCES `tbl_videos` (`CODIGO_VIDEO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
