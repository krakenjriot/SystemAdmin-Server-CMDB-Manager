function openModal() {
        document.getElementById('modal').style.display = 'block';
        document.getElementById('fade').style.display = 'block';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
    document.getElementById('fade').style.display = 'none';
}
        
function loadAjax(urlpage) {
    document.getElementById('results').innerHTML = '';
    openModal();
    var xhr = false;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (xhr) {
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                closeModal();
                document.getElementById("results").innerHTML = xhr.responseText;
            }
        }
        xhr.open("GET", "rightbottom.php?urlpage="+urlpage, true);
        xhr.send(null);
    }
}

