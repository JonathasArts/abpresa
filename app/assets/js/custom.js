$("body").on("click",".toggleOptionPanel",function () {
	$("body").toggleClass("quickSectionActive");
});

// Accordion Collapse
$("body").on("click",".accordion > header > a",function (e) {
    e.preventDefault();
    var $this = $(this),
        p = $this.parents(".accordion"),
        sibAcc = p.siblings(".accordion");
    sibAcc.find(".accordion-content").slideUp();
    p.find(".accordion-content").slideToggle();
});


$(document).ready(function() {
    // MultiSelect
    $('#select-tags').multiselect();
    
    // Tablesorter
    $('#table-praticas').tablesorter({ 
        headers: { 5: { sorter: false} },
        sortMultiSortKey: 'altKey' 
    });
    $('#table-categorias').tablesorter({ 
        headers: { 2: { sorter: false} },
        sortMultiSortKey: 'altKey' 
    });
    $('#table-usuarios').tablesorter({ 
        headers: { 5: { sorter: false} },
        sortMultiSortKey: 'altKey' 
    });

    // IziModal
    // - Instancia e Carrega o modal OK
    $("#modal-ok").iziModal({
        title: "Feito!",
        headerColor: '#89AC10',
        closeButton: false,
        width: 0,
        timeout: 1500,
        pauseOnHover: true,
        timeoutProgressbar: true,
        iconClass: 'fontawesome',
        icon: 'fa fa-check',
        attached: 'bottom'
    });
    $(document).on('click', '.bt-md-ok', function (event) {
        event.preventDefault();
        $('#modal-ok').iziModal('open');
        setTimeout(function() {
            $('#bt-md-ok')[0].click();
        },2);
    });

    // - Instancia e Carrega o modal cancel
    $("#modal-cancel").iziModal({
        title: "Cancelado!",
        headerColor: '#d63123',
        closeButton: false,
        width: 200,
        timeout: 1500,
        pauseOnHover: true,
        timeoutProgressbar: true,
        iconClass: 'fontawesome',
        icon: 'fa fa-ban',
        attached: 'bottom'
    });
    $(document).on('click', '.bt-md-cancel', function (event) {
        event.preventDefault();
        $('#modal-cancel').iziModal('open');
    });

});


// Instancia e Carrega o modal de confirmação de exclusão
function modalRemove(bt){
    
    var path_id = bt.getAttribute("data-pathid");
    var msg = bt.getAttribute("data-msg");
    
    $("#modal-remove").iziModal({
        title: "Deseja realmente excluir?",
        iconClass: 'fontawesome',
        icon: 'fa fa-warning',
        headerColor: '#89AC10',
        width: "40%"
    });

    $('#modal-remove').iziModal('setTransitionIn', 'flipInX');
    // comingIn, bounceInDown, bounceInUp, fadeInDown, fadeInUp, fadeInLeft, fadeInRight, flipInX
    
    $('#modal-remove').iziModal('setSubtitle', msg);
    // $('#modal-remove #bt-modal-confirm').attr("href", path_id);
    $('#modal-ok #bt-md-ok').attr("href", path_id);

    event.preventDefault();
    $('#modal-remove').iziModal('open');
}

function alertMSG(msg=null){
    $("#modal-msg").iziModal({
        headerColor: '#89AC10',
        closeButton: false,
        width: 400,
        timeout: 2000,
        pauseOnHover: true,
        timeoutProgressbar: true,
        iconClass: 'fontawesome',
        icon: 'fa fa-check',
        attached: 'bottom'
    });
    $('#modal-msg').iziModal('setTitle', msg);
    
    $('#modal-msg').iziModal('open');
}