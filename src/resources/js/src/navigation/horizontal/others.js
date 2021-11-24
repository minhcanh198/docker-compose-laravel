export default [
    {
        header: 'Others',
        icon: 'MoreHorizontalIcon',
        children: [
            {
                title: 'Access Control',
                route: 'access-control',
                icon: 'ShieldIcon',
                // acl: {
                action: 'read',
                resource: 'ACL',
                // },
            },
            {
                title: 'Menu Levels',
                icon: 'MenuIcon',
                children: [
                    {
                        title: 'Menu Level 2.1',
                        route: null,
                    },
                    {
                        title: 'Menu Level 2.2',
                        children: [
                            {
                                title: 'Menu Level 3.1',
                                route: null,
                            },
                            {
                                title: 'Menu Level 3.2',
                                route: null,
                            },
                        ],
                    },
                ],
            },
            {
                title: 'Disabled Menu',
                route: null,
                icon: 'EyeOffIcon',
                disabled: true,
            },
            {
                title: 'Raise Support',
                href: 'https://pixinvent.ticksy.com/',
                icon: 'LifeBuoyIcon',
            },
            {
                title: 'Documentation',
                href: 'https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/documentation',
                icon: 'FileTextIcon',
            },
            {
                title: 'Typography',
                route: 'ui-typography',
                icon: 'TypeIcon',
            },
            {
                title: 'Colors',
                route: 'ui-colors',
                icon: 'DropletIcon',
            },
            {
                title: 'Feather',
                route: 'ui-feather',
                icon: 'EyeIcon',
            },
            {
                title: 'Cards',
                icon: 'CreditCardIcon',
                children: [
                    {
                        title: 'Basic',
                        route: 'card-basic',
                    },
                    {
                        title: 'Advance',
                        route: 'card-advance',
                    },
                    {
                        title: 'Statistic',
                        route: 'card-statistic',
                    },
                    {
                        title: 'Analytic',
                        route: 'card-analytic',
                    },
                    {
                        title: 'Card Action',
                        route: 'card-action',
                    },
                ],
            },
            {
                title: 'Components',
                icon: 'ArchiveIcon',
                children: [
                    {
                        title: 'Alert',
                        route: 'components-alert',
                    },
                    {
                        title: 'Aspect',
                        route: 'components-aspect',
                    },
                    {
                        title: 'Avatar',
                        route: 'components-avatar',
                    },
                    {
                        title: 'Badge',
                        route: 'components-badge',
                    },
                    {
                        title: 'Breadcrumb',
                        route: 'components-breadcrumb',
                    },
                    {
                        title: 'Button',
                        route: 'components-button',
                    },
                    {
                        title: 'Button Group',
                        route: 'components-button-group',
                    },
                    {
                        title: 'Button Toolbar',
                        route: 'components-button-toolbar',
                    },
                    {
                        title: 'Calendar',
                        route: 'components-calendar',
                    },
                    {
                        title: 'Carousel',
                        route: 'components-carousel',
                    },
                    {
                        title: 'Collapse',
                        route: 'components-collapse',
                    },
                    {
                        title: 'Dropdown',
                        route: 'components-dropdown',
                    },
                    {
                        title: 'Embed',
                        route: 'components-embed',
                    },
                    {
                        title: 'Image',
                        route: 'components-image',
                    },
                    {
                        title: 'List Group',
                        route: 'components-list-group',
                    },
                    {
                        title: 'Media Objects',
                        route: 'components-media',
                    },
                    {
                        title: 'Modal',
                        route: 'components-modal',
                    },
                    {
                        title: 'Nav',
                        route: 'components-nav',
                    },
                    {
                        title: 'Overlay',
                        route: 'components-overlay',
                    },
                    {
                        title: 'Pagination',
                        route: 'components-pagination',
                    },
                    {
                        title: 'Pagination Nav',
                        route: 'components-pagination-nav',
                    },
                    {
                        title: 'Pill',
                        route: 'components-pill',
                    },
                    {
                        title: 'Pill Badge',
                        route: 'components-pill-badge',
                    },
                    {
                        title: 'Popover',
                        route: 'components-popover',
                    },
                    {
                        title: 'Progress',
                        route: 'components-progress',
                    },
                    {
                        title: 'Sidebar',
                        route: 'components-sidebar',
                    },
                    {
                        title: 'spinner',
                        route: 'components-spinner',
                    },
                    {
                        title: 'Tab',
                        route: 'components-tab',
                    },
                    {
                        title: 'Time',
                        route: 'components-time',
                    },
                    {
                        title: 'Timeline',
                        route: 'components-timeline',
                    },
                    {
                        title: 'Toasts',
                        route: 'components-toasts',
                    },
                    {
                        title: 'Tooltip',
                        route: 'components-tooltip',
                    },
                ],
            },
            {
                title: 'Extensions',
                icon: 'PlusCircleIcon',
                children: [
                    {
                        title: 'Sweet Alert',
                        route: 'extensions-sweet-alert',
                    },
                    {
                        title: 'Toastification',
                        route: 'extensions-toastification',
                    },
                    {
                        title: 'Slider',
                        route: 'extensions-slider',
                    },
                    {
                        title: 'Drag & Drop',
                        route: 'extensions-drag-and-drop',
                    },

                    {
                        title: 'Tour',
                        route: 'extensions-tour',
                    },

                    {
                        title: 'Clipboard',
                        route: 'extensions-clipboard',
                    },
                    {
                        title: 'Context Menu',
                        route: 'extensions-context-menu',
                    },

                    {
                        title: 'Swiper',
                        route: 'extensions-swiper',
                    },

                    // {
                    //   title: 'Tree',
                    //   route: 'extensions-tree',
                    // },

                    {
                        title: 'I18n',
                        route: 'extensions-i18n',
                    },
                ],
            },
            {
                title: 'Page Layouts',
                icon: 'LayoutIcon',
                children: [
                    {
                        title: 'Layout Boxed',
                        route: 'page-layout-boxed-layout',
                    },
                    {
                        title: 'Without Menu',
                        route: 'page-layout-without-menu',
                    },
                    {
                        title: 'Layout Empty',
                        route: 'page-layout-layout-empty',
                    },
                    {
                        title: 'Layout Blank',
                        route: 'page-layout-layout-blank',
                    },
                ],
            },
            {
                title: 'Charts',
                icon: 'PieChartIcon',
                children: [
                    {
                        title: 'Apex Chart',
                        route: 'charts-apex-chart',
                    },
                    {
                        title: 'Chartjs',
                        route: 'charts-chartjs',
                    },
                    {
                        title: 'Echart',
                        route: 'charts-echart',
                    },
                ],
            },
            {
                title: 'Leaflet',
                route: 'maps-leaflet',
                icon: 'MapIcon',
            },
            {
                title: 'Forms Elements',
                icon: 'CopyIcon',
                children: [
                    {
                        title: 'Input',
                        route: 'forms-element-input',
                    },
                    {
                        title: 'Input Group',
                        route: 'forms-element-input-group',
                    },
                    {
                        title: 'Input Mask',
                        route: 'forms-element-input-mask',
                    },
                    {
                        title: 'Textarea',
                        route: 'forms-element-textarea',
                    },
                    {
                        title: 'Auto Suggest',
                        route: 'extensions-auto-suggest',
                    },
                    {
                        title: 'Checkbox',
                        route: 'forms-element-checkbox',
                    },
                    {
                        title: 'Radio',
                        route: 'forms-element-radio',
                    },
                    {
                        title: 'Switch',
                        route: 'forms-element-switch',
                    },
                    {
                        title: 'Select',
                        route: 'forms-element-select',
                    },
                    {
                        title: 'Vue Select',
                        route: 'extensions-vue-select',
                    },
                    {
                        title: 'Spinbutton',
                        route: 'forms-element-spinbutton',
                    },
                    {
                        title: 'File Input',
                        route: 'forms-element-file-input',
                    },
                    {
                        title: 'Quill Editor',
                        route: 'extensions-quill-editor',
                    },
                    {
                        title: 'Form Datepicker',
                        route: 'forms-element-datepicker',
                    },
                    {
                        title: 'Form Timepicker',
                        route: 'forms-element-timepicker',
                    },
                    {
                        title: 'Date Time Picker',
                        route: 'extensions-date-time-picker',
                    },
                    {
                        title: 'Form Rating',
                        route: 'forms-element-rating',
                    },
                    {
                        title: 'Form Tag',
                        route: 'forms-element-tag',
                    },
                ],
            },
            {
                title: 'Form Layout',
                route: 'form-layout',
                icon: 'CopyIcon',
            },
            {
                title: 'Form Wizard',
                route: 'form-wizard',
                icon: 'PackageIcon',
            },
            {
                title: 'Form Validation',
                route: 'form-validation',
                icon: 'CheckCircleIcon',
            },
            {
                title: 'Form Repeater',
                route: 'form-repeater',
                icon: 'CopyIcon',
            },
            {
                title: 'BS Table',
                route: 'table-bs-table',
                icon: 'ServerIcon',
            },
            {
                title: 'Good Table',
                route: 'table-good-table',
                icon: 'GridIcon',
            },
        ],
    },
]
