$(function() {

  $("button[name='submit']").click(
    function(e) {
      e.preventDefault();

      $(".warning").text("");


     var data = $(".submit-form :input").serializeArray();
     var url = $(".submit-form").attr("action");

     if(data[0].value === "") {

       $(".warning").text("Please, fill in this form!");

     } else {
       $(".submit-form").find("input").val("");

       $.post(url , data, function(message) {

         var notesDiv = $(".notes");
         var newNote = $("<div></div>").attr("class", "note row");
         var newPara = $("<p></p>").text(message).attr("class", "col s11");
         var newLink = $("<a></a>").attr("class", "col s1");;
         var newIcon = $("<i></i>").attr("class", "material-icons").text("close");


         newLink.append(newIcon);
         newNote.append(newPara , newLink);
         notesDiv.append(newNote);

         newLink.click(
           function(e) {
             e.preventDefault();

            var text = $(this).prev().text();

            $(this).parent().remove();

            $.post("php/delete.php", {"note": text});
           });

       });

     }

    }
  );

  $(".notes .note a").click(
    function(e) {
      e.preventDefault();

      var text = $(this).prev().text();

      $(this).parent().remove();

      $.post("php/delete.php", {"note": text});
    }
  );


});
