$(document).ready(function() {
    var correctas = 0;
    var incorrectas = 0;
    $("#buttonCheck").click(function() {
        if ($('input[name="checkA"]:checked').val() == 1) {
            $(".imagenTipoInformacion").attr("hidden", true);
            $(".card-header").addClass("bg-success");
            $(".card-footer").addClass("bg-success");
            $(".card").addClass("border-success");
            $(".imagenTipoFlecha").removeAttr("hidden");
            $("#alertCorrecta").removeAttr("hidden");
            // $('#buttonCheck').prop('disabled', 'true');
        } else {
            if ($('input[name="checkA"]:checked').val() == 0) {
                $(".imagenTipoInformacion").attr("hidden", true);
                $(".card-header").addClass("bg-danger");
                $(".card-footer").addClass("bg-danger");
                $(".card").addClass("border-danger");
                $("#alertIncorrecta").removeAttr("hidden");
                // $("#buttonCheck").prop("disabled", "true");
            } else {
                if ($('input[name="checkA]:checked').val() == null) {
                }
            }
        }
    });
});
