<?php

namespace App\Http\Controllers\Traits;

use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Http\ServerRequest;
use App\PostTypes\Post;
use Timber\Timber;

trait LoadMore
{
    public int $load_more_num_per_page = 10;
    public string $load_more_partial = '';
    public string $load_more_post_type_class = Post::class;
    public array $load_more_additional_context = [];

    /**
     * @param ServerRequest $request
     * @return TimberResponse
     * @throws \Rareloop\Lumberjack\Exceptions\TwigTemplateNotFoundException
     */
    public function loadMore(ServerRequest $request)
    {
        $paged = $request->query('paged');
        $offset = $this->load_more_num_per_page * $paged;
        $context = Timber::get_context();
        $context = array_merge($context, $this->load_more_additional_context);
        $context['posts'] = $this->load_more_post_type_class::builder()
            ->offset($offset)
            ->limit($paged)
            ->get();

        // return $context;
        return new TimberResponse($this->load_more_partial, $context);
    }

    /**
     * @param int $num_pages
     * @return void
     */
    public function set_load_more_num_per_page(int $num_pages) {
        $this->load_more_num_per_page = $num_pages;
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
