<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style-budgetisation-referencement.css') }}" />
</head>

<body>


<div class="icon-retour">
    <a style="color: #2eb2ff;" href="file:///Users/khalila/Desktop/bootstrap%20e-contact/index.html">< Retour  ( chemins des onglets parcourus )</a>
</div>


<section  id="fond-1" align=center>

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12" align=center>
                <div class="titre-1">
                    <p>Budgétisation</p>
                </div>
                <div class="titre-2">
                    <p class="acroche"><span style="color: #ffdb2e"><strong>Optimisez</strong></span> votre présence sur les moteurs de recherche
                        <br>
                        et sur telecontact.ma et <span style="color: #ffdb2e"><strong>gagnez</strong></span>en performance et en nouveaux clients
                    </p>
                </div>
            </div>

        </div>

    </div>

</section>

{#----------------------------------Mes activités Referencement---------------------------------#}
<section  id="fond-2">

    <div class="container">

        <div class="row">
            <div class="form-group" name="form1" method="POST" action="{{ path('referencementdevis') }}" >
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="btn-1">
                        <img class="icone" src="https://image.noelshack.com/fichiers/2018/08/5/1519379743-icone-3.png" alt="icone-3">
                        Référencement
                    </div>
                    <br>
                    <div class="activites">
                        <div class="btn-2" align="center">
                            <p>Mes activités</p>
                        </div>



                        <div class="form-group">
                            <label for="exampleInputAmount">Rubriques</label>
                            <div class="input-group ">
                                <input type="number" class="form-control exampleInputAmount rubrique "  placeholder="Nbre" name="num1" id="num1" >
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="exampleInputAmount">Prestations</label>
                            <div class="input-group">
                                <input type="number" class="form-control exampleInputAmount"  placeholder="Nbre" name="sum" id="sum" readonly>
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="exampleInputAmount">Prestations supll.</label>
                            <div class="input-group">

                                <input type="number" class="form-control exampleInputAmount pres_marq"  placeholder="Nbre" name="num2" id="num2" >
                            </div>
                        </div>
                        <tr><td><input type="number" name="sum2" id="sum2" class="pres_marq" style="display:none;" /></td></tr>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputAmount">Marque</label>
                            <div class="input-group">
                                <input type="number" class="form-control exampleInputAmount pres_marq"  placeholder="Nbre" name="num1" id="num3">
                            </div>
                        </div>
                        <td><input type="number" name="num1" id="sum3" class="pres_marq" style="display:none;" /></td>
                        <td> <input type="number" id="mari" name="marie" value="" style="display:none;"></td>
                        <td> <input type="number" id="resulta" name="marie" style="display:none;" value=""></td>
                        <td> <input type="number" id="rubd" style="display:none;"  value=""></td>
                        <td><input type="number" id="rania" style="display:none;" value=""></td>

                    </div>

                    <br>


                    <div class="activites">

                        <div class="btn-2" align="center">
                            <p>Ma visibilité sur</p>
                        </div>


                        <div class="form-group">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ville principale <span class="caret"></span></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="overflow-y:scroll;">
                                    <li><input id="select" class="my-activitys" type="radio" name="villes" value="9">&nbsp; &nbsp;Casablanca</li>
                                    <li><input id="select" class="my-activitys" type="radio" name="villes" value="10">&nbsp; &nbsp;Rabat</li>
                                    <li><input id="select" class="my-activitys" type="radio" name="villes" value="14">&nbsp; &nbsp;Fes</li>
                                    <li><input id="select" class="my-activitys" type="radio" name="villes" value="16">&nbsp; &nbsp;Tanger</li>
                                    <li><input id="select" class="my-activitys" type="radio" name="villes" value="4">&nbsp; &nbsp;Agadir</li>
                                    {% for ville in villes %}
                                        <div class="tex" >
                                            <li><input id="select" class="my-activitys" type="radio" name="villes" value="{{ ville.region.coderegion }}"/>&nbsp; &nbsp;{{ ville.libelle }}</li>
                                        </div>
                                    {% endfor %}
                                </ul>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ville suppl. <span class="caret"></span></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="overflow-y:scroll;">


                                    <li><input  type="radio" name="radio" class="my-activity"  value="0"/>&nbsp; &nbsp;Sur sa localité</li>
                                    <li><input  type="radio" name="radio" class="my-activity"  value="1"/>&nbsp; &nbsp;+1 Localité</li>
                                    <li><input  type="radio" name="radio" class="my-activity"  value="3"/>&nbsp; &nbsp;+3 Localités</li>
                                    <li><input  type="radio" name="radio" class="my-activity"  value="6"/>&nbsp; &nbsp;+6 Localités</li>
                                    <li><input  type="radio" name="radio" class="my-activity"  value="9"/>&nbsp; &nbsp;+9 Localités</li>

                                </ul>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Région principale <span class="caret"></span></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu3" style="overflow-y:scroll;">


                                    {% for entities in entities  %}
                                        <div class="tex xxx" >
                                            <li><input id="select" class="regiontest" type="radio" name="regions" value="{{ entities.coderegion }}"/>&nbsp; &nbsp;{{ entities.libelle }}</li>
                                        </div>
                                    {% endfor %}
                                </ul>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Région suppl. <span class="caret"></span></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu4" style="overflow-y:scroll;">
                                    <li><input  type="radio" name="radio" class="region"  value="0"/>&nbsp; &nbsp;Sur sa region</li>
                                    <li><input  type="radio" name="radio" class="region"  value="1"/>&nbsp; &nbsp;+1 Région</li>
                                    <li><input  type="radio" name="radio" class="region"  value="3"/>&nbsp; &nbsp;+3 Régions</li>
                                    <li><input  type="radio" name="radio" class="region"  value="6"/>&nbsp; &nbsp;+6 Régions</li>
                                    <li><input  type="radio" name="radio" class="region"  value="N"/>&nbsp; &nbsp;National</li>



                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</section>
<br>
<br>




{#-------------------------------------------Vidéo---------------------------------------------#}

<section  id="fond-3" align=center>

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12" align=center>
                <div class="btn-1">
                    <p>Exemple de visibilité</p>
                </div>
                <br>
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe src="https://www.youtube.com/embed/Xd84YbZmlvg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>

    </div>

</section>

<section  id="fond-4">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12" >

                <form class="form-inline">


                    <div class="form-group">

                        <a href="#" id="khalila" {#onclick="this.parentElement.style.display='none';"#} class="btn black" role="button">
                            <span style="color: #ffdb2e;">Budget estimé</span>
                            <br>Référencement
                        </a>



                    </div>
                    <input style="  "  id="fayssal" type="number"  value="">
                    <div class="form-group pull-right">

                            <div class="form-group">
                                <a href="#" role="button" class="btn">
                                    <img class="icone" src="https://image.noelshack.com/fichiers/2018/08/5/1519379743-icona-2.png" alt="icone-3">
                                    Gestion de Contenu   <span class="glyphicon glyphicon-triangle-right"></span>
                                </a>
                            </div>
                            <div class="form-group">
                                <a href="#" role="button" class="btn" style="width: 165px;">
                                    <img class="icone" src="https://image.noelshack.com/fichiers/2018/08/5/1519379743-icone-1.png" alt="icone-3">
                                    Affichage   <span class="glyphicon glyphicon-triangle-right"></span>
                                </a>
                            </div>

                    </div>
                </form>
            </div>
        </div>

    </div>

</section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        function cal(){
            var total = +$("#rania").val() || 0;
            var vat = +$("#mari").val() || 0;
            var vard = +$("#rubd").val() || 0;
            var final = +$("#resulta").val() || 0;

         /*   alert(vat);
            alert(total);
            alert(vard);*/

            $("#fayssal").val(vat + total+vard+final);
        }

        $(document).on('click', '#khalila', function () {
cal();

            document.getElementById('fayssal')/*.style.display = 'block'*/;

        });

        $(document).on('click', '.my-activitys', function () {
            var o = $(this).attr("value");
            $('.xxx input[value='+o+']').prop("checked", true);
        });

        $(document).on('click', '.my-activity', function () {

            var ctar  = 'MV';
            console.log("CHANGE rubrique AND prestation....................");
            var select = jQuery(this);
            var v = $('input[name=villes]:checked').val();
            var o = $(this).attr("value");

            console.log('ville : ', v, 'opt1 :',o);
            var data_send = { 'ville': v,'opt1':o,'region':v,'ctar':ctar};
            $.ajax({
                url: '{{ path('ajaxRef') }}',
                type: 'POST',
                data: data_send,
                statusCode: {
                    //traitement en cas de succès
                    200: function (response) {

                        var successMessage = response.nom.VAR;


                            $('input[id=rania]').val(successMessage);
                        console.log(successMessage);
                        rub();



                    },

                    412: function (response) {
                        var errorsForm = response.responseJSON.formErrors;
                        //on affiche les erreurs...
                        alert('error');

                    }
                }
            });

        });

                                        ////////////////////////////////////////// selection Region//////////////////////////////////////////////
        $(document).on('click', '.region', function () {

            var ctar  = 'ML';
            console.log("CHANGE rubrique AND prestation....................");
            var select = jQuery(this);
            var v = $('input[name=villes]:checked').val();
            var o = $(this).attr("value");

            console.log('villesss : ', v, 'opt1sss :',o);
            var data_send = { 'ville': v,'opt1':o,'region':v,'ctar':ctar};
            $.ajax({
                url: '{{ path('ajaxRef') }}',
                type: 'POST',
                data: data_send,
                statusCode: {
                    //traitement en cas de succès
                    200: function (response) {

                        var successMessage = response.nom.VAR;


                        $('input[id=rania]').val(successMessage);
                        rub();
                        Reg();


                        console.log(successMessage);


                        /* console.log();
                            $('input[id=rania]').val(sum_result+successMessage);*/

                    },

                    412: function (response) {
                        var errorsForm = response.responseJSON.formErrors;
                        //on affiche les erreurs...
                        alert('error');

                    }
                }
            });

        });

                                        ////////////////////////////////////////// selection Rub supplementaire Ville//////////////////////////////////////////////


        function rub() {

            var num1 = document.getElementById('num1').value;

            if (num1 >=2) {

                var ctar = 'RV';
                console.log("CHANGE rubrique AND prestation sssss ....................");
                var select = jQuery(this);
                var rub = $('input[name=num1]').val();

                var v = $('input[name=villes]:checked').val();
                var o = $('input[class=my-activity]:checked').val();

                console.log('ville : ', v, 'opt1 :', o, 'rubrique: ', rub);
                var data_send = {'ville': v, 'opt1': o, 'region': v, 'ctar': ctar};
                $.ajax({
                    url: '{{ path('ajaxRef') }}',
                    type: 'POST',
                    data: data_send,
                    statusCode: {
                        //traitement en cas de succès
                        200: function (response) {

                            var successMessage = response.nom.VAR;


                            var rubrique = (rub - 1) * successMessage;
                            console.log(rubrique);
                            $('input[id=rubd]').val(rubrique);




                        },

                        412: function (response) {
                            var errorsForm = response.responseJSON.formErrors;
                            //on affiche les erreurs...
                            alert('error');

                        }
                    }
                });
            }

            else{
                $('input[id=rubd]').val(0);

            }

        }

        function Reg() {

            var num1 = document.getElementById('num1').value;

            if (num1 >=2) {

                var ctar = 'RL';
                console.log("CHANGE rubrique AND prestation sssss ....................");
                var select = jQuery(this);
                var rub = $('input[name=num1]').val();

                var v = $('input[name=villes]:checked').val();
                var o = $('input[class=region]:checked').val();

                console.log('ville : ', v, 'opt1 :', o, 'rubrique: ', rub);
                var data_send = {'ville': v, 'opt1': o, 'region': v, 'ctar': ctar};
                $.ajax({
                    url: '{{ path('ajaxRef') }}',
                    type: 'POST',
                    data: data_send,
                    statusCode: {
                        //traitement en cas de succès
                        200: function (response) {

                            var successMessage = response.nom.VAR;


                            var rubrique = (rub - 1) * successMessage;
                            console.log(rubrique);
                            $('input[id=rubd]').val(rubrique);




                        },

                        412: function (response) {
                            var errorsForm = response.responseJSON.formErrors;
                            //on affiche les erreurs...
                            alert('error');

                        }
                    }
                });
            }

            else{
                $('input[id=rubd]').val(0);

            }

        }




        $("#num2").on("keydown keyup change", function() {
            var num2 = document.getElementById('num2').value;
            var result2 = parseInt(num2) * 1500;
            document.getElementById("resulta").value = result2 ;

        });
        $("#num3").on("keydown keyup change", function() {
            var num3 = document.getElementById('num3').value;
            var result3 = parseInt(num3) * 400;
            document.getElementById("mari").value = result3;


        });
        $("#num1").on("keydown keyup change", function() {

            var num1 = document.getElementById('num1').value;
            var result = parseInt(num1) * 3;
            document.getElementById('sum').value = result;
        });





   /*     $(document).on("keydown keyup change", function() {


//                var result ;
            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
            var num3 = document.getElementById('num3').value;




            var result = parseInt(num1) * 3;
            var result2 = parseInt(num2) * 1500;
            var result3 = parseInt(num3) * 400;


            if (!isNaN(result)) {
                document.getElementById('sum').value = result;
                document.getElementById('sum2').value = result2;
                document.getElementById('sum3').value = result3;

            }


            document.getElementById("result23").value =  result2+ result3 ;


            /!* sum_result =  result2 + result3;*!/
            rub();







        });
*/


    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery.js"></script>
