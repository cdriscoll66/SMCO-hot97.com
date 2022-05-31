<?php

namespace App\Providers;

use Rareloop\Lumberjack\Providers\ServiceProvider;
use App\Helpers\Theme;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any app specific items into the container
     */
    public function register()
    {
    }

    /**
     * Perform any additional boot required for this application
     */
    public function boot()
    {
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/aca2737e74.js', [], false);

            wp_enqueue_style('lumberjack/theme.css', Theme::mix('/styles/theme.css'), [], false);
            wp_enqueue_script('lumberjack/theme.js', Theme::mix('/scripts/theme.js'), ['jquery'], false, true);

            wp_enqueue_style('lumberjack/print.css', Theme::mix('/styles/print.css'), [], false, 'print');

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
        }, 100);

        add_action('login_enqueue_scripts', function () {
            wp_enqueue_style('lumberjack/login.css', Theme::mix('/styles/login.css'), [], false);
        });

        add_action('enqueue_block_editor_assets', function () {
            wp_enqueue_style('lumberjack/admin.css', Theme::mix('/styles/admin.css'), [], false);
        });

        add_action('enqueue_block_editor_assets', function () {
            wp_enqueue_script('lumberjack/blocks.js', Theme::mix('/scripts/blocks.js'), ['wp-blocks', 'wp-dom'], false, true);
            wp_localize_script('lumberjack/blocks.js', 'blocksAllowed', apply_filters('colab_blocks_localized_data', []));
        });
    }
}
