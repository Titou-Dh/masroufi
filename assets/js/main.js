function adds_ajout() {
    var id_user = 1
    var name_adds = document.getElementById('name_add').value;
    var prix = document.getElementById('prix_add').value;

    var xhr = new XMLHttpRequest();
    var url = 'api/ajout.php';
    var params = 'id_user=' + id_user + '&name=' + name_adds + '&prix=' + prix;

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: 'Success!',
                text: 'adds added successfully!',
                icon: 'success',
                confirmButtonText: 'Cool'
            }).then(function() {
                window.location = 'home.html';
            });
        }
    }

    xhr.send(params);
}



function add_payement() {
    var id_user = 1
    var name_payement = document.getElementById('name_payement').value;
    var prix_payement = document.getElementById('prix_payement').value;

    var xhr = new XMLHttpRequest();
    var url = 'api/add_payement.php';
    var params = 'id_user=' + id_user + '&name=' + name_payement + '&prix=' + prix_payement;

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: 'Success!',
                text: 'adds added successfully!',
                icon: 'success',
                confirmButtonText: 'Cool'
            }).then(function() {
                window.location = 'home.html';
            });
        }
    }

    xhr.send(params);
}
3