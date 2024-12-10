<!-- JavaScript for image preview -->
<script>
    // Calling the preview() function with correct input and previewImage IDs
    preview( "image", "previewImage" );

    function preview ( input, previewImage )
    {
        document.getElementById( input ).addEventListener( "change", function ()
        {
            var fileInput = this;
            if ( fileInput.files && fileInput.files[ 0 ] )
            {
                var reader = new FileReader();
                reader.onload = function ( e )
                {
                    var previewImageElement = document.getElementById( previewImage );
                    previewImageElement.src = e.target.result;
                    previewImageElement.style.display = "block";
                };

                reader.readAsDataURL( fileInput.files[ 0 ] );
            }
        } );
    }
</script>

<!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<script>
    const tooltipTriggerList = document.querySelectorAll( '[data-bs-toggle="tooltip"]' );
    const tooltipList = [ ...tooltipTriggerList ].map( tooltipTriggerEl => new bootstrap.Tooltip( tooltipTriggerEl ) );
</script>
</body>

</html>