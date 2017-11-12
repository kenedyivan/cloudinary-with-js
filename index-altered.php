<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <form>
        <div class="dropzone" id="my-dropzone" name="mainFileUploader">
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div>
        </div>
    </form>
    <div>
        <button type="submit" id="submit-all"> upload </button>
    </div>

</body>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="includes/dropzone.js"></script>
	<script>
	Dropzone.options.myDropzone = {
            url: "/Account/Create",
            //autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            acceptedFiles: "image/*",

            init: function () {

                var submitButton = document.querySelector("#submit-all");
                var wrapperThis = this;

                submitButton.addEventListener("click", function () {
                    wrapperThis.processQueue();
                });

                this.on("addedfile", function (file) {

                    // Create the remove button
                    var removeButton = Dropzone.createElement("<button class='btn btn-lg dark'>Remove File</button>");

                    // Listen to the click event
                    removeButton.addEventListener("click", function (e) {

                        console.log("Removing image");
                        // Make sure the button click doesn't submit the form:
                        e.preventDefault();
                        e.stopPropagation();

                        // Remove the file preview.
                        wrapperThis.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                    });

                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                });

                this.on('sendingmultiple', function (data, xhr, formData) {
                    formData.append("Username", $("#Username").val());
                });


                $.ajax({
                    type: 'GET',
                    headers: {"cache-control": "no-cache"},
                    url: "/get-images.php",
                    async: true,
                    cache: false,
                    dataType: "json",
                    data: 'property_id=' + pid +'&agent_id='+aid,
                    processData: false,
                    contentType: false,
                    success: function (jsonData, textStatus, jqXHR) {

                        console.log("Error: "+jsonData["error"]+",Status: "+
                        jsonData["status"]+"Message: "+jsonData["message"]);

                        if(jsonData["error"] == 0 && jsonData["status"] == 1){
                            span.style.backgroundColor = "cornflowerblue";

                            span.className = "animated bounceIn";

                        }

                        if(jsonData["error"] == 0 && jsonData["status"] == 2){
                            span.style.backgroundColor = "";
                            /*s.addClass( "animated bounceIn" );
                            s.removeClass( "animated bounceIn" );*/
                            span.className = "animated bounceIn";

                        }

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });

                /*var mockFile = { name: "15074763500h2.jpeg", size: 3030, type: 'image/jpeg' };
                this.addFile.call(this, mockFile);
                this.options.thumbnail.call(this, mockFile, "uploads/15074644280h5.jpeg");*/

                // Create the mock file:
                var mockFile = { name: "Filename", size: 12345 };

                // Call the default addedfile event handler
                this.emit("addedfile", mockFile);
                // And optionally show the thumbnail of the file:
                this.emit("thumbnail", mockFile, "uploads/15076512180h1.jpeg");

                // Make sure that there is no progress bar, etc...
                this.emit("complete", mockFile);

                // Create the mock file:
                var mockFile = { name: "Filename", size: 12345 };

                // Call the default addedfile event handler
                this.emit("addedfile", mockFile);
                // And optionally show the thumbnail of the file:
                this.emit("thumbnail", mockFile, "uploads/15076512181h18.jpeg");


                
                // Make sure that there is no progress bar, etc...
                this.emit("complete", mockFile);
                
            }
        };
	</script>
</html>