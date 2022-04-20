<?php

return [
    'userManagement' => [
        'title'          => 'Пользователи',
        'title_singular' => 'Пользователи',
    ],
    'permission' => [
        'title'          => 'Разрешения',
        'title_singular' => 'Разрешение',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Роли',
        'title_singular' => 'Роль',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Пользователи',
        'title_singular' => 'Пользователь',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'language' => [
        'title'          => 'Languages',
        'title_singular' => 'Language',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'language'          => 'language',
            'language_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'client' => [
        'title'          => 'Clients',
        'title_singular' => 'Client',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'name_client'         => 'Name Client',
            'name_client_helper'  => ' ',
            'email_client'        => 'Email Client',
            'email_client_helper' => ' ',
            'phone'               => 'Phone',
            'phone_helper'        => ' ',
            'client_user'         => 'Client User',
            'client_user_helper'  => ' ',
            'address'             => 'Address',
            'address_helper'      => ' ',
            'info_client'         => 'Info Client',
            'info_client_helper'  => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'order' => [
        'title'          => 'Orders',
        'title_singular' => 'Order',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'typepay'              => 'typepay',
            'typepay_helper'       => ' ',
            'status'               => 'Status',
            'status_helper'        => ' ',
            'start_time'           => 'Start Time',
            'start_time_helper'    => ' ',
            'end_time'             => 'End Time',
            'end_time_helper'      => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'client_order'         => 'Client Order',
            'client_order_helper'  => ' ',
            'clients_many'         => 'Clients Many',
            'clients_many_helper'  => ' ',
            'clients_pages'        => 'Clients Pages',
            'clients_pages_helper' => ' ',
            'languages_s'          => 'Languages S',
            'languages_s_helper'   => ' ',
            'languages_na'         => 'Languages Na',
            'languages_na_helper'  => ' ',
            'product'              => 'Product',
            'product_helper'       => ' ',
        ],
    ],
    'notarization' => [
        'title'          => 'Notarization',
        'title_singular' => 'Notarization',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'name_document'          => 'Name Document',
            'name_document_helper'   => ' ',
            'client_docum'           => 'Client Docum',
            'client_docum_helper'    => ' ',
            'status_docum'           => 'Status Docum',
            'status_docum_helper'    => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'seal_translator'        => 'Seal Translator',
            'seal_translator_helper' => ' ',
        ],
    ],
    'translator' => [
        'title'          => 'Translators',
        'title_singular' => 'Translator',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'translator'             => 'Translator',
            'translator_helper'      => ' ',
            'translator_lang'        => 'Translator Lang',
            'translator_lang_helper' => ' ',
            'number_card'            => 'Number Card',
            'number_card_helper'     => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'created_by'             => 'Created By',
            'created_by_helper'      => ' ',
            'fio'                    => 'Fio',
            'fio_helper'             => ' ',
            'info'                   => 'Info',
            'info_helper'            => ' ',
        ],
    ],
    'primer' => [
        'title'          => 'Primer',
        'title_singular' => 'Primer',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'originalr_o'        => 'OriginalirO',
            'originalr_o_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
            'type'               => 'Type',
            'type_helper'        => ' ',
        ],
    ],
    'schet' => [
        'title'          => 'Schet',
        'title_singular' => 'Schet',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'klient_name'         => 'klient_name',
            'klient_name_helper'  => ' ',
            'nomenclatura'        => 'Nomenclatura',
            'nomenclatura_helper' => ' ',
            'kol_vo'              => 'Kol Vo',
            'kol_vo_helper'       => ' ',
            'stoimost'            => 'Stoimost',
            'stoimost_helper'     => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Product',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'name_file'              => 'Name File',
            'name_file_helper'       => ' ',
            'translator'             => 'Translator',
            'translator_helper'      => ' ',
            'translator_page'        => 'Translator Page',
            'translator_page_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
];