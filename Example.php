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
* This is an example of using the Ev_Form subclass of Zend_Form to make a form
* that lays out its elements in a table.
*
* The function produces a regisration form.
*
* @param $email The registrant's email address has already been specified.  In
* the form it will be displayed as read-only text.
*
* @return The form object.
*/
private function makeRegistrationForm( $email )
{
  $form = new Ev_Form;
  $form->setAction('/register/')	// URL to send the form to for
  ->setMethod('post')			// processing the regisration.
  ;

  // If there was a post URL specified in the request,
  // we save it in the form so we can redirect to it
  // after the regisration is complete.
  if ( array_key_exists('posturl', $_REQUEST) )
    if ( ! empty($_REQUEST['posturl']) )
    {
      $posturl = $form->createElement('hidden', 'posturl'
      , array('value' => $_REQUEST['posturl']));

      $form->addElement($posturl);
    }

  // Email address is given the "display_hidden" class, which will make the
  // decorator display the value as read-only text.
  $email = $form->createElement('hidden', 'email'
  , array('value' => $email));
  $email->setAttrib('class', 'display_hidden');
  $email->setLabel('Email');
  $form->addElement($email);

  $salutation = $form->createElement('select', 'salutation');
  $salutation->setLabel('Salutation')
  ->setRequired(true)
  ->setMultiOptions(array(
    '' => ''
  , 'Dr.' => 'Dr.'
  , 'Miss' => 'Miss'
  , 'Mr.' => 'Mr.'
  , 'Mrs.' => 'Mrs.'
  , 'Ms.' => 'Ms.'
  ));
  $form->addElement($salutation);

  $firstname = $form->createElement('text', 'firstname');
  $firstname->setLabel('First Name')
  ->setRequired(true)
  ->addFilter('StringTrim')
  ;
  $form->addElement($firstname);

  $surname = $form->createElement('text', 'surname');
  $surname->setLabel('Surname')
  ->setRequired(true)
  ->addFilter('StringTrim')
  ;
  $form->addElement($surname);

  $phone = $form->createElement('text', 'phone');
  $phone->setLabel('Phone')
  ->addFilter('StringTrim')
  ;
  $form->addElement($phone);

  $mobile = $form->createElement('text', 'mobile');
  $mobile->setLabel('Mobile')
  ->addFilter('StringTrim')
  ;
  $form->addElement($mobile);

  // Note use of "first_submit" and "last_submit" classes on the submit buttons
  // below to make them appear in the same cell of the table.
  // See Ev/Form/Tabular/Decorator/MySubmitDecorator.php for more info.
  $submit = $form->createElement('submit', 'register');
  $submit->setLabel('Register')
  ->setAttrib('class', 'first_submit');
  $form->addElement($submit);

  $back = $form->createElement('submit', 'back');
  $back->setLabel('Back')
  ->setAttrib('class', 'last_submit');
  $form->addElement($back);

  return $form;
}
