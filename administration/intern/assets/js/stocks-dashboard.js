(function () {
    "use strict";

    /* stocks swiper */
    var swiper = new Swiper(".stocks-swiper", {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 1000,
            disableOnInteraction: false,
        },
        breakpoints: {
            500: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1400: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            1600: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            1800: {
                slidesPerView: 5,
                spaceBetween: 20,
            },
        },
    });
    /* stocks swiper */

    /* Apple Stock Price Change */
    var spark6 = {
        chart: {
            type: 'area',
            height: 20,
            width: 120,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: undefined,
            width: 1,
            dashArray: 0,
        },
        fill: {
            gradient: {
                enabled: false
            }
        },
        tooltip: {
            enabled: false,
        },
        series: [{
            name: 'Value',
            data: [61, 27, 54, 43, 19, 46, 31, 37, 39, 0, 45, 54, 38, 56, 24, 65, 35, 27, 93, 53, 62, 51, 35, 41]
        }],
        yaxis: {
            min: 0,
            show: false
        },
        xaxis: {
            axisBorder: {
                show: false
            },
        },
        yaxis: {
            axisBorder: {
                show: false
            },
        },
        colors: ['rgb(12, 215, 177)'],
    }
    var spark6 = new ApexCharts(document.querySelector("#apple-stock-chart"), spark6);
    spark6.render();
    /* Apple Stock Price Change */

    /* Alphabet Stock Price Change */
    var spark7 = {
        chart: {
            type: 'area',
            height: 20,
            width: 120,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: undefined,
            width: 1,
            dashArray: 0,
        },
        fill: {
            gradient: {
                enabled: false
            }
        },
        tooltip: {
            enabled: false,
        },
        series: [{
            name: 'Value',
            data: [61, 27, 54, 43, 19, 46, 31, 37, 39, 0, 45, 54, 38, 56, 24, 65, 35, 27, 93, 53, 62, 51, 35, 41]
        }],
        yaxis: {
            min: 0,
            show: false
        },
        xaxis: {
            axisBorder: {
                show: false
            },
        },
        yaxis: {
            axisBorder: {
                show: false
            },
        },
        colors: ['rgb(12, 215, 177)'],
    }
    var spark7 = new ApexCharts(document.querySelector("#alphabet-stock-chart"), spark7);
    spark7.render();
    /* Alphabet Stock Price Change */

    /* Microsoft Stock Price Change */
    var spark8 = {
        chart: {
            type: 'area',
            height: 20,
            width: 120,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: undefined,
            width: 1,
            dashArray: 0,
        },
        fill: {
            gradient: {
                enabled: false
            }
        },
        tooltip: {
            enabled: false,
        },
        series: [{
            name: 'Value',
            data: [61, 27, 54, 43, 19, 46, 31, 37, 39, 0, 45, 54, 38, 56, 24, 65, 35, 27, 93, 53, 62, 51, 35, 41]
        }],
        yaxis: {
            min: 0,
            show: false
        },
        xaxis: {
            axisBorder: {
                show: false
            },
        },
        yaxis: {
            axisBorder: {
                show: false
            },
        },
        colors: ['rgb(12, 215, 177)'],
    }
    var spark8 = new ApexCharts(document.querySelector("#microsoft-stock-chart"), spark8);
    spark8.render();
    /* Microsoft Stock Price Change */

    /* Amazon Stock Price Change */
    var spark9 = {
        chart: {
            type: 'area',
            height: 20,
            width: 120,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: undefined,
            width: 1,
            dashArray: 0,
        },
        fill: {
            gradient: {
                enabled: false
            }
        },
        tooltip: {
            enabled: false,
        },
        series: [{
            name: 'Value',
            data: [61, 27, 54, 43, 19, 46, 31, 37, 39, 0, 45, 54, 38, 56, 24, 65, 35, 27, 93, 53, 62, 51, 35, 41]
        }],
        yaxis: {
            min: 0,
            show: false
        },
        xaxis: {
            axisBorder: {
                show: false
            },
        },
        yaxis: {
            axisBorder: {
                show: false
            },
        },
        colors: ['rgb(12, 215, 177)'],
    }
    var spark9 = new ApexCharts(document.querySelector("#amazon-stock-chart"), spark9);
    spark9.render();
    /* Amazon Stock Price Change */

    /* Tesla Stock Price Change */
    var spark10 = {
        chart: {
            type: 'area',
            height: 20,
            width: 120,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: undefined,
            width: 1,
            dashArray: 0,
        },
        fill: {
            gradient: {
                enabled: false
            }
        },
        tooltip: {
            enabled: false,
        },
        series: [{
            name: 'Value',
            data: [61, 27, 54, 43, 19, 46, 31, 37, 39, 0, 45, 54, 38, 56, 24, 65, 35, 27, 93, 53, 62, 51, 35, 41]
        }],
        yaxis: {
            min: 0,
            show: false
        },
        xaxis: {
            axisBorder: {
                show: false
            },
        },
        yaxis: {
            axisBorder: {
                show: false
            },
        },
        colors: ['rgb(12, 215, 177)'],
    }
    var spark10 = new ApexCharts(document.querySelector("#tesla-stock-chart"), spark10);
    spark10.render();
    /* Tesla Stock Price Change */

    /* Meta Stock Price Change */
    var spark11 = {
        chart: {
            type: 'area',
            height: 20,
            width: 120,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: undefined,
            width: 1,
            dashArray: 0,
        },
        fill: {
            gradient: {
                enabled: false
            }
        },
        tooltip: {
            enabled: false,
        },
        series: [{
            name: 'Value',
            data: [61, 27, 54, 43, 19, 46, 31, 37, 39, 0, 45, 54, 38, 56, 24, 65, 35, 27, 93, 53, 62, 51, 35, 41]
        }],
        yaxis: {
            min: 0,
            show: false
        },
        xaxis: {
            axisBorder: {
                show: false
            },
        },
        yaxis: {
            axisBorder: {
                show: false
            },
        },
        colors: ['rgb(12, 215, 177)'],
    }
    var spark11 = new ApexCharts(document.querySelector("#meta-stock-chart"), spark11);
    spark11.render();
    /* Meta Stock Price Change */

    /* Nvidia Stock Price Change */
    var spark12 = {
        chart: {
            type: 'area',
            height: 20,
            width: 120,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: undefined,
            width: 1,
            dashArray: 0,
        },
        fill: {
            gradient: {
                enabled: false
            }
        },
        tooltip: {
            enabled: false,
        },
        series: [{
            name: 'Value',
            data: [61, 27, 54, 43, 19, 46, 31, 37, 39, 0, 45, 54, 38, 56, 24, 65, 35, 27, 93, 53, 62, 51, 35, 41]
        }],
        yaxis: {
            min: 0,
            show: false
        },
        xaxis: {
            axisBorder: {
                show: false
            },
        },
        yaxis: {
            axisBorder: {
                show: false
            },
        },
        colors: ['rgb(12, 215, 177)'],
    }
    var spark12 = new ApexCharts(document.querySelector("#nvidia-stock-chart"), spark12);
    spark12.render();
    /* Nvidia Stock Price Change */

    /* Portfolio Analysis */
    var options = {
        series: [{
            'name': 'Invested',
            data: [
                [1727359600000, 30.95],
                [1727446000000, 31.34],
                [1727532400000, 31.18],
                [1727618800000, 31.05],
                [1727878000000, 31.00],
                [1727964400000, 30.95],
                [1728050800000, 31.24],
                [1728137200000, 31.29],
                [1728223600000, 31.85],
                [1728482800000, 31.86],
                [1728569200000, 32.28],
                [1728655600000, 32.10],
                [1728742000000, 32.65],
                [1728828400000, 32.21],
                [1729087600000, 32.35],
                [1729174000000, 32.44],
                [1729260400000, 32.46],
                [1729346800000, 32.86],
                [1729433200000, 32.75],
                [1729778800000, 32.54],
                [1729865200000, 32.33],
                [1729951600000, 32.97],
                [1730038000000, 33.41],
                [1730297200000, 33.27],
                [1730383600000, 33.27],
                [1730470000000, 32.89],
                [1730556400000, 33.10],
                [1730642800000, 33.73],
                [1730902000000, 33.22],
                [1730988400000, 31.99],
                [1731074800000, 32.41],
                [1731161200000, 33.05],
                [1731247600000, 33.64],
                [1731506800000, 33.56],
                [1731593200000, 34.22],
                [1731679600000, 33.77],
                [1731766000000, 34.17],
                [1731852400000, 33.82],
                [1732111600000, 34.51],
                [1732198000000, 33.16],
                [1732284400000, 33.56],
                [1732370800000, 33.71],
                [1732457200000, 33.81],
                [1732712800000, 34.40],
                [1732799200000, 34.63],
                [1732885600000, 34.46],
                [1732972000000, 34.48],
                [1733058400000, 34.31],
                [1733317600000, 34.70],
                [1733404000000, 34.31],
                [1733490400000, 33.46],
                [1733576800000, 33.59],
                [1733922400000, 33.22],
                [1734008800000, 32.61],
                [1734095200000, 33.01],
                [1734181600000, 33.55],
                [1734268000000, 33.18],
                [1734527200000, 32.84],
                [1734613600000, 33.84],
                [1734700000000, 33.39],
                [1734786400000, 32.91],
                [1734872800000, 33.06],
                [1735132000000, 32.62],
                [1735218400000, 32.40],
                [1735304800000, 33.13],
                [1735391200000, 33.26],
                [1735477600000, 33.58],
                [1735736800000, 33.55],
                [1735823200000, 33.77],
                [1735909600000, 33.76],
                [1735996000000, 33.32],
                [1736082400000, 32.61],
                [1736341600000, 32.52],
                [1736428000000, 32.67],
                [1736514400000, 32.52],
                [1736600800000, 31.92],
                [1736687200000, 32.20],
                [1736946400000, 32.23],
                [1737032800000, 32.33],
                [1737119200000, 32.36],
                [1737205600000, 32.01],
                [1737292000000, 31.31],
                [1737551200000, 32.01],
                [1737637600000, 32.01],
                [1737724000000, 32.18],
                [1737810400000, 31.54],
                [1737896800000, 31.60],
                [1738242400000, 32.05],
                [1738328800000, 31.29],
                [1738415200000, 31.05],
                [1738501600000, 29.82],
                [1738760800000, 30.31],
                [1738847200000, 30.70],
                [1738933600000, 31.69],
                [1739020000000, 31.32],
                [1739106400000, 31.65],
                [1739365600000, 31.13],
                [1739452000000, 31.77],
                [1739538400000, 31.79],
                [1739624800000, 31.67],
                [1739711200000, 32.39],
                [1739970400000, 32.63],
                [1740056800000, 32.89],
                [1740143200000, 31.99],
                [1740229600000, 31.23],
                [1740316000000, 31.57],
                [1740575200000, 30.84],
                [1740661600000, 31.07],
                [1740748000000, 31.41],
                [1740834400000, 31.17],
                [1740920800000, 32.37],
                [1741180000000, 32.19],
                [1741266400000, 32.51],
                [1741439200000, 32.53],
                [1741525600000, 31.37],
                [1741784800000, 30.43],
                [1741871200000, 30.44],
                [1741957600000, 30.20],
                [1742044000000, 30.14],
                [1742130400000, 30.65],
                [1742389600000, 30.40],
                [1742476000000, 30.65],
                [1742562400000, 31.43],
                [1742648800000, 31.89],
                [1742735200000, 31.38],
                [1742994400000, 30.64],
                [1743080800000, 30.02],
                [1743167200000, 30.33],
                [1743253600000, 30.95],
                [1743340000000, 31.89],
                [1743599200000, 31.01],
                [1743685600000, 30.88],
                [1743772000000, 30.69],
                [1743858400000, 30.58],
                [1743944800000, 32.02],
                [1744204000000, 32.14],
                [1744290400000, 32.37],
                [1744376800000, 32.51],
                [1744463200000, 32.65],
                [1744549600000, 32.64],
                [1744808800000, 32.27],
                [1744895200000, 32.10],
                [1744981600000, 32.91],
                [1745068000000, 33.65],
                [1745154400000, 33.80],
                [1745413600000, 33.92],
                [1745500000000, 33.75],
                [1745586400000, 33.84],
                [1745672800000, 33.50],
                [1745759200000, 32.26],
                [1746018400000, 32.32],
                [1746104800000, 32.06],
                [1746191200000, 31.96],
                [1746277600000, 31.46],
                [1746364000000, 31.27],
                [1746709600000, 31.43],
                [1746796000000, 32.26],
                [1746882400000, 32.79],
                [1746968800000, 32.46],
                [1747228000000, 32.13],
                [1747314400000, 32.43],
                [1747400800000, 32.42],
                [1747487200000, 32.81],
                [1747573600000, 33.34],
                [1747832800000, 33.41],
                [1747919200000, 32.57],
                [1748005600000, 33.12],
                [1748092000000, 34.53],
                [1748178400000, 33.83],
                [1748437600000, 33.41],
                [1748524000000, 32.90],
                [1748610400000, 32.53],
                [1748696800000, 32.80],
                [1748783200000, 32.44],
                [1749042400000, 32.62],
                [1749128800000, 32.57],
                [1749215200000, 32.60],
                [1749301600000, 32.68],
                [1749388000000, 32.47],
                [1749647200000, 32.23],
                [1749733600000, 31.68],
                [1749820000000, 31.51],
                [1749906400000, 31.78],
                [1749992800000, 31.94],
                [1750252000000, 32.33],
                [1750338400000, 33.24],
                [1750424800000, 33.44],
                [1750511200000, 33.48],
                [1750597600000, 33.24],
                [1750856800000, 33.49],
                [1750943200000, 33.31],
                [1751029600000, 33.36],
                [1751116000000, 33.40],
                [1751202400000, 34.01],
                [1751638000000, 34.02],
                [1751724400000, 34.36],
                [1751810800000, 34.39],
                [1752070000000, 34.24],
                [1752156400000, 34.39],
                [1752242800000, 33.47],
                [1752329200000, 32.98],
                [1752415600000, 32.90],
                [1752674800000, 32.70],
                [1752761200000, 32.54],
                [1752847600000, 32.23],
                [1752934000000, 32.64],
                [1753020400000, 32.65],
                [1753279600000, 32.92],
                [1753366000000, 32.64],
                [1753452400000, 32.84],
                [1753625200000, 33.40],
                [1753884400000, 33.30],
                [1753970800000, 33.18],
                [1754057200000, 33.88],
                [1754143600000, 34.09],
                [1754230000000, 34.61],
                [1754489200000, 34.70],
                [1754575600000, 35.30],
                [1754662000000, 35.40],
                [1754748400000, 35.14],
                [1754834800000, 35.48],
                [1755094000000, 35.75],
                [1755180400000, 35.54],
                [1755266800000, 35.96],
                [1755353200000, 35.53],
                [1755439600000, 37.56],
                [1755698800000, 37.42],
                [1755785200000, 37.49],
                [1755871600000, 38.09],
                [1755958000000, 37.87],
                [1756044400000, 37.71],
                [1756303600000, 37.53],
                [1756476400000, 37.55],
                [1756562800000, 37.30],
                [1756649200000, 36.90],
                [1756908400000, 37.68],
                [1757081200000, 38.34],
                [1757167600000, 37.75],
                [1757254000000, 38.13],
                [1757513200000, 37.94],
                [1757599600000, 38.14],
                [1757686000000, 38.66],
                [1757772400000, 38.62],
                [1757858800000, 38.09],
                [1758118000000, 38.16],
                [1758204400000, 38.15],
                [1758290800000, 37.88],
                [1758377200000, 37.73],
                [1758463600000, 37.98],
                [1758809200000, 37.95],
                [1758895600000, 38.25],
                [1758982000000, 38.10],
                [1759068400000, 38.32],
                [1759327600000, 38.24],
                [1759414000000, 38.52],
                [1759500400000, 37.94],
                [1759586800000, 37.83],
                [1759673200000, 38.34],
                [1759932400000, 38.10],
                [1760018800000, 38.51],
                [1760105200000, 38.40],
                [1760191600000, 38.07],
                [1760278000000, 39.12],
                [1760537200000, 38.64],
                [1760623600000, 38.89],
                [1760710000000, 38.81],
                [1760796400000, 38.61],
                [1760882800000, 38.63],
                [1761228400000, 38.99],
                [1761314800000, 38.77],
                [1761401200000, 38.34],
                [1761487600000, 38.55],
                [1761746800000, 38.11],
                [1761833200000, 38.59],
                [1761919600000, 39.60],
            ]
        }],
        chart: {
            id: 'area-datetime',
            type: 'area',
            height: 382,
            zoom: {
                autoScaleYaxis: true
            },
            toolbar: {
                show: false
            },
            dropShadow: {
                enabled: true,
                enabledOnSeries: undefined,
                top: 7,
                left: 0,
                blur: 1,
                color: ["var(--primary-color)"],
                opacity: 0.1,
            },
        },
        grid: {
            borderColor: '#f3f3f3',
            strokeDashArray: 3
        },
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
            style: 'hollow',
        },
        xaxis: {
            type: 'datetime',
            min: new Date('02 Feb 2025').getTime(),
            tickAmount: 6,
        },
        tooltip: {
            x: {
                format: 'dd MMM yyyy'
            }
        },
        colors: ["var(--primary-color)"],
        stroke: {
            width: [1.5],
            curve: ['smooth']
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.4,
                opacityTo: 0.1,
                stops: [0, 90, 100],
                colorStops: [
                    [
                        {
                            offset: 0,
                            color: "var(--primary01)",
                            opacity: 1
                        },
                        {
                            offset: 75,
                            color: "var(--primary01)",
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: "var(--primary01)",
                            opacity: 1
                        }
                    ]
                ]
            }
        },
    };
    var chart2 = new ApexCharts(document.querySelector("#portfolio-analysis"), options);
    chart2.render();
    /* Portfolio Analysis */

})();