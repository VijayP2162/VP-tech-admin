<form method="POST" action="/send-otp">
    @csrf
    <input type="email" name="email" required>
    <button type="submit">Send OTP</button>
</form>
