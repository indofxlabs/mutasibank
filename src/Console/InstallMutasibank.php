<?php

namespace Indofx\Mutasibank\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallMutasibank extends Command
{
    protected $signature = 'mutasibank:install';

    protected $description = 'Install Mutasibank';

    public function handle()
    {
        $this->info('Installing Mutasibank...');
        $this->info('Publishing config...');

        if (!$this->configExists('mutasibank.php')) {
            $this->publishConfiguration(true);
            $this->info('Config file published!');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Config file already exists. Overwriting...');
                $this->publishConfiguration(true);
            }
        }

        $this->info('Installed Mutasibank');
    }

    private function configExists($file)
    {
        return File::exists(config_path($file));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm('Config file already exists. Do you want to overwrite it?', false);
    }

    public function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => 'Indofx\Mutasibank\Providers\MutasibankServiceProvider',
            '--tag' => 'mutasibank',
        ];

        if ($forcePublish) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
