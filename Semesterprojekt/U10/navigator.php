<!doctype html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../styles/indexStyle.css" rel="stylesheet" type="text/css">
<style>
    textarea { margin: 1rem; display: block; width: 80vw; height: 20vh; }
    input { margin: 1rem; }
</style>
<div class="header">
<script src="../structure/getHeader.js"></script>
</div>
<div class="main">
<h1> WWW-Navigator mit PHP</h1>
<form method="post">
    <fieldset>
        <legend>Thema und Unterthema auswaehlen um einen Text einzusehen und zu veraendern:</legend>
        <select name="top_header">
            <option value="html">HTML</option>
            <option value="css">CSS</option>
            <option value="javascript">JavaScript</option>
        </select>
        <select name="sub_header">
        </select>
        <textarea name="content"></textarea>
        <input type="submit" value="Submit">
    </fieldset>
</form>
</div>
<?PHP
$file = './data.json';
$contents = file_get_contents( $file );
$json = json_decode( $contents, true );
$oldJson = json_decode( $contents, true );
?>
<script>
    let json = <?PHP echo json_encode( $json ) ?>;
    const top_header = document.querySelector('select[name="top_header"]');
    const sub_header = document.querySelector('select[name="sub_header"]');
    const content = document.querySelector('textarea[name="content"');
    top_header.addEventListener('click', e => {
        content.innerHTML = "";
        //https://stackoverflow.com/questions/3364493/how-do-i-clear-all-options-in-a-dropdown-box
        for(let i = sub_header.options.length-1; i >= 0; i--){
            sub_header.options[i] = null;
        }
        Object.keys( json[ e.target.value ] ).forEach( key => {

            const option = document.createElement('option');
            option.value = key;
            option.innerText = key;
            sub_header.appendChild( option );
        });
    });
    sub_header.addEventListener('click', e => {
        if(json[top_header.value][sub_header.value]) {
            content.innerHTML = json[top_header.value][sub_header.value];
        } else {
            content.innerHTML = "";
        }
    });


</script>

<?PHP
if ( isset($_POST[ 'top_header' ]) && isset($_POST[ 'sub_header' ]) && isset($_POST[ 'content' ]) ){
    $top_header = $_POST[ 'top_header' ];
    $sub_header = $_POST[ 'sub_header' ];

    $content = $_POST[ 'content' ];

        $json = json_decode($contents, true);
        $json[ $top_header ][ $sub_header ] = $content;
        if ( file_put_contents( $file, json_encode( $json, true )) ){
            echo "<script>alert('Erfolgreich gespeichert!')</script>";
            header("Refresh:0");
        }
}
?>
    <div class="footer">
    <script src="../structure/getFooter.js"></script>
  </div>