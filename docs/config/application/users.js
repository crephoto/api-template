'use strict';

module.exports = {
    name      : 'Users',
    endpoints : [
        {
            name     : 'Create User',
            synopsis : 'Create a user',
            method   : 'POST',
            uri      : '/users',
            oauth    : false,
            params   : [
                {
                    name         : 'email',
                    required     : true,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'Email address'
                },
                {
                    name         : 'password',
                    required     : true,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'Password to be assigned to the user'
                }
            ]
        },
        {
            name     : 'Get User',
            synopsis : 'Get current user\'s data',
            method   : 'GET',
            uri      : '/user',
            oauth    : true,
            params   : []
        },
        {
            name     : 'Edit User',
            synopsis : 'Edit current user\'s data',
            method   : 'PUT',
            uri      : '/user',
            oauth    : true,
            params   : [
                {
                    name         : 'email',
                    required     : false,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'New email address'
                },
                {
                    name         : 'password',
                    required     : false,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'New password'
                },
                {
                    name         : 'current_password',
                    required     : false,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'Current password, required if email or password are being updated'
                }
            ]
        },
        {
            name     : 'Verify Registration',
            synopsis : 'Verify a user\'s registration',
            method   : 'POST',
            uri      : '/users/:userId/verify-registration',
            oauth    : true,
            params   : [
                {
                    name         : 'userId',
                    required     : true,
                    defaultValue : '',
                    type         : 'integer',
                    description  : 'User ID'
                },
                {
                    name         : 'token',
                    required     : true,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'The user\'s verification token, sent via email upon account registration'
                }
            ]
        },
        {
            name     : 'Request Password Reset',
            synopsis : 'Request a password reset for a user',
            method   : 'POST',
            uri      : '/user/reset-password',
            oauth    : true,
            params   : [
                {
                    name         : 'email',
                    required     : true,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'User\'s email address'
                }
            ]
        },
        {
            name     : 'Reset Password',
            synopsis : 'Reset a password',
            method   : 'PUT',
            uri      : '/user/reset-password',
            oauth    : true,
            params   : [
                {
                    name         : 'token',
                    required     : true,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'The user\'s password reset token, sent via email when password reset was requested'
                },
                {
                    name         : 'password',
                    required     : true,
                    defaultValue : '',
                    type         : 'string',
                    description  : 'The new password'
                }
            ]
        }
    ]
};
