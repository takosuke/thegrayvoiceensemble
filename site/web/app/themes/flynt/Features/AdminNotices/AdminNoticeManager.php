<?php

namespace Flynt\Features\AdminNotices;

# TODO make strings translatable

class AdminNoticeManager
{
    protected static $instance = null;
    protected static $notices = [];

    const DEFAULT_OPTIONS = [
        'type' => 'info',
        'title' => 'Flynt - Oops, something went wrong',
        'dismissible' => true,
        'filenames' => ''
    ];

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * clone
     *
     * Prevent cloning with 'protected' keyword
    **/
    protected function __clone()
    {
    }

    /**
     * constructor
     *
     * Prevent instantiation with 'protected' keyword
    **/
    protected function __construct()
    {
    }

    public function addNotice($messages = [], $options = [])
    {
        if (empty($messages)) {
            return;
        }

        $options = array_merge(self::DEFAULT_OPTIONS, $options);

        $cssClasses = 'notice';
        $cssClasses .= $options['dismissible'] ? ' is-dismissible' : '';
        $cssClasses .= !empty($options['type']) ? " notice-{$options['type']}" : '';

        $files = !empty($options['filenames']) ? " ({$options['filenames']}) " : ' ';

        $msg = '';

        foreach ($messages as $message) {
            $msg .= '<p>' . $message . '</p>';
        }

        $msg .= '<p><i>To resolve this issue either follow the steps above'
        . " or remove the Feature{$files}requiring this functionality in your theme.</i></p>";
        $msg = "<div class=\"{$cssClasses}\">"
        . "<p><strong>{$options['title']}</strong></p>"
        . $msg . '</div>';

        add_action('admin_notices', function () use ($msg) {
            echo $msg;
        });

        array_push(self::$notices, [
            'options' => $options,
            'message' => $msg
        ]);
    }

    public function getAll()
    {
        return self::$notices;
    }
}
