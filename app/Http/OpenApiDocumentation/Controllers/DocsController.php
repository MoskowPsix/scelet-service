<?php

namespace App\Http\OpenApiDocumentation\Controllers;

use App\Http\OpenApiDocumentation\Services\DocumentationVersionService;
use Illuminate\Http\Request;

class DocsController
{
    public function __construct(
        private DocumentationVersionService $versionService
    ) {
    }

    public function index(Request $request)
    {
        $availableVersions = $this->versionService->getAvailableVersions();

        if (empty($availableVersions)) {
            abort(404, "No API documentation versions found");
        }

        $version = $request->get('version', $availableVersions[0]);

        if (!in_array($version, $availableVersions)) {
            abort(404, "Documentation for version {$version} not found");
        }

        $jsonPath = public_path("api-docs/{$version}/index.json");

        if (!file_exists($jsonPath)) {
            abort(404, "JSON file for version {$version} not found. Please regenerate documentation.");
        }

        $jsonUrl = asset("api-docs/{$version}/index.json");

        return view('docs.index', [
            'jsonUrl' => $jsonUrl,
            'version' => $version,
            'availableVersions' => $availableVersions,
        ]);
    }
}
