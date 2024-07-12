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
            <button type="submit" class="btn-primary">{{ __('Login') }}</button>
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
        e.preventDefault();
        const formData = new FormData(this);

        const response = await fetch('/login', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        });

        const result = await response.json();
        if (response.ok) {
            localStorage.setItem('auth_token', result.token);
            window.location.href = '/home';
        } else {
            alert(result.message);
        }
    });
</script>