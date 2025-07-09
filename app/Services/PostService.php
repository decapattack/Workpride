<?php

namespace App\Services;

use App\Models\User;
use App\Models\Post;

class PostService
{
    /**
     * Cria um novo post no banco de dados.
     *
     * @param User $user O usurio que est criando o post.
     * @param array $data Os dados validados do post (ttulo, contedo).
     * @return Post O post que foi criado.
     */
    public function createPost(User $user, array $data): Post
    {
        // A lgica de negcio para criar um post fica aqui.
        // No futuro, poderia incluir envio de notificaes, etc.
        return $user->posts()->create($data);
    }
}
