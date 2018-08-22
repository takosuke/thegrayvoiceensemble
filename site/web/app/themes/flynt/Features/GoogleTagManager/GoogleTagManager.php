<?php
namespace Flynt\Features\GoogleTagManager;

use Flynt\Features\AdminNotices\AdminNoticeManager;
use Timber\Timber;

class GoogleTagManager
{
    private $containerId;
    private $skippedUserRoles;

    public function __construct($options)
    {
        $this->containerId = $options['containerId'];
        $this->skippedUserRoles = $options['skippedUserRoles'];
        $this->skippedIps = $options['skippedIps'];

        if ($this->containerId && $this->isValidId($this->containerId)) {
            add_action('wp_head', [$this, 'addScript'], 20, 1);
        } else if ($this->containerId != '' && !isset($_POST['acf'])) {
            $manager = AdminNoticeManager::getInstance();
            $message = ["Invalid container Id: {$this->containerId}"];
            $options = [
                'type' => 'error',
                'title' => 'Google Tag Manager Error',
                'dismissible' => true,
                'filenames' => 'functions.php'
            ];
            $manager->addNotice($message, $options);
        }
    }

    public function addScript()
    {
        $user = wp_get_current_user();
        $trackingEnabled = !(
            $this->containerId === 'debug' // debug mode enabled
            || $this->skippedUserRoles && array_intersect($this->skippedUserRoles, $user->roles) // current user role should be skipped
            || is_array($this->skippedIps) && in_array($_SERVER['REMOTE_ADDR'], $this->skippedIps) // current ip should be skipped
        );
        Timber::render('script.twig', [
            'containerId' => $this->containerId,
            'trackingEnabled' => $trackingEnabled,
        ]);
    }

    private function isValidId($containerId)
    {
        if ($containerId === 'debug') {
            return true;
        } else {
            return preg_match('/^gtm-.*$/i', (string) $containerId);
        }
    }
}
