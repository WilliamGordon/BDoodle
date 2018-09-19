
function greenCell(cellId)
{

    if(document.getElementById(cellId + cellId).checked)
    {
        document.getElementById(cellId).setAttribute("class", "greenishbg text-center");
    } else
    {
        document.getElementById(cellId).setAttribute("class", "whitebg text-center");
    }

}

function SameHours(col) 
{
    var idFirstElement = "h" + col + "." + 1;
    var SharingClass = "HourGrp" + col;
    var hour = document.getElementById(idFirstElement).value;
    var hourGroupe = document.getElementsByClassName(SharingClass);
    if(hour != "")
    {
        for (var i = 1; i <= hourGroupe.length; i++)
        {
            console.log(i);
            hourGroupe.item(i).value = hour;
        }
    }
}

function addAnotherRowOfHours(num, col)
{

    if(col < 4) 
    {
        //CREATE hoursCol
        var newDiv = document.createElement("div");
        var newDivId = "hoursCol" + (col+1);
        newDiv.setAttribute("id", newDivId);
        newDiv.setAttribute("class", "HourColl");
        newDiv.classList.add("float-left");

        //CREATE DivButtonSame
        var newDivButton = document.createElement("div");
        var newDivButtonId = "buttonSameDiv" + (col+1);
        newDivButton.setAttribute("id", newDivButtonId);
        newDivButton.setAttribute("class", "buttonSame");

        newDivButton.classList.add("float-left");

        //CREATE ButtonSame
        var newButton = document.createElement("Input");
        var newButtonId = "buttonSame" + (col+1);
        newButton.setAttribute("type", "button");
        newButton.setAttribute("id", "buttonSame");
        newButton.setAttribute("class", "btn btn-secondary btn-sm");
        newButton.setAttribute("value", "répliquer");
        //SameHours()
        //SameHours()
        newButton.setAttribute("onclick", "SameHours(" + (col+1) + ")");

        //CREATE ColHoursGrp
        var newDivHoursGrp = document.createElement("div");
        var newDivHoursGrpId = "hoursColGrp2" + (col+1)
        newDivHoursGrp.setAttribute("id", newDivHoursGrpId);
        newDivHoursGrp.classList.add("float-left");

        //PUT THE ELEMENT BACK TOGETHER
        document.getElementById("inputSection").appendChild(newDiv);
        document.getElementById(newDivId).appendChild(newDivButton);
        document.getElementById(newDivId).appendChild(newDivHoursGrp);
        document.getElementById(newDivButtonId).appendChild(newButton);

        for (var i = 1; i <= num; i++)
        {
            //CREATE NEW LABEL
            var newLabel = document.createElement("Label");
            var labelId = "l" + (col+1) + "." + i;
            newLabel.setAttribute("id", labelId);

            //CREATE NEW INPUT TIME
            var newInputTime = document.createElement("Input");
            newInputTime.setAttribute("type", "Time");
            newInputTime.setAttribute("class", "hour form-control form-control-sm HourGrp" + (col+1));
            var newInputId = "h" + (col+1) + "." + i; 
            var newInputName = "dh" + i + "[]"; 
            newInputTime.setAttribute("id", newInputId);
            newInputTime.setAttribute("name", newInputName);

            //CREATE BR
            var newBR = document.createElement("br");

            document.getElementById(newDivHoursGrpId).appendChild(newLabel);
            document.getElementById(newDivHoursGrpId).appendChild(newInputTime);
            document.getElementById(newDivHoursGrpId).appendChild(newBR);

            document.getElementById(labelId).innerHTML = "Heure Possible:";
        }
        
        document.getElementById("button1").setAttribute("onclick", "addAnotherRowOfHours("+ num + ", " + (col+1) + ")");
    } else 
    {
        alert('Maximum 4 heures différentes !!')
    }
}

function distinctDates(arrayOfdates, date)
{
    var counter = 0;
    var date1 = new Date(date.value);
    console.log(date1);

    for (let i = 0; i < arrayOfdates.length; i++) 
    {
        var date2 = new Date(arrayOfdates[i].value)
        if(date1.getTime() == date2.getTime())
        {
            console.log("doublon");
            counter++;
        }
    }
    console.log(counter);
    if(counter > 1)
    {
        return true
    }
    else
    {
        return false;
    }
}


function validate_form()
{
    valid = true;

    var inputsDates = document.getElementsByClassName("date");
    var inputsHours = document.getElementsByClassName("hour");

    //var elems = document.querySelectorAll(".widget.hover");

    [].forEach.call(inputsHours, function(el) {

        if(el.value == "")
        {
            el.classList.remove("is-valid");
            el.classList.add("is-invalid");
            valid = false; 
        }
        else 
        {
            el.classList.remove("is-invalid");
            el.classList.add("is-valid");
        }
    });

    var today = new Date();
    var counter = 1;
    [].forEach.call(inputsDates, function(el) {

        var dateinp = new Date(el.value);
         if(el.value == "")
        {
            el.classList.remove("is-valid");
            el.classList.add("is-invalid");
            valid = false; 
        }
        else 
        {
            
            console.log(distinctDates(inputsDates, el));

             if(today.getTime() > dateinp.getTime())
            {
                el.classList.remove("is-valid");
                el.classList.add("is-invalid");
                document.getElementById("errorDate" + counter).innerHTML = "Date passée";
                valid = false; 
            }
            else if (distinctDates(inputsDates, el))
            {
                el.classList.remove("is-valid");
                el.classList.add("is-invalid");
                document.getElementById("errorDate" + counter).innerHTML = "Doublon!";
                valid = false; 
            } 
            else
            {
                el.classList.remove("is-invalid");
                el.classList.add("is-valid");
            }
        }
        console.log(counter);
        counter++;
    });
    

    return valid;
}


function addAnotherhour(nbrow, nbinput) {
    var row = "rowPart" + nbrow;
    var button = "button" + nbrow;
    document.getElementById(button).setAttribute("onClick", "addAnotherhour("+ nbrow +", " + (nbinput+1) + ")");

    //CREATE DIV
    var newDiv = document.createElement("div");
    newDiv.classList.add("hour");
    newDiv.classList.add("float-left");
    var newID = "h" + nbrow + nbinput;
    // alert(newID);
    newDiv.setAttribute("id", newID);

    //CREATE LABEL
    var newLabel = document.createElement("Label");
    var labelId = "l" + nbrow + "." + (nbinput+1);
    newLabel.setAttribute("id", labelId);
    
    //CREATE INPUT HOUR n.n
    var newInput = document.createElement("Input");
    newInput.setAttribute("type", "time");
    newInput.setAttribute("class", "form-control");
    newInput.setAttribute("id", "h" + nbrow + "." + nbinput);
    newInput.setAttribute("name", "hour" + nbrow + "." + nbinput);

    //PUT THE ELEMENT TOGETHER
    document.getElementById(row).appendChild(newDiv);
    document.getElementById(newID).appendChild(newLabel);
    document.getElementById(newID).appendChild(newInput);
    document.getElementById(labelId).innerHTML = "Heure Possible: N°" + labelId;
}