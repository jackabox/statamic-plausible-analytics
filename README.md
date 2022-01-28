# Plausible Analytics for Statamic

A wrapper around the Plausible API that fetches the analytics into your dashboard in a pretty way.

## Setup

Install the addon.

```bash
composer require jackabox/statamic-plausible-analytics
```

Publish the assets

```bash
php artisan vendor:publish --provider="Jackabox\Plausible\PlausibleServiceProvider"
```

Then follow the steps in the config step bellow.

## Config

1. Head to your [Plausible Settings](https://plausible.io/settings).
2. Scroll down to API key and generate a new one. Name it whatever you like.
3. Copy that value into your `.env` as `PLAUSIBLE_KEY`.
4. If you're self hosting Plausible, add the config option for `PLAUSIBLE_DOMAIN` in your `.env`
5. Get your site as displayed in your Plausible Dashboard (e.g. jackwhiting.co.uk). Add that value to your `.env` as `PLAUSIBLE_SITE`.
6. Data should load.

For more customisation you can publish the config and adjust the values as you wish.

```bash
php artisan vendor:publish --tag=plausible-config
```

By default, all results from the API are cached. This can be overwritten, but I didn't want to spam to the API.

## Issues

If there are any problems with getting this to work, please open an issue on GitHub. If you have any ideas/want to discuss new features please use the discussions feature :)
