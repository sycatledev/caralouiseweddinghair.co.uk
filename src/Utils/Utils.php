<?php

namespace AsaP\Utils;

class Utils
{

    public static function clearFormat(string $toFormat): string
    {
        // Replace special characters with HTML entities
        $formattedText = htmlspecialchars($toFormat);

        return $formattedText;
    }

    public static function toSlug($toFormat): string
    {
        // Replace special characters with dashes and remove whitespace
        $formattedText = trim(
            preg_replace(
                '/[\s-]+/',
                '-',
                preg_replace(
                    '/[^A-Za-z0-9-]+/',
                    '-',
                    preg_replace(
                        '/[&]/',
                        'and',
                        preg_replace(
                            '/[\']/',
                            '',
                            iconv(
                                'UTF-8',
                                'ASCII//TRANSLIT',
                                $toFormat
                            )
                        )
                    )
                )
            ),
            '-'
        );

        return $formattedText;
    }

    public static function generateUUIDV4(): string
    {
        // Generate a version 4 UUID
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }
}
