<?php

namespace App\Services;

use App\Models\GameLog;

class GameRules
{
    /**
     * Verifica si se puede colocar la ficha en la zona según las reglas
     */
    public static function canPlace($zone, $card, $playerId, $gameId)
    {
        $zone = strtolower($zone);

        // Limitar máximo 2 fichas iguales en la misma zona
        $countInZone = GameLog::where('game_id', $gameId)
            ->where('user_id', $playerId)
            ->where('zone', $zone)
            ->where('dinosaur', $card)
            ->count();

        if ($countInZone >= 2) {
            return [
                'allowed' => false,
                'message' => "No puedes poner más de 2 {$card} en la zona {$zone}."
            ];
        }

        // Reglas por zona
        switch ($zone) {
            case 'color enjoyer': // Solo fichas del mismo tipo
                $otherTypes = GameLog::where('game_id', $gameId)
                    ->where('user_id', $playerId)
                    ->where('zone', $zone)
                    ->where('dinosaur', '!=', $card)
                    ->exists();

                if ($otherTypes) {
                    return [
                        'allowed' => false,
                        'message' => "En Color Enjoyer solo puedes poner fichas del mismo tipo."
                    ];
                }
                break;

            case 'pares o nada': // No repetir fichas
                $alreadyHasType = GameLog::where('game_id', $gameId)
                    ->where('user_id', $playerId)
                    ->where('zone', $zone)
                    ->where('dinosaur', $card)
                    ->exists();

                if ($alreadyHasType) {
                    return [
                        'allowed' => false,
                        'message' => "No puedes repetir la misma ficha en Pares O Nada."
                    ];
                }
                break;

            case 'baccarat 3': // Solo "As" o "Dealer"
                if (!in_array($card, ['As', 'Dealer'])) {
                    return [
                        'allowed' => false,
                        'message' => "Solo 'As' o 'Dealer' pueden colocarse en Baccarat 3."
                    ];
                }
                break;

            case 'sufriendo del exito': // Solo fichas que no sean As o Dealer
                if (in_array($card, ['As', 'Dealer'])) {
                    return [
                        'allowed' => false,
                        'message' => "No puedes colocar '{$card}' en Sufriendo del Éxito."
                    ];
                }
                break;

            case 'la mesa de las mil caras': // Libre, cualquier ficha
                break;

            case 'la mesa abandonada': // Solo fichas que no estén en otras zonas
                $existsElsewhere = GameLog::where('game_id', $gameId)
                    ->where('user_id', $playerId)
                    ->where('zone', '!=', $zone)
                    ->where('dinosaur', $card)
                    ->exists();

                if ($existsElsewhere) {
                    return [
                        'allowed' => false,
                        'message' => "La ficha {$card} ya está en otra zona, no puede ir a La Mesa Abandonada."
                    ];
                }
                break;

            case 'zona de los perdedores': // Máxima libertad, cualquier ficha
                break;

            default:
                return [
                    'allowed' => false,
                    'message' => "Zona desconocida: {$zone}"
                ];
        }

        return ['allowed' => true];
    }
}
