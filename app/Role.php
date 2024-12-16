<?php

namespace App;

enum Role: string {
  case ADMIN = 'admin';
  case COACH = 'coach';
  case CONTESTANT = 'contestant';
  case SPECTATOR = 'spectator';
}
