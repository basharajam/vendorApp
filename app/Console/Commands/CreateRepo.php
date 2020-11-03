<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class CreateRepo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:repo {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command to create repositories and services for models';

     /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $files;
    /**
     * Create a new command instance.
     *
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('model');
        if(!$name){
            $this->error('Please specify a valid model');
            return false;
        }
        $this->checkForModelExist($name);
        $this->createRepo($name);
        $this->createService($name);

    }

    /**
     * Check if the given model  exists
     *
     * @param string $name
     */
    private function checkForModelExist($name)
    {
        $model=ucfirst($name);

        if (!class_exists('\App\\Models\\'.$model)) {
             $this->error("The model [$model] dosn't exists");
        }
    }

    private function createRepo($name){
        $model=ucfirst($name);
        if ( $this->files->isFile(app_path("Repositories/{$model}Repository.php"))) {
            $this->warn("{$model}Repository already exist");

        }
        $this->generateRepo($model);


        $this->info("Repository have been generated successfully");
    }

    private function generateRepo($model){
        $stub = $this->getStub('repository.stub');
        $stub = $this->replaceClass($model,$stub);
        $stub = $this->replacModelVariable($model,$stub);
        $this->files->put(app_path("Repositories/{$model}Repository.php"), $stub);
    }
    private function createService($name){
        $model=ucfirst($name);
        if ( $this->files->isFile(app_path("Services/{$model}/{$model}Service.php"))) {
            $this->warn("{$model}Service already exist");
        }
        $this->generateService($model);
        $this->appendBindings($model);

        $this->info("Service have been generated successfully");
    }
    private function generateService($model){
        $this->warn("Creating Service Folder...");
        $this->makeDirectory(app_path("Services/{$model}"));
        $this->warn("Service Folder Created Successfully");
        $stub = $this->getStub('service-interface.stub');
        $stub = $this->replaceClass($model,$stub);
        $this->files->put(app_path("Services/{$model}/I{$model}Service.php"), $stub);

        $stub = $this->getStub('service.stub');
        $stub = $this->replaceClass($model,$stub);
        $this->files->put(app_path("Services/{$model}/{$model}Service.php"), $stub);
    }

    private function getStub($stub_name){
        return $this->files->get(base_path('stubs/'.$stub_name));
    }
    private function replaceClass($class,&$stub){
        $stub =  str_replace("{{class}}",$class,$stub);
        return $stub;
    }
    private function replacModelVariable($model,&$stub){
        return  str_replace("{{ modelVariable }}",$this->snake_case($model),$stub);

    }
    private function snake_case($str, array $noStrip = [])
    {
            // non-alpha and non-numeric characters become spaces
            $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
            $str = trim($str);
            $str = str_replace(" ", "_", $str);
            $str = strtolower($str);

            return $str;
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        $this->files->makeDirectory($path, 0777, true,true);
        return $path;
    }

     /**
     * Append the IoC bindings for the given model to the Service Provider
     * @param string $model
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function appendBindings($model)
    {
        $this->repoBindings($model);
        $this->serviceBindings($model);
    }
    private function repoBindings($model){
        $path=app_path('Providers/RepositoryServiceProvider.php');
        $Provider = $this->files->get($path);
        $repoBinding = $this->files->get(base_path('stubs/repo-bindings.stub'));
        $stub = str_replace('{{class}}', $model, $repoBinding);
        $Provider = str_replace('//add bindings', $stub, $Provider);
        $namespaces = $this->files->get(base_path('stubs/namespace-repo-binding.stub'));
        $namespaces = str_replace('{{class}}', $model, $namespaces);
        $Provider = str_replace('//namespaces', $namespaces, $Provider);
        $this->files->put($path, $Provider);
    }
    public function serviceBindings($model)
    {
        $path=app_path('Providers/ServiceLayerServiceProvider.php');
        $Provider = $this->files->get($path);
        $repoBinding = $this->files->get(base_path('stubs/service-binding.stub'));
        $stub = str_replace('{{class}}', $model, $repoBinding);
        $Provider = str_replace('//add bindings', $stub, $Provider);
        $namespaces = $this->files->get(base_path('stubs/namespace-service-binding.stub'));
        $namespaces = str_replace('{{class}}', $model, $namespaces);
        $Provider = str_replace('//namespaces', $namespaces, $Provider);
        $this->files->put($path, $Provider);
    }

}
