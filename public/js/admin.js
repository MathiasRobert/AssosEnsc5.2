$(document).ready(function () {
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/French.json",
        }

    });

    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    }

    var table = $('#datatables').DataTable();

    // Delete article
    table.on('click', '.remove-article', function (e) {
        var id = $(this).data("id");
        var token = $(this).data("token");
        var tr = $(this).closest('tr');
        swal({
            title: 'Êtes-vous sur ?',
            text: "C'est une suppression définitive !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler',
            buttonsStyling: false
        }).then(function () {
            $.ajax({
                url: "/admin/articles/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function () {
                    table.row(tr).remove().draw();
                    e.preventDefault();
                    $.notify({
                        icon: "done",
                        message: "Article supprimé"

                    }, {
                        type: "success",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                },
                fail: function () {
                    $.notify({
                        icon: "danger",
                        message: "Erreur : article non supprimé"

                    }, {
                        type: "danger",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                }
            });
        });


    });

    // Delete biere
    table.on('click', '.remove-biere', function (e) {
        var id = $(this).data("id");
        var token = $(this).data("token");
        var tr = $(this).closest('tr');
        swal({
            title: 'Êtes-vous sur ?',
            text: "C'est une suppression définitive !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler',
            buttonsStyling: false
        }).then(function () {
            $.ajax({
                url: "/admin/bieres/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function () {
                    table.row(tr).remove().draw();
                    e.preventDefault();
                    $.notify({
                        icon: "done",
                        message: "Bière supprimée"

                    }, {
                        type: "success",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                },
                fail: function () {
                    $.notify({
                        icon: "danger",
                        message: "Erreur : bière non supprimée"

                    }, {
                        type: "danger",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                }
            });
        });


    });

    // Delete evenement
    table.on('click', '.remove-event', function (e) {
        var id = $(this).data("id");
        var token = $(this).data("token");
        var tr = $(this).closest('tr');
        swal({
            title: 'Êtes-vous sur ?',
            text: "C'est une suppression définitive !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler',
            buttonsStyling: false
        }).then(function () {
            $.ajax({
                url: "/admin/evenements/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function () {
                    table.row(tr).remove().draw();
                    e.preventDefault();
                    $.notify({
                        icon: "done",
                        message: "Evènement supprimé"

                    }, {
                        type: "success",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                },
                fail: function () {
                    $.notify({
                        icon: "danger",
                        message: "Erreur : évènement non supprimé"

                    }, {
                        type: "danger",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                }
            });
        });
    });

    // Delete membre
    table.on('click', '.remove-membre', function (e) {
        var id = $(this).data("id");
        var token = $(this).data("token");
        var tr = $(this).closest('tr');
        swal({
            title: 'Êtes-vous sur ?',
            text: "C'est une suppression définitive !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler',
            buttonsStyling: false
        }).then(function () {
            $.ajax({
                url: "/admin/membres/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function () {
                    table.row(tr).remove().draw();
                    e.preventDefault();
                    $.notify({
                        icon: "done",
                        message: "Membre supprimé"

                    }, {
                        type: "success",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                },
                fail: function () {
                    $.notify({
                        icon: "danger",
                        message: "Erreur : membre non supprimé"

                    }, {
                        type: "danger",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                }
            });
        });
    });

    // Delete action
    table.on('click', '.remove-action', function (e) {
        var id = $(this).data("id");
        var token = $(this).data("token");
        var tr = $(this).closest('tr');
        swal({
            title: 'Êtes-vous sur ?',
            text: "C'est une suppression définitive !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler',
            buttonsStyling: false
        }).then(function () {
            $.ajax({
                url: "/admin/actionsFamilles/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function () {
                    table.row(tr).remove().draw();
                    e.preventDefault();
                    $.notify({
                        icon: "done",
                        message: "Action supprimé"

                    }, {
                        type: "success",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                },
                fail: function () {
                    $.notify({
                        icon: "danger",
                        message: "Erreur : action non supprimé"

                    }, {
                        type: "danger",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                }
            });
        });
    });


    $('.card .material-datatables label').addClass('form-group');

    $('#TypeValidation').validate({
        errorPlacement: function (error, element) {
            $(element).parent('div').addClass('has-error');
        }
    });

    $('.datetimepicker').datetimepicker({
        locale: 'fr',
        format: 'YYYY-MM-DD HH:mm',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove',
            inline: true,
            sideBySide: true
        }
    });

    var color = $("#select-couleur option:selected").text();
    $('[data-id="select-couleur"]').css("background-color", color);

    $("#select-couleur").change(function () {
        color = $("#select-couleur option:selected").text();
        console.log(color);

        $('[data-id="select-couleur"]').css({
            'background-color': color, // couleur rouge

        });
    });
});
