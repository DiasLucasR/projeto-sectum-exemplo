<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
    <h2>Lista de Usuários:</h2>
    <ul id="userList"></ul>

    <script>
        async function fetchUsers() {
            const token = localStorage.getItem('auth_token');

            const response = await fetch('/home', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            const users = await response.json();
            const userList = document.getElementById('userList');
            users.forEach(user => {
                const li = document.createElement('li');
                li.textContent = `${user.name} - ${user.email}`;
                userList.appendChild(li);
            });
        }

        fetchUsers();
    </script>
</body>
</html>