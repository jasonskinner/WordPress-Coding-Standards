<?php
/**
 * WordPress Coding Standard.
 *
 * @package WPCS\WordPressCodingStandards
 * @link    https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace WordPressCS\WordPress\Sniffs\WP;

use WordPressCS\WordPress\PHPCSHelper;

/*
 * Alias the PHPCS 3.x classes to their PHPCS 2.x equivalent if necessary.
 */
if ( version_compare( PHPCSHelper::getVersion(), '2.99.99', '>' ) ) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'PHPCSAliases.php';
}

/**
 * Makes sure scripts and styles are enqueued and not explicitly echo'd.
 *
 * @link    https://vip.wordpress.com/documentation/vip-go/code-review-blockers-warnings-notices/#inline-resources
 *
 * @package WPCS\WordPressCodingStandards
 *
 * @since   0.3.0
 */
class EnqueuedResourcesSniff implements \PHP_CodeSniffer_Sniff {

	/**
	 * Returns an array of tokens this test wants to listen for.
	 *
	 * @return array
	 */
	public function register() {
		return \PHP_CodeSniffer_Tokens::$textStringTokens;
	}

	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param \PHP_CodeSniffer_File $phpcsFile The file being scanned.
	 * @param int                   $stackPtr  The position of the current token
	 *                                         in the stack passed in $tokens.
	 *
	 * @return void
	 */
	public function process( \PHP_CodeSniffer_File $phpcsFile, $stackPtr ) {
		$tokens = $phpcsFile->getTokens();
		$token  = $tokens[ $stackPtr ];

		if ( preg_match( '#rel=\\\\?[\'"]?stylesheet\\\\?[\'"]?#', $token['content'] ) > 0 ) {
			$phpcsFile->addError( 'Stylesheets must be registered/enqueued via wp_enqueue_style', $stackPtr, 'NonEnqueuedStylesheet' );
		}

		if ( preg_match( '#<script[^>]*(?<=src=)#', $token['content'] ) > 0 ) {
			$phpcsFile->addError( 'Scripts must be registered/enqueued via wp_enqueue_script', $stackPtr, 'NonEnqueuedScript' );
		}

	} // End process().

} // End class.
