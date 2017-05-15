<?php
/**
 * WordPress Coding Standard.
 *
 * @package WPCS\WordPressCodingStandards
 * @link    https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace WordPressCS\WordPress\Sniffs\VIP;

use WordPressCS\WordPress\AbstractFunctionRestrictionsSniff;

/**
 * Disallow Filesystem writes.
 *
 * @link    https://vip.wordpress.com/documentation/vip/code-review-what-we-look-for/#filesystem-writes
 *
 * @package WPCS\WordPressCodingStandards
 *
 * @since   0.3.0
 * @since   0.11.0 Extends the \WordPressCS\WordPress\AbstractFunctionRestrictionsSniff instead
 *                 of the \PHP_CodeSniffer\Standards\Generic\Sniffs\PHP\ForbiddenFunctionsSniff.
 */
class FileSystemWritesDisallowSniff extends AbstractFunctionRestrictionsSniff {

	/**
	 * If true, an error will be thrown; otherwise a warning.
	 *
	 * @var bool
	 */
	public $error = true;

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
		$groups = array(
			'file_ops' => array(
				'type'      => 'error',
				'message'   => 'Filesystem writes are forbidden, you should not be using %s()',
				'functions' => array(
					'delete',
					'file_put_contents',
					'flock',
					'fputcsv',
					'fputs',
					'fwrite',
					'ftruncate',
					'is_writable',
					'is_writeable',
					'link',
					'rename',
					'symlink',
					'tempnam',
					'touch',
					'unlink',
				),
			),
			'directory' => array(
				'type'      => 'error',
				'message'   => 'Filesystem writes are forbidden, you should not be using %s()',
				'functions' => array(
					'mkdir',
					'rmdir',
				),
			),
			'chmod' => array(
				'type'      => 'error',
				'message'   => 'Filesystem writes are forbidden, you should not be using %s()',
				'functions' => array(
					'chgrp',
					'chown',
					'chmod',
					'lchgrp',
					'lchown',
				),
			),
		);

		/*
		 * Maintain old behaviour - allow for changing the error type from the ruleset
		 * using the `error` property.
		 */
		if ( false === $this->error ) {
			foreach ( $groups as $group_name => $details ) {
				$groups[ $group_name ]['type'] = 'warning';
			}
		}

		return $groups;

	} // End getGroups().

} // End class.
