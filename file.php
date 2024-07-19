<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>AJAX Uploading</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
  <form id="formAjax" action="" enctype="multipart/form-data" method="POST">
    <input type="file" id="fileAjax" name="fileAjax" />
    <input type="text" id="name" name="" />
    <br /><br />
    <input onclick="upload()" type="button" id="submit" name="submit" value="Upload" />
  </form>
  <p id="status"></p>

  <script>
    function upload() {
      let myFile = document.getElementById('fileAjax');
      const formData = new FormData();
      const files = myFile.files;
      const file = files[0];
      formData.append('fileAjax', file);

      $.ajax({
        url: 'http://localhost/fileupload/upload.php',
        method: 'POST',
        data: formData,
        contentType: false, // Prevent jQuery from setting Content-Type header
        processData: false, // Prevent jQuery from processing the data
        success: function(response) {
          $('#status').html('<p>File uploaded successfully!</p>');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          $('#status').html('<p>There was an error uploading the file.</p>');
        }
      });
    }
  </script>
</body>
</html>
