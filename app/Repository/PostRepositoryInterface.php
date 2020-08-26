<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\Post;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
   public function all(): Collection;
   public function findByUser(): Collection;
}