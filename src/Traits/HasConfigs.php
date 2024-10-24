<?php

namespace Spatie\LaravelPackageTools\Traits;

trait HasConfigs
{
    public array $configFileNames = [];

    public function hasConfigFile($configFileName = null): static
    {
        $configFileName ??= $this->shortName();

        if (! is_array($configFileName)) {
            $configFileName = [$configFileName];
        }

        $this->configFileNames = $configFileName;

        return $this;
    }
}
