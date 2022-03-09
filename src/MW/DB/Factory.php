<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2011
 * @copyright Aimeos (aimeos.org), 2015-2022
 * @package MW
 * @subpackage DB
 */


namespace Aimeos\MW\DB;


/**
 * Creates new database manager instances.
 *
 * @package MW
 * @subpackage DB
 */
class Factory
{
	/**
	 * Creates and returns a database manager.
	 *
	 * @param \Aimeos\Base\Config\Iface $config Configuration class instance
	 * @param string $type Name of the manager
	 * @return \Aimeos\MW\DB\Manager\Iface Instance of a database manager
	 * @throws \Aimeos\MW\DB\Exception if database manager class isn't found
	 */
	public static function create( \Aimeos\Base\Config\Iface $config, $type = 'PDO' )
	{
		$classname = '\Aimeos\MW\DB\Manager\\' . $type;

		if( !class_exists( $classname ) ) {
			throw new \Aimeos\MW\DB\Exception( sprintf( 'File system "%1$s" not found', $type ) );
		}

		return new $classname( $config );
	}
}