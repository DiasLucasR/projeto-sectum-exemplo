<div class="container">
    <h2 class="text-center">{{ __('Login') }}</h2>
    <form id="loginForm">
        @csrf
        <div class="form-group">
            <label for="email">{{ __('Email Address') }}</label>
            <input type="email" id="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
        </div>

        <div class="form-group text-center">
            <a href="{{ url('/forgot-password') }}">{{ __('Forgot Your Password?') }}</a>
        </div>

        <div class="form-group text-center">
            <a href="{{ url('/register') }}">{{ __('Create an Account') }}</a>
        </div>
    </form>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault(); // Evitar submissão padrão do formulário

        const form = this;
        const formData = new FormData(form);
        const formObject = {};

        formData.forEach((value, key) => {
            formObject[key] = value;
        });

        try {
            const response = await fetch('/login', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formObject)
            });
        const result = await response.json();
        
        
        if (response.ok) {
            localStorage.setItem('auth_token', result.token);
            window.location.href = '/home';
        } else {
            alert(result.message || 'Login failed. Please try again.');
        }
    } catch (error) {
        console.error('Error during login:', error);
        alert('An error occurred. Please try again later.');
    }
});
</script>