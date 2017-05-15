<?php
/**
 * WordPress Coding Standard.
 *
 * @package WPCS\WordPressCodingStandards
 * @link    https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace WordPressCS\WordPress\Sniffs\Functions;

use WordPressCS\WordPress\AbstractFunctionRestrictionsSniff;

/**
 * Restricts the usage of extract().
 *
 * @link    https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/#dont-extract
 *
 * @package WPCS\WordPressCodingStandards
 *
 * @since   0.10.0 Previously this check was contained within the
 *                 \WordPressCS\WordPress\Sniffs\VIP\RestrictedFunctionsSniff.
 */
class DontExtractSniff extends AbstractFunctionRestrictionsSniff {

	/**
	 * Groups of functions to restrict.
	 *
	 * Example: groups => array(
	 *  'lambda' => array(
	 *      'type'      => 'error' | 'warning',
	 *      'message'   => 'Use anonymous functions instead please!',
	 *      'functions' => array( 'file_get_contents', 'create_function' ),
	 *  )
	 * )
	 *
	 * @return array
	 */
	public function getGroups() {
		return array(

			'extract' => array(
				'type'      => 'error',
				'message'   => '%s() usage is highly discouraged, due to the complexity and unintended issues it might cause.',
				'functions' => array(
					'extract',
				),
			),

		);
	} // End getGroups().

} // End class.
