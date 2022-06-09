# Environment Specific Overrides

- [Environment Specific Overrides](#environment-specific-overrides)
  - [Quick Guide](#quick-guide)
  - [What?](#what)
  - [Why?](#why)
    - [No, really. Why?](#no-really-why)
  - [How?](#how)
    - [Elaborate](#elaborate)


## Quick Guide

1. Download and place into plugins directory
2. Run `composer install` inside the directory
3. Unless you're going to use the fields they provide, remove the acf JSON files within `/json/acf`
   1. The fields provided by default are for Pantheon environments and miniOrange SSO Premium config options
4. Follow the template outlined on [Elaborate](#elaborate) to create your own overrides

## What?

This module provides a template for overriding configuration options with other configuration options, based on the environment.

## Why?

During the development, deployment, and maintenance workflow there is the potential for configurations that have been set on one environment to be pulled onto another environment during database migration, like pulling LIVE down to TEST and DEV.

Sometimes those configurations are environment sensitive and overwrites could break functionality between environments.  Sometimes the configurations are sensitive and should not be a part of the codebase.

### No, really. Why?

####Example: miniOrange SSO Premium

Depending on how the provider metadata is set up by the client, it is possible that 3-4 fields within the miniOrange SSO Premium plugin will have environment specific information.

Here are the names on the `wp_options` table
- `saml_login_url`
- `saml_logout_url`
- `saml_issuer`
- `saml_x509_certificate`

If the `saml_x509_certificate` on LIVE gets placed onto TEST, SSO will fail to work on TEST.

We could do a simple switch statement via code and store the possible options in the module, but ACF allows us to store the sensitive info in the database and we reference that instead of  code.

## How?

This module prevents needing to add potentially sensitive information to the codebase by providing ACF option fields for each variation and then overridding the real option field using the `add_filter('pre_option_{$option}', $newValue)` filter and hook.

This filter will fire every time that particular option is needed.

_Note: ^ This will make testing and troubleshooting difficult if the plugin is not activated on your local, like in the case of miniOrange._

### Elaborate

In the case of miniOrange SSO:

1. Set up ACF Field groups for each possible environment:
`LIVE`, `TEST`, `DEV`, `LOCAL/MULTIDEVS`
2. Inside each group are fields named the same as the option they're overwriting
   - _Note: When creating your own set, it's often easiest to set up one environment completely with all its fields and just clone it and rename the group_
3. Export your ACF fieldset and put them in the `json/acf` directory of the module so it loads automatically on each newly installed environment
   1. Remove any others that may be in the directory you don't need
4. In src/EnvironmentSpecificOverrides/Overrides.php add a `public static function` built to handle this specific plugin's overrides
5. Massage your function to return the value from your newly created ACF field(s)
6. On `environment-specific-overrides.php` under the **Filters** section add filters for each and refer to the Class::function you just created
   1. `add_filter("pre_option_{$option}", [ Class::class, 'functionName' ] );`
   2. `add_filter( "pre_option_saml_issuer", [ Overrides::class, 'miniOrangeReplacement' ] );`