<?php

namespace App\Http;

use Rareloop\Lumberjack\Http\Lumberjack as LumberjackCore;
use App\Menu\Menu;

class Lumberjack extends LumberjackCore
{
    public function addToContext($context)
    {
        $context['is_home'] = is_home();
        $context['is_front_page'] = is_front_page();
        $context['is_logged_in'] = is_user_logged_in();
        $context['posts_per_page'] = get_option('posts_per_page');
        $context['is_admin'] = is_admin();

        global $paged;
        $context['paged'] = $paged;

        // In Timber, you can use TimberMenu() to make a standard Wordpress menu available to the
        // Twig template as an object you can loop through. And once the menu becomes available to
        // the context, you can get items from it in a way that is a little smoother and more
        // versatile than Wordpress's wp_nav_menu. (You need never again rely on a
        // crazy "Walker Function!")
        $context['menu'] = new Menu('main-nav');
        $context['main_menu'] = new Menu('main-nav');
        $context['utility_menu'] = new Menu('utility-nav');
        $context['mobile_menu'] = new Menu('mobile-nav');
        $context['footer_menu'] = new Menu('footer-nav');
        $context['footer_secondary_menu'] = new Menu('footer-secondary-nav');
        $context['footer_utility_menu'] = new Menu('footer-utility-nav');
        $context['home_url'] = home_url();
        $context['site_title'] = get_bloginfo('name');
        $context['search_query'] = get_search_query();
        $context['posts_per_page'] = get_option('posts_per_page');
        $context['flexible_cta'] = get_field('flexible_header_cta', 'options');

        return $context;
    }
}
