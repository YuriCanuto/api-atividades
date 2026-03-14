<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #f4f4f5;
            font-family: 'Georgia', serif;
            color: #18181b;
            padding: 40px 16px;
        }

        .wrapper {
            max-width: 520px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }

        .header {
            background-color: #18181b;
            padding: 32px 40px;
            text-align: center;
        }

        .header h1 {
            color: #ffffff;
            font-size: 20px;
            font-weight: normal;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .body {
            padding: 40px;
        }

        .body p {
            font-size: 15px;
            line-height: 1.7;
            color: #3f3f46;
            margin-bottom: 16px;
        }

        .btn {
            display: inline-block;
            margin: 24px 0;
            padding: 14px 32px;
            background-color: #18181b;
            color: #ffffff !important;
            text-decoration: none;
            font-size: 14px;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-radius: 4px;
        }

        .url-fallback {
            font-size: 12px;
            color: #a1a1aa;
            word-break: break-all;
            margin-top: 8px;
        }

        .footer {
            padding: 24px 40px;
            border-top: 1px solid #e4e4e7;
            text-align: center;
        }

        .footer p {
            font-size: 12px;
            color: #a1a1aa;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>Recuperação de Senha</h1>
        </div>

        <div class="body">
            <p>Olá,</p>
            <p>
                Recebemos uma solicitação para redefinir a senha da sua conta.
                Clique no botão abaixo para criar uma nova senha.
            </p>

            <a href="{{ $resetUrl }}" class="btn">Redefinir minha senha</a>

            <p>Este link expira em <strong>60 minutos</strong>.</p>

            <p>Se você não solicitou a recuperação de senha, ignore este e-mail.
            Sua senha permanecerá a mesma.</p>

            <p class="url-fallback">
                Caso o botão não funcione, copie e cole este link no navegador:<br/>
                {{ $resetUrl }}
            </p>
        </div>

        <div class="footer">
            <p>Este é um e-mail automático, por favor não responda.<br/>
            © {{ date('Y') }} {{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>