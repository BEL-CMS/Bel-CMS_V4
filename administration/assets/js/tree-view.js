//  >>-----------------------------tree-view js start ------------------------------<<

// >>-----------------------basic tree start-----------------------------<<
$('#theme_tree').jstree({

    "core": {
        "themes": {
            "variant": "large"
        },
        "data": [
            {
                "text": "alina",
                "icon": "ti ti-folder text-warning",
                "state": {
                    "selected": false
                },
                "type": "demo",
                "children": [
                    {
                        "text": "asset",
                        "icon": "ti ti-folder text-warning",
                        "state": {
                            "selected": true
                        },
                        // "li_attr": {
                        //     "class": "li-style"
                        // },
                        // "a_attr": {
                        //     "class": "a-style"
                        // }
                        "children": [
                            {
                                "text": "css",
                                "icon": "ti ti-folder text-warning",


                                "state": {

                                    "selected": true
                                },
                            },
                            {
                                "text": "Fonts",
                                "icon": "ti ti-folder text-warning",
                                "state": {
                                    "selected": true
                                },
                            },
                            {
                                "text": "Icons",
                                "icon": "ti ti-folder text-warning",
                                "state": {
                                    "selected": true
                                },
                            },
                            {
                                "text": "Images",
                                "icon": "ti ti-folder text-warning",
                                "state": {
                                    "selected": true
                                },
                            },
                            {
                                "text": "Js",
                                "icon": "ti ti-folder text-warning",
                                "state": {
                                    "selected": true
                                },
                            },
                            {
                                "text": "Scss",
                                "icon": "ti ti-folder text-warning",
                                "state": {
                                    "selected": true
                                },
                            },
                            {
                                "text": "Vendor",
                                "icon": "ti ti-folder text-warning",
                                "state": {
                                    "selected": true
                                },
                            },
                        ]

                    },
                    {
                        "text": "node modules",
                        "icon": "ti ti-folder text-warning",
                        "state": {
                            "selected": true
                        },
                    },
                    {
                        "text": "template",
                        "icon": "ti ti-folder text-warning",
                        "state": {
                            "selected": true
                        },
                        "children": [
                            {
                            "text": "index.html",
                            "icon": "ti ti-folder text-warning",
                            "state": {

                                "selected": true
                            }
                        },
                        {
                            "text": "accordian.html",
                            "icon": "ti ti-folder text-warning",
                            "state": {
                                "selected": true
                            },
                        },
                        {
                            "text": "animation.html",
                            "icon": "ti ti-folder text-warning ",
                            "state": {
                                "selected": true
                            },
                        },
                        {
                            "text": "calander.html",
                            "icon": "ti ti-folder text-warning",
                            "state": {
                                "selected": true
                            },
                        },
                        {
                            "text": "clipboard.html",
                            "icon": "ti ti-folder text-warning",
                            "state": {
                                "selected": true
                            },
                        },
                    ]
                    },
                    {
                        "text": "gulpfile",
                        "icon": "ti  ti-file text-secondary",
                        "state": {
                            "selected": true
                        },

                    },
                    {
                        "text": "package.json",
                        "icon": "ti  ti-file text-secondary",
                        "state": {
                            "selected": true
                        },

                    },
                    {
                        "text": "package-lock.json",
                        "icon": "ti  ti-file text-secondary",
                        "state": {
                            "selected": true
                        },

                    },
                ]
            } // root node end, end of JSON
        ]
    },
});
// <<------------------------end basic tree--------------------------->>



// <<---------------------tree with checkbox start--------------------------->> //
$('#level_tree').jstree({
    "core": {
        "themes": {
            "variant": "large"
        },
        "data": [
            {
                "text": "alina",
                "icon": "ti ti-category",
                "state": {
                    "selected": false
                },
                "type": "demo",
                "children": [
                    {
                        "text": "Dash board",
                        "icon": "ti ti-home-heart",
                        "state": {
                            "selected": true
                        },
                        "children": [
                            {
                                "text": "Ecommerce",
                                "icon": "ti ti-circle text-primary",


                                "state": {

                                    "selected": true
                                },
                            },
                            {
                                "text": "Project",
                                "icon": "fa ti ti-circle text-primary",
                                "state": {
                                    "selected": true
                                },
                            },
                            {
                                "text": "Analytics",
                                "icon": "fa ti ti-circle text-primary",
                                "state": {
                                    "selected": true
                                },
                            },
                            {
                                "text": "Education",
                                "icon": "ti ti-circle text-primary",
                                "state": {
                                    "selected": true
                                },
                            },

                        ]

                    },
                    {
                        "text": "App",
                        "icon": "ti ti-server-2 ",
                        "state": {
                            "selected": true
                        },
                        "children": [
                            {
                                "text": "calender",
                                "icon": "ti ti-circle text-primary",


                                "state": {

                                    "selected": true
                                },
                            },
                            {
                                "text": "Invoice",
                                "icon": "ti ti-circle text-primary",
                                "state": {
                                    "selected": true
                                },
                            },
                            {
                                "text": "kanban board",
                                "icon": "ti ti-circle text-primary",
                                "state": {
                                    "selected": true
                                },
                            },
                            {
                                "text": "Profile",
                                "icon": "ti ti-circle text-primary",
                                "state": {
                                    "selected": true
                                },
                            },
                            {
                                "text": "timeline",
                                "icon": "ti ti-circle text-primary",
                                "state": {
                                    "selected": true
                                },
                            },
                            {
                                "text": "faqs",
                                "icon": "ti ti-circle text-primary",
                                "state": {
                                    "selected": true
                                },
                            },

                        ]
                    },
                    {
                        "text": "ui-kits",
                        "icon": "ti ti-lock-open ",
                        "state": {
                            "selected": true
                        },
                        "children": [
                            {
                            "text": "cheatsheet",
                            "icon": "ti ti-circle text-primary",
                            "state": {

                                "selected": true
                            }
                        },
                        {
                            "text": "alert",
                            "icon": "ti ti-circle text-primary",
                            "state": {
                                "selected": true
                            },
                        },
                        {
                            "text": "badges",
                            "icon": "ti ti-circle text-primary ",
                            "state": {
                                "selected": true
                            },
                        },
                        {
                            "text": "buttonns",
                            "icon": "ti ti-circle text-primary",
                            "state": {
                                "selected": true
                            },
                        },
                        {
                            "text": "cards",
                            "icon": "ti ti-circle text-primary",
                            "state": {
                                "selected": true
                            },
                        },
                    ]
                    },

                ]
            } // root node end, end of JSON
        ]
    },

    "plugins" : [ "themes", "html_data", "checkbox", "sort", "ui" ],


});
// >>-----------tree with checkbox end---------------<<

//  >>--------------------------tree-view js end -------------------------------<<
