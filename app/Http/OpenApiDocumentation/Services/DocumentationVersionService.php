<?php

namespace App\Http\OpenApiDocumentation\Services;

class DocumentationVersionService
{
    public function getAvailableVersions(): array
    {
        $basePath = public_path('api-docs');

        if (!is_dir($basePath)) {
            return [];
        }

        $versions = [];
        $directories = glob("{$basePath}/*", GLOB_ONLYDIR);

        foreach ($directories as $directory) {
            $version = basename($directory);

            if (file_exists("{$directory}/index.yaml")) {
                $versions[] = $version;
            }
        }

        usort($versions, function($a, $b) {
            return version_compare(
                str_replace('v', '', $a),
                str_replace('v', '', $b)
            );
        });

        return $versions;
    }

    public function generateJsonForVersion(string $version): bool
    {
        $basePath = public_path('api-docs');
        $yamlPath = "{$basePath}/{$version}/index.yaml";
        $jsonPath = "{$basePath}/{$version}/index.json";

        if (!file_exists($yamlPath)) {
            return false;
        }

        $command = sprintf(
            'npx swagger-cli bundle %s -o %s -t json 2>&1',
            escapeshellarg($yamlPath),
            escapeshellarg($jsonPath)
        );

        exec($command, $output, $returnCode);

        if ($returnCode !== 0) {
            \Log::warning("Failed to generate Swagger JSON for {$version}", [
                'output' => implode("\n", $output),
                'return_code' => $returnCode
            ]);
            return false;
        }

        return true;
    }

    public function generateJsonForAllVersions(): void
    {
        $versions = $this->getAvailableVersions();

        foreach ($versions as $version) {
            $this->generateJsonForVersion($version);
        }
    }
}

