'use strict';

module.exports = {
    name      : 'OAuth Resources',
    synopsis  : '',
    endpoints : [
        {
            name     : 'Authorize',
            synopsis : 'Authorize via OAuth',
            method   : 'GET',
            uri      : '/oauth/authorize',
            oauth    : false,
            params   : []
        },
        {
            name     : 'Authorize Submit',
            synopsis : 'Second step for iodocs to authorize via OAuth',
            method   : 'GET',
            uri      : '/oauth/authorize-submit',
            oauth    : false,
            params   : []
        },
        {
            name     : 'Get Token',
            synopsis : 'Ask for an OAuth token',
            method   : 'POST',
            uri      : '/oauth/token',
            oauth    : true,
            params   : [
                {
                    name         : 'username',
                    required     : true,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'User\'s username'
                },
                {
                    name         : 'password',
                    required     : true,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'User\'s password'
                },
                {
                    name         : 'grant_type',
                    required     : true,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'Must be: password'
                },
                {
                    name         : 'client_id',
                    required     : true,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'OAuth Client ID of the application'
                }
            ]
        },
        {
            name     : 'Logout',
            synopsis : 'Log out of the application',
            method   : 'POST',
            uri      : '/oauth/logout',
            oauth    : true,
            params   : [
                {
                    name         : 'refresh_token',
                    required     : true,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'The refresh token assigned to the user upon login'
                }
            ]
        }
    ]
};
