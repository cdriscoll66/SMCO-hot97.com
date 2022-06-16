<?php

namespace App\Http\Controllers\Traits;

use Rareloop\Lumberjack\Helpers;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Http\ServerRequest;
use App\PostTypes\Post;
use Timber\Timber;
use Rareloop\Lumberjack\QueryBuilder;


trait LoadMore
{
    public int $load_more_num_per_page = 10;
    public string $load_more_partial = '';
    public string $load_more_post_type_class = Post::class;
    public array $load_more_additional_context = [];
    public int $postid;




    public function queryOverride($builder) {


        return $builder;
    }



    /**
     * @param ServerRequest $request
     * @return TimberResponse
     * @throws \Rareloop\Lumberjack\Exceptions\TwigTemplateNotFoundException
     */
    public function loadMore($postid = NULL)
    {

        $this->postid = $postid;

        $request = Helpers::request();
        $paged = $request->query('paged');

        $offset = $this->load_more_num_per_page * $paged;
        $context = Timber::get_context();
        $context = $this->load_more_additional_context;
        $context['posts'] = $this->load_more_post_type_class::builder()
            ->offset($offset)
            ->limit($this->load_more_num_per_page);

        $context['posts'] = $this->queryOverride($context['posts']);

        $context['posts'] = $context['posts']->get();

        return new TimberResponse($this->load_more_partial, $context);
    }

    /**
     * @param int $num_pages
     * @return void
     */
    public function set_load_more_num_per_page(int $num_per_page) {
        $this->load_more_num_per_page = $num_per_page;
    }

    /**
     * @param string $partial
     * @return void
     */
    public function set_load_more_partial(string $partial) {
        $this->load_more_partial = $partial;
    }

    /**
     * @param string $class_name
     *  Use `Post::class` to pass in a fully qualified class name of the proper type
     * @return void
     */
    public function set_load_more_post_type_class(string $class_name) {
        $this->load_more_post_type_class = $class_name;
    }

    /**
     * @param array $context
     * @return void
     */
    public function set_load_more_additional_context(array $context) {
        $this->load_more_additional_context = $context;
    }
}
