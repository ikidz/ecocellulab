<?php

namespace App\Http\Controllers\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SunEditorUploadController
{
    public function __invoke(Request $request, string $resource, string $field)
    {
        // Accept a variety of possible keys SunEditor might use
        $upload = $request->file('file')
            ?? $request->file('image')
            ?? ($request->file('images')[0] ?? null)
            ?? ($request->file('files')[0] ?? null);

        // Fallback: any first uploaded file, regardless of key
        if (!$upload) {
            $all = $request->allFiles();
            if (!empty($all)) {
                $first = reset($all);
                $upload = is_array($first) ? reset($first) : $first;
            }
        }

        if (!$upload) {
            return response()->json(['error' => 'No file'], 422);
        }

        $path = $upload->store('banners/attachments', 'public');
        $url  = \Storage::disk('public')->url($path);

        return response()->json([
            'result' => [[
                'url'  => $url,
                'name' => basename($path),
                'size' => $upload->getSize(),
            ]],
        ]);
    }
}
