<?php
namespace Drupal\welcome_module\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class WelcomeMessageConfigurationForm extends ConfigFormBase {
/**
* {@inheritdoc}
*/
protected function getEditableConfigNames() {
    return ['welcome_module.custom_welcome_message'];
    }
    /**
    * {@inheritdoc}
    */
    public function getFormId() {
    return 'welcome_module_message_configuration_form';
    }

    /**
    * {@inheritdoc}
    */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $config = $this->config('welcome_module.custom_welcome_message');
        $form['message'] = array(
            '#type' => 'text_format',
            '#title' => $this->t('Message'),
            '#description' => $this->t('Please provide the message'),
            '#default_value' => $config->get('message'),
        );
        $form['number'] = array(
            '#type' => 'number',
            '#title' => $this->t('Number'),
            '#description' => $this->t('Please provide the number: <br> Ex: 0123456789 '),
            '#default_value' => $config->get('number'),
        );
        return parent::buildForm($form, $form_state);
    }

    /**
    * {@inheritdoc}
    */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $this->config('welcome_module.custom_welcome_message')
        ->set('message', $form_state->getValue('message')['value'])
        ->set('number', $form_state->getValue('number'))
        ->save();
        parent::submitForm($form, $form_state);
    }
}
