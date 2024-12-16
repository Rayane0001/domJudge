<?php

namespace App\Http\Controllers;

use App\Models\Competition;

class RankingController extends Controller
{
    public function index(Competition $competition)
    {
        // Récupérer toutes les soumissions pour cette compétition
        $submissions = $competition->submissions()->with(['team', 'challenge'])->get();

        // Calculer le classement
        $teams = $this->calculateRanking($submissions);

        return view('ranking.index', compact('competition', 'teams'));
    }

    private function calculateRanking($submissions)
    {
        $ranking = [];

        // Organiser les soumissions par équipe
        foreach ($submissions as $submission) {
            $teamId = $submission->team_id;
            if (!isset($ranking[$teamId])) {
                $ranking[$teamId] = [
                    'team' => $submission->team->name,
                    'score' => 0,
                    'time' => 0,
                    'submissions' => []
                ];
            }

            // Calculer le score (nombre de challenges réussis)
            $ranking[$teamId]['submissions'][$submission->challenge_id] = $submission;
            if ($submission->result == 'success') {
                $ranking[$teamId]['score']++;
                $ranking[$teamId]['time'] += $submission->submission_date->timestamp; // Ajouter le temps de soumission
            }
        }

        // Trier par score, puis par temps de soumission
        uasort($ranking, function($a, $b) {
            if ($a['score'] == $b['score']) {
                return $a['time'] <=> $b['time']; // Si égalité, on trie par temps
            }
            return $b['score'] <=> $a['score']; // Sinon, on trie par score
        });

        return $ranking;
    }
}

