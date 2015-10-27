<?php $ranking = true; ?>
@extends('layouts.maincontent')
@section('title')
    Lista de capitulos
@stop
@section('links')
    @parent
    <link rel="stylesheet" type="text/css" href="{{URL::asset('expander/css/style.css')}}">
@stop
@section('body')

    <style>
        div.voltar svg{
            opacity: 0;
            /*-webkit-transition-delay: 0.2s;
            transition-delay: 0.2s;
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%);*/
        }
    </style>

    <div class="well">
        <div align="center">
            <script>!function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "https://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");</script>

            <h2 class="text-primary">{{$disciplina->nome}}</h2>
            {!! Form::hidden('id',$disciplina->id,['id'=>' _id']) !!}

        </div>
        <script type="text/javascript">

            $(document).ready(function () {

                $.ajax({

                    success: function () {

                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();

                        } else {

                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function () {
                            //

                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                var albums = Mustache.to_html($('#capitulos').html(), JSON.parse(xmlhttp.responseText));

                                var details = Mustache.to_html($('#temas').html(), JSON.parse(xmlhttp.responseText));
                                $('.app-folders-container').html(albums + details);

                                $('.app-folders-container').appFolders({
                                    opacity: 1,                 // Opacity of non-selected items
                                    marginTopAdjust: true,            // Adjust the margin-top for the folder area based on row selected?
                                    marginTopBase: 0,               // If margin-top-adjust is "true", the natural margin-top for the area
                                    marginTopIncrement: 0,            // If margin-top-adjust is "true", the absolute value of the increment of margin-top per row
                                    animationSpeed: 200,            // Time (in ms) for transitions
                                    URLrewrite: true,               // Use URL rewriting?
                                    URLbase: "./",            // If URL rewrite is enabled, the URL base of the page where used. Example (include double-quotes): "/services/"
                                    internalLinkSelector: ".jaf-internal a"   // a jQuery selector containing links to content within a jQuery App Folder
                                });

                                // For each image:
                                // Once image is loaded, get dominant color and palette and display them.
                                $('.app-icon').bind('load', function (event) {
                                    var image = event.target;
                                    var $image = $(image);
                                    var imageSection = $image.closest('.imageSection');

                                    var colors = getColors(image);
                                    styleBackground(colors[1], $image.parent().parent().attr('id'));
                                    styleText(colors[1], colors[0], $image.parent().parent().attr('id'));
                                });

                            }


                        }

                        var screenResolution = 4;


                        xmlhttp.open("GET", "capitulo-validacao/" + screenResolution, true);

                        xmlhttp.send();

                    }
                });
            });

        </script>
        <div class='app-icon' style="background-color: #000000;width: 20px;"></div>

        <div class="app-folders-container">
            <script id="capitulos" type="text/x-mustache">
      @{{#data}}
                @{{#first}}
                <div class='jaf-row jaf-container'>
                @{{/first}}
                <div class='folder' id='@{{id}}'>
            <a href='#'>
              <img class='app-icon' src='expander/images/@{{image}}'>
              <p style="margin-top: 6px" class='album-name'>@{{nome}}</p>
              </a>
          </div>
        @{{#last}}
                <br class='clear'>
              </div>
              @{{/last}}
                @{{/data}}
                </div>

            </script>

            <script id="temas" type="text/x-mustache">
      @{{#data}}
                <div class='folderContent @{{id}}'>
          <div class='jaf-container'>
            <div>
              <div class='art-wrap'>
                <img src='expander/images/@{{image}}'>
              </div>
              <h2 class="primaryColor">@{{nome}}</h2>
              <h3 class="secondaryColor">Lista de Temas</h3>
              <div class='multi'>
                <ol class="secondaryColor">
                  @{{#tema}}
                <li><a href="estudar/@{{id }}/@{{.}}"  class="primaryColor">@{{.}}</a></li>
                  @{{/tema}}
                </ol>
                </div>
            </div>
            <br class='clear'>
            <input type="hidden" value="/teste/@{{nome}}/@{{id}}" id="fazerTeste"/>
            <button onclick="document.location.href=document.getElementById('fazerTeste').value">
            <a href="teste/@{{nome}}/@{{id}}">Fazer o Teste</a></button>
          </div>
          {{--<a href="#" class="close">&times;</a>--}}
          <a href="#" class="close"><img src="../img/icons/ic_close_white_24dp_1x.png"></a>
        </div>
      @{{/data}}
            </script>
        </div>
    </div>
    <script src="expander/js/mustache.js"></script>
    <script src="expander/js/jquery.app-folders.js"></script>
    <script src="expander/js/quantize.js"></script>
    <script src="expander/js/color-thief.js"></script>

@stop
