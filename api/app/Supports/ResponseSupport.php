<?php

namespace App\Supports;

class ResponseSupport
{
    /**
     * Get response message
     *
     * @param string $main_message
     * @param boolean $is_success
     * @return string
     */
    public static function getResponseMessage(string $main_message, bool $is_success = true, string $extra_message = ''): string
    {
        if ($is_success) {
            return $main_message . ' successfully';
        }

        $message = $main_message . ' failed';
        if (strlen($extra_message) === 0) {
            return $message;
        }

        return $message . '. ' . $extra_message;
    }
}
