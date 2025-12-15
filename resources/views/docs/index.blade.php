<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation - {{ $version }}</title>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/swagger-ui-dist@5.10.3/swagger-ui.css" />
    <style>
        html {
            box-sizing: border-box;
            overflow: -moz-scrollbars-vertical;
            overflow-y: scroll;
        }
        *, *:before, *:after {
            box-sizing: inherit;
        }
        body {
            margin:0;
            background: #fafafa;
        }
        .version-selector {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1000;
            background: white;
            padding: 10px 15px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .version-selector label {
            font-weight: bold;
            font-size: 14px;
        }
        .version-selector select {
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    @if(count($availableVersions) > 1)
    <div class="version-selector">
        <label for="version-select">Version:</label>
        <select id="version-select" onchange="switchVersion(this.value)">
            @foreach($availableVersions as $v)
                <option value="{{ $v }}" {{ $v === $version ? 'selected' : '' }}>
                    {{ $v }}
                </option>
            @endforeach
        </select>
    </div>
    @else
    <!-- Debug: availableVersions count = {{ count($availableVersions) }}, versions: {{ implode(', ', $availableVersions) }} -->
    @endif
    
    <div id="swagger-ui"></div>
    <script src="https://unpkg.com/swagger-ui-dist@5.10.3/swagger-ui-bundle.js"></script>
    <script src="https://unpkg.com/swagger-ui-dist@5.10.3/swagger-ui-standalone-preset.js"></script>
    <script>
        let currentVersion = "{{ $version }}";
        
        function switchVersion(version) {
            if (version !== currentVersion) {
                window.location.href = "{{ route('docs.index') }}?version=" + version;
            }
        }
        
        window.onload = function() {
            const ui = SwaggerUIBundle({
                url: "{{ $jsonUrl }}",
                dom_id: '#swagger-ui',
                deepLinking: true,
                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset
                ],
                plugins: [
                    SwaggerUIBundle.plugins.DownloadUrl
                ],
                layout: "StandaloneLayout"
            });
        };
    </script>
</body>
</html>

