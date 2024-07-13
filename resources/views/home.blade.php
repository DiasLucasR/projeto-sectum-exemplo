<div class="container">

    <h1>Home</h1>
    <h2>Lista de Usuários:</h2>
    <ul id="userList"></ul>

</div>
<script>
    async function fetchUsers() {
        try {
            const token = localStorage.getItem('auth_token'); 

            const response = await fetch('/get-users', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
               
            });
            const users = await response.json();

            console.log(users)
            const userList = document.getElementById('userList');
            const listItems = users.map(user => {
            return `<li>${user.name} - ${user.email}</li>`;
            }).join('');
            userList.innerHTML = listItems;

        } catch (error) {
            console.error('Erro:', error.message);
        }
    }

    fetchUsers();
</script>