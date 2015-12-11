<script type="text/javascript">
        var defaultLat = (document.getElementById('latitude').value!=0) ? document.getElementById('latitude').value : 21.00296184;
var defaultLng = (document.getElementById('longitude').value!=0) ? document.getElementById('longitude').value : 105.85202157;
 </script>
<script type="text/javascript" src="{{ asset('admins/js/gmap.js') }}"></script>
    <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        $('[name="image_url"]').change(function(){
        readURL(this);
    });
    </script>