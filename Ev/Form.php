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
* This is an extension to the Zend Form class to make a form that lays out its
* elements in a table.  See the example in the base folder.
*/
class Ev_Form extends Zend_Form
{
  public function __construct($options = null)
  {
    parent::__construct($options);
    $this->addPrefixPath('Ev_Form_Tabular_Element'
    , 'Ev/Form/Tabular/Element/', Zend_Form::ELEMENT);
    $this->addPrefixPath('Ev_Form_Tabular_Decorator'
    , 'Ev/Form/Tabular/Decorator/', Zend_Form::DECORATOR);
  }

  public function loadDefaultDecorators()
  {
    if ( $this->loadDefaultDecoratorsIsDisabled() )
      return;

    $decorators = $this->getDecorators();
    if ( empty($decorators) )
    {
      $this->addDecorator('FormElements')
      ->addDecorator('HtmlTag', array('tag' => 'table', 'class' => 'zend_form'))
      ->addDecorator('Form')
      ;
    }
  }
}
