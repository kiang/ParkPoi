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
var pointBegin = ol.proj.fromLonLat([120.301507, 23.124694]);
var appView = new ol.View({
    center: pointBegin,
    zoom: 11
});
var map = new ol.Map({
    layers: [baseLayer],
    target: 'parkMap',
    view: appView
});

var redPoint = new ol.Feature();
redPoint.setStyle(new ol.style.Style({
    image: new ol.style.Circle({
        radius: 5,
        fill: new ol.style.Fill({
            color: '#FF99CC'
        }),
        stroke: new ol.style.Stroke({
            color: '#fff',
            width: 2
        })
    })
}));
redPoint.setGeometry(new ol.geom.Point(pointBegin));

map.on('moveend', function (e) {
    var v = map.getView();
    redPoint.setGeometry(new ol.geom.Point(v.getCenter()));
});

var geolocation = new ol.Geolocation({
    projection: appView.getProjection()
});
geolocation.setTracking(true);
geolocation.on('error', function (error) {
    console.log(error.message);
});
var bluePoint = new ol.Feature();
bluePoint.setStyle(new ol.style.Style({
    image: new ol.style.Circle({
        radius: 5,
        fill: new ol.style.Fill({
            color: '#3399CC'
        }),
        stroke: new ol.style.Stroke({
            color: '#fff',
            width: 2
        })
    })
}));

function makeMovable(feature) {
    var modify = new ol.interaction.Modify({
        features: new ol.Collection([feature])
    });

    feature.on('change', function () {
        var c = this.getGeometry().getCoordinates();
        var p = ol.proj.toLonLat(c);
        $('#ParkLongitude').val(p[0]);
        $('#ParkLatitude').val(p[1]);
    }, feature);
    return modify;
}
var modifyInteraction = makeMovable(redPoint);
map.addInteraction(modifyInteraction);

var coordinates;
var geolocationMapped = false;
geolocation.on('change:position', function () {
    coordinates = geolocation.getPosition();
    bluePoint.setGeometry(coordinates ?
            new ol.geom.Point(coordinates) : null);
    if (coordinates && false === geolocationMapped) {
        geolocationMapped = true;
        var v = map.getView();
        v.setCenter(coordinates);
        v.setZoom(14);
        redPoint.setGeometry(new ol.geom.Point(coordinates));
    }
});
new ol.layer.Vector({
    map: map,
    source: new ol.source.Vector({
        features: [bluePoint, redPoint]
    })
});