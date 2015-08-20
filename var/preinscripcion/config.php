<?php
return array (
 'global' => array (
	/**
	 * Indica si el sistema est� o no en un entorno de producci�n
	 *  - Valores posibles: true|false
	 */
	'produccion' => false,

	/**
	 * Indica si el sistema utiliza personalizaciones. Se debe complementar indicando
	 * el ID de personalizaci�n en la configuraci�n de los puntos de acceso.
	 *  - Valores posibles: true|false
	 */
	'usar_personalizaciones' => false,

	/**
	 * Si est� activo busca una clase siu\debug y ejecuta el metodo ini() 
	 * despu�s de cargar el n�cleo
	 *  - Valores posibles: true|false
	 * En producci�n: false
	 */
	'ini_debug' => false,

	/**
	* Path al directorio donde se guardar�n los attachments de los mensajes. 
	* En esta carpeta apache debe tener permisos de escritura.
	*  - Valores posibles: string (un path)
	*/
	'dir_attachment' => '/tmp',

	/**
	 * M�ximo tiempo de inactividad (en minutos). Vencido el mismo, 
	 * se pedir� identificarse nuevamente
	 *  - Valores posibles: n�meros enteros
	 */
	'sesion_timeout' => 30,

	/**
	 * M�xima duraci�n de la sesi�n (en minutos)
	 *  - Valores posibles: n�meros enteros
	 */
	'sesion_maxtime' => 120,

	/**
	 * Sufijo del archivo de idioma, donde se definen todos los mensajes y 
	 * etiquetas del sistema. En la carpeta src/siu/mensajes debe existir 
	 * un archivo llamado "mensajes.<locale>.php". 
	 * El archivo por defecto entregado por el SIU es "mensajes.es.php"
	 */
	'locale' => 'es',

	/**
	* En algunos lugares de la aplicaci�n se encriptan cadenas con sha1. 
	* Se utiliza este SALT para hacer la encriptaci�n de las claves de los 
	* alumnos preinscriptos. Cambiar este valor no reviste inconvenientes.
	*  - Valores posibles: string
	*/
	'salt' => '9bf057558b90263987bd8f99caf2e92f7efc1a13',

	/**
	 * Valor de SALT usado para cifrar las claves default de la secci�n de 
	 * administraci�n (usuarios administradores y gerenciales). Se recomienda 
	 * NO CAMBIAR este valor.
	 */
	'salt_admin' => '9bf057558b90263987bd8f99caf2e92f7efc1a13',

	/**
	 * Clave que se asigna por defecto al momento de crear un usuario gerencial.
	 * En el primer acceso, se forzar� al usuario a cambiarla.
	 * Tambi�n es la clave que se asigna al momento de resetear una clave de 
	 * un usuario gerencial, volviendo a repetirse la necesidad de cambiarla en
	 * el primer acceso
	 */
	'clave_default' => 'lala4321',

	/**
	 * Configuraci�n de logging. Si no se especifica este bloque no se usa 
	 * el log (es lo mismo que setear activo en false).
	 */
	'log' => array (
		/**
		 * Indica si el log est� activo o no
		 *  - Valores posibles: true|false
		 */
		'activo' => true,

		/**
		 * NIVELES DE ERROR: 
		 *  - 'error' -> recomendado en producci�n
		 *  - 'info'
		 *  - 'debug' -> recomendado en desarrollo
		 */
		'nivel'	=> 'error',
	),

	//--------------------------------------------------------------------------
	//---- Configuraci�n de puntos de acceso -----------------------------------
	//--------------------------------------------------------------------------

	'accesos' => array (
		'alumno_ua1' => array (
			/**
			 * Id de la personalizaci�n que se va a utilizar. 
			 * Representa el nombre de carpeta dentro de src/pers.
			 * Si se deja en NULL no se utiliza ninguna personalizaci�n.
			 */
			'personalizacion' => NULL,

			/**
			 * Informaci�n de conexi�n de la base de datos
			 */
			'database' => array (
				'vendor'		=> 'pgsql',
				'dbname'		=> 'preinscripcion',
				'host'			=> 'pg',
				'port'			=> '5432',
				'pdo_user'		=> 'postgres',
				'pdo_passwd'	=> 'postgres',
			),
		),

		'admin_ua1'	=> array (
			/**
			 * Id de la personalizaci�n que se va a utilizar. 
			 * Representa el nombre de carpeta dentro de src/pers.
			 * Si se deja en NULL no se utiliza ninguna personalizaci�n.
			 */
			'personalizacion'	=> NULL,

			/**
			 * Informaci�n de conexi�n de la base de datos
			 */
			'database' => array (
				'vendor'		=> 'pgsql',
				'dbname'		=> 'preinscripcion',
				'host'			=> 'pg',
				'port'			=> '5432',
				'pdo_user'		=> 'postgres',
				'pdo_passwd'	=> 'postgres',
			),
		),
	),

	//--------------------------------------------------------------------------
	//---- Configuraci�n de captcha --------------------------------------------
	//--------------------------------------------------------------------------

	/**
	 * Configuraci�n de captchas (se usa recaptcha). Si no se especifica este 
	 * bloque no se usa captcha (es lo mismo que setear activo en false)
	 */
	'captcha' => array (
		/**
		 * Indica si se activan los captchas a trav�s de toda la aplicaci�n
		 *  - Valores posibles: true|false
		 */
		'activo' => false,

		/**
		 * Cantidad de intentos fallidos permitidos antes
		 * de exigir que se complete un captcha en el login
		 */
		'intentos_login' => 2,

		/**
		 * Los valores de clave p�blica y privada provistos en este
		 * ejemplo representan el valor de la URL http://localhost
		 * 
		 * Para generar las claves correspondientes a la URL de la instalaci�n, 
		 * dirigirse a https://www.google.com/recaptcha/admin
		 */
		'public_key' => '6Ldja84SAAAAAKdiYZIbx6qjQMtAdzWXiW474_Af',
		'private_key' => '6Ldja84SAAAAABchqHlz65yICNXJQ8ENbZpLvmS5',
	),

	/**
	 * Configuraci�n de Proxy (por defecto desactivado)
	 */
	'proxy' => array(
		'activo' => false,
		'proxy_host' => 'proxy.xxxxxxxxx',
		'proxy_port' => 8080,
		'proxy_username' => 'PROXY-USERNAME',
		'proxy_password' => 'PROXY-PASSWORD'
	),

	//--------------------------------------------------------------------------
	//---- Servidor de correo --------------------------------------------------
	//--------------------------------------------------------------------------

	/**
	 * Se provee un ejemplo de configuraci�n del correo usando el servidor de GMail
	 */
    'smtp' => array (
        'from' => '******@gmail.com',
        'from_name' => 'SIU-Preinscripci�n',
        'host' => 'smtp.gmail.com',
        'seguridad' => 'ssl',
        'auth' => true,
        'port' => 465,
        'usuario' => '********@gmail.com',
        'clave' => '*******',
    ), 
	//--------------------------------------------------------------------------
	//---- Configuraci�n del logo de p�gina ------------------------------------
	//--------------------------------------------------------------------------

	/**
	 * Nombre del archivo del logo de p�gina, relativa a la carpeta www/img/ 
	 * del proyecto o de la carpeta de la personalizaci�n activa
	 */
	'logo_pagina' => 'logo-transparente.png',

	//--------------------------------------------------------------------------
	//---- Par�metros sistema --------------------------------------------------
	//--------------------------------------------------------------------------

	/**
	 * Longitud m�nima de la clave de usuario
	 *  - Valores permitidos: n�meros enteros
	 */
	'clave_long_minima'	=> 6,

	/**
	 * Cantidad m�xima de inscripciones permitidas 
	 *  - Valores permitidos: n�meros enteros
	 * (0 : sin l�mite)
	 */
	'cant_max_carreras_insc' => 0,

	/**
	 * Determina si se cargan datos en la secci�n "Discapacidad"
	 *  - Valores posibles: true | false
	 */
	'carga_datos_discapacidad' => true,
	 
	/**
	 * Formatea uniformemente los campos de texto que ingresa el usuario en el sistema
	 *  - Valores posibles: 
	 *		+ 'libre' : Se deja la entrada tal cual como la ingresa el usuario
	 *		+ 'mayusculas' : Se formatea todo en may�sculas
	 *		+ 'capitalizar' :  Se deja la primera letra de cada palabra en may�sculas y el resto en min�sculas.
	 */
	'formateo_campos' => 'mayusculas',
	 
	/**
	 * Determina si el aspirante debe elegir un turno para la presentaci�n de documentaci�n
	 *  - Valores posibles: true | false
	 */
	'carga_turno_presentacion' => false,

	//--------------------------------------------------------------------------
	//---- Par�metros del reporte (comprobante del alumno) ---------------------
	//--------------------------------------------------------------------------

	/**
	 * Nombre de la instituci�n que se mostrar� en el encabezado de p�gina
	 */
	'rep_nombre_institucion' => 'INSTITUCI�N SIU',

	/**
	 * Determina si se imprime tabla para completar resultado de CBC
	 *  - 1: Se imprime
	 *  - 0: No se imprime
	 */
	'rep_imprime_CBC' => '0',

	/**
	 * Determina si se imprime credencial provisoria
	 *  - 1: Se imprime
	 *  - 0: No se imprime
	 */
	'rep_imprime_credencial_provisoria' => '1',

	/**
	 * URL del logo que se imprime en el encabezado de p�gina, relativa a 
	 * la carpeta www/img/ del proyecto.
	 * IMPORTANTE: el logo debe estar en formato PNG y sin canal alfa
	 * Si se elimina o comenta esta entrada, no se imprime logo.
	 */
	'rep_encabezado_logo' => 'logo2.png',

	/**
	 * Arreglo para poner los �tems que se quieran imprimir como avisos en 
	 * la impresi�n. 
	 * Aparecer�n en forma de lista numerada, respetando el orden de definici�n.
	 * Se proveen valores de ejemplo.
	 */
	'rep_avisos' => array(
		'La presente tiene car�cter de <b>DECLARACI�N JURADA</b>, la cual deber� ser completada personalmente por el firmante.',
		'Se considerar� <b>FALTA GRAVE</b>, pasible de suspensi�n de uno (1) a cinco (5) a�os de acuerdo a su importancia, el falseamiento de datos de la presente declaraci�n jurada seg�n lo dispuesto por Res. N�1268/85 del Consejo Superior Provisorio de la Universidad de Buenos Aires. La presente deber� estar acompa�ada de tres (3) fotos, dos (2) fotocopias del t�tulo secundario legalizadas por U.B.A. Fotocopia de las dos (2) primeras hojas del DNI y una (1) fotocopia de la  Libreta Universitaria del CBC.',
		'A partir de la fecha y durante el transcurso del presente ciclo lectivo, el peticionante deber� cumplir con el requisito obligatorio de la <b>revisaci�n m�dica</b>, de no realizarla perder� su condici�n de alumno regular.',
		'El tr�mite de <b>Libreta Universitaria</b> de esta Factultad deber� ser tramitada �nicamente por el firmante en el pr�ximo cuatrimestre desde la fecha de inscripci�n.',
	),

	/**
	 * Si se desea imprimir el nombre de localidad junto con la fecha, a la altura
	 * de la firma, consignarla aqu�. Si no se desea, dejar un string vac�o ('')
	 * 
	 * Ejemplo de salida (asumiendo fecha actual: 15/11/2012):
	 *  - Completando este valor: Buenos Aires, 15/11/2012
	 *  - Si no se ingresa valor: 15/11/2012
	 */
	'rep_localidad' => 'Buenos Aires',
),
);
?>
