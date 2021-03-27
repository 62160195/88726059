<h4>Search</h4>
<input type = "text" id = "kw">
<select id = "typ">
    <option value = "1">รายเดือน</option>
    <option value = "2">รายปี</option>
    <option value = "3">ตลอดชีพ</option>

<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "root1234";
    $db_name = "testdb";
    $mysqli = new my sqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8")

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ")"
}
$sql = "SELECT *
        FROM register_types
        ORDER BY 1"
$result = $mysqli->query($sql);
while($row = $result->fetch_object())
    {
        $arr[] = $row;
    }
?>
</select>
<button onclick = "search()">Search</button>
<div id = "disp"></div>

<script>
    function search() {
        kw = document.getElementById('kw').value;
        typ = document.getElementById('typ').value;
        console.log("kw =" + kw);
        console.log("typ =" + typ);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                arr = JSON.parge(this.responseText);
                console.log(arr);
                if(arr.length == 0){
                    document.getElementById('disp').innerHTML = "Not found";
                }else{
                    html = "";
                    for (i=0;i<arr.length;i++){
                        html += arr[i].id + ", " + arr[i].name + ", " + arr[i].email + "<br>";
                    }
                    document.getElementById('disp').innerHTML = html;
                }
            }
        }
        xmlhttp.open("get", "search.php?kw=" + kw);
        xmlhttp.send();
</script>