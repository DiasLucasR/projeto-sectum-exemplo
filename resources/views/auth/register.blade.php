<div class="container">
    <h2 class="text-center">{{ __('Registro') }}</h2>
    <form id="registerForm">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Nome Completo') }}</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">{{ __('E-mail') }}</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">{{ __('Senha') }}</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">{{ __('Confirmar Senha') }}</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cep">{{ __('CEP') }}</label>
            <input type="text" id="cep" name="cep" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="rua">{{ __('Rua') }}</label>
            <input type="text" id="rua" name="rua" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="bairro">{{ __('Bairro') }}</label>
            <input type="text" id="bairro" name="bairro" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="numero">{{ __('Número') }}</label>
            <input type="text" id="numero" name="numero" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cidade">{{ __('Cidade') }}</label>
            <input type="text" id="cidade" name="cidade" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="estado">{{ __('Estado') }}</label>
            <input type="text" id="estado" name="estado" class="form-control" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary">{{ __('Registrar') }}</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        const response = await fetch('/register', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        });

        const result = await response.json();
        console.log(result);
        if (response.ok) {
            alert('Registro bem-sucedido!');
            window.location.href = '/login';
        } else {
            alert(result.message);
        }
    });
</script>