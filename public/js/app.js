// On utilise moment.js pour afficher "il y x mois/jours/heures" au lieu de la date au format classique
moment.locale('fr');
$('.author').each(function () {
    var date = $(this).text();
    $(this).text(moment(date, "YYYY-MM-DD hh:mm:ss").fromNow());
});

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});