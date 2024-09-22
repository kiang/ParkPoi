window.app = {};
var app = window.app;
var layerYellow = new ol.style.Style({
    image: new ol.style.RegularShape({
        fill: new ol.style.Fill({
            color: 'rgba(200,200,0,0.6)'
        }),
        stroke: new ol.style.Stroke({
            color: 'rgba(0,0,0,0.3)',
            width: 2
        }),
        points: 5,
        radius: 18,
        radius2: 10
    }),
    text: new ol.style.Text({
        font: '14px "Open Sans", "Arial Unicode MS", "sans-serif"',
        fill: new ol.style.Fill({
            color: 'rgba(0,0,255,0.7)'
        })
    })
});
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
    }),
    text: new ol.style.Text({
        font: '14px "Open Sans", "Arial Unicode MS", "sans-serif"',
        fill: new ol.style.Fill({
            color: 'rgba(0,0,255,0.7)'
        })
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
    source: new ol.source.OSM(),
    opacity: 1
});
var geolocationMapped = false;
var thePos = Cookies.get('userLocation');
if (!thePos) {
    thePos = [120.301507, 23.124694];
} else {
    geolocationMapped = true;
}
var appView = new ol.View({
    center: ol.proj.fromLonLat(thePos),
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
        radius: 15,
        fill: new ol.style.Fill({
            color: '#3399CC'
        }),
        stroke: new ol.style.Stroke({
            color: '#fff',
            width: 2
        })
    })
}));

geolocation.on('change:position', function () {
    var coordinates = geolocation.getPosition();
    Cookies.set('name', ol.proj.toLonLat(coordinates));
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
                    var fPoint = ol.proj.toLonLat(feature.getGeometry().getCoordinates());
                    pointFound = true;
                    message += '<h4>' + p.name + '</h4><div class="btn-group">';
                    message += '<a href="' + baseUrl + 'admin/issues/add/' + p.parkId + '" class="btn btn-primary">建立通報</a>';
                    message += '<a href="' + baseUrl + 'admin/parks/view/' + +p.parkId + '" class="btn btn-default">檢視公園</a>';
                    message += '<a target="_blank" href="https://www.google.com.tw/maps?q=' + fPoint[1] + ',' + fPoint[0] + '" class="btn btn-default">在 Google 地圖開啟</a>';
                    message += '</div>';
                    coordinate = p.geometry.getCoordinates();
                } else {
                    message += '<h4>你的所在位置</h4>';
                }
            }
        });
        if (message !== '') {
            var v = map.getView();
            v.setCenter(coordinate);
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
map.on('click', function (e) {
    mapClicked(e);
});
map.on('touchstart', function (e) {
    mapClicked(e);
})
$.getJSON(baseUrl + 'parks/points', function (p) {
    var features = [];
    for (k in p) {
        var g = ol.proj.fromLonLat([parseFloat(p[k].Park.longitude), parseFloat(p[k].Park.latitude)]);
        var nanCheck = true;
        for (j in g) {
            if (isNaN(g[j])) {
                nanCheck = false;
            }
        }
        if (nanCheck) {
            if (p[k].Park.size !== '') {
                p[k].Park.name += ' (' + p[k].Park.size + ')';
            }
            var f = new ol.Feature({
                geometry: new ol.geom.Point(g),
                parkId: p[k].Park.id,
                name: p[k].Park.name
            });
            var fStyle;
            if (p[k].Issue.length > 0) {
                fStyle = layerGreen.clone();
            } else {
                fStyle = layerYellow.clone();
            }
            fStyle.getText().setText(f.get('name'));
            f.setStyle(fStyle);
            features.push(f);
        }
    }
    var vectorLayer = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: features
        })
    });
    map.addLayer(vectorLayer);
});