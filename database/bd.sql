
CREATE TABLE `catalogo_parentesco` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Volcado de datos para la tabla `catalogo_parentesco`
--

INSERT INTO `catalogo_parentesco` (`id`, `nombre`) VALUES
(1, 'Padre'),
(2, 'Madre'),
(3, 'Hermano'),
(4, 'Hermana'),
(5, 'Abuelo'),
(6, 'Abuela'),
(7, 'Tío'),
(8, 'Tía'),
(9, 'Primo'),
(10, 'Prima'),
(11, 'Esposo'),
(12, 'Esposa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `medico_id` int(11) DEFAULT NULL,
  `duracion_estimada` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paciente_id` (`paciente_id`),
  KEY `medico_id` (`medico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha_hora`, `paciente_id`, `medico_id`, `duracion_estimada`) VALUES
(1, '2023-06-01 10:00:00', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas_examenes`
--

CREATE TABLE `citas_examenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cita_id` int(11) DEFAULT NULL,
  `examen_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cita_id` (`cita_id`),
  KEY `examen_id` (`examen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Volcado de datos para la tabla `citas_examenes`
--

INSERT INTO `citas_examenes` (`cita_id`, `examen_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas_procedimientos`
--

CREATE TABLE `citas_procedimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cita_id` int(11) DEFAULT NULL,
  `procedimiento_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cita_id` (`cita_id`),
  KEY `procedimiento_id` (`procedimiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Volcado de datos para la tabla `citas_procedimientos`
--

INSERT INTO `citas_procedimientos` (`cita_id`, `procedimiento_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `cita_id` int(11) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `presion_arterial` varchar(20) DEFAULT NULL,
  `temperatura` decimal(4,2) DEFAULT NULL,
  `sintomas` text DEFAULT NULL,
  `diagnostico_general` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cita_id` (`cita_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `pais_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pais_id` (`pais_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`, `pais_id`) VALUES
(1, 'Ahuachapán', 55),
(2, 'Cabañas', 55),
(3, 'Chalatenango', 55),
(4, 'Cuscatlán', 55),
(5, 'La Libertad', 55),
(6, 'La Paz', 55),
(7, 'La Unión', 55),
(8, 'Morazán', 55),
(9, 'San Miguel', 55),
(10, 'San Salvador', 55),
(11, 'San Vicente', 55),
(12, 'Santa Ana', 55),
(13, 'Sonsonate', 55),
(14, 'Usulután', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores_establecimientos`
--

CREATE TABLE `doctores_establecimientos` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `establecimiento_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `establecimiento_id` (`establecimiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE `enfermedades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `tratamiento` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`id`, `nombre`, `descripcion`, `tratamiento`) VALUES
(1, 'Hipertensión', 'Afección que se caracteriza por una presión arterial alta.', 'Control de la presión arterial, medicación'),
(2, 'Diabetes', 'Enfermedad crónica que afecta los niveles de azúcar en la sangre.', 'Control de la dieta, insulina o medicación oral'),
(3, 'Asma', 'Enfermedad respiratoria que causa inflamación y estrechamiento de las vías respiratorias.', 'Inhaladores de rescate, medicación de control'),
(4, 'Enfermedad cardíaca', 'Condiciones que afectan el corazón y los vasos sanguíneos.', 'Medicación, cambios en el estilo de vida'),
(5, 'Artritis', 'Inflamación de las articulaciones que causa dolor y rigidez.', 'Medicación, terapia física');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades_paciente`
--

CREATE TABLE `enfermedades_paciente` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `enfermedad_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paciente_id` (`paciente_id`),
  KEY `enfermedad_id` (`enfermedad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Volcado de datos para la tabla `enfermedades_paciente`
--

INSERT INTO `enfermedades_paciente` (`id`, `paciente_id`, `enfermedad_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades_sintomas`
--

CREATE TABLE `enfermedades_sintomas` (
  `id` int(11) NOT NULL,
  `enfermedad_id` int(11) DEFAULT NULL,
  `sintoma_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enfermedad_id` (`enfermedad_id`),
  KEY `sintoma_id` (`sintoma_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`) VALUES
(1, 'Cardiología'),
(2, 'Dermatología'),
(3, 'Endocrinología'),
(4, 'Gastroenterología'),
(5, 'Neurología'),
(6, 'Oftalmología'),
(7, 'Pediatría'),
(8, 'Psiquiatría'),
(9, 'Traumatología'),
(10, 'Urología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades_doctores`
--


CREATE TABLE `especialidades_doctores` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `especialidad_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `especialidad_id` (`especialidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientos_medicos`
--

CREATE TABLE `establecimientos_medicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sitio_web` varchar(255) DEFAULT NULL,
  `cantidad_doctores` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Examen de sangre', 'Análisis de muestras de sangre para evaluar la salud del paciente.'),
(2, 'Radiografía de tórax', 'Toma de imágenes de rayos X del tórax para evaluar los pulmones y el corazón.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `dia_semana` varchar(20) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `dia_semana`, `hora_inicio`, `hora_fin`) VALUES
(1, 'Lunes', '09:00:00', '17:00:00'),
(2, 'Martes', '10:00:00', '18:00:00'),
(3, 'Miércoles', '08:30:00', '16:30:00'),
(4, 'Jueves', '11:00:00', '19:00:00'),
(5, 'Viernes', '08:00:00', '16:00:00'),
(6, 'Sábado', '12:00:00', '20:00:00'),
(7, 'Domingo', '09:30:00', '17:30:00'),
(8, 'Lunes', '13:00:00', '21:00:00'),
(9, 'Martes', '08:00:00', '16:00:00'),
(10, 'Miércoles', '10:30:00', '18:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_doctores`
--

CREATE TABLE `horarios_doctores` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `horario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `horario_id` (`horario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `nombre`, `descripcion`, `fecha_caducidad`, `cantidad`) VALUES
(1, 'Paracetamol', 'Analgésico y antipirético', '2023-12-31', 100),
(2, 'Ibuprofeno', 'Antiinflamatorio no esteroideo', '2024-06-30', 150),
(3, 'Amoxicilina', 'Antibiótico de amplio espectro', '2023-09-15', 80),
(4, 'Omeprazol', 'Inhibidor de la bomba de protones', '2023-11-30', 60),
(5, 'Loratadina', 'Antihistamínico', '2024-03-31', 120),
(6, 'Simvastatina', 'Estatina para reducir el colesterol', '2024-02-28', 50),
(7, 'Metformina', 'Antidiabético oral', '2023-10-31', 90),
(8, 'Salbutamol', 'Broncodilatador', '2024-04-30', 70),
(9, 'Losartan', 'Antagonista del receptor de angiotensina II', '2023-07-31', 110),
(10, 'Escitalopram', 'Antidepresivo', '2023-08-31', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos_recetados`
--

CREATE TABLE `medicamentos_recetados` (
  `id` int(11) NOT NULL,
  `consulta_id` int(11) DEFAULT NULL,
  `medicamento_id` int(11) DEFAULT NULL,
  `dosis` varchar(50) DEFAULT NULL,
  `duracion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `consulta_id` (`consulta_id`),
  KEY `medicamento_id` (`medicamento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`) VALUES
(1, 'Afganistán'),
(2, 'Albania'),
(3, 'Alemania'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Antigua y Barbuda'),
(7, 'Arabia Saudita'),
(8, 'Argelia'),
(9, 'Argentina'),
(10, 'Armenia'),
(11, 'Australia'),
(12, 'Austria'),
(13, 'Azerbaiyán'),
(14, 'Bahamas'),
(15, 'Bahréin'),
(16, 'Bangladés'),
(17, 'Barbados'),
(18, 'Bélgica'),
(19, 'Belice'),
(20, 'Benín'),
(21, 'Bielorrusia'),
(22, 'Birmania (Myanmar)'),
(23, 'Bolivia'),
(24, 'Bosnia y Herzegovina'),
(25, 'Botsuana'),
(26, 'Brasil'),
(27, 'Brunéi'),
(28, 'Bulgaria'),
(29, 'Burkina Faso'),
(30, 'Burundi'),
(31, 'Bután'),
(32, 'Cabo Verde'),
(33, 'Camboya'),
(34, 'Camerún'),
(35, 'Canadá'),
(36, 'Catar'),
(37, 'Chad'),
(38, 'Chile'),
(39, 'China'),
(40, 'Chipre'),
(41, 'Ciudad del Vaticano'),
(42, 'Colombia'),
(43, 'Comoras'),
(44, 'Congo'),
(45, 'Corea del Norte'),
(46, 'Corea del Sur'),
(47, 'Costa de Marfil'),
(48, 'Costa Rica'),
(49, 'Croacia'),
(50, 'Cuba'),
(51, 'Dinamarca'),
(52, 'Dominica'),
(53, 'Ecuador'),
(54, 'Egipto'),
(55, 'El Salvador'),
(56, 'Emiratos Árabes Unidos'),
(57, 'Eritrea'),
(58, 'Eslovaquia'),
(59, 'Eslovenia'),
(60, 'España'),
(61, 'Estados Unidos'),
(62, 'Estonia'),
(63, 'Etiopía'),
(64, 'Filipinas'),
(65, 'Finlandia'),
(66, 'Fiyi'),
(67, 'Francia'),
(68, 'Gabón'),
(69, 'Gambia'),
(70, 'Georgia'),
(71, 'Ghana'),
(72, 'Granada'),
(73, 'Grecia'),
(74, 'Guatemala'),
(75, 'Guinea'),
(76, 'Guinea-Bisáu'),
(77, 'Guinea Ecuatorial'),
(78, 'Guyana'),
(79, 'Haití'),
(80, 'Honduras'),
(81, 'Hungría'),
(82, 'India'),
(83, 'Indonesia'),
(84, 'Irak'),
(85, 'Irán'),
(86, 'Irlanda'),
(87, 'Islandia'),
(88, 'Islas Marshall'),
(89, 'Islas Salomón'),
(90, 'Israel'),
(91, 'Italia'),
(92, 'Jamaica'),
(93, 'Japón'),
(94, 'Jordania'),
(95, 'Kazajistán'),
(96, 'Kenia'),
(97, 'Kirguistán'),
(98, 'Kiribati'),
(99, 'Kuwait'),
(100, 'Laos'),
(101, 'Lesoto'),
(102, 'Letonia'),
(103, 'Líbano'),
(104, 'Liberia'),
(105, 'Libia'),
(106, 'Liechtenstein'),
(107, 'Lituania'),
(108, 'Luxemburgo'),
(109, 'Madagascar'),
(110, 'Malasia'),
(111, 'Malaui'),
(112, 'Maldivas'),
(113, 'Malí'),
(114, 'Malta'),
(115, 'Marruecos'),
(116, 'Mauricio'),
(117, 'Mauritania'),
(118, 'México'),
(119, 'Micronesia'),
(120, 'Moldavia'),
(121, 'Mónaco'),
(122, 'Mongolia'),
(123, 'Montenegro'),
(124, 'Mozambique'),
(125, 'Namibia'),
(126, 'Nauru'),
(127, 'Nepal'),
(128, 'Nicaragua'),
(129, 'Níger'),
(130, 'Nigeria'),
(131, 'Noruega'),
(132, 'Nueva Zelanda'),
(133, 'Omán'),
(134, 'Países Bajos'),
(135, 'Pakistán'),
(136, 'Palaos'),
(137, 'Panamá'),
(138, 'Papúa Nueva Guinea'),
(139, 'Paraguay'),
(140, 'Perú'),
(141, 'Polonia'),
(142, 'Portugal'),
(143, 'Reino Unido'),
(144, 'República Centroafricana'),
(145, 'República Checa'),
(146, 'República del Congo'),
(147, 'República Democrática del Congo'),
(148, 'República Dominicana'),
(149, 'Ruanda'),
(150, 'Rumania'),
(151, 'Rusia'),
(152, 'Samoa'),
(153, 'San Cristóbal y Nieves'),
(154, 'San Marino'),
(155, 'San Vicente y las Granadinas'),
(156, 'Santa Lucía'),
(157, 'Santo Tomé y Príncipe'),
(158, 'Senegal'),
(159, 'Serbia'),
(160, 'Seychelles'),
(161, 'Sierra Leona'),
(162, 'Singapur'),
(163, 'Siria'),
(164, 'Somalia'),
(165, 'Sri Lanka'),
(166, 'Suazilandia'),
(167, 'Sudáfrica'),
(168, 'Sudán'),
(169, 'Sudán del Sur'),
(170, 'Suecia'),
(171, 'Suiza'),
(172, 'Surinam'),
(173, 'Tailandia'),
(174, 'Tanzania'),
(175, 'Tayikistán'),
(176, 'Timor Oriental'),
(177, 'Togo'),
(178, 'Tonga'),
(179, 'Trinidad y Tobago'),
(180, 'Túnez'),
(181, 'Turkmenistán'),
(182, 'Turquía'),
(183, 'Tuvalu'),
(184, 'Ucrania'),
(185, 'Uganda'),
(186, 'Uruguay'),
(187, 'Uzbekistán'),
(188, 'Vanuatu'),
(189, 'Venezuela'),
(190, 'Vietnam'),
(191, 'Yemen'),
(192, 'Yibuti'),
(193, 'Zambia'),
(194, 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parientes`
--

CREATE TABLE `parientes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `parentesco_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE `procedimientos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Volcado de datos para la tabla `procedimientos`
--

INSERT INTO `procedimientos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Extracción de muela', 'Procedimiento dental para extraer una muela dañada.'),
(2, 'Cirugía de apéndice', 'Remoción quirúrgica del apéndice inflamado.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_examenes`
--

CREATE TABLE `resultados_examenes` (
  `id` int(11) NOT NULL,
  `consulta_id` int(11) DEFAULT NULL,
  `examen_id` int(11) DEFAULT NULL,
  `resultado` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol_nombre` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol_nombre`) VALUES
(1, 'ROLE_ADMIN'),
(2, 'ROLE_USER'),
(3, 'ROLE_SUPERVISOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuario`
--

CREATE TABLE `roles_usuario` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Volcado de datos para la tabla `roles_usuario`
--

INSERT INTO `roles_usuario` (`id`, `usuario_id`, `roles_id`, `estado`) VALUES
(1, 1, 1, 1),
(4, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE `sintomas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `gravedad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_sangre`
--

CREATE TABLE `tipo_sangre` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Volcado de datos para la tabla `tipo_sangre`
--

INSERT INTO `tipo_sangre` (`id`, `tipo`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `hash` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 DEFAULT '100',
  `codigo` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `tipo_sangre_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `hash`, `activo`, `nombre`, `codigo`, `created_at`, `updated_at`, `password`, `tipo_sangre_id`) VALUES
(1, 'test', 'test', 1, 'test', NULL, '2022-03-17 10:25:02', '2022-03-17 10:28:54', '$2y$10$0ESeVGjuIof8l1.9m35LYuBc.9JEdQP9rM5A779dgd0hyOkyFLvGC', NULL),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrador DGII', NULL, '2022-04-20 11:31:46', '2022-04-20 11:31:46', '$2y$10$zYXI61OYdJH4neikm3Dx7uebQSbn9qBHoSMn98dumGCofo.Xdlq3G', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo_parentesco`
--


--
-- Indices de la tabla `citas`
--

--
-- Indices de la tabla `citas_examenes`
--




--
-- Indices de la tabla `enfermedades_paciente`
--


--
-- Indices de la tabla `enfermedades_sintomas`
--



--
-- Indices de la tabla `examenes`
--


--
-- Indices de la tabla `horarios`
--


--
-- Indices de la tabla `horarios_doctores`
--


--
-- Indices de la tabla `medicamentos`
--


--
-- Indices de la tabla `medicamentos_recetados`
--


--
-- Indices de la tabla `pais`
--


--
-- Indices de la tabla `parientes`
--
ALTER TABLE `parientes`
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `parentesco_id` (`parentesco_id`);

--
-- Indices de la tabla `procedimientos`
--


--
-- Indices de la tabla `resultados_examenes`
--
ALTER TABLE `resultados_examenes`
  ADD KEY `consulta_id` (`consulta_id`),
  ADD KEY `examen_id` (`examen_id`);

--
-- Indices de la tabla `roles`
--


--
-- Indices de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  ADD KEY `idx_usuario` (`usuario_id`),
  ADD KEY `idx_rol` (`roles_id`);

--
-- Indices de la tabla `sintomas`
--

--
-- Indices de la tabla `tipo_sangre`
--


--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `usuario_UN` (`usuario`),
  ADD KEY `activo` (`activo`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `updated_at` (`updated_at`),
  ADD KEY `hash` (`hash`),
  ADD KEY `FK_usuario_tipo_sangre` (`tipo_sangre_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_sangre`
--
ALTER TABLE `tipo_sangre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`medico_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `citas_examenes`
--
ALTER TABLE `citas_examenes`
  ADD CONSTRAINT `citas_examenes_ibfk_1` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`),
  ADD CONSTRAINT `citas_examenes_ibfk_2` FOREIGN KEY (`examen_id`) REFERENCES `examenes` (`id`);

--
-- Filtros para la tabla `citas_procedimientos`
--
ALTER TABLE `citas_procedimientos`
  ADD CONSTRAINT `citas_procedimientos_ibfk_1` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`),
  ADD CONSTRAINT `citas_procedimientos_ibfk_2` FOREIGN KEY (`procedimiento_id`) REFERENCES `procedimientos` (`id`);

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `doctores_establecimientos`
--
ALTER TABLE `doctores_establecimientos`
  ADD CONSTRAINT `doctores_establecimientos_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `doctores_establecimientos_ibfk_2` FOREIGN KEY (`establecimiento_id`) REFERENCES `establecimientos_medicos` (`id`);

--
-- Filtros para la tabla `enfermedades_paciente`
--
ALTER TABLE `enfermedades_paciente`
  ADD CONSTRAINT `enfermedades_paciente_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `enfermedades_paciente_ibfk_2` FOREIGN KEY (`enfermedad_id`) REFERENCES `enfermedades` (`id`);

--
-- Filtros para la tabla `enfermedades_sintomas`
--
ALTER TABLE `enfermedades_sintomas`
  ADD CONSTRAINT `enfermedades_sintomas_ibfk_1` FOREIGN KEY (`enfermedad_id`) REFERENCES `enfermedades` (`id`),
  ADD CONSTRAINT `enfermedades_sintomas_ibfk_2` FOREIGN KEY (`sintoma_id`) REFERENCES `sintomas` (`id`);

--
-- Filtros para la tabla `especialidades_doctores`
--
ALTER TABLE `especialidades_doctores`
  ADD CONSTRAINT `especialidades_doctores_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `especialidades_doctores_ibfk_2` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidades` (`id`);

--
-- Filtros para la tabla `horarios_doctores`
--
ALTER TABLE `horarios_doctores`
  ADD CONSTRAINT `horarios_doctores_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `horarios_doctores_ibfk_2` FOREIGN KEY (`horario_id`) REFERENCES `horarios` (`id`);

--
-- Filtros para la tabla `medicamentos_recetados`
--
ALTER TABLE `medicamentos_recetados`
  ADD CONSTRAINT `medicamentos_recetados_ibfk_1` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`),
  ADD CONSTRAINT `medicamentos_recetados_ibfk_2` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamentos` (`id`);

--
-- Filtros para la tabla `parientes`
--
ALTER TABLE `parientes`
  ADD CONSTRAINT `parientes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `parientes_ibfk_2` FOREIGN KEY (`parentesco_id`) REFERENCES `catalogo_parentesco` (`id`);

--
-- Filtros para la tabla `resultados_examenes`
--
ALTER TABLE `resultados_examenes`
  ADD CONSTRAINT `resultados_examenes_ibfk_1` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`),
  ADD CONSTRAINT `resultados_examenes_ibfk_2` FOREIGN KEY (`examen_id`) REFERENCES `examenes` (`id`);

--
-- Filtros para la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  ADD CONSTRAINT `FK_roles_usuario_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `FK_roles_usuario_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_usuario_tipo_sangre` FOREIGN KEY (`tipo_sangre_id`) REFERENCES `tipo_sangre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
