<script type="text/javascript">
  var map;
  var marker_counter=0;
  var prev_iw=false;
  var iw_content='<form>'+
      '<div class="md-form">'+
          '<input type="text" id="defaultForm-email" class="form-control" value=>'+
          '<label for="defaultForm-email">Nama</label>'+
      '</div>'+
      '<div class="md-form">'+
          '<input type="password" id="defaultForm-pass" class="form-control">'+
          '<label for="defaultForm-pass">Your password</label>'+
      '</div>'+
      '<div class="text-center">'+
          '<button class="btn btn-cyan text-white">Login</button>'+
      '</div>'+
  '</form>';

  $(document).ready(function(){
    $(".button-collapse").sideNav();
    $.ajax({
      url: '<?php echo base_url('Maps/location') ?>',
      type: 'POST',
      dataType: 'JSON',
      success: function(data)
      {
        for (var i = 0; i < data.length; i++) {
          var lat = data[i].latitude;
          var lng = data[i].longitude;
          var location = new google.maps.LatLng(lat,lng);

          var marker= new google.maps.Marker({
            position:location,
            map:map,
          });

          marker.infowindow = new google.maps.InfoWindow({
            content:iw_content,
          });
          click_marker(map,marker);
        }
      }
    });
  });

  //MAPS
  function click_marker(map,marker){
    google.maps.event.addListener(marker,'click',function(){
      if(prev_iw){
        prev_iw.close();
      }
      if((prev_iw==marker.infowindow)&&(marker_counter==1)){
        prev_iw.close();
        marker_counter=0;
      }
      else{
        marker_counter=1;
        prev_iw= marker.infowindow;
        marker.infowindow.open(map,marker);
      }
    });

  }

  function myMap() {
    var mapProp= {
      center:new google.maps.LatLng(-8.549166667,115.2169444),
      zoom:10,
      mapTypeId:'roadmap',
    };

    map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  }
</script>
