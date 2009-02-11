<?php

/*
* MIT Style License
*
* Copyright (c) 2009 Evan McLean - http://evanmclean.com/
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, distribute with
* modifications, sublicense, and/or sell copies of the Software, and to permit
* persons to whom the Software is furnished to do so, subject to the following
* conditions:
*
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* ABOVE COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
* WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR
* IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*
* Except as contained in this notice, the name(s) of the above copyright
* holders shall not be used in advertising or otherwise to promote the sale,
* use or other dealings in this Software without prior written authorization. 
*
*/

/**
* Trickery to make multiple submit buttons reside in the one table cell.
* Add one of "first_submit", "middle_submit" or "last_submit" to the "class"
* attribute for each submit button and they should get rendered appropriately.
* If none of those three exist, the submit button will be rendered in it's own
* row.
*/
class Ev_Form_Tabular_Decorator_MySubmitDecorator extends Zend_Form_Decorator_Abstract
{
  public function render($content)
  {
    $element = $this->getElement();
    $class = $element->getAttrib('class');
    if ( strpos($class, 'first_submit') !== false )
      return "<tr><td></td><td class=\"submit\">$content";
    if ( strpos($class, 'last_submit') !== false )
      return "$content</td></tr>\n";
    if ( strpos($class, 'middle_submit') !== false )
      return " $content ";
    return "<tr><td></td><td class=\"submit\">$content</td></tr>\n";
  }
}
