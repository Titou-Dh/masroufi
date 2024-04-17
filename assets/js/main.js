function addPayment() {
    var id_user = 1
    var name = document.getElementById('name_payement').value;
    var prix = document.getElementById('prix').value;

    var xhr = new XMLHttpRequest();
    var url = 'api/add_payment.php';
    var params = 'id_user=' + id_user + '&name=' + id_element + '&prix=' + prix;

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('message').innerHTML = xhr.responseText;
        }
    }

    xhr.send(params);
}
