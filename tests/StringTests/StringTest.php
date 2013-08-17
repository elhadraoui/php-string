<?php

namespace StringTests;

use String\String;

/**
 * @author Hassan Amouhzi
 */
class StringTest extends \PHPUnit_Framework_TestCase {
	
	public function testAddCSlashes() {
		
		$str = new String("This is a string!");
		
		
		
		$str2 = $str->addCSlashes('A..z');
		$str3 = '\T\h\i\s \i\s \a \s\t\r\i\n\g!';
		
		$this->assertEquals($str3, $str2);
		
		
		$str = new String("foo[ ]");
		
		$str2 = $str->addCSlashes('A..z');
		$str3 = '\f\o\o\[ \]';
		
		$this->assertEquals($str3, $str2);
		
		
		$str = new String("zoo['.']");
		
		$str2 = $str->addCSlashes('A..z');
		$str3 = "\z\o\o\['.'\]";
		
		$this->assertEquals($str3, $str2);
		
	}
	
}