<?php

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

return [
    'accepted'             => '您必须接受。',
    'accepted_if'          => '当 :other 为 :value 时，必须接受。',
    'active_url'           => '不是一个有效的网址。',
    'after'                => '必须要晚于 :date。',
    'after_or_equal'       => '必须要等于 :date 或更晚。',
    'alpha'                => '只能由字母组成。',
    'alpha_dash'           => '只能由字母、数字、短划线(-)和下划线(_)组成。',
    'alpha_num'            => '只能由字母和数字组成。',
    'array'                => '必须是一个数组。',
    'attached'             => '此字段已附加。',
    'before'               => '必须要早于 :date。',
    'before_or_equal'      => '必须要等于 :date 或更早。',
    'between'              => [
        'array'   => '必须只有 :min - :max 个单元。',
        'file'    => '必须介于 :min - :max KB 之间。',
        'numeric' => '必须介于 :min - :max 之间。',
        'string'  => '必须介于 :min - :max 个字符之间。',
    ],
    'boolean'              => '必须为布尔值。',
    'confirmed'            => '两次输入不一致。',
    'current_password'     => '密码错误。',
    'date'                 => '不是一个有效的日期。',
    'date_equals'          => '必须要等于 :date。',
    'date_format'          => '格式必须为 :format。',
    'declined'             => 'This value must be declined.',
    'declined_if'          => 'This value must be declined when :other is :value.',
    'different'            => '必须和 :other 不同。',
    'digits'               => '必须是 :digits 位的数字。',
    'digits_between'       => '必须是介于 :min 和 :max 位的数字。',
    'dimensions'           => '图片尺寸不正确。',
    'distinct'             => '已经存在。',
    'email'                => '不是一个合法的邮箱。',
    'ends_with'            => '必须以 :values 为结尾。',
    'exists'               => '不存在。',
    'file'                 => '必须是文件。',
    'filled'               => '不能为空。',
    'gt'                   => [
        'array'   => '必须多于 :value 个元素。',
        'file'    => '必须大于 :value KB。',
        'numeric' => '必须大于 :value。',
        'string'  => '必须多于 :value 个字符。',
    ],
    'gte'                  => [
        'array'   => '必须多于或等于 :value 个元素。',
        'file'    => '必须大于或等于 :value KB。',
        'numeric' => '必须大于或等于 :value。',
        'string'  => '必须多于或等于 :value 个字符。',
    ],
    'image'                => '必须是图片。',
    'in'                   => '选项无效。',
    'in_array'             => '必须在 :other 中。',
    'integer'              => '必须是整数。',
    'ip'                   => '必须是有效的 IP 地址。',
    'ipv4'                 => '必须是有效的 IPv4 地址。',
    'ipv6'                 => '必须是有效的 IPv6 地址。',
    'json'                 => '必须是正确的 JSON 格式。',
    'lt'                   => [
        'array'   => '必须少于 :value 个元素。',
        'file'    => '必须小于 :value KB。',
        'numeric' => '必须小于 :value。',
        'string'  => '必须少于 :value 个字符。',
    ],
    'lte'                  => [
        'array'   => '必须少于或等于 :value 个元素。',
        'file'    => '必须小于或等于 :value KB。',
        'numeric' => '必须小于或等于 :value。',
        'string'  => '必须少于或等于 :value 个字符。',
    ],
    'max'                  => [
        'array'   => '最多只有 :max 个单元。',
        'file'    => '不能大于 :max KB。',
        'numeric' => '不能大于 :max。',
        'string'  => '不能大于 :max 个字符。',
    ],
    'mimes'                => '必须是一个 :values 类型的文件。',
    'mimetypes'            => '必须是一个 :values 类型的文件。',
    'min'                  => [
        'array'   => '至少有 :min 个单元。',
        'file'    => '大小不能小于 :min KB。',
        'numeric' => '必须大于等于 :min。',
        'string'  => '至少为 :min 个字符。',
    ],
    'multiple_of'          => '必须是 :value 中的多个值。',
    'not_in'               => '选项无效。',
    'not_regex'            => '格式错误。',
    'numeric'              => '必须是一个数字。',
    'password'             => '密码错误',
    'present'              => '必须存在。',
    'prohibited'           => '禁止此字段。',
    'prohibited_if'        => ':other 为 :value 时禁止此字段。',
    'prohibited_unless'    => '除非 :other 在 :values 中，否则禁止此字段。',
    'prohibits'            => '此字段禁止 :other 出现。',
    'regex'                => '格式不正确。',
    'relatable'            => '此字段可能与此资源不相关联。',
    'required'             => '不能为空。',
    'required_if'          => '当 :other 为 :value 时不能为空。',
    'required_unless'      => '当 :other 不为 :values 时不能为空。',
    'required_with'        => '当 :values 存在时不能为空。',
    'required_with_all'    => '当 :values 存在时不能为空。',
    'required_without'     => '当 :values 不存在时不能为空。',
    'required_without_all' => '当 :values 都不存在时不能为空。',
    'same'                 => '必须和 :other 相同。',
    'size'                 => [
        'array'   => '必须为 :size 个单元。',
        'file'    => '大小必须为 :size KB。',
        'numeric' => '大小必须为 :size。',
        'string'  => '必须是 :size 个字符。',
    ],
    'starts_with'          => '必须以 :values 为开头。',
    'string'               => '必须是一个字符串。',
    'timezone'             => '必须是一个合法的时区值。',
    'unique'               => '已经存在。',
    'uploaded'             => '上传失败。',
    'url'                  => '格式不正确。',
    'uuid'                 => '必须是有效的 UUID。',
    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];
