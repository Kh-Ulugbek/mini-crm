@extends('customer.templates.app')

@section('content')
<div class="widget-container">
    <h3>Contact Us</h3>
    <form id="ticketForm">
        <input class="form-input" type="text" name="name" placeholder="Name" required>
        <input class="form-input" type="email" name="email" placeholder="Email" required>
        <input class="form-input" type="text" name="phone" placeholder="Phone Number" required>
        <input class="form-input" type="text" name="title" placeholder="Theme" required>
        <textarea class="form-input" name="text" rows="4" placeholder="Text" required></textarea>
        <button class="submit-button" type="submit">Yuborish</button>
    </form>
    <div class="alert success">✅ Ariza muvaffaqiyatli yuborildi!</div>
    <div class="alert error">❌ Xatolik yuz berdi, qayta urinib ko‘ring.</div>
</div>
@endsection

@section('js')
    <script>
        document.getElementById('ticketForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const form = e.target;
            const data = Object.fromEntries(new FormData(form));

            try {
                const res = await fetch('/api/tickets', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data),
                });

                if (res.ok) {
                    form.reset();
                    document.querySelector('.alert.success').style.display = 'block';
                    document.querySelector('.alert.error').style.display = 'none';
                } else {
                    throw new Error();
                }
            } catch {
                document.querySelector('.alert.success').style.display = 'none';
                document.querySelector('.alert.error').style.display = 'block';
            }
        });
    </script>
@endsection
