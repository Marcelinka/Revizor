<?php

    // Создаем тип постов `services`
    add_action('init', 'register_service_post_type');

    function register_service_post_type(){
        register_post_type('services', array(
            'label'  => null,
            'labels' => array(
                'name'               => 'Услуги', // основное название для типа записи
                'singular_name'      => 'Услуга', // название для одной записи этого типа
                'add_new'            => 'Добавить услугу', // для добавления новой записи
                'add_new_item'       => 'Добавление услуги', // заголовка у вновь создаваемой записи в админ-панели.
                'edit_item'          => 'Редактирование услуги', // для редактирования типа записи
                'new_item'           => 'Новая услуга', // текст новой записи
                'view_item'          => 'Смотреть услугу', // для просмотра записи этого типа.
                'search_items'       => 'Искать услугу', // для поиска по этим типам записи
                'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
                'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
                'parent_item_colon'  => '', // для родителей (у древовидных типов)
                'menu_name'          => 'Услуги', // название меню
            ),
            'description'         => '',
            'public'              => true,
            'show_in_menu'        => true, // показывать ли в меню адмнки
            'show_in_nav_menus'   => true,
            'menu_position'       => 7,
            'menu_icon'           => 'dashicons-cart', 
            'hierarchical'        => false,
            'supports'            => array('title','custom-fields'),
            'has_archive'         => true,
            'rewrite'             => true,
            'query_var'           => true,
        ) );
    }
    
?>