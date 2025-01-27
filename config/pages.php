<?php
return [
    "dashboard" => [
        "route" => "dashboard",
        "trans" => "pages.dashboard.title_singular",
        "parent" => true
    ],
    "permissions" => [
        "index" => [
            "namespace" => "permissions.",
            "route" => "permissions.index",
            "trans" => "pages.permissions.title",
            "parent" => true
        ],
    ],
    "roles" => [
        "index" => [
            "namespace" => "roles.",
            "route" => "roles.index",
            "trans" => "pages.roles.title",
            "parent" => true
        ],
        "create" => [
            "namespace" => "roles.",
            "route" => "roles.create",
            "trans" => "global.create",
            "parent" => false
        ],
        "edit" => [
            "namespace" => "users.",
            "route" => "roles.edit",
            "trans" => "global.edit",
            "parent" => false
        ],
        "show" => [
            "namespace" => "roles.",
            "route" => "roles.show",
            "trans" => "global.show",
            "parent" => false
        ],
    ],
    "users" => [
        "index" => [
            "namespace" => "users.",
            "route" => "users.index",
            "trans" => "pages.users.title",
            "parent" => true
        ],
        "create" => [
            "namespace" => "users.",
            "route" => "users.create",
            "trans" => "global.create",
            "parent" => false
        ],
        "edit" => [
            "namespace" => "users.",
            "route" => "users.edit",
            "trans" => "global.edit",
            "parent" => false
        ],
        "show" => [
            "namespace" => "users.",
            "route" => "users.show",
            "trans" => "global.show",
            "parent" => false
        ],
    ],
    "support_ticket" => [
        "index" => [
            "namespace" => "support_ticket.",
            "route" => "support_ticket.index",
            "trans" => "support_ticket.title",
            "parent" => true
        ],
        "create" => [
            "namespace" => "support_ticket.",
            "route" => "support_ticket.create",
            "trans" => "global.create",
            "parent" => false
        ],
        "edit" => [
            "namespace" => "support_ticket.",
            "route" => "users.edit",
            "trans" => "global.edit",
            "parent" => false
        ],
        "show" => [
            "namespace" => "support_ticket.",
            "route" => "support_ticket.show",
            "trans" => "global.show",
            "parent" => false
        ],
    ]
];
