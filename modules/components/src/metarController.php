<?php

namespace App\Http\Controllers;

use BookStack\Http\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MetarController extends Controller
{
    public function metar(Request $request, Client $client, string $icao): JsonResponse
    {
        try {
            $response = $client->request(
                'GET',
                "https://metar.vatsim.net/{$icao}",
                [
                    'timeout' => 10,
                    'connect_timeout' => 5,
                    'http_errors' => false,
                    'headers' => [
                        'Accept' => 'text/plain',
                        'User-Agent' => 'VATGER BookStack METAR Component',
                    ],
                ]
            );
        } catch (GuzzleException $exception) {
            report($exception);

            return response()->json([
                'message' => 'The METAR service could not be reached.',
            ], 502);
        }

        if ($response->getStatusCode() !== 200) {
            return response()->json([
                'message' => 'The METAR service returned an error.',
            ], 502);
        }

        $metar = trim((string) $response->getBody());

        if ($metar === '') {
            return response()->json([
                'message' => "No METAR is available for {$icao}.",
            ], 404);
        }

        return response()->json([
            'icao' => $icao,
            'metar' => $metar,
        ]);
    }
}