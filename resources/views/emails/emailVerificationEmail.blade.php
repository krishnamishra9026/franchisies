<style>
@import url('https://fonts.googleapis.com/css2?family=Lexend&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
</style>
    <div style="width: 600px; height:400px; margin: 0 auto;padding: 20px 30px;border: 1px solid #ddd;">
        <div style="text-align: center;margin-bottom: 30px;">
            <img src="https://winwinpromo.com/storage/uploads/logo/winlogo-black.png" alt="Logo" />
        </div>
        <h2 style="font-family: 'Lexend', sans-serif; font-size: 15px; color: #000;margin-bottom: 25px;">Hi {{ $username }},</h2>
        <h1 style="font-family: 'Lexend', sans-serif; font-size: 14px; color: #222;margin-bottom: 25px;font-weight: 500;">Thank you for registering on the Winwinpromo</h1>
        <p style="font-family: 'Inter', sans-serif; margin-bottom: 25px; color: #222; font-size: 13px;">Please click on the below button to verify your email</p>
        <a style="font-family: 'Inter', sans-serif; font-size: 14px; color: #fff; background-color: #814E81; border-color: #814E81;text-decoration: none;padding: 10px 30px; border-radius: 4px;" href="{{ route('user.verify', $token) }}">Verify Email</a>

        <h3 style="font-family: 'Lexend', sans-serif; font-size: 14px; color: #222;margin-top: 50px;font-weight: 500;margin-bottom: 7px;">Thank You,</h3>
        <h4 style="font-family: 'Lexend', sans-serif; font-size: 14px; color: #222;font-weight: 600;margin-top: 0px;">The WinWinPromo Team</h4>
    </div>
</div>
