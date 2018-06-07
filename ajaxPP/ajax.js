//register events
$(document).ready(function() {
    $('button[type="submit"]').click(addNewNote);

    loadColors();
});

//practice updating the DOM
function addNewNote(event) {
    event.preventDefault();

    //get our input fields
    let body = $('input[name="body"]').val();

    //validate...

    //update our UI
    addNoteOption(body);

    //send the data to the server
    insertNoteIntoDB(body);
}

function addNoteOption(body) {
    let select = $('#notes');
    let newOption = $('<option>' + body + '</option>');

    select.append(newOption);
}

function insertNoteIntoDB(body) {
    $.ajax({
        type: "GET",
        url: "ajax.php",
        cache: false,
        data: {
            command: "addNote",
            body: body
        },
        error: function(response, status, error) {
            alert("Error: " + error);
        },
        success: function(data, status, response) {
            successfulInsert();
        }
    });
}

function successfulInsert() {
    $('input[name="body"]').val("");
}