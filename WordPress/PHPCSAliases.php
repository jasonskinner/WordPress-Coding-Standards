<?php
/**
 * PHPCS cross-version compatibility helper.
 *
 * @package WPCS\WordPressCodingStandards
 * @link    https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards
 * @license https://opensource.org/licenses/MIT MIT
 * @since   0.12.0
 */

/*
 * Alias the PHPCS 3.x classes to their PHPCS 2.x equivalent if possible.
 *
 * {@internal The PHPCS file have been reorganized in PHPCS 3.x, quite
 * a few "old" classes have been split and spread out over several "new"
 * classes. In other words, this will only work for a limited number
 * of classes.}}
 */
class_alias( 'PHP_CodeSniffer\Files\File', '\PHP_CodeSniffer_File' );
class_alias( 'PHP_CodeSniffer\Util\Tokens', '\PHP_CodeSniffer_Tokens' );
class_alias( 'PHP_CodeSniffer\Exceptions\RuntimeException', '\PHP_CodeSniffer_Exception' );

class_alias( 'PHP_CodeSniffer\Sniffs\Sniff', '\PHP_CodeSniffer_Sniff' );
class_alias( 'PHP_CodeSniffer\Sniffs\AbstractVariableSniff', '\PHP_CodeSniffer_Standards_AbstractVariableSniff' );
class_alias( 'PHP_CodeSniffer\Standards\PEAR\Sniffs\NamingConventions\ValidFunctionNameSniff', '\PEAR_Sniffs_NamingConventions_ValidFunctionNameSniff' );
class_alias( 'PHP_CodeSniffer\Standards\Squiz\Sniffs\Arrays\ArrayDeclarationSniff', '\Squiz_Sniffs_Arrays_ArrayDeclarationSniff' );

class_alias( 'PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest', '\AbstractSniffUnitTest' );
