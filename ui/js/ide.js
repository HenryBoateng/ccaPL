let editor;


window.onload = function() {
  editor = ace.edit("editor");
  editor.setTheme("ace/theme/monokai");
}



function currentLanguage() {

  let language = $("#languages").val();

}

//code to execute code

function executeCode() {

  $.ajax({

    url: "/work/app/compiler.php", // url: the server (file) location

    method: "POST", //method: the type of request: GET or POST

    data: {
      language: $("#languages").val(),
      code: editor.getSession().getValue()
    },

    success: function(response) {
      $(".output").text(response) &&
        $(".output").html(response)
    }

  })

}