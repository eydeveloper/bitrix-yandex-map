document.addEventListener('DOMContentLoaded', function () {
    BX.ajax.runComponentAction('app:yandex.map', 'getOffices', {
        mode: 'class'
    }).then(function (response) {
        ymaps.ready(init);

        function init() {
            var myMap = new ymaps.Map("map", {
                center: [55.76, 37.64],
                zoom: 10
            }, {
                searchControlProvider: 'yandex#search'
            });

            response.data?.offices.forEach(office => {
                myMap.geoObjects.add(new ymaps.Placemark(office.COORDINATES_VALUE.split(' '), {
                    balloonContent: `
                    <strong>${office.NAME}</strong>
                    <div>Электронная почта: ${office.EMAIL_VALUE}</div>
                    <div>Город: ${office.CITY_VALUE}</div>
                    <div>Телефон: ${office.PHONE_VALUE}</div>
                `
                }, {
                    preset: 'islands#dotIcon',
                    iconColor: '#735184'
                }));
            });
        }
    }).catch(function (response) {
        console.log(response);
    });
});