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
* If the hidden input field's class attribute has the string "display_hidden"
* in it, then it will actually be displayed as a textual row in the form's
* table.
*/
class Ev_Form_Tabular_Decorator_MyHiddenShow extends Zend_Form_Decorator_Abstract
{
  public function render($content)
  {
    $element = $this->getElement();
    $class = $element->getAttrib('class');
    if ( strpos($class, 'display_hidden') === false )
      return $content;
    $label = new Zend_Form_Decorator_Label(array('tag' => 'td'));
    $label->setElement($element);
    $label = $label->render('');
    $value = htmlentities($element->getValue());
    return "<tr>$label<td class=\"element\">$value$content</td></tr>\n";
  }
}
