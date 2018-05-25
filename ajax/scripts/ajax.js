$(document).ready(function() {
    $('button[type="submit"]').click(addNewColor);

    loadColorsJQuery();
});

function addNewColor(event) {
    //stop the form from posting
    event.preventDefault();

    //read in my form values
    let name = $('input[name="name"]').val();
    let red = $('input[name="red"]').val();
    let green = $('input[name="green"]').val();
    let blue = $('input[name="blue"]').val();

    //validation...

    //update our UI
    addTableRow(name, red, green, blue);

    //send the data to the server (DB)
    insertColorIntoDB(name, red, green, blue);
}

function addTableRow(name, red, green, blue) {
    //create an array for our cells
    let parts = [name, red, green, blue];
    let row = document.createElement("tr");

    //create each cell
    for (let i = 0; i < parts.length; i++) {
        let cell = document.createElement("td");
        cell.innerHTML = parts[i];
        row.appendChild(cell);
    }

    //add the color preview
    let previewCell = document.createElement("td");
    let preview = document.createElement("div");
    previewCell.appendChild(preview);

    //set the style values for the preview div
    preview.style.width = "30px";
    preview.style.height = "30px";
    preview.style.backgroundColor = "rgb(" + red + ", " + green + ", " + blue + ")";

    //add the preview to the row
    row.appendChild(previewCell);

    //add the row to the table
    let tableBody = document.getElementById("colorsBody");
    tableBody.append(row);
}

function addTableRowJqueryStyle(name, red, green, blue) {
    let components = [name, red, green, blue];
    let row = $("<tr></tr>");

    for (let i = 0; i < components.length; i++) {
        row.append("<td>" + components[i] + "</td>");
    }

    let preview = $('<td><div style="width: 30px; height: 30px; background-color: rgb(' +
                     red + ', ' + green + ', ' + blue + ');"></div></td>');
    row.append(preview);

    $("#colorsTable tbody").append(row);
}

function loadColorsJQuery() {
    $.ajax({
        type: "GET",
        url: "../models/ajax.php",
        cache: false,
        data: {
            command: "allColors",
        },
        error: function(response, status, error) {
            alert("Error: " + error);
        },
        success: function(data, status, response) {
            buildInitialTable(data);
        }
    });
}

//will load all colors into the colors table when the page is done loading
function loadColors() {
    //create a request with a response function
    let request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        //readyState - 4: the request has completed, response is ready
        //status - 200: http code for success
        if (this.readyState === 4 && this.status === 200) {
            buildInitialTable(this.responseText);
        }
    };

    //send the request
    request.open('GET', '../models/ajax.php', true);
    request.send();
}

function buildInitialTable(colorsJson) {
    let colorsArray = JSON.parse(colorsJson);

    for (let i = 0; i < colorsArray.length; i++) {
        let color = colorsArray[i];

        addTableRow(color.name, color.red, color.green, color.blue);
    }
}

function insertColorIntoDB(name, red, green, blue) {
    $.ajax({
        type: "GET",
        url: "../models/ajax.php",
        cache: false,
        data: {
            command: "insert",
            name: name,
            red: red,
            green: green,
            blue: blue
        },
        error: function(response, status, error) {
            alert("Error: " + error);
        },
        success: function(data, status, response) {
            //successfully entered a new color into the DB
            insertColorWasSuccessful();
        }
    });
}

function insertColorWasSuccessful() {
    $('input').val("");
}











