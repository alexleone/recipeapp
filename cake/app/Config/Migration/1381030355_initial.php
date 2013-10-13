<?php
class Initial extends CakeMigration {

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
			),
		),
		'down' => array(
			'drop_table' => array(
				'recipes'
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
