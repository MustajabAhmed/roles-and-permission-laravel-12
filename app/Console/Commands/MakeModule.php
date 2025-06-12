<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeModule extends Command
{
    protected $signature = 'make:module {name}';
    protected $description = 'Generate module files: Repository, Service, DTO, Request, Controller, Routes';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $lowerName = Str::lower($name);

        $this->makeDirectory("app/Repositories");
        $this->makeDirectory("app/Services");
        $this->makeDirectory("app/DTOs");
        $this->makeDirectory("app/Interfaces");
        $this->makeDirectory("app/Http/Requests");
        $this->makeDirectory("app/Http/Controllers");

        $this->generateFile("stubs/repository.stub", "app/Repositories/{$name}Repository.php", $name);
        $this->generateFile("stubs/service.stub", "app/Services/{$name}Service.php", $name);
        $this->generateFile("stubs/dto.stub", "app/DTOs/{$name}DTO.php", $name);
        $this->generateFile("stubs/interface.stub", "app/Interfaces/{$name}RepositoryInterface.php", $name);
        $this->generateFile("stubs/request.stub", "app/Http/Requests/{$name}Request.php", $name);
        $this->generateFile("stubs/controller.stub", "app/Http/Controllers/{$name}Controller.php", $name);

        $this->info("Module $name generated successfully.");
    }

    protected function makeDirectory($path)
    {
        if (!File::exists(base_path($path))) {
            File::makeDirectory(base_path($path), 0755, true);
        }
    }

    protected function generateFile($stubPath, $destinationPath, $name)
    {
        $stub = File::get(base_path($stubPath));
        $stub = str_replace('{{ name }}', $name, $stub);
        $stub = str_replace('{{ lower_name }}', Str::lower($name), $stub);
        File::put(base_path($destinationPath), $stub);
    }
}
