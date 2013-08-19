<?php

namespace String;

/**
 * 
 * @author Hassan Amouhzi
 * 
 */
class String implements \ArrayAccess, \Iterator {
	
	/**
	 * @var string
	 */
	protected $value;
	
	/**
	 * Quote string with slashes in a C style
	 * 
	 * @param  string          $charlist A list of characters to be escaped.
	 * @return \String\String  Returns the escaped string.
	 * @see    http://www.php.net/manual/en/function.addcslashes.php
	 */
	public function addCSlashes($charlist) {
		return new self(addcslashes($this->value, $charlist));
	}
	
	/**
	 * Quote string with slashes
	 * 
	 * @return \String\String Returns the escaped string.
	 * @see    http://www.php.net/manual/en/function.addslashes.php
	 */
	public function addSlashes() {
		return new self(addslashes($this->value));
	}
	
	/**
	 * Convert binary data into hexadecimal representation.
	 * 
	 * @return Returns the hexadecimal representation of the given string.
	 * @see    http://www.php.net/manual/en/function.bin2hex.php
	 */
	public function bin2hex() {
		return new self(bin2hex($this->value));
	}

	/**
	 * Strip whitespace (or other characters) from the end of a string
	 * 
	 * @param  \String\String[optional] $charlist
	 * @return \String\String Returns the modified string.
	 * @see    http://www.php.net/manual/en/function.rtrim.php
	 */
	public function rTrim($charlist = null) {
		return new self(rtrim($this->value, $charlist));
	}

	/* magic methods */
	public function __construct ($string) {
		$this->value = $string;
	}

	public function __toString () {
		return $this->value;
	}

	public function offsetExists ($index) {
		return !empty($this->value[$index]);
	}

	public function offsetGet($index) {
		return $this->value[$index];
	}

	public function offsetSet($index, $val) {
		$this->value[$index] = $value;
	}

	public function offsetUnset($index) {
		unset($this->value[$index]);
	}
	
	private $position = 0;
	
	function rewind() {
		$this->position = 0;
	}
	
	function current() {
		return $this->value[$this->position];
	}
	
	function key() {
		return $this->position;
	}
	
	function next() {
		++$this->position;
	}
	
	function valid() {
		return isset($this->value[$this->position]);
	}
	
	/**
	 * Replaces each substring of this string that matches the literal target sequence
	 * with the specified literal replacement sequence.
	 * The replacement proceeds from the beginning of the string to the end,
	 * for example, replacing "aa" with "b" in the string "aaa" will result in "ba"
	 * rather than "ab".
	 * @param string $target
	 * @param string $replacement
	 * @return \String\String
	 */
	public function replace($target, $replacement) {
		return new self(str_replace($target, $replacement, $this->value));
	}
	
	/**
	 * Splits this string around matches of the given regular expression.
	 * @param string $regex the delimiting regular expression
	 * @return array the array of strings computed by splitting this string around
	 * matches of the given regular expression
	 */
	public function split($regex) {
		$keywords = preg_split($regex, $this->value);
		$array = array();
		foreach($keywords as $keyword) {
			$array[] = new self($keyword);
		}
		return $array;
	}
	
	/**
	 * Make a string lowercase
	 *
	 * @return \String\String the lowercased string.
	 */
	public function toLowerCase() {
		return new self(strtolower($this->value));
	}
	
	/**
	 * Make a string uppercase
	 *
	 * @return \String\String the uppercased string.
	 */
	public function toUpperCase() {
		return new self(strtoupper($this->value));
	}
	
	/**
	 * The value of this object.
	 *
	 * @return string The value of this object
	 */
	public function toString() {
		return $this->__toString();
	}
	
	/**
	 * Converts this string to a new character array.
	 *
	 * @return array a newly allocated character array whose length is the length
	 * of this string and whose contents are initialized to contain the character
	 * sequence represented by this string.
	 */
	public function toCharArray() {
		return str_split($this->value);
	}
}
