function getCategories() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (categories) {
                    var categoryTable = $('#categoryData');
                    categoryTable.empty();
                    var count = 1;
                    $.each(categories.data, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCategory(' + value.id + ')"></a>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\') ? categoryAction(\'delete\', ' + value.id + ') : false;"></a>' +
                                '</td></tr>';
                        categoryTable.append('<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + editDeleteButtons);
                        count++;
                    });

                }
    });
}

/* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}

/*
 $('#categoryAddForm').submit(function (e) {
 e.preventDefault();
 var data = convertFormToJSON($(this));
 alert(data);
 console.log(data);
 });
 */

function categoryAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var categoryData = '';
    var ajaxUrl = urlToRestApi;
    if (type == 'add') {
        requestType = 'POST';
        categoryData = convertFormToJSON($("#addForm").find('.form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
		ajaxUrl = ajaxUrl + "/" + idEdit.value;
        categoryData = convertFormToJSON($("#editForm").find('.form'));
		
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(categoryData),
        success: function (msg) {
            if (msg) {
                alert('Category data has been ' + statusArr[type] + ' successfully.');
                getCategories();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

/*** à déboguer ... ***/
function editCategory(id) {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: urlToRestApi+ "/" + id,
        success: function (data) {
            $('#idEdit').val(data.data.id);
            $('#nameEdit').val(data.data.name);
            $('#descriptionEdit').val(data.data.description);
            $('#editForm').slideDown();
        }
    });
}