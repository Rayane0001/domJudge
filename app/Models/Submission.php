<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submissions';

    /**
     * Attributs assignables en masse.
     */
    protected $fillable = [
        'name',
        'description',
        'submission_date',
        'solution_file',
        'result',
        'team_id',
        'challenge_id',
    ];

    /**
     * Conversion automatique des colonnes en objets DateTime.
     */
    protected $dates = ['submission_date', 'created_at', 'updated_at'];

    /**
     * Relation : l'équipe qui a effectué cette soumission.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    /**
     * Relation : le challenge auquel cette soumission est liée.
     */
    public function challenge(): BelongsTo
    {
        return $this->belongsTo(Challenge::class, 'challenge_id');
    }

    /**
     * Méthode pour gérer l'upload et l'enregistrement du fichier solution.
     */
    public function uploadSolution($file)
    {
        // Supprime l'ancien fichier s'il existe
        if ($this->solution_file) {
            Storage::disk('public')->delete($this->solution_file);
        }

        // Stocke le fichier solution et retourne le chemin
        $path = $file->store('solutions', 'public');
        $this->update(['solution_file' => $path]);

        return $path;
    }

    /**
     * Supprime le fichier solution associé lors de la suppression de la soumission.
     */
    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function ($submission) {
            if ($submission->solution_file) {
                Storage::disk('public')->delete($submission->solution_file);
            }
        });
    }
}
