
<script>
    function initialize() {
        var map = new google.maps.Map(document.getElementById('googleMap'));
        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();
        //Carry out an Ajax request.
        $.ajax({
            url: CI.base_url+'ubicacion_json',
            dataType:'json',
            success:function(data){
                console.log(data);
                //Loop through each location.
                $.each(data, function(){
                    
                    var latlng = new google.maps.LatLng(this.latitud, this.longitud);
                    bounds.extend(latlng);

                    var marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        title: "probando"
                    });

                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.setContent(this.title);
                        infowindow.open(map, this);
                    });
                    //Plot the location as a marker
//                    pos = new google.maps.LatLng(this.latitud, this.longitud); 
//                    new google.maps.Marker({
//                        position: pos,
//                        map: map
//                    });
                });
                map.fitBounds(bounds);
            }
        });
//        var mapProp = {
//            center: new google.maps.LatLng(51.508742, -0.120850),
//            zoom: 5,
//            mapTypeId: google.maps.MapTypeId.ROADMAP
//        };
//        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<section class="content-header">
    <h1>Listado de total de ubicación</h1>
    <ol class="breadcrumb">
        <li class=""><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Portada</a></li>
        <li class="active">Ubicación</li>
    </ol>
</section>
<section class="content">
    <div class="box noBox">

        <div id="googleMap" style="width:100%;height:700px;"></div>
        <!--        <div class="box-header">
                    <h3 class="box-title pull-right"><a href="<?php echo base_url('crear-local'); ?>" class="btn btn-warning btn-flat awhite" rel="facebox"><span class="fa fa-plus"></span> AGREGAR LOCAL</a></h3>
                </div>-->
        <!--        <div class="box-body table-responsive" >
                    <div id="resultado_filtro">
                        <table id="tablaListado" class="table table-bordered table-striped table-hover" >
                            <thead class="headTablaListado">
                                <tr class="text-uppercase">
                                    <th>EMPRESA</th>
                                    <th>NRO RECLAMOS</th>
                                    <th>ESTADO</th>
                                </tr>
                            </thead>
                            <tfoot class="footTablaListado">
                                <tr class="text-uppercase">
                                    <th>EMPRESA</th>
                                    <th>NRO RECLAMOS</th>
                                    <th>ESTADO</th>
                                </tr>
                            </tfoot>
                            <tbody class="bodyTablaListado">
        
                            </tbody>
                        </table>
                    </div>
                </div>-->
    </div>
</section>
<script>
    $(function () {
        $('a[rel*=facebox]').facebox();
        $('#facebox').draggable({handle: 'div.titulo'});
    });

</script>