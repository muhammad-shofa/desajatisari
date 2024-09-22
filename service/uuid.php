<?php

class uuid
{
    // function generateUUID()
    // {
    //     return trim(com_create_guid(), '{}');
    // }

    function generateUUIDManual()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff), // 32 bits for "time_low"
            mt_rand(0, 0xffff), // 16 bits for "time_mid"
            mt_rand(0, 0x0fff) | 0x4000, // 16 bits for "time_hi_and_version", version 4 (random)
            mt_rand(0, 0x3fff) | 0x8000, // 16 bits for "clk_seq_hi_res", variant 1
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff) // 48 bits for "node"
        );
    }

}

$uuid = new uuid();

