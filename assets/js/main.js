function addPayment() {
    var id_user = 1
    var name_payement = document.getElementById('name_payement').value;
    var prix = document.getElementById('prix').value;

    var xhr = new XMLHttpRequest();
    var url = 'api/add_payment.php';
    var params = 'id_user=' + id_user + '&name=' + name_payement + '&prix=' + prix;

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: 'Success!',
                text: 'Payment added successfully!',
                icon: 'success',
                confirmButtonText: 'Cool'
            }).then(function() {
                window.location = 'home.html';
            });
        }
    }

    xhr.send(params);
}
