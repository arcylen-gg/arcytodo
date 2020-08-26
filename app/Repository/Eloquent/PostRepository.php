<?php
declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Post;
use App\Repository\PostRepositoryInterface;
use Illuminate\Support\Collection;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * PostRepository constructor.
     * 
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @return Collection
     */
    public function findByUser(int $user_id): Collection
    {
        return $this->model->where('user_id',$user_id)->get();
    }

    /**
     * @return Bool
     */
    public function save(int $user_id, array $request): Bool
    {
        $this->model->user_id = $user_id;
        $this->model->post = $request['post'];
        return $this->model->save($request);
    }

    /**
     * @return Bool
     */
    public function update(int $id, array $request): Bool
    {
        $this->model->find($id);
        $this->model->post = $request['post'];
        return $this->model->save($request);
    }

    /**
     * @return Int
     */
    public function delete(int $id): Int
    {
        return $this->model->destroy($id);
    }
}