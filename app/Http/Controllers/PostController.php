<?php

namespace App\Http\Controllers;

// Classes importadas para uso no controller
use App\Models\Post;
use App\Services\PostService;
use App\Http\Requests\StorePostRequest; // O Form Request para validao

class PostController extends Controller
{
    /**
     * O construtor chamado quando o controller instanciado.
     * Usamos a injeo de dependncia do Laravel para obter uma
     * instncia do nosso PostService automaticamente.
     *
     * A sintaxe 'protected PostService $postService' uma promoo de
     * propriedade do construtor (PHP 8+), que declara e inicializa a
     * propriedade na mesma linha.
     */
    public function __construct(protected PostService $postService)
    {
    }

    /**
     * Exibe uma lista de todos os posts.
     * Responsvel pela pgina principal do blog.
     */
    public function index()
    {
        // Busca os posts mais recentes, com paginao.
        $posts = Post::latest()->paginate(10);

        // Retorna a view 'index' e passa a varivel 'posts' para ela.
        return view("posts.index", ["posts" => $posts]);
    }

    /**
     * Exibe um nico post especfico e seus comentrios.
     */
    public function show(Post $post)
    {
        // O Laravel usa "Route Model Binding" para encontrar o post pelo ID na URL.
        // Carregamos os relacionamentos para evitar o problema de N+1 queries.
        $post->load("comentarios.user");

        // Retorna a view 'show' e passa o post encontrado.
        return view("posts.show", ["post" => $post]);
    }

    /**
     * Mostra o formulrio para criar um novo post.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Armazena um novo post no banco de dados.
     * Este mtodo chamado quando o formulrio de criao enviado.
     */
    public function store(StorePostRequest $request)
    {
        // 1. VALIDAO E AUTORIZAO:
        // O Laravel executa automaticamente a validao e autorizao
        // definidas em 'StorePostRequest' antes de executar este cdigo.
        // Se falhar, o usurio redirecionado de volta com os erros.

        // 2. LGICA DE NEGCIO:
        // Chamamos nosso servio, passando o usurio autenticado e
        // apenas os dados que foram validados pelo Form Request.
        $this->postService->createPost($request->user(), $request->validated());

        // 3. RESPOSTA HTTP:
        // A responsabilidade do controller retornar a resposta correta.
        // Neste caso, redirecionamos para a lista de posts com uma mensagem de sucesso.
        return redirect()
            ->route("posts.index")
            ->with("success", "Post criado com sucesso!");
    }
}
