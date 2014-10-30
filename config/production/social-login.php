<?php

/**
 * Settings
 * ========
 *
 * redirect-url The URL users will be redirected to after the callback handles the response of the OAuth provider
 *
 * provider     (See below for list of available providers)
 *
 *     key            The client id of the application registered with this OAuth provider
 *
 *     secret         The client secret of the application registered with this OAuth provider
 *
 *     callback_route The route of this application to specify as the callback for this OAuth request
 *
 *     scope          An array of scopes to request access to from the social login provider.
 *                    See OAuth\OAuth2\Service\* where * is the name of the provider. Each class contain a
 *                    constant for each scope option.
 *
 * Available Providers:
 *     'amazon'
 *     'bitbucket'
 *     'bitly'
 *     'box'
 *     'dailymotion'
 *     'dropbox'
 *     'etsy'
 *     'facebook'
 *     'fitbit'
 *     'flickr'
 *     'github'
 *     'google'
 *     'harvest'
 *     'heroku'
 *     'instagram'
 *     'linkedin'
 *     'mailchimp'
 *     'microsoft'
 *     'paypal'
 *     'reddit'
 *     'runkeeper'
 *     'salesforce'
 *     'soundcloud'
 *     'tumblr'
 *     'twitter'
 *     'vkontakte'
 *     'xing'
 *     'yammer'
 */

return [
    'redirect-url' => null,
];
