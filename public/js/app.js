// On utilise moment.js pour afficher "il y x mois/jours/heures" au lieu de la date au format classique
moment.locale('fr');
$('.dateIlya').each(function () {
    var date = $(this).text();
    $(this).text(moment(date, "YYYY-MM-DD hh:mm:ss").fromNow());
});

jQuery(document).ready(function($) {
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    }

    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
    $(".clickable-card").click(function() {
        window.location = $(this).data("href");
    });
});
