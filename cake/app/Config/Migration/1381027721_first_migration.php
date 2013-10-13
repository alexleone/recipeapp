<?php
class FirstMigration extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'recipes' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 80, 'key' => 'primary', 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 80, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
					'rating' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 2),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB'),
				),
				'users' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
					'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
					'slug' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
					'password' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 128, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
					'password_token' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 128, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
					'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
					'email_verified' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
					'email_token' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
					'email_token_expires' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'tos' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
					'active' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
					'last_login' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'last_action' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'is_admin' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
					'role' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'BY_USERNAME' => array('column' => 'username', 'unique' => 0, 'length' => array('191')),
						'BY_EMAIL' => array('column' => 'email', 'unique' => 0, 'length' => array('191')),
					),
					'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'recipes', 'users'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
