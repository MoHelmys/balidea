<?php
namespace Drupal\welcome_module\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
class WelcomeController extends ControllerBase {

    /**
     * The config factory object.
     *
     * @var \Drupal\Core\Config\ConfigFactoryInterface
     */
    protected $configFactory;
  
    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container) {
      return new static(
        $container->get('config.factory')
      );
    }
  
    /**
     * Constructs a ExampleController object.
     *
     * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
     *   A configuration factory instance.
     */
    public function __construct(ConfigFactoryInterface $configFactory) {
      $this->configFactory = $configFactory;
    }
  public function welcome() {
    $message  = $this->configFactory->get('welcome_module.custom_welcome_message')->get('message');
    $version  = $this->configFactory->get('welcome_module.custom_welcome_message')->get('number');
    return array(
        '#theme' => 'welcome_message',
        '#message' =>  $message,
        '#version' => $version
    );
  }
}