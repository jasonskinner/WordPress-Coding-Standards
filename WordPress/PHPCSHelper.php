<?php
/**
 * PHPCS cross-version compatibility helper class.
 *
 * @package WPCS\WordPressCodingStandards
 * @link    https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace WordPressCS\WordPress;

/**
 * PHPCSHelper
 *
 * PHPCS cross-version compatibility helper class.
 *
 * Deals with files which cannot be aliased 1-on-1 as the original
 * class was split up into several classes.
 *
 * @package WPCS\WordPressCodingStandards
 * @since   0.12.0
 */
class PHPCSHelper {

	/**
	 * Get the PHPCS version number.
	 *
	 * @return string
	 */
	public static function getVersion() {
		if ( defined( '\PHP_CodeSniffer\Config::VERSION' ) ) {
			// PHPCS 3.x.
			return \PHP_CodeSniffer\Config::VERSION;
		} else {
			// PHPCS 1.x & 2.x.
			return \PHP_CodeSniffer::VERSION;
		}
	}

	/**
	 * Pass config data to PHPCS.
	 *
	 * PHPCS cross-version compatibility helper.
	 *
	 * @param string      $key   The name of the config value.
	 * @param string|null $value The value to set. If null, the config entry
	 *                           is deleted, reverting it to the default value.
	 * @param boolean     $temp  Set this config data temporarily for this script run.
	 *                           This will not write the config data to the config file.
	 */
	public static function setConfigData( $key, $value, $temp = false ) {
		if ( method_exists( '\PHP_CodeSniffer\Config', 'setConfigData' ) ) {
			// PHPCS 3.x.
			\PHP_CodeSniffer\Config::setConfigData( $key, $value, $temp );
		} else {
			// PHPCS 1.x & 2.x.
			\PHP_CodeSniffer::setConfigData( $key, $value, $temp );
		}
	}

	/**
	 * Get the value of a single PHPCS config key.
	 *
	 * @param string $key The name of the config value.
	 *
	 * @return string|null
	 */
	public static function getConfigData( $key ) {
		if ( method_exists( '\PHP_CodeSniffer\Config', 'getConfigData' ) ) {
			// PHPCS 3.x.
			return \PHP_CodeSniffer\Config::getConfigData( $key );
		} else {
			// PHPCS 1.x & 2.x.
			return \PHP_CodeSniffer::getConfigData( $key );
		}
	}

	/**
	 * Check whether the `--ignore-annotations` option has been used.
	 *
	 * @param \PHP_CodeSniffer_File $phpcsFile Optional. The current file being processed.
	 *
	 * @return bool True if annotations should be ignored, false otherwise.
	 */
	public static function ignoreAnnotations( $phpcsFile = null ) {
		// @TODO THIS NEEDS SOME CAREFUL & THOROUGH TESTING!
		if ( class_exists( '\PHP_CodeSniffer\Config' ) ) {
			// PHPCS 3.x.
			if ( isset( $phpcsFile, $phpcsFile->config->annotations ) ) {
				return ! $phpcsFile->config->annotations;
			} else {
				$annotations = \PHP_CodeSniffer\Config::getConfigData( 'annotations' );
				if ( isset( $annotations ) ) {
					return ! $annotations;
				}
			}
		}
		
		// PHPCS 2.x does not support `--ignore-annotations`.
		return false;
	}

}
