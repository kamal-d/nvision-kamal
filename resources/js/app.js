import './bootstrap';
document.addEventListener("DOMContentLoaded", function(event) {
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault();
        saveData();
    });
    document.getElementById("alert").addEventListener("click", function() {
        this.classList.add("hidden");
    });

    function saveData() {
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const phone = document.getElementById("phone").value;

        const indexedDB =
            window.indexedDB ||
            window.mozIndexedDB ||
            window.webkitIndexedDB ||
            window.msIndexedDB ||
            window.shimIndexedDB;

        if (!indexedDB) {
            console.log("IndexedDB could not be found in this browser.");
        }

        const request = indexedDB.open("UsersDataBase", 1);
        request.onupgradeneeded = function() {
            const db = request.result;
            const store = db.createObjectStore("users", {
                keyPath: "id",
                autoIncrement: true
            });
        };
        request.onsuccess = function() {
            console.log("Database opened successfully");

            const db = request.result;
            const transaction = db.transaction("users", "readwrite");
            const store = transaction.objectStore("users");

            store.put({
                name: name,
                phone: phone,
                email: email
            });
            transaction.oncomplete = function() {
                console.log("Transaction completed: row inserted successfully.");
                db.close();
                document.getElementById("inserted-data").innerHTML =
                    `Name: ${name}, Email: ${email}, Phone: ${phone}`;
                document.getElementById("alert").classList.remove("hidden");
                document.getElementById("name").value = "";
                document.getElementById("email").value = "";
                document.getElementById("phone").value = "";
            };
        };
    }
});