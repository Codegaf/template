// var notification = iziToast.show({
//     id: null,
//     class: '',
//     title: '',
//     titleColor: '',
//     titleSize: '',
//     titleLineHeight: '',
//     message: '',
//     messageColor: '',
//     messageSize: '',
//     messageLineHeight: '',
//     backgroundColor: '',
//     theme: 'light', // dark
//     color: '', // blue, red, green, yellow
//     icon: '',
//     iconText: '',
//     iconColor: '',
//     iconUrl: null,
//     image: '',
//     imageWidth: 50,
//     maxWidth: null,
//     zindex: null,
//     layout: 1,
//     balloon: false,
//     close: true,
//     closeOnEscape: false,
//     closeOnClick: false,
//     displayMode: 0, // once, replace
//     position: 'bottomRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
//     target: '',
//     targetFirst: true,
//     timeout: 5000,
//     rtl: false,
//     animateInside: true,
//     drag: true,
//     pauseOnHover: true,
//     resetOnHover: false,
//     progressBar: true,
//     progressBarColor: '',
//     progressBarEasing: 'linear',
//     overlay: false,
//     overlayClose: false,
//     overlayColor: 'rgba(0, 0, 0, 0.6)',
//     transitionIn: 'fadeInUp',
//     transitionOut: 'fadeOut',
//     transitionInMobile: 'fadeInUp',
//     transitionOutMobile: 'fadeOutDown',
//     buttons: {},
//     inputs: {},
//     onOpening: function () {},
//     onOpened: function () {},
//     onClosing: function () {},
//     onClosed: function () {}
// });

iziToast.settings({
    timeout: 2000,
    closeOnClick: true,
    resetOnHover: false,
    icon: 'Fontawesome',
    transitionIn: 'flipInX',
    transitionOut: 'flipOutX',
    position: 'topRight',
    messageColor: '#fff',
    titleColor: '#fff',
    iconColor: '#fff',
    onOpening: function(){

    },
    onClosing: function(){

    }
});

function showNotification(response) {
    var type = typeNotification(response.status);

    iziToast.show({
        title: response.title,
        message: response.message,
        icon: type.icon,
        backgroundColor: type.backgroundColor
    });
}

function typeNotification(status) {
    if (status === 'success') {
        return {
            icon: 'fa fa-check',
            backgroundColor: '#46be8a'
        };
    }
    if (status === 'error') {
        return {
            icon: 'fa fa-times',
            backgroundColor: '#f96868'
        };
    }
}

function deleteNotification(url, oTable = null, oContentModal = null) {
    iziToast.question({
        timeout: 20000,
        close: false,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        icon: 'fa fa-question',
        backgroundColor: '#f2a654',
        titleColor: '#000',
        messageColor: '#000',
        iconColor: '#000',
        title: '¿Está seguro?',
        message: 'Se procederá a su eliminación',
        position: 'center',
        buttons: [
            ['<button><b>SÍ</b></button>', function (instance, toast) {
                $.post(url, {_method: 'DELETE'}).done(function() {
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    if (oTable) {
                        oTable.draw();
                    }
                });

            }, true],
            ['<button>NO</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
        ],
        onClosing: function(instance, toast, closedBy){
            $( ".loading" ).hide();
            $('.content-custom').removeClass('blur');
            //refrescar contenido del modal
            if(oContentModal != null){
                $.ajax({
                    method: 'GET',
                    data: null,
                    cache: false,
                    contentType: false,
                    processData: false,
                    url: refreshUrl,
                    success: function (data) {
                        oContentModal.html(data);
                    }
                });
            }
            //fin  refresh
        },
        onClosed: function(instance, toast, closedBy){


        }
    });
}
