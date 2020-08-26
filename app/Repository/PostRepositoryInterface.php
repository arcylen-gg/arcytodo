<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\Post;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
   public function all(): Collection;
   public function findByUser(int $user_id): Collection;
   public function save(int $user_id, array $request): Bool;
   public function update(int $id, array $request): Bool;
   public function delete(int $id): Int;
}