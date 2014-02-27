<?php

namespace Gredin\CantataBundle\Services;

/**
 * Class Logger
 */
class Logger
{
    private $filename;
    private $rootdir;

    public function __construct($rootdir, $filename)
    {
        $this->filename = $filename;
        $this->rootdir = $rootdir;
    }

    public function log($message)
    {
        $dateTime = new \DateTime();
        $formattedDateTime = $dateTime->format(\DateTime::ISO8601);

        file_put_contents(
            $this->rootdir . '/../tmp/' . $this->filename,
            '[' . $formattedDateTime . '] ' . $message . PHP_EOL
        );
        //    FILE_APPEND
        //);
    }
}
