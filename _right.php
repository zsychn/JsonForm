<?php include_once "./_header.php";
$data = $_GET;
$json = $data['json'];
if($json == '')
{
    echo "NULL";
    exit;
}
?>
<body>
</body>

<script>
function output(inp) {
    document.body.appendChild(document.createElement('pre')).innerHTML = inp;
}
function syntaxHighlight(json) {
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        var cls = 'number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'key';
            } else {
                cls = 'string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'boolean';
        } else if (/null/.test(match)) {
            cls = 'null';
        }
        return '<span class="' + cls + '">' + match + '</span>';
    });
}

var jsonStr = <?= $json?>;
var str = JSON.stringify(jsonStr, undefined, 4);
output(syntaxHighlight(str)); 
</script>
