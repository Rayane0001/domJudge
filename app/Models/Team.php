<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
  use HasFactory;

  protected $table = 'teams';

  protected $fillable = [
      'nom',
      'description',
      'visual',
      'creation_date',
      'competition_id',
      'coach_id',
  ];

  protected $dates = ['date_creation', 'created_at', 'updated_at'];

  /**
   * The members of the team (including the coach).
   */
  public function members(): HasMany
  {
    return $this->hasMany(User::class, 'equipe_id');
  }

  /**
   * The coach of the team.
   */
  public function coach(): BelongsTo
  {
    return $this->belongsTo(User::class, 'coach_id');
  }

  /**
   * The competition this team is part of.
   */
  public function competition(): BelongsTo
  {
    return $this->belongsTo(Competition::class, 'competition_id');
  }

  /**
   * The submissions made by the team.
   */
  public function submissions(): HasMany
  {
    return $this->hasMany(Submission::class, 'team_id');
  }

  public function uploadVisual($file)
  {
    if ($this->visual) {
      Storage::delete($this->visual);
    }

    // Store the new file and return its path
    return $file->store('visuals', 'public');
  }

  /**
   * Delete the associated visuel file when the team is deleted.
   */
  protected static function boot(): void
  {
    parent::boot();

    static::deleting(function ($equipe) {
      if ($equipe->visuel) {
        Storage::delete($equipe->visuel);
      }
    });
  }

  /**
   * Check if a team has reached its member limit.
   *
   * @return bool
   */
  public function isFull(): bool
  {
    return $this->members()->count() >= 4;
  }
}
