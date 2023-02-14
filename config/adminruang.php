<?php

return [
    'menu' => [
        [
            'label' => "Dashboard",
            'route' => "admin::dashboard",
            'icon' => "dashboard"
        ],
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
        
        // [
        //     'label' => "Surat Perintah Jalan",
        //     'route' => "admin::surat-perintah-jalan.page-list",
        //     'icon' => "directions_walk"
        // ],
        // [
        //     'label' => "Permohonan Pemakaian Kendaraan",
        //     'route' => "admin::permohonan-pemakaian-kendaraan.page-list",
        //     'icon' => "directions_car"
        // ],
        // [
        //     'label' => "Permohonan Atk",
        //     'route' => "admin::permohonan-atk.page-list",
        //     'icon' => "palette"
        // ],
    ]
];
