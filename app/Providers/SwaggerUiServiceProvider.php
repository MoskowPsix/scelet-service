<?php

namespace App\Providers;

use App\Http\OpenApiDocumentation\Services\DocumentationVersionService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class SwaggerUiServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        Gate::define('viewSwaggerUI', function ($user = null) {
            return in_array(optional($user)->email, [
                //
            ]);
        });

        $versionService = new DocumentationVersionService();
        $versionService->generateJsonForAllVersions();
    }
}
