<?php

use Iamdadmin\Yaeslpt\Commands\InstallCommand;
use Iamdadmin\Yaeslpt\Package;

use function PHPUnit\Framework\assertFileExists;
use function Spatie\PestPluginTestTime\testTime;

trait ConfigureConfigFileTest
{
    public function configurePackage(Package $package)
    {
        testTime()->freeze('2020-01-01 00:00:00');

        $package
            ->name('laravel-package-tools')
            ->hasConfigFile()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->publishConfigFile();
            });
    }
}

uses(ConfigureConfigFileTest::class);

it('can install the config file', function () {
    $configPath = config_path('package-tools.php');

    $this
        ->artisan('package-tools:install')
        ->assertSuccessful();

    assertFileExists($configPath);
});
