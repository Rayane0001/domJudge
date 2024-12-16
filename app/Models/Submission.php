<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Submission extends Model
{
  use HasFactory;

  protected $table = 'submissions';

  protected $fillable = [
      'name',
      'description',
      'submission_date',
      'solution_file',
      'result',
      'team_id',
      'challenge_id',
  ];

  // Dates (for automatic casting)
  protected $dates = ['submission_date', 'created_at', 'updated_at'];

  /**
   * The team that made the submission.
   */
  public function equipe(): BelongsTo
  {
    return $this->belongsTo(Team::class, 'team_id');
  }

  /**
   * The challenge this submission is for.
   */
  public function challenge(): BelongsTo
  {
    return $this->belongsTo(Challenge::class, 'challenge_id');
  }

  public function uploadSolution($file)
  {
    if ($this->fichier_solution) {
      Storage::delete($this->fichier_solution);
    }

    return $file->store('solutions', 'public');
  }

  /**
   * Delete the associated solution file when the submission is deleted.
   */
  protected static function boot(): void
  {
    parent::boot();

    static::deleting(function ($submission) {
      if ($submission->fichier_solution) {
        Storage::delete($submission->fichier_solution);
      }
    });
  }
}
