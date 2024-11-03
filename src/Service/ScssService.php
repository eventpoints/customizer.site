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
            $scssContent .= "$$name: $variable; \n";

        }
        dump($scssContent);
        return $scssContent;
    }

}