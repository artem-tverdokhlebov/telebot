<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a file stored on the Telegram servers. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file.
 * 
 * @property String                    $type                        Type of the result, must be document
 * @property String                    $id                          Unique identifier for this result, 1-64 bytes
 * @property String                    $title                       Title for the result
 * @property String                    $document_file_id            A valid file identifier for the file
 * @property String                    $description                 _Optional_. Short description of the result
 * @property String                    $caption                     _Optional_. Caption of the document to be sent, 0-1024 characters after entities parsing
 * @property String                    $parse_mode                  _Optional_. Mode for parsing entities in the document caption. See formatting options for more details.
 * @property InlineKeyboardMarkup      $reply_markup                _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent       $input_message_content       _Optional_. Content of the message to be sent instead of the file
 * 
 * @package WeStacks\TeleBot\Objects\InlineQueryResult
 */
class InlineQueryResultCachedDocument extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type'                  => 'string',
            'id'                    => 'string',
            'title'                 => 'string',
            'document_file_id'      => 'string',
            'description'           => 'string',
            'caption'               => 'string',
            'parse_mode'            => 'string',
            'reply_markup'          => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}