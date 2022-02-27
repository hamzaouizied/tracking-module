$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

//color
const purple       = '#5E239D';
const green        = '#05BBAA';
const lightPurple  = '#DBE4EE';
const lightGreen   = '#BEE3DB';
const red          = '#EB5951';
const yellow       = '#FDEBB0';
const darkStandard   = '#9a9a9a';
const lightStandard  = '#FFFFFF';

const primaryColor        = purple;
const secondaryColor      = green;
const lightPrimaryColor   = lightPurple;
const lightSecondaryColor = lightGreen;
const hightAlertColor     = red;
const lowAlertColor       = yellow;

//font
const numberFont        = 'Hammersmith One';
const headerFont        = 'Hammersmith One';
const detailFont        = 'Segoe';

//number color
const numberColor = lightStandard;

/* 1A */
let visit       = $('#visit').val();
let uniqueVisit = $('#uniqueVisit').val();
const data = {
    labels: ['Unique_visitor', 'Visit'],
    datasets: [{
        data: [uniqueVisit, visit],
        backgroundColor: [
            primaryColor,
            secondaryColor,
        ],
    }]
};

/* 2A */
let visitByBrowser       = $('#visitByBrowser').val();
let uniqueVisitByBrowser = $('#uniqueVisitByBrowser').val();
const data2 = {
    labels: ['Unique_visitor_by_browser', 'Visit_by_browser'],
    datasets: [{
        data: [uniqueVisitByBrowser, visitByBrowser],
        backgroundColor: [
            primaryColor,
            secondaryColor,

        ],
    }]
};

/* 3A */
let visitByPhone        = $('#visitByPhone').val();
let visitByTablet       = $('#visitByTablet').val();
let visitByDesktop      = $('#visitByDesktop').val();
let uniqueVisitByPhone  = $('#uniqueVisitByPhone').val();
let uniqueVisitByTablet = $('#uniqueVisitByTablet').val();
let uniqueVisitByDesktop= $('#uniqueVisitByDesktop').val();
const data3 = {
    labels: ['Unique visitor by phone','Unique visitor by tablet','Unique visitor by desktop', 'Visit by phone', 'Visit by tablet', 'Visit by desktop'],
    datasets: [{
        data: [uniqueVisitByPhone, uniqueVisitByTablet, uniqueVisitByDesktop, visitByPhone, visitByTablet, visitByDesktop],
        backgroundColor: [
            primaryColor,
            hightAlertColor,
            lowAlertColor,
            secondaryColor,
            lightPrimaryColor,
            lightSecondaryColor
        ],
    }]
};
var ctx = document.getElementById("one-a").getContext("2d");
new Chart(ctx, {
    plugins: [ChartDataLabels],
    type: 'doughnut',
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    boxWidth:10,
                    font: {
                        size: 10
                    }
                }
            },
            title: {
                display: true,
                text: 'Total Nb Visits + Nb Unique Visits',
                fontFamily:numberFont,
                fontColor:lightPrimaryColor,
                fontStyle:'bold'
            },
            datalabels: {
                formatter: (value) => {
                    return value;
                },
                color: numberColor,
                font: function(context) {
                    var width = context.chart.width;
                    var responsiveSize = Math.round(width / 30);
                    return {
                        size: responsiveSize,
                        family:numberFont
                    };
                },
            },
        },
    },
    data: data,
});

var ctx = document.getElementById("one-b").getContext("2d");
new Chart(ctx, {
    plugins: [ChartDataLabels],
    type: 'doughnut',
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    boxWidth:10,
                    font: {
                        size: 10
                    }
                }
            },
            title: {
                display: true,
                text: 'Total Nb Visits + Nb Unique Visits',
                fontFamily:numberFont,
                fontColor:lightPrimaryColor,
                fontStyle:'bold'
            },
            datalabels: {
                formatter: (value) => {
                    return value;
                },
                color: numberColor,
                font: function(context) {
                    var width = context.chart.width;
                    var responsiveSize = Math.round(width / 30);
                    return {
                        size: responsiveSize,
                        family:numberFont
                    };
                },
            },
        },
    },
    data: data2,
});

var ctx = document.getElementById("one-c").getContext("2d");
new Chart(ctx, {
    plugins: [ChartDataLabels],
    type: 'doughnut',
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    boxWidth:10,
                    font: {
                        size: 10
                    }
                }
            },
            title: {
                display: true,
                text: 'Total Nb Visits + Nb unique visits by device type (Desktop/Tablet/Smartphone)',
                fontFamily:numberFont,
                fontColor:lightPrimaryColor,
                fontStyle:'bold'
            },
            datalabels: {
                formatter: (value) => {
                    return value;
                },
                color: numberColor,
                font: function(context) {
                    var width = context.chart.width;
                    var responsiveSize = Math.round(width / 30);
                    return {
                        size: responsiveSize,
                        family:numberFont
                    };
                },
            },
        },
    },
    data: data3,
});
});