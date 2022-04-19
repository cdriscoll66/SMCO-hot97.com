const config = {
  host: 'hot97.lndo.site',
  sourcePath: 'assets',
  publicPath: 'dist',
};

/** TODO: fix svg sprite */
// const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');

const mix = require('laravel-mix');
const { exit } = require('browser-sync');
require('laravel-mix-imagemin');

// Set Public Path
mix.setPublicPath(config.publicPath);

/** Path Helpers */
const sourcePath = path => `${config.sourcePath}/${path}`;
const publicPath = path => `${mix.config.publicPath}/${path}`;

/** BrowserSync */
mix.browserSync({
  open: false,
  host: config.host,
  socket: {
    domain: 'sync-' + config.host,
  },
  files: [
    config.publicPath + '/styles/*.css',
    config.publicPath + '/scripts/*.js',
    'views/**/*.*'
  ],
  proxy: {
    target: 'http://appserver_nginx'
  }
});

/** Styles */
mix.sass(sourcePath('styles/admin.scss'), publicPath('styles'));
mix.sass(sourcePath('styles/editor.scss'), publicPath('styles'));
mix.sass(sourcePath('styles/login.scss'), publicPath('styles'));
mix.sass(sourcePath('styles/print.scss'), publicPath('styles'));
mix.sass(sourcePath('styles/theme.scss'), publicPath('styles'));

/** Scripts */
mix.js(sourcePath('scripts/blocks.js'), publicPath('scripts'));
mix.js(sourcePath('scripts/theme.js'), publicPath('scripts'));

/** Images */
mix.imagemin(
  { // CopyWebpackPlugin patterns
    context: sourcePath('images'),
    from: '**',
    to: 'images'
  },
  {}, // CopyWebpackPlugin options
  { // ImageminWebpackPlugin options
    test: /\.(jpe?g|png|gif)$/i,
    svgo: null,
  }
);

/** Fonts */
mix.copyDirectory(sourcePath('fonts'), publicPath('fonts'));

/** Options */
mix.options({
  postCss: [require('postcss-svg')],
  processCssUrls: false,
  cssNano: {
    calc: false,
    mergeRules: false
  }
});

/** webpack */
mix.webpackConfig({
  externals: {
    jquery: 'jQuery'
  },
  /** TODO: fix svg sprite */
  // plugins: [
  //   new SVGSpritemapPlugin(sourcePath('images/spritemap/**/*.svg'), {
  //     output: {
  //       filename: 'images/spritemap.svg',
  //       svg4everybody: false,
  //       svgo: true,
  //     },
  //     sprite: {
  //       prefix: false,
  //       gutter: 0,
  //     }
  //   })
  // ]
});

/** Source Maps */
mix.sourceMaps();

// Hash and version files.
mix.version();
