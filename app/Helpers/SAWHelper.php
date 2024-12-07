<?php

namespace App\Helpers;

class SAWHelper
{
    /**
     * Normalize the decision matrix.
     *
     * @param array $data Matrix of values [guru => [kriteria => nilai]]
     * @param array $maxValues Maximum value for each criterion [kriteria => max_value]
     * @return array Normalized matrix
     */
    public static function normalize($data, $maxValues)
    {
        $normalized = [];
        foreach ($data as $guru) {
            $guruName = $guru['nama'];
            $guruNormalized = ['nama' => $guruName, 'kriteria' => []];

            foreach ($guru['kriteria'] as $kriteria => $nilai) {
                $guruNormalized['kriteria'][$kriteria] = $nilai / $maxValues[$kriteria];
            }

            $normalized[] = $guruNormalized;
        }

        return $normalized;
    }

    /**
     * Calculate scores for each alternative (guru).
     *
     * @param array $normalizedData Normalized matrix
     * @param array $weights Weights for each criterion [kriteria => weight]
     * @return array Scores for each alternative
     */
    public static function calculateScore($normalizedData, $weights)
    {
        $scores = [];
        foreach ($normalizedData as $guru) {
            $totalScore = 0;

            foreach ($guru['kriteria'] as $kriteria => $normalizedValue) {
                $totalScore += $normalizedValue * $weights[$kriteria];
            }

            $scores[] = [
                'nama' => $guru['nama'],
                'total_skor' => $totalScore,
            ];
        }

        return $scores;
    }
}
