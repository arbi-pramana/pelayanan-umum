<?php

return [
    'menu' => [
        // [
        //     'label' => "Dashboard",
        //     'route' => "admin::dashboard",
        //     'icon' => "dashboard"
        // ],
        [
            'label' => "Permohonan Konsumsi",
            'route' => "admin::permohonan-konsumsi.page-list",
            'icon' => "fastfood"
        ],
        
        
        [
            'label' => "Pemesanan Ruangan",
            'route' => "admin::pemesanan-ruangan.page-list",
            'icon' => "meeting_room"
        ],
        
        [
            'label' => "Surat Perintah Jalan",
            'route' => "admin::surat-perintah-jalan.page-list",
            'icon' => "directions_walk"
        ],
        [
            'label' => "Permohonan Pemakaian Kendaraan",
            'route' => "admin::permohonan-pemakaian-kendaraan.page-list",
            'icon' => "directions_car"
        ],
        // [
        //     'label' => "Permohonan Atk",
        //     'route' => "admin::permohonan-atk.page-list",
        //     'icon' => "palette"
        // ],
        [
        'label' => "Data Master",
        'icon' => "format_list_bulleted",
        'childs' => [
                [
                'label' => "Karyawan",
                'route' => "admin::karyawan.page-list",
                'icon' => "face"
                ],
                [
                'label' => "Ruang",
                'route' => "admin::ruang.page-list",
                'icon' => "meeting_room"
                ],
                [
                'label' => "Layout Ruang",
                'route' => "admin::layout-ruang.page-list",
                'icon' => "meeting_room"
                ],
                [
                'label' => "Kendaraan",
                'route' => "admin::kendaraan.page-list",
                'icon' => "directions_car"
                ],
                [
                'label' => "Driver",
                'route' => "admin::driver.page-list",
                'icon' => "face"
                ],
                // [
                // 'label' => "Child Ruang",
                // 'route' => "admin::child-ruang.page-list",
                // 'icon' => "meeting_room"
                // ],
                [
                'label' => "Sumber Dana",
                'route' => "admin::sumber-dana.page-list",
                'icon' => "attach_money"
                ],
                // [
                // // 'label' => "Anggaran Sumber Dana",
                // // 'route' => "admin::anggaran-sumber-dana.page-list",
                // // 'icon' => "money"
                // ],
                // [
                // 'label' => "Barang",
                // 'route' => "admin::barang.page-list",
                // 'icon' => "shopping_cart"
                // ],
                // [
                //     'label' => "Kategori Barang",
                //     'route' => "admin::kategori-barang.page-list",
                //     'icon' => "category"
                // ]
                // [
                //     // 'label' => "Setting",
                //     // 'route' => "admin::setting.page-list",
                //     // 'icon' => "table"
                // ]
            ]
        ]
    ]
];
