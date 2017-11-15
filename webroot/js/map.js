window.app = {};
var app = window.app;
app.Button = function (opt_options) {
    var options = opt_options || {};
    var button = document.createElement('button');
    button.innerHTML = options.bText;
    var this_ = this;
    var handleButtonClick = function () {
        window.open(options.bHref);
    };
    button.addEventListener('click', handleButtonClick, false);
    button.addEventListener('touchstart', handleButtonClick, false);
    var element = document.createElement('div');
    element.className = options.bClassName + ' ol-unselectable ol-control';
    element.appendChild(button);
    ol.control.Control.call(this, {
        element: element,
        target: options.target
    });
}
ol.inherits(app.Button, ol.control.Control);
var layerGreen = new ol.style.Style({
    image: new ol.style.RegularShape({
        fill: new ol.style.Fill({
            color: 'rgba(0,200,0,0.6)'
        }),
        stroke: new ol.style.Stroke({
            color: 'rgba(0,0,0,0.3)',
            width: 2
        }),
        points: 5,
        radius: 18,
        radius2: 10
    })
});
var projection = ol.proj.get('EPSG:3857');
var projectionExtent = projection.getExtent();
var size = ol.extent.getWidth(projectionExtent) / 256;
var resolutions = new Array(20);
var matrixIds = new Array(20);
for (var z = 0; z < 20; ++z) {
// generate resolutions and matrixIds arrays for this WMTS
    resolutions[z] = size / Math.pow(2, z);
    matrixIds[z] = z;
}
var container = document.getElementById('popup');
var content = document.getElementById('popup-content');
var closer = document.getElementById('popup-closer');
var popup = new ol.Overlay({
    element: container,
    autoPan: true,
    autoPanAnimation: {
        duration: 250
    }
});
closer.onclick = function () {
    popup.setPosition(undefined);
    closer.blur();
    return false;
};
var baseLayer = new ol.layer.Tile({
    source: new ol.source.WMTS({
        matrixSet: 'EPSG:3857',
        format: 'image/png',
        url: 'https://wmts.nlsc.gov.tw/wmts',
        layer: 'EMAP',
        tileGrid: new ol.tilegrid.WMTS({
            origin: ol.extent.getTopLeft(projectionExtent),
            resolutions: resolutions,
            matrixIds: matrixIds
        }),
        style: 'default',
        wrapX: true,
        attributions: '<a href="http://maps.nlsc.gov.tw/" target="_blank">國土測繪圖資服務雲</a>'
    }),
    opacity: 0.5
});
var appView = new ol.View({
    center: ol.proj.fromLonLat([120.301507, 23.124694]),
    zoom: 11
});
var map = new ol.Map({
    layers: [baseLayer],
    overlays: [popup],
    target: 'map',
    view: appView
});
var geolocation = new ol.Geolocation({
    projection: appView.getProjection()
});
geolocation.setTracking(true);
geolocation.on('error', function (error) {
    console.log(error.message);
});
var positionFeature = new ol.Feature();
positionFeature.setStyle(new ol.style.Style({
    image: new ol.style.Circle({
        radius: 6,
        fill: new ol.style.Fill({
            color: '#3399CC'
        }),
        stroke: new ol.style.Stroke({
            color: '#fff',
            width: 2
        })
    })
}));
var geolocationMapped = false;
geolocation.on('change:position', function () {
    var coordinates = geolocation.getPosition();
    positionFeature.setGeometry(coordinates ?
            new ol.geom.Point(coordinates) : null);
    if (false === geolocationMapped) {
        geolocationMapped = true;
        var v = map.getView();
        v.setCenter(coordinates);
        v.setZoom(14);
    }
});
new ol.layer.Vector({
    map: map,
    source: new ol.source.Vector({
        features: [positionFeature]
    })
});

var clickedTriggered = false;

function mapClicked(evt) {
    if (false === clickedTriggered) {
        clickedTriggered = true;
        var coordinate = evt.coordinate;
        var message = '';
        var pointFound = false;
        map.forEachFeatureAtPixel(evt.pixel, function (feature) {
            if (false === pointFound) {
                var p = feature.getProperties();
                if (p.parkId) {
                    pointFound = true;
                    message += '<h4>' + p.name + '</h4><div class="btn-group">';
                    message += '<a href="' + baseUrl + '/admin/issues/add/' + p.parkId + '" class="btn btn-default">建立通報</a>';
                    message += '<a href="' + baseUrl + '/admin/parks/view/' + +p.parkId + '" class="btn btn-default">檢視公園</a>';
                    message += '</div>';
                    coordinate = p.geometry.getCoordinates();
                }
            }
        });
        if (message !== '') {
            var v = map.getView();
            v.setCenter(coordinate);
            v.setZoom(15);
            content.innerHTML = message;
            popup.setPosition(coordinate);
        } else {
            popup.setPosition(undefined);
            closer.blur();
        }
        clickedTriggered = false;
    }
}

/**
 * Add a click handler to the map to render the popup.
 */
map.on('singleclick', function (e) {
    mapClicked(e);
});
map.on('touchend', function (e) {
    mapClicked(e);
})
$.getJSON(baseUrl + '/parks/points', function (p) {
    var features = [];
    for (k in p) {
        var f = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([parseFloat(p[k].Park.longitude), parseFloat(p[k].Park.latitude)])),
            parkId: p[k].Park.id,
            name: p[k].Park.name
        });
        f.setStyle(layerGreen);
        features.push(f);
    }
    var vectorLayer = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: features
        })
    });
    map.addLayer(vectorLayer);
});