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
}
