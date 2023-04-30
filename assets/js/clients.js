$(function() {
    function getClients() {
        $("#clients-content-table").html("");
        $.ajax({
            url: "src/clients/index.php",
            type: "GET",
            success: function(response) {
                if (response.success == false) {
                    $("#clients-content-table").append("<tr><td colspan='9'><h2>" + response.message + "</h2></td></tr>");
                } else {
                    $.each(response.data, function(key, value) {
                        $("#clients-content-table").append("<tr>" +
                            "<td>" + value.name + "</td>" +
                            "<td>" + value.type + "</td>" +
                            '<td><input class="form-check-input" type="checkbox" value="" id="platform-' + value.id + '" '+ (value.platform == 1 ? 'checked' : '') + ' disabled></td>' +
                            '<td><input class="form-check-input" type="checkbox" value="" id="catalog-' + value.id + '" '+ (value.catalog == 1 ? 'checked' : '') + ' disabled></td>' +
                            '<td><input class="form-check-input" type="checkbox" value="" id="content-' + value.id + '" '+ (value.content == 1 ? 'checked' : '') + ' disabled></td>' +
                            '<td><input class="form-check-input" type="checkbox" value="" id="other-' + value.id + '" '+ (value.other == 1 ? 'checked' : '') + ' disabled></td>' +
                            '<td>' + value.adviser + '</td>' +
                            '<td>' + value.executive + '</td>' +
                            '<td><button type="button" class="btn btn-outline-danger btn-delete-client" data-id="' + value.id + '" data-name="' + value.name + '"><i class="bi bi-x"></i></button></td>' +
                        "</tr>");
                    });
                }
            }
        });
    }

    function getSelectors() {
        $.ajax({
            url: "src/clients/selector.php",
            type: "GET",
            success: function(response) {
                if (response.data.advisers.length > 0) {
                    $.each(response.data.advisers, function (i, item) {
                        $('#adviser-selector').append($('<option>', { 
                            value: item.id,
                            text : item.name 
                        }));
                    });
                }
                if (response.data.executives.length > 0) {
                    $.each(response.data.executives, function (i, item) {
                        $('#executive-selector').append($('<option>', { 
                            value: item.id,
                            text : item.name 
                        }));
                    });
                }
            }
        });
    }

    $.validator.addMethod("checkboxes", function(value, element) {
        return $('.checkboxes:checked').length > 0;
    }, 'Al menos un elemento requerido')

    $("#store-client-form").submit(function(e) {
        e.preventDefault();
      }).validate({
        rules: {
            name: 'required',
            type: 'required',
            adviser_id: 'required',
            executive_id: 'required',
            platform : { checkboxes: true }
        },
        groups: {
            checkboxes: "platform catalog content other"
        },
        messages: {
            name: {
                required: 'Este campo es requerido'
            },
            type: {
                required: 'Este campo es requerido'
            },
            adviser_id: {
                required: 'Este campo es requerido'
            },
            executive_id: {
                required: 'Este campo es requerido'
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.row'));
            } else {
                error.insertAfter(element);
            }
            //error.appendTo( element.parent("td").next("td") );
        },
        submitHandler: function(form) {
            var data = $(form).serializeArray()
                .reduce(function (json, { name, value }) {
                    json[name] = value;
                    return json;
                }, {});
            $.ajax({
                type: 'POST',
                url: 'src/clients/store.php',
                data: JSON.stringify(data),
                timeout: 3000,
                success: function(response) {
                    $('#saveClientModal').modal('hide');
                    $("#store-client-form").trigger('reset');
                    getClients()
                },
                error: function(errors) {
                    console.log(errors)
                }
            });
        }
    });
    
    $(document).on('click', ".btn-delete-client", function() {
        var client_id = $(this).data("id");
        var client_name = $(this).data("name");

        $('#lbl-client').html(client_name).data('id', client_id)
        $('#deleteClientModal').modal('show');
    });

    $(document).on('click', '.confirm-delete', function() {
        var client_id = $('#lbl-client').data("id");
        var obj = {id: client_id};

        $.ajax({
            url: 'src/clients/delete.php',
            type: "DELETE",
            data: JSON.stringify(obj),
            success:function(data) {
                $('#deleteClientModal').modal('hide');
                getClients()
            }
        });
    });
    
    getClients();
    getSelectors();
})