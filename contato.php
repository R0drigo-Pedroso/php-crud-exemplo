<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
</head>
<body>
    <h1>Contato Usando phpmailer</h1>
    <form action="contato.php" method="post">
        <p>    
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </p> 
        
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </p>

        <p>
            <label for="Assunto">Assunto:</label>
            <select name="Assunto" id="Assunto" required>
                <option value=""></option>
                <option value="Duvidas">Dúvidas</option>
                <option value="Reclamações">Reclamações</option>
                <option value="Elogios">Elogios</option>
            </select>
        </p>

        <p>
            <label for="mensagem">Mensagem:</label> <br>
            <textarea name="mensagem" id="mensagem" cols="30" rows="10" required></textarea>
        </p>
        
        <input type="submit" value="Enviar"> 
    </form>

    <p>
        <a href="index.php">Voltar</a>
    </p>

</body>
</html>