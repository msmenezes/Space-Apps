    function mudarEstado($url, $id) {
        //console.log($id);
        //debugger;
        $('#cidade_' + $id).hide();
        $('.carregando').show();
        $.getJSON(
        $url + '/elogistics_controller/getCidade',
        {
            cod_estados: $('#estado_' + $id).val(),
            ajax: 'true'
        }, function (j) {
            var options = '<option value=""></option>';
            for (var i = 0; i < j.length; i++) {
            options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
        }
        $('#cidade_' + $id).html(options).show();
        $('.carregando').hide();
        });
    }