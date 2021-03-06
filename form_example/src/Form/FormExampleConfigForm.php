<?php
  
/**
 * @file
 * Contains \Drupal\form_example\Form\FormExampleConfigForm.
 */
  
namespace Drupal\form_example\Form;
  
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
  
class FormExampleConfigForm extends ConfigFormBase {
    
  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'form_example_form';
  }
    
  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
  $form = parent::buildForm($form, $form_state);
  $config = $this->config('form_example.settings');
  $form['email'] = array(
    '#type' => 'email',
    '#title' => $this->t('Your .com email address.'),
    '#default_value' => $config->get('form_example.email_address'),
  );
  return $form;
  }
    
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) { 
    if (strpos($form_state['values']['email'], '.com') === FALSE ) {
      $this->setFormError('email', $form_state, $this->t('This is not a .com email address.'));
    }
  }
    
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  $config = $this->config('form_example.settings');
  $config->set('form_example.email_address', $form_state['values']['email']);
  $config->save();
  return parent::submitForm($form, $form_state);
  }
    
}
