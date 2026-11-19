<?php

return [
    'accepted'  => ':attribute অবশ্যই গ্রহণ করতে হবে।',
    'array'     => ':attribute অবশ্যই একটি তালিকা হতে হবে।',
    'boolean'   => ':attribute অবশ্যই সত্য বা মিথ্যা হতে হবে।',
    'date'      => ':attribute একটি বৈধ তারিখ নয়।',
    'email'     => ':attribute অবশ্যই একটি বৈধ ইমেইল ঠিকানা হতে হবে।',
    'exists'    => 'নির্বাচিত :attribute বৈধ নয়।',
    'file'      => ':attribute অবশ্যই একটি ফাইল হতে হবে।',
    'filled'    => ':attribute ক্ষেত্রে অবশ্যই একটি মান থাকতে হবে।',
    'image'     => ':attribute অবশ্যই একটি ছবি হতে হবে।',
    'in'        => 'নির্বাচিত :attribute বৈধ নয়।',
    'integer'   => ':attribute অবশ্যই একটি পূর্ণসংখ্যা হতে হবে।',
    'numeric'   => ':attribute অবশ্যই একটি সংখ্যা হতে হবে।',
    'regex'     => ':attribute-এর ফরম্যাট সঠিক নয়।',
    'required'  => ':attribute ক্ষেত্রটি পূরণ করা আবশ্যক।',
    'string'    => ':attribute অবশ্যই টেক্সট হতে হবে।',
    'unique'    => ':attribute ইতিমধ্যে ব্যবহার করা হয়েছে।',
    'url'       => ':attribute অবশ্যই একটি বৈধ লিংক হতে হবে।',

    'max' => [
        'numeric' => ':attribute :max এর বেশি হতে পারবে না।',
        'file'    => ':attribute :max কিলোবাইটের বেশি হতে পারবে না।',
        'string'  => ':attribute :max অক্ষরের বেশি হতে পারবে না।',
        'array'   => ':attribute-এ :max টির বেশি আইটেম থাকতে পারবে না।',
    ],
    'min' => [
        'numeric' => ':attribute কমপক্ষে :min হতে হবে।',
        'file'    => ':attribute কমপক্ষে :min কিলোবাইট হতে হবে।',
        'string'  => ':attribute কমপক্ষে :min অক্ষরের হতে হবে।',
        'array'   => ':attribute-এ কমপক্ষে :min টি আইটেম থাকতে হবে।',
    ],

    'custom' => [],

    'attributes' => [
        'name'         => 'নাম',
        'phone'        => 'ফোন নম্বর',
        'email'        => 'ইমেইল',
        'service_type' => 'সার্ভিসের ধরন',
        'budget'       => 'বাজেট',
        'message'      => 'বার্তা',
    ],
];
