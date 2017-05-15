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
 * Restricts usage of some functions.
 *
 * @package    WPCS\WordPressCodingStandards
 *
 * @since      0.3.0
 * @deprecated 0.10.0 The functionality which used to be contained in this class has been moved to
 *                    the \WordPressCS\WordPress\AbstractFunctionRestrictionsSniff class.
 *                    This class is left here to prevent backward-compatibility breaks for
 *                    custom sniffs extending the old class and references to this
 *                    sniff from custom phpcs.xml files.
 * @see        \WordPressCS\WordPress\AbstractFunctionRestrictionsSniff
 */
class FunctionRestrictionsSniff extends AbstractFunctionRestrictionsSniff {

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
		return array();
	}

} // End class.
