<?php
//
// +----------------------------------------------------------------------+
// | PHP Version 5                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2003 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Jesus M. Castagnetto <jmcastagnetto@php.net>                |
// +----------------------------------------------------------------------+
//
// $Id$
//

require_once 'Math/Complex/Exception.php';

/**
 * Package with classes to represent and manipulate complex number. Contain
 * definitions for basic arithmetic functions, as well as trigonometric,
 * inverse trigonometric, hyperbolic, inverse hyperbolic, exponential and
 * logarithms of complex numbers.
 * @package Math_Complex
 */

/**
 * Math_Complex: class to represent an manipulate complex numbers (z = a + b*i)
 *
 * Originally this class was part of NumPHP (Numeric PHP package)
 *
 * @author  Jesus M. Castagnetto <jmcastagnetto@php.net>
 * @version 0.8
 * @access  public
 */
class Math_Complex {

    /**
     * The real part of the complex number
     *
     * @var float
     * @access  private
     */
    var $_real;

    /**
     * The imaginary part of the complex number
     *
     * @var float
     * @access  private
     */
    var $_im;
    
    /**
     * Constructor for Math_Complex
     * 
     * @param float $real Real part of the number
     * @param float $im Imaginary part of the number
     * @return object Math_Complex
     */
    public function __construct($real, $im) 
    {
        $this->_real = floatval($real);
        $this->_im = floatval($im);
    }
    
    /**
     * Simple string representation of the number
     *
     * @return string
     */
    public function toString() 
    {
        $r = $this->getReal();
        $i = $this->getIm();
        $str = $r;
        $str .=  ($i < 0) ? ' - ' : ' + ';
        $str .= round(abs($i), 11).'i';
        return $str;
    }

    /**
     * Returns the square of the magnitude of the number
     *
     * @return float
     */
    public function abs2() 
    {
        return ($this->_real * $this->_real + $this->_im * $this->_im);
    }

    /**
     * Returns the magnitude (also referred as norm) of the number
     *
     * @return float
     */
    public function abs() 
    {
        return sqrt($this->abs2());
    }
    
    /**
     * Returns the norm of the number
     * Alias of Math_Complex::abs()
     *
     * @return float
     */
    public function norm() 
    {
        return $this->abs();
    }

    /**
     * Returns the argument of the complex number
     *
     * @return float A floating point number on success
     * @throws Math_Complex_Exception
     */
    public function arg() 
    {
        $arg = atan2($this->_im,$this->_real);
        if (M_PI < $arg || $arg < -1*M_PI) {
            throw new Math_Complex_Exception('Argument has an impossible value');
        } else {
            return $arg;
        }

    }

    /**
     * Returns the angle (argument) associated with the complex number
     * Alias of Math_Complex::arg()
     *
     * @return mixed A float on success
     */
    public function angle() {
        return $this->arg();
    }

    /**
     * Returns the real part of the complex number
     *
     * @return float
     */
    public function getReal() 
    {
        return $this->_real;
    }

    /**
     * Returns the imaginary part of the complex number
     * @return float
     */
    public function getIm() 
    {
        return $this->_im;
    }

}
