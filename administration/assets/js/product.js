
// >>---------------------------------------- //Product js Start// ---------------------------------------- <<
$(document).ready(function () {

    const $productWrapperGrid = $(".product-wrapper-grid");
    const $productItems = $productWrapperGrid.children().children();
    const $viewButtons = $(".view-btn");

    let currentView = null;

    const viewClasses = {
        view4: "col-md-4 col-lg-3",
        view3: "col-md-4",
        view2: "col-sm-6 product-view-box",
        view1: "col-12",
        list: "list-view col-sm-6 col-xxl-4"
    };

    const updateProductView = (classes) => {
        $productItems.removeClass().addClass(classes);
    };

    const setActiveButton = (btn) => {
        $viewButtons.removeClass("active");
        $(btn).addClass("active");
    };

    const resetButtons = () => {
        $(".product-view4, .product-view3, .product-view2, .product-view")
            .addClass("d-none");
    };

    const applyView = (view) => {
        currentView = view;
        updateProductView(viewClasses[view]);

        switch (view) {
            case "view4":
                setActiveButton(".product-view4");
                break;

            case "view3":
                setActiveButton(".product-view3");
                break;

            case "view2":
                setActiveButton(".product-view2");
                break;

            case "view1":
                setActiveButton(".product-view");
                break;

            case "list":
                setActiveButton(".grid-layout-view");
                break;
        }
    };

    const handleResponsiveView = () => {

        const width = $(window).width();

        resetButtons();

        if (width <= 576) {

            $(".product-view").removeClass("d-none");

            if (!currentView || currentView === "view4" || currentView === "view3" || currentView === "view2") {
                applyView("view1");
            }

        } else if (width <= 768) {

            $(".product-view2, .product-view").removeClass("d-none");

            if (!currentView || currentView === "view4" || currentView === "view3") {
                applyView("view2");
            }

        } else if (width <= 991) {

            $(".product-view3, .product-view2").removeClass("d-none");

            if (!currentView || currentView === "view4") {
                applyView("view3");
            }

        } else {

            $(".product-view4, .product-view3").removeClass("d-none");

            if (!currentView) {
                applyView("view4");
            }
        }
    };

    handleResponsiveView();

    $(window).on("resize", handleResponsiveView);

    $('.product-view4').on('click', function () {
        if (!$(this).hasClass("d-none")) {
            applyView("view4");
        }
    });

    $('.product-view3').on('click', function () {
        if (!$(this).hasClass("d-none")) {
            applyView("view3");
        }
    });

    $('.product-view2').on('click', function () {
        if (!$(this).hasClass("d-none")) {
            applyView("view2");
        }
    });

    $('.product-view').on('click', function () {
        if (!$(this).hasClass("d-none")) {
            applyView("view1");
        }
    });

    $('.grid-layout-view').on('click', function () {
        applyView("list");
    });

});

// >> ---------------------------------------- //Product js End// ---------------------------------------- <<
