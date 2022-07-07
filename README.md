# Hot 97 FM README

## Project Description

This is the website for Hot 97 FM. The site feeds data into the corresponding mobile app that was built by Shockoe.

## Project Team

- Project Manager: Nora
- UX Strategist: Tyler
- UX/UI Designer: Cesley
- Software Engineer: Francis
- Web Developer: John, Conor, J
- QA Analyst: TC

## Cache Clearing

 1. Hosting: Clear cache from the Pantheon admin dashboard
 2. Cloudflare: Cloudflare has not yet been setup, but once it has this cache can be cleared using the WP plugin

## Hosting

- [Pantheon Dashboard](https://dashboard.pantheon.io/sites/78fbe0f0-bf72-4782-ba1d-4a4f12ee32e8)

### Environments

| Name    | Platform Domain / URL                           | Custom Domain / URL             |
|:--------|:------------------------------------------------|:--------------------------------|
| LIVE    | https://live-hot97.pantheonsite.io/             | https://www.hot97.com/          |
| BETA    | https://live-hot97.pantheonsite.io/             | https://beta.hot97.com/         |
| API     | https://live-hot97.pantheonsite.io/             | https://api.hot97.com/          |
| TEST    | https://test-hot97.pantheonsite.io/             |                                 |
| DEV     | https://dev-hot97.pantheonsite.io/              |                                 |
| UPDATES | https://updates-hot97.pantheonsite.io/          |                                 |
| RELEASE | https://release-hot97.pantheonsite.io/          |                                 |
| DEVELOP | https://develop-hot97.pantheonsite.io/          |                                 |
| LOCAL   | https://hot97.lndo.site/                        |                                 |

## Running this site

This site uses Lando for containerization and Laravel Mix for builds. This WordPress site was built using Lumberjack.

### Getting Started
 1. Run `lando start`
 2. Run `lando pull --code=none --database=live --files=none`

### Compiling Styles and Scripts

A production build should always be run before styles and scripts are committed to a repo.

These commands should be configured to run an `npm install` before it tries to compile. Check the `.lando.yml` for project specific configuration.

- Run `lando prod`, production build of assets
- Run `lando watch`, developnent build of assets, watch for file changes and continuously compile<br>

## Functionality

### Business Critical
**What will stop business if this feature is not working**

 - [Example](https://www.example.com/): visitors must be able to perform X
 - [Example](https://www.example.com/): visitors must be able to submit this form
 - Links to offsite client login (https://www.example.com/)

### Other Functionality
**What were the custom things that are likely to break on modification/updates**

- [Example](https://live-hot97.pantheonsite.io/wp-admin/admin.php?page=app-config): This field data feeds into both the hompage and the mobile app.

### Key Layouts
**What are the key layouts**

 - [Home Page](https://live-hot97.pantheonsite.io/)
 - [Default Page](https://live-hot97.pantheonsite.io/intern-with-hot-97)
 - [Post Archive](https://live-hot97.pantheonsite.io/blog)
 - [Post Single (Read)](https://live-hot97.pantheonsite.io/news/hot-news/big-sean-jhene-aiko-expecting-first-child-together)
 - [Post Single (Watch)](https://live-hot97.pantheonsite.io/news/interviews/cardi-b-talks-new-single-hot-ish-strip-clubs-lil-kim-collab-more-w-nessa)
 - [Watch Archive](https://live-hot97.pantheonsite.io/watch)
 - [Read Archive](https://live-hot97.pantheonsite.io/read)
 - [Talent Archive](https://live-hot97.pantheonsite.io/talent)
 - [Listen Live](https://beta.hot97.com/listen-live)
 - [Category (term) Archive](https://beta.hot97.com/category/news/hot-news)
 - [Tag (term) Archive](https://beta.hot97.com/tag/news)

### 3rd Party Dependencies
List of services and licenses required by the site

#### Service Dependencies
 - FontAwesome Pro
 - iOne Digital Ads
 - JW Player (video player)
 - Triton (audio streaming)

#### Required Licenses
 - Advanced Custom Fields Pro
 - WP Mail SMTP

## Key Documentation

### COLAB Project Related Documentation

- [iOne Digital Ads](https://docs.google.com/document/d/179SLqPnxV9CElYLNenicN1OC53cCbLHZXYyfxLDNy10/edit)
- [Strategic Road Map](https://docs.google.com/document/d/1vmY7WrL2bkcISb4R7H2_gxTzYgfzfj-eTia8W_X4vPo/edit)
- [Running Meeting Notes](https://docs.google.com/document/d/1bN1FXgApGE30aacpCKSy2ALMq054fp76ByxowqMBQcs/edit)

### Technologies Documentation

- [Platform README](https://pantheon.io/docs/)
- [Lumberjack](https://docs.lumberjack.rareloop.com/)
- [Laravel Mix](https://laravel-mix.com/)
