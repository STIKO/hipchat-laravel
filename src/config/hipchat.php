<?php
return array(
    /*
    |--------------------------------------------------------------------------
    | HipChat Url
    |--------------------------------------------------------------------------
    */
    'url' => env('HIPCHAT_URL'),
    /*
    |--------------------------------------------------------------------------
    | HipChat API Token
    |--------------------------------------------------------------------------
    |
    | Required API Token from HipChat
    |
    */
    'token' => env('HIPCHAT_TOKEN'), // this is required

    /*
    |--------------------------------------------------------------------------
    | HipChat Default Message color
    |--------------------------------------------------------------------------
    |
    | Available options
    |
    |  yellow, green, red, purple, gray, random.
    |
    */
    'color' => 'green',
    /*
   |--------------------------------------------------------------------------
   | HipChat Default Notify
   |--------------------------------------------------------------------------
   | Sends a notification to room users if set to true (default).
   */
    'notify' => true,
    /*
    |--------------------------------------------------------------------------
    | HipChat Default Message Format
    |--------------------------------------------------------------------------
    |
    | Available options
    |
    | html - Message is rendered as HTML and receives no special treatment. Must be valid HTML and entities must be escaped (e.g.: '&amp;' instead of '&').
    |        May contain basic tags: a, b, i, strong, em, br, img, pre, code, lists, tables. Please see below for a list of allowed tags and attributes.
    | text - Message is treated just like a message sent by a user. Can include @mentions, emoticons, pastes, and auto-detected URLs (Twitter, YouTube, images, etc).
    |
    */
    'message_format' => 'text',
    /*
    |--------------------------------------------------------------------------
    | HipChat Default Message
    |--------------------------------------------------------------------------
    */
    'message' => 'My first notification (yey)'
);