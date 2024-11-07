<?php declare(strict_types=1);

namespace App\Service;

final readonly class ScssService
{
    /**
     * @param array<string, string> $variables
     * @return string
     */
    public static function arrayToScssString(array $variables): string
    {
        $scssContent = "";
        foreach ($variables as $key => $variable) {
            $name = strtolower((string)preg_replace('/(?<!^)[A-Z]/', '-$0', $key));
            $scssContent .= sprintf("$%s: %s; \n", $name, self::formatVariable($variable));

        }

        return $scssContent;
    }

    private static function formatVariable(mixed $variable): string
    {
        return match (gettype($variable)) {
            'boolean' => $variable? 'true' : 'false',
            default => (string)$variable,
        };
    }
}