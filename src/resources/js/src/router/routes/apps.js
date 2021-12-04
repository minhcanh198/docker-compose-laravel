export default [
    {
        path: '/apps/calendar',
        name: 'apps-calendar',
        component: () => import('@/views/apps/calendar/Calendar.vue'),
    },

    // *===============================================---*
    // *--------- EMAIL & IT'S FILTERS N LABELS -------------------------------*
    // *===============================================---*
    {
        path: '/apps/email',
        name: 'apps-email',
        component: () => import('@/views/apps/email/Email.vue'),
        meta: {
            contentRenderer: 'sidebar-left',
            contentClass: 'email-application',
        },
    },
    {
        path: '/apps/email/:folder',
        name: 'apps-email-folder',
        component: () => import('@/views/apps/email/Email.vue'),
        meta: {
            contentRenderer: 'sidebar-left',
            contentClass: 'email-application',
            navActiveLink: 'apps-email',
        },
        beforeEnter(to, _, next) {
            if (['sent', 'draft', 'starred', 'spam', 'trash'].includes(to.params.folder)) next()
            else next({name: 'error-404'})
        },
    },
    {
        path: '/apps/email/label/:label',
        name: 'apps-email-label',
        component: () => import('@/views/apps/email/Email.vue'),
        meta: {
            contentRenderer: 'sidebar-left',
            contentClass: 'email-application',
            navActiveLink: 'apps-email',
        },
        beforeEnter(to, _, next) {
            if (['personal', 'company', 'important', 'private'].includes(to.params.label)) next()
            else next({name: 'error-404'})
        },
    },

    // *===============================================---*
    // *--------- TODO & IT'S FILTERS N TAGS ---------------------------------------*
    // *===============================================---*
    {
        path: '/apps/todo',
        name: 'apps-todo',
        component: () => import('@/views/apps/todo/Todo.vue'),
        meta: {
            contentRenderer: 'sidebar-left',
            contentClass: 'todo-application',
        },
    },
    {
        path: '/apps/todo/:filter',
        name: 'apps-todo-filter',
        component: () => import('@/views/apps/todo/Todo.vue'),
        meta: {
            contentRenderer: 'sidebar-left',
            contentClass: 'todo-application',
            navActiveLink: 'apps-todo',
        },
        beforeEnter(to, _, next) {
            if (['important', 'completed', 'deleted'].includes(to.params.filter)) next()
            else next({name: 'error-404'})
        },
    },
    {
        path: '/apps/todo/tag/:tag',
        name: 'apps-todo-tag',
        component: () => import('@/views/apps/todo/Todo.vue'),
        meta: {
            contentRenderer: 'sidebar-left',
            contentClass: 'todo-application',
            navActiveLink: 'apps-todo',
        },
        beforeEnter(to, _, next) {
            if (['team', 'low', 'medium', 'high', 'update'].includes(to.params.tag)) next()
            else next({name: 'error-404'})
        },
    },

    // *===============================================---*
    // *--------- CHAT  ---------------------------------------*
    // *===============================================---*
    {
        path: '/apps/chat',
        name: 'apps-chat',
        component: () => import('@/views/apps/chat/Chat.vue'),
        meta: {
            contentRenderer: 'sidebar-left',
            contentClass: 'chat-application',
        },
    },

    // *===============================================---*
    // *--------- ECOMMERCE  ---------------------------------------*
    // *===============================================---*
    {
        path: '/apps/e-commerce/shop',
        name: 'apps-e-commerce-shop',
        component: () => import('@/views/apps/e-commerce/e-commerce-shop/ECommerceShop.vue'),
        meta: {
            contentRenderer: 'sidebar-left-detached',
            contentClass: 'ecommerce-application',
            pageTitle: 'Shop',
            breadcrumb: [
                {
                    text: 'ECommerce',
                },
                {
                    text: 'Shop',
                    active: true,
                },
            ],
        },
    },
    {
        path: '/apps/e-commerce/wishlist',
        name: 'apps-e-commerce-wishlist',
        component: () => import('@/views/apps/e-commerce/e-commerce-wishlist/ECommerceWishlist.vue'),
        meta: {
            pageTitle: 'Wishlist',
            contentClass: 'ecommerce-application',
            breadcrumb: [
                {
                    text: 'ECommerce',
                },
                {
                    text: 'Wishlist',
                    active: true,
                },
            ],
        },
    },
    {
        path: '/apps/e-commerce/checkout',
        name: 'apps-e-commerce-checkout',
        component: () => import('@/views/apps/e-commerce/e-commerce-checkout/ECommerceCheckout.vue'),
        meta: {
            pageTitle: 'Checkout',
            contentClass: 'ecommerce-application',
            breadcrumb: [
                {
                    text: 'ECommerce',
                },
                {
                    text: 'Checkout',
                    active: true,
                },
            ],
        },
    },
    {
        path: '/apps/e-commerce/:slug',
        name: 'apps-e-commerce-product-details',
        component: () => import('@/views/apps/e-commerce/e-commerce-product-details/ECommerceProductDetails.vue'),
        meta: {
            pageTitle: 'Product Details',
            contentClass: 'ecommerce-application',
            breadcrumb: [
                {
                    text: 'ECommerce',
                },
                {
                    text: 'Shop',
                    active: true,
                },
                {
                    text: 'Product Details',
                    active: true,
                },
            ],
        },
    },

    // *===============================================---*
    // *--------- USER ---- ---------------------------------------*
    // *===============================================---*
    {
        path: '/users',
        name: 'apps-users-list',
        component: () => import('@/views/apps/user/users-list/UsersList.vue'),
    },
    {
        path: '/users/:id/view',
        name: 'apps-users-view',
        component: () => import('@/views/apps/user/users-view/UsersView.vue'),
    },
    {
        path: '/users/:id/edit',
        name: 'apps-users-edit',
        component: () => import('@/views/apps/user/users-edit/UsersEdit.vue'),
    },

    // Invoice
    {
        path: '/apps/invoice/list',
        name: 'apps-invoice-list',
        component: () => import('@/views/apps/invoice/invoice-list/InvoiceList.vue'),
    },
    {
        path: '/apps/invoice/preview/:id',
        name: 'apps-invoice-preview',
        component: () => import('@/views/apps/invoice/invoice-preview/InvoicePreview.vue'),
    },
    {
        path: '/apps/invoice/add/',
        name: 'apps-invoice-add',
        component: () => import('@/views/apps/invoice/invoice-add/InvoiceAdd.vue'),
    },
    {
        path: '/apps/invoice/edit/:id',
        name: 'apps-invoice-edit',
        component: () => import('@/views/apps/invoice/invoice-edit/InvoiceEdit.vue'),
    },
    // PROGRAMS
    {
        path: '/programs/new',
        name: 'create-program',
        component: () => import('@/views/apps/program/new/New.vue'),
        meta: {
            pageTitle: 'Create new program',
            breadcrumb: [
                {
                    text: 'Programs',
                },
                {
                    text: 'Create program',
                    active: true,
                },
            ],
        },
    },

    {
        path: '/program/:id/view',
        name: 'program-view',
        component: () => import('@/views/apps/program/view/ProgramView.vue'),
    },

    {
        path: '/program/:id/edit',
        name: 'program-edit',
        component: () => import('@/views/apps/program/new/New.vue'),
    },

    {
        path: '/programs',
        name: 'list-program',
        component: () => import('@/views/apps/program/list/List.vue'),
        meta: {
            pageTitle: 'List all programs',
            breadcrumb: [
                {
                    text: 'Programs',
                },
                {
                    text: 'All programs',
                    active: true,
                },
            ],
        },
    },

    // LEADS
    {
        path: '/leads',
        name: 'lead-list',
        component: () => import('@/views/apps/lead/list/List.vue'),
        meta: {
            pageTitle: 'List all leads',
            breadcrumb: [
                {
                    text: 'Leads',
                },
                {
                    text: 'All leads',
                    active: true,
                },
            ],
        },
    },

    {
        path: '/lead/:id/view',
        name: 'lead-view',
        component: () => import('@/views/apps/lead/list/List.vue'),
    },

    // {
    //     path: '/lead/:id/edit',
    //     name: 'lead-edit',
    //     component: () => import('@/views/apps/lead/list/List.vue'),
    // },

    // PROVIDERS
    {
        path: '/providers',
        name: 'provider-list',
        component: () => import('@/views/apps/provider/list/List.vue'),
        meta: {
            pageTitle: 'List all providers',
            breadcrumb: [
                {
                    text: 'Providers',
                },
                {
                    text: 'All providers',
                },
            ],
        },
    },

    {
        path: '/provider/:id/view',
        name: 'provider-view',
        component: () => import('@/views/apps/provider/view/ProviderView.vue'),
    },

    {
        path: '/provider/:id/edit',
        name: 'provider-edit',
        component: () => import('@/views/apps/provider/list/List.vue'),
    },
]
