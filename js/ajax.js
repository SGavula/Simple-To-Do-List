$(function() {

  //Select button a add it event
  $("button[name='submit']").click(
    function(e) {
      //Stop execute action
      e.preventDefault();

      //Select paragraph warning and add it empty text
      $(".warning").text("");

     //Select all inputs and make a set of form elements as an array of names and values
     var data = $(".submit-form :input").serializeArray();

     //Select attribute action from form
     var url = $(".submit-form").attr("action");

     //Coditional
     if(data[0].value === "") {

        //Select warning paragraph and add warning text
       $(".warning").text("Please, fill in this form!");

     } else {

       //Select input and give it empty value
       $(".submit-form").find("input").val("");

       //Send to the server
       $.post(url , data, function(message) {

         //Selected div with class notes
         var notesDiv = $(".notes");
         //Created div with attributes 2 classes note and row
         var newNote = $("<div></div>").attr("class", "note row");
         //Created p element with attributes 2 classes col and s11 and added to p element text with value message
         var newPara = $("<p></p>").text(message).attr("class", "col s11");
         //Created a element with attributes 2 classes col and s1
         var newLink = $("<a></a>").attr("class", "col s1");;
         //Created i element with attribute class material-icons and added text with value close
         var newIcon = $("<i></i>").attr("class", "material-icons").text("close");


         //Add newIcon to newLink
         newLink.append(newIcon);
         //Add newPara and newLink to newNote div
         newNote.append(newPara , newLink);
         //Add newNote div to notesDiv div
         notesDiv.append(newNote);

         //add to variable newlink click event
         newLink.click(
           function(e) {
             //Stop execute action
             e.preventDefault();

            //Saved to variable text note from note
            var text = $(this).prev().text();

            //Remove whole note
            $(this).parent().remove();

            //Send to the server
            $.post("php/delete.php", {"note": text});
           });

       });

     }

    }
  );

  //Select all a elements a add them events
  $(".notes .note a").click(
    function(e) {
      //Stop execute action
      e.preventDefault();

      //Saved to variable text note from note
      var text = $(this).prev().text();

      //Remove whole note
      $(this).parent().remove();

      //Post to delete.php file our data from text variable
      $.post("php/delete.php", {"note": text});
    }
  );


});
