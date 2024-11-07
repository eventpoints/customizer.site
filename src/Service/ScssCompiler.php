<?php declare(strict_types=1);

namespace App\Service;

use Symfony\Component\Process\Process;

class ScssCompiler
{

    public function compileScss(string $scss, string $contextPath): string
    {
        $command = sprintf('cd %s && echo %s | sass --stdin',
            $contextPath,
            escapeshellarg($scss)
        );

        $process = Process::fromShellCommandline($command);
        $process->setTimeout(10);

        $process->mustRun();
        return $process->getOutput();
    }
}